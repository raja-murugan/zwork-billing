<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Expense;
use App\Models\Expense_note_cost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Expense::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();

        return view('page.backend.expense.index', compact('data', 'today'));
    }


    public function datefilter(Request $request) {
        $today = $request->get('from_date');
        $data = Expense::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();

        return view('page.backend.expense.index', compact('data', 'today'));
    }


    public function create()
    {
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        $bank = Bank::where('soft_delete', '!=', 1)->get();

        $Latest_expense = Expense::latest('id')->first();
        if($Latest_expense != ''){
            $expence_number = $Latest_expense->expence_number + 1;
        }else {
            $expence_number = 1;
        }

        return view('page.backend.expense.create', compact('today', 'timenow', 'expence_number', 'bank'));
    }


    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Expense();

        $data->unique_key = $randomkey;
        $data->expence_number = $request->get('expence_number');
        $data->date = $request->get('date');
        $data->time = $request->get('time');
        $data->bank_id = $request->get('bank_id');
        $data->grand_total = $request->get('total_expense_amount');
        $data->add_on_note = $request->get('add_on_note');

        $data->save();

        $expense_id = $data->id;

        foreach ($request->get('note') as $key => $note) {
            if ($note != "") {

                $Expencenote = new Expense_note_cost();

                $Expencenote->expenses_id = $expense_id;
                $Expencenote->note = $request->note[$key];
                $Expencenote->price = $request->expense_price[$key];

                $Expencenote->save();
            }
        }

        return redirect()->route('expense.index')->with('message', 'Added !');
    }

    public function edit($unique_key)
    {
        $ExpenseData = Expense::where('unique_key', '=', $unique_key)->first();
        $ExpenseNote = Expense_note_cost::where('expenses_id', '=', $ExpenseData->id)->get();

        $bank = Bank::where('soft_delete', '!=', 1)->get();

        return view('page.backend.expense.edit', compact('ExpenseData', 'ExpenseNote', 'bank'));
    }


    public function update(Request $request, $unique_key)
    {
        $ExpenseData = Expense::where('unique_key', '=', $unique_key)->first();

        $ExpenseData->expence_number = $request->get('expence_number');
        $ExpenseData->date = $request->get('date');
        $ExpenseData->time = $request->get('time');
        $ExpenseData->bank_id = $request->get('bank_id');
        $ExpenseData->grand_total = $request->get('total_expense_amount');
        $ExpenseData->add_on_note = $request->get('add_on_note');

        $ExpenseData->update();

        $expense_id = $ExpenseData->id;


        $getInserted = Expense_note_cost::where('expenses_id', '=', $expense_id)->get();
        $notecosts = array();
        foreach ($getInserted as $key => $getInserted_notecost) {
            $notecosts[] = $getInserted_notecost->id;
        }

        $updated_notecost = $request->expense_details_id;
        $updated_notecost_arr = array_filter($updated_notecost);
        $different_ids = array_merge(array_diff($notecosts, $updated_notecost_arr), array_diff($updated_notecost_arr, $notecosts));

        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                Expense_note_cost::where('id', $different_id)->delete();
            }
        }


        foreach ($request->get('expense_details_id') as $key => $expense_details_id) {
            if ($expense_details_id > 0) {

                $expense_price = $request->expense_price[$key];
                $note = $request->note[$key];

                DB::table('expense_note_costs')->where('id', $expense_details_id)->update([
                    'expenses_id' => $expense_id, 'price' => $expense_price, 'note' => $note
                ]);
            } else if ($expense_details_id == '') {
                

                    $Expencenote = new Expense_note_cost();
    
                    $Expencenote->expenses_id = $expense_id;
                    $Expencenote->note = $request->note[$key];
                    $Expencenote->price = $request->expense_price[$key];
    
                    $Expencenote->save();
                
            }
        }


        return redirect()->route('expense.index')->with('message', 'Updated !');


    }

    public function delete($unique_key)
    {
        $data = Expense::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('expense.index')->with('warning', 'Deleted !');
    }
}
