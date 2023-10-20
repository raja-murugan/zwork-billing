<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PaymentBalance;
use App\Models\Product;
use App\Models\Bank;
use App\Models\Quotation;
use App\Models\QuotationProduct;
use App\Models\QuotationExtracost;
use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\BillExtracost;
use App\Models\CustomerPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::where('soft_delete', '!=', 1)->orderBy('id', 'DESC')->get();

        $Customer_data = [];
        foreach ($data as $key => $datas) {

            $PaymentBalanceAmount = PaymentBalance::where('customer_id', '=', $datas->id)->first();
            if($PaymentBalanceAmount != ""){
                $customer_bal = $PaymentBalanceAmount->customer_balance;
            }else {
                $customer_bal = '0';
            }

            $Customer_data[] = array(
                'name' => $datas->name,
                'unique_key' => $datas->unique_key,
                'address' => $datas->address,
                'phone_number' => $datas->phone_number,
                'email_id' => $datas->email_id,
                'id' => $datas->id,
                'customer_balance' => $customer_bal,
            );

        }
        $today = Carbon::now()->format('Y-m-d');
        return view('page.backend.customer.index', compact('Customer_data', 'today'));
    }

   

    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Customer();

        $data->unique_key = $randomkey;
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->phone_number = $request->get('phone_number');
        $data->email_id = $request->get('email_id');
        $data->balance_amount = $request->get('balance_amount');
        $data->save();

        $customerid = $data->id;
        $PaymentBalanceDAta = PaymentBalance::where('customer_id', '=', $customerid)->first();
        if($PaymentBalanceDAta == ""){
            $balance_amount = $request->get('balance_amount');
            $paymentbalacedata = new PaymentBalance();

            $paymentbalacedata->customer_id = $customerid;
            $paymentbalacedata->customer_amount = $balance_amount;
            $paymentbalacedata->customer_paid = 0;
            $paymentbalacedata->customer_balance = $balance_amount;
            $paymentbalacedata->save();
        }


        return redirect()->route('customer.index')->with('message', 'Added !');
    }


    public function edit(Request $request, $unique_key)
    {
        $CustomerData = Customer::where('unique_key', '=', $unique_key)->first();

        $CustomerData->name = $request->get('name');
        $CustomerData->address = $request->get('address');
        $CustomerData->phone_number = $request->get('phone_number');
        $CustomerData->email_id = $request->get('email_id');
        $CustomerData->update();

        return redirect()->route('customer.index')->with('info', 'Updated !');
    }


    public function view($unique_key)
    {
        $CustomerData = Customer::where('unique_key', '=', $unique_key)->first();
        $today = Carbon::now()->format('Y-m-d');

        $data = Bill::where('customer_id', '=', $CustomerData->id)->where('soft_delete', '!=', 1)->get();
        $Bill_data = [];
        $products = [];
        foreach ($data as $key => $datas) {

            $customer = Customer::findOrFail($datas->customer_id);
            $bank = Bank::findOrFail($datas->bank_id);

            $BillProducts = BillProduct::where('bill_id', '=', $datas->id)->get();
            foreach ($BillProducts as $key => $BillProductss_arr) {

                $product = Product::findOrFail($BillProductss_arr->bill_product_id);
                $products[] = array(
                    'bill_width' => $BillProductss_arr->bill_width,
                    'bill_height' => $BillProductss_arr->bill_height,
                    'bill_qty' => $BillProductss_arr->bill_qty,
                    'bill_areapersqft' => $BillProductss_arr->bill_areapersqft,
                    'bill_rate' => $BillProductss_arr->bill_rate,
                    'bill_product_total' => $BillProductss_arr->bill_product_total,
                    'product_name' => $product->name,
                    'bill_id' => $BillProductss_arr->bill_id,

                );
            }


            $Bill_data[] = array(
                'unique_key' => $datas->unique_key,
                'id' => $datas->id,
                'billno' => $datas->billno,
                'date' => $datas->date,
                'time' => $datas->time,
                'customer' => $customer->name,
                'bank' => $bank->name,
                'bill_sub_total' => $datas->bill_sub_total,
                'bill_discount_price' => $datas->bill_discount_price,
                'bill_total_amount' => $datas->bill_total_amount,
                'bill_tax_amount' => $datas->bill_tax_amount,
                'bill_tax_percentage' => $datas->bill_tax_percentage,
                'bill_extracost_amount' => $datas->bill_extracost_amount,
                'bill_grand_total' => $datas->bill_grand_total,
                'bill_paid_amount' => $datas->bill_paid_amount,
                'bill_balance_amount' => $datas->bill_balance_amount,
                'products_data' => $products,
                'bill_discount_type' => $datas->bill_discount_type,
                'bill_discount' => $datas->bill_discount,
                'bill_add_on_note' => $datas->bill_add_on_note,
            );
        }



        $quotationdata = Quotation::where('customer_id', '=', $CustomerData->id)->where('soft_delete', '!=', 1)->where('status', '=', NULL)->get();
        if($quotationdata){
            $quotation_data = [];
            foreach ($quotationdata as $key => $quotationdatas) {
                $qcustomer = Customer::findOrFail($quotationdatas->customer_id);
    
    
                    $quotation_data[] = array(
                        'unique_key' => $quotationdatas->unique_key,
                        'id' => $quotationdatas->id,
                        'quotation_number' => $quotationdatas->quotation_number,
                        'date' => $quotationdatas->date,
                        'time' => $quotationdatas->time,
                        'customer' => $qcustomer->name,
                        'sub_total' => $quotationdatas->sub_total,
                        'discount_price' => $quotationdatas->discount_price,
                        'total_amount' => $quotationdatas->total_amount,
                        'tax_percentage' => $quotationdatas->tax_percentage,
                        'tax_amount' => $quotationdatas->tax_amount,
                        'extracost_amount' => $quotationdatas->extracost_amount,
                        'grand_total' => $quotationdatas->grand_total,
                        'status' => $quotationdatas->status,
                        'discount_type' => $quotationdatas->discount_type,
                        'discount' => $quotationdatas->discount,
                        'tax_percentage' => $quotationdatas->tax_percentage,
                        'add_on_note' => $quotationdatas->add_on_note,
                    );
    
    
            }
        }else {
            $quotation_data = '';
        }
        

        $paymentdata = CustomerPayment::where('soft_delete', '!=', 1)->where('customer_id', '=', $CustomerData->id)->orderBy('id', 'DESC')->get();
        if($paymentdata){

            $PaymentData = [];
            foreach ($paymentdata as $key => $paymentdatas) {
                $customer = Customer::findOrFail($paymentdatas->customer_id);
                $bank = Bank::findOrFail($paymentdatas->bank_id);
    
                $PaymentData[] = array(
                    'unique_key' => $paymentdatas->unique_key,
                    'id' => $paymentdatas->id,
                    'customer_id' => $paymentdatas->customer_id,
                    'bank_id' => $paymentdatas->bank_id,
                    'date' => $paymentdatas->date,
                    'time' => $paymentdatas->time,
                    'oldblance' => $paymentdatas->oldblance,
                    'discount' => $paymentdatas->discount,
                    'totalamount' => $paymentdatas->totalamount,
                    'paid_amount' => $paymentdatas->paid_amount,
                    'payment_pending' => $paymentdatas->payment_pending,
                    'note' => $paymentdatas->note,
                    'customer' => $customer->name,
                    'bank' => $bank->name,
                );
    
            }
        }else {
            $PaymentData = '';
        }
        



            $total_billamount = Bill::where('soft_delete', '!=', 1)->where('customer_id', '=', $CustomerData->id)->sum('bill_grand_total');
            if($total_billamount != ""){
                $totalbillamount = $total_billamount;
            }else {
                $totalbillamount = '0';
            }


            // Total Paid
            $total_paid = Bill::where('soft_delete', '!=', 1)->where('customer_id', '=', $CustomerData->id)->sum('bill_paid_amount');
            if($total_paid != ""){
                $total_paid_Amount = $total_paid;
            }else {
                $total_paid_Amount = '0';
            }
            $payment_total_paid = CustomerPayment::where('soft_delete', '!=', 1)->where('customer_id', '=', $CustomerData->id)->sum('paid_amount');
            if($payment_total_paid != ""){
                $total_payment_paid = $payment_total_paid;
            }else {
                $total_payment_paid = '0';
            }


            $payment_discount = CustomerPayment::where('soft_delete', '!=', 1)->where('customer_id', '=', $CustomerData->id)->sum('discount');
            if($payment_discount != ""){
                $totpayment_discount = $payment_discount;
            }else {
                $totpayment_discount = '0';
            }
            $total_amount_paid = $total_paid_Amount + $total_payment_paid + $totpayment_discount;

            $total_balance = $totalbillamount - $total_amount_paid;

        return view('page.backend.customer.view', compact('CustomerData', 'today', 'Bill_data', 'totalbillamount', 'total_amount_paid', 'total_balance', 'quotation_data', 'PaymentData'));
    }


    public function delete($unique_key)
    {
        $data = Customer::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->with('warning', 'Deleted !');
    }

    public function checkduplicate(Request $request)
    {
        if(request()->get('query'))
        {
            $query = request()->get('query');
            $customerdata = Customer::where('phone_number', '=', $query)->first();

            $userData['data'] = $customerdata;
            echo json_encode($userData);
        }
    }
}
