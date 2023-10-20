<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Bank;
use App\Models\CustomerPayment;
use App\Models\PaymentBalance;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class CustomerPaymentController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = CustomerPayment::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();
        $PaymentData = [];
        foreach ($data as $key => $datas) {
            $customer = Customer::findOrFail($datas->customer_id);
            $bank = Bank::findOrFail($datas->bank_id);

            $PaymentData[] = array(
                'unique_key' => $datas->unique_key,
                'id' => $datas->id,
                'customer_id' => $datas->customer_id,
                'bank_id' => $datas->bank_id,
                'date' => $datas->date,
                'time' => $datas->time,
                'oldblance' => $datas->oldblance,
                'discount' => $datas->discount,
                'totalamount' => $datas->totalamount,
                'paid_amount' => $datas->paid_amount,
                'payment_pending' => $datas->payment_pending,
                'note' => $datas->note,
                'customer' => $customer->name,
                'bank' => $bank->name,
            );

        }

        $customer = Customer::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        
        $timenow = Carbon::now()->format('H:i');
        return view('page.backend.customer_payment.index', compact('PaymentData','customer', 'today', 'timenow', 'bank'));
    }

    public function datefilter(Request $request) {
        
        $today = $request->get('from_date');
        $data = CustomerPayment::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();
        $PaymentData = [];
        foreach ($data as $key => $datas) {
            $customer = Customer::findOrFail($datas->customer_id);
            $bank = Bank::findOrFail($datas->bank_id);

            $PaymentData[] = array(
                'unique_key' => $datas->unique_key,
                'id' => $datas->id,
                'customer_id' => $datas->customer_id,
                'bank_id' => $datas->bank_id,
                'date' => $datas->date,
                'time' => $datas->time,
                'oldblance' => $datas->oldblance,
                'discount' => $datas->discount,
                'totalamount' => $datas->totalamount,
                'paid_amount' => $datas->paid_amount,
                'payment_pending' => $datas->payment_pending,
                'note' => $datas->note,
                'customer' => $customer->name,
                'bank' => $bank->name,
            );

        }

        $customer = Customer::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        
        $timenow = Carbon::now()->format('H:i');
        return view('page.backend.customer_payment.index', compact('PaymentData','customer', 'today', 'timenow', 'bank'));
    }


    public function create()
    {
        $customer = Customer::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.customer_payment.create', compact('customer', 'today', 'timenow', 'bank'));
    }

    public function store(Request $request)
    {


        $customer_id = $request->get('customer_id');

        $CustomerpaymentData = PaymentBalance::where('customer_id', '=', $customer_id)->first();
        if($CustomerpaymentData != ""){

            $randomkey = Str::random(5);

            $data = new CustomerPayment();
    
            $data->unique_key = $randomkey;
            $data->customer_id = $request->get('customer_id');
            $data->bank_id = $request->get('bank_id');
            $data->date = $request->get('date');
            $data->time = $request->get('time');
            $data->oldblance = $request->get('oldblance');
            $data->discount = $request->get('discount');
            $data->totalamount = $request->get('totalamount');
            $data->paid_amount = $request->get('paid_amount');
            $data->payment_pending = $request->get('payment_pending');
            $data->note = $request->get('note');
            $data->save();

            $old_grossamount = $CustomerpaymentData->customer_amount;
            $old_paid = $CustomerpaymentData->customer_paid;
            

            $payment_paid_amount = $request->get('paid_amount');
            $salespayment_discount = $request->get('discount');


            $customer_amount = $old_grossamount - $salespayment_discount;
            $new_paid = $old_paid + $payment_paid_amount;
            $new_balance = $customer_amount - $new_paid;

            DB::table('payment_balances')->where('customer_id', $customer_id)->update([
                'customer_amount' => $customer_amount, 'customer_paid' => $new_paid, 'customer_balance' => $new_balance
            ]);
        }

        


        return redirect()->route('customer_payment.index')->with('message', 'Added !');
    }



    public function edit($unique_key)
    {
        $CustomerPaymentData = CustomerPayment::where('unique_key', '=', $unique_key)->first();
        $customer = Customer::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();

        return view('page.backend.customer_payment.edit', compact('CustomerPaymentData', 'customer', 'bank'));
    }
    


    public function update(Request $request, $unique_key)
    {
        $CustomerPayment = CustomerPayment::where('unique_key', '=', $unique_key)->first();


        $discount = $CustomerPayment->discount;
        $paidamount = $CustomerPayment->paid_amount;
        $customer_id = $CustomerPayment->customer_id;

        $payment_paid_amount = $request->get('paid_amount');
        $p_discount = $request->get('discount');

        $CustomerPaymentData = PaymentBalance::where('customer_id', '=', $customer_id)->first();
        $old_paid = $CustomerPaymentData->customer_paid;


        if($p_discount > $discount){

            $diff_discount = $p_discount - $discount;
            $total_customeramount = $CustomerPaymentData->customer_amount - $diff_discount;


        }else if($p_discount < $discount){

            $diff_discount = $discount - $p_discount;
            $total_customeramount = $CustomerPaymentData->customer_amount + $diff_discount;

        }else if($p_discount == $discount){

            $total_customeramount = $CustomerPaymentData->customer_amount;
        }



        if($payment_paid_amount > $paidamount){
            $diff_paid = $payment_paid_amount - $paidamount;
            $total_paid = $old_paid + $diff_paid;

        }else if($payment_paid_amount < $paidamount){

            $diff_paid = $paidamount - $payment_paid_amount;
            $total_paid = $old_paid - $diff_paid;

        }else if($payment_paid_amount == $paidamount){

            $total_paid = $old_paid;
        }


        $new_balance = $total_customeramount - $total_paid;

        DB::table('payment_balances')->where('customer_id', $customer_id)->update([
            'customer_amount' => $total_customeramount, 'customer_paid' => $total_paid, 'customer_balance' => $new_balance
        ]);



        $CustomerPayment->customer_id = $request->get('customer_id');
        $CustomerPayment->bank_id = $request->get('bank_id');
        $CustomerPayment->date = $request->get('date');
        $CustomerPayment->time = $request->get('time');
        $CustomerPayment->oldblance = $request->get('oldblance');
        $CustomerPayment->discount = $request->get('discount');
        $CustomerPayment->totalamount = $request->get('totalamount');
        $CustomerPayment->paid_amount = $request->get('paid_amount');
        $CustomerPayment->payment_pending = $request->get('payment_pending');
        $CustomerPayment->note = $request->get('note');

        $CustomerPayment->update();

        return redirect()->route('customer_payment.index')->with('info', 'Updated !');
    }



    public function delete($unique_key)
    {
        $data = CustomerPayment::where('unique_key', '=', $unique_key)->first();

        $discount = $data->discount;
        $paidamount = $data->paid_amount;


        $CustomerPaymentData = PaymentBalance::where('customer_id', '=', $data->customer_id)->first();

        $edited_paid = $CustomerPaymentData->customer_paid - $paidamount;
        $edited_customeramount = $CustomerPaymentData->customer_amount + $discount;
        $new_balance = $edited_customeramount - $edited_paid;


        DB::table('payment_balances')->where('customer_id', $data->customer_id)->update([
            'customer_amount' => $edited_customeramount, 'customer_paid' => $edited_paid, 'customer_balance' => $new_balance
        ]);

        $data->soft_delete = 1;

        $data->update();

       
        return redirect()->route('customer_payment.index')->with('warning', 'Deleted !');
    }
}
