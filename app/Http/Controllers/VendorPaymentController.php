<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Vendor;
use App\Models\Bank;
use App\Models\VendorPayment;
use App\Models\PaymentBalance;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class VendorPaymentController extends Controller
{
    public function index()
    {

        $today = Carbon::now()->format('Y-m-d');

        $data = VendorPayment::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();
        $PaymentData = [];
        foreach ($data as $key => $datas) {
            $vendor = Vendor::findOrFail($datas->vendor_id);
            $bank = Bank::findOrFail($datas->bank_id);

            $PaymentData[] = array(
                'unique_key' => $datas->unique_key,
                'id' => $datas->id,
                'vendor_id' => $datas->vendor_id,
                'bank_id' => $datas->bank_id,
                'date' => $datas->date,
                'time' => $datas->time,
                'oldblance' => $datas->oldblance,
                'discount' => $datas->discount,
                'totalamount' => $datas->totalamount,
                'paid_amount' => $datas->paid_amount,
                'payment_pending' => $datas->payment_pending,
                'note' => $datas->note,
                'vendor' => $vendor->name,
                'bank' => $bank->name,
            );

        }

        $vendor = Vendor::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        
        $timenow = Carbon::now()->format('H:i');
        return view('page.backend.vendor_payment.index', compact('PaymentData','vendor', 'today', 'timenow', 'bank'));
    }


    public function datefilter(Request $request) {
        $today = $request->get('from_date');
        $data = VendorPayment::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();
        $PaymentData = [];
        foreach ($data as $key => $datas) {
            $vendor = Vendor::findOrFail($datas->vendor_id);
            $bank = Bank::findOrFail($datas->bank_id);

            $PaymentData[] = array(
                'unique_key' => $datas->unique_key,
                'id' => $datas->id,
                'vendor_id' => $datas->vendor_id,
                'bank_id' => $datas->bank_id,
                'date' => $datas->date,
                'time' => $datas->time,
                'oldblance' => $datas->oldblance,
                'discount' => $datas->discount,
                'totalamount' => $datas->totalamount,
                'paid_amount' => $datas->paid_amount,
                'payment_pending' => $datas->payment_pending,
                'note' => $datas->note,
                'vendor' => $vendor->name,
                'bank' => $bank->name,
            );

        }

        $vendor = Vendor::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        
        $timenow = Carbon::now()->format('H:i');
        return view('page.backend.vendor_payment.index', compact('PaymentData','vendor', 'today', 'timenow', 'bank'));
    }


    public function create()
    {
        $vendor = Vendor::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.vendor_payment.create', compact('vendor', 'today', 'timenow', 'bank'));
    }


    public function store(Request $request)
    {


        $vendor_id = $request->get('vendor_id');

        $VendorpaymentData = PaymentBalance::where('vendor_id', '=', $vendor_id)->first();
        if($VendorpaymentData != ""){

            $randomkey = Str::random(5);

            $data = new VendorPayment();
    
            $data->unique_key = $randomkey;
            $data->vendor_id = $request->get('vendor_id');
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

            $old_grossamount = $VendorpaymentData->vendor_amount;
            $old_paid = $VendorpaymentData->vendor_paid;

            $payment_paid_amount = $request->get('paid_amount');
            $salespayment_discount = $request->get('discount');


            $vendor_amount = $old_grossamount - $salespayment_discount;
            $new_paid = $old_paid + $payment_paid_amount;
            $new_balance = $vendor_amount - $new_paid;

            DB::table('payment_balances')->where('vendor_id', $vendor_id)->update([
                'vendor_amount' => $vendor_amount, 'vendor_paid' => $new_paid, 'vendor_balance' => $new_balance
            ]);
        }

        


        return redirect()->route('vendor_payment.index')->with('message', 'Added !');
    }



    public function edit($unique_key)
    {
        $VendorPaymentData = VendorPayment::where('unique_key', '=', $unique_key)->first();
        $vendor = Vendor::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();

        return view('page.backend.vendor_payment.edit', compact('VendorPaymentData', 'vendor', 'bank'));
    }


    public function update(Request $request, $unique_key)
    {
        $VendorPayment = VendorPayment::where('unique_key', '=', $unique_key)->first();


        $discount = $VendorPayment->discount;
        $paidamount = $VendorPayment->paid_amount;
        $vendor_id = $VendorPayment->vendor_id;

        $payment_paid_amount = $request->get('paid_amount');
        $p_discount = $request->get('discount');

        $VendorPaymentData = PaymentBalance::where('vendor_id', '=', $vendor_id)->first();
        $old_paid = $VendorPaymentData->vendor_paid;


        if($p_discount > $discount){

            $diff_discount = $p_discount - $discount;
            $total_vendoramount = $VendorPaymentData->vendor_amount - $diff_discount;


        }else if($p_discount < $discount){

            $diff_discount = $discount - $p_discount;
            $total_vendoramount = $VendorPaymentData->vendor_amount + $diff_discount;

        }else if($p_discount == $discount){

            $total_vendoramount = $VendorPaymentData->vendor_amount;
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


        $new_balance = $total_vendoramount - $total_paid;

        DB::table('payment_balances')->where('vendor_id', $vendor_id)->update([
            'vendor_amount' => $total_vendoramount, 'vendor_paid' => $total_paid, 'vendor_balance' => $new_balance
        ]);



        $VendorPayment->vendor_id = $request->get('vendor_id');
        $VendorPayment->bank_id = $request->get('bank_id');
        $VendorPayment->date = $request->get('date');
        $VendorPayment->time = $request->get('time');
        $VendorPayment->oldblance = $request->get('oldblance');
        $VendorPayment->discount = $request->get('discount');
        $VendorPayment->totalamount = $request->get('totalamount');
        $VendorPayment->paid_amount = $request->get('paid_amount');
        $VendorPayment->payment_pending = $request->get('payment_pending');
        $VendorPayment->note = $request->get('note');

        $VendorPayment->update();

        return redirect()->route('vendor_payment.index')->with('info', 'Updated !');
    }



    public function delete($unique_key)
    {
        $data = VendorPayment::where('unique_key', '=', $unique_key)->first();

        $discount = $data->discount;
        $paidamount = $data->paid_amount;


        $VendorPaymentData = PaymentBalance::where('vendor_id', '=', $data->vendor_id)->first();

        $edited_paid = $VendorPaymentData->vendor_paid - $paidamount;
        $edited_vendoramount = $VendorPaymentData->vendor_amount + $discount;
        $new_balance = $edited_vendoramount - $edited_paid;


        DB::table('payment_balances')->where('vendor_id', $data->vendor_id)->update([
            'vendor_amount' => $edited_vendoramount, 'vendor_paid' => $edited_paid, 'vendor_balance' => $new_balance
        ]);

        $data->soft_delete = 1;

        $data->update();

       
        return redirect()->route('vendor_payment.index')->with('warning', 'Deleted !');
    }


}
