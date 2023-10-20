<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Bank;
use App\Models\Quotation;
use App\Models\Product;
use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\BillExtracost;
use App\Models\PaymentBalance;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class BillController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');

        $data = Bill::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();
        $products = [];
        $extracosts = [];
        $Bill_data = [];
        foreach ($data as $key => $datas) {
            $customer = Customer::findOrFail($datas->customer_id);
            $bank = Bank::findOrFail($datas->bank_id);

            $BillProducts = BillProduct::where('bill_id', '=', $datas->id)->get();
            foreach ($BillProducts as $key => $BillProducts_arr) {

                $product = Product::findOrFail($BillProducts_arr->bill_product_id);
                $products[] = array(
                    'bill_width' => $BillProducts_arr->bill_width,
                    'bill_height' => $BillProducts_arr->bill_height,
                    'bill_qty' => $BillProducts_arr->bill_qty,
                    'bill_areapersqft' => $BillProducts_arr->bill_areapersqft,
                    'bill_rate' => $BillProducts_arr->bill_rate,
                    'bill_product_total' => $BillProducts_arr->bill_product_total,
                    'product_name' => $product->name,
                    'bill_id' => $BillProducts_arr->bill_id,

                );
            }

            $BillExtracosts = BillExtracost::where('bill_id', '=', $datas->id)->get();
            foreach ($BillExtracosts as $key => $BillExtracosts_arr) {
                $extracosts[] = array(
                    'bill_extracost_note' => $BillExtracosts_arr->bill_extracost_note,
                    'bill_extracost' => $BillExtracosts_arr->bill_extracost,
                    'bill_id' => $BillExtracosts_arr->bill_id,

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
                    'overall' => $datas->overall,
                    'bill_grand_total' => $datas->bill_grand_total,
                    'bill_paid_amount' => $datas->bill_paid_amount,
                    'bill_balance_amount' => $datas->bill_balance_amount,
                    'products_data' => $products,
                    'extracosts' => $extracosts,
                    'bill_discount_type' => $datas->bill_discount_type,
                    'bill_discount' => $datas->bill_discount,
                    'bill_add_on_note' => $datas->bill_add_on_note,
                );


        }
        
        return view('page.backend.bill.index', compact('Bill_data', 'today'));
    }


    public function datefilter(Request $request) {
        $today = $request->get('from_date');

        $data = Bill::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();

        $products = [];
        $Bill_data = [];
        $extracosts = [];
        foreach ($data as $key => $datas) {
            $customer = Customer::findOrFail($datas->customer_id);
            $bank = Bank::findOrFail($datas->bank_id);

            $BillProducts = BillProduct::where('bill_id', '=', $datas->id)->get();
            foreach ($BillProducts as $key => $BillProducts_arr) {

                $product = Product::findOrFail($BillProducts_arr->bill_product_id);
                $products[] = array(
                    'bill_width' => $BillProducts_arr->bill_width,
                    'bill_height' => $BillProducts_arr->bill_height,
                    'bill_qty' => $BillProducts_arr->bill_qty,
                    'bill_areapersqft' => $BillProducts_arr->bill_areapersqft,
                    'bill_rate' => $BillProducts_arr->bill_rate,
                    'bill_product_total' => $BillProducts_arr->bill_product_total,
                    'product_name' => $product->name,
                    'bill_id' => $BillProducts_arr->bill_id,

                );
            }


            $BillExtracosts = BillExtracost::where('bill_id', '=', $datas->id)->get();
            foreach ($BillExtracosts as $key => $BillExtracosts_arr) {
                $extracosts[] = array(
                    'bill_extracost_note' => $BillExtracosts_arr->bill_extracost_note,
                    'bill_extracost' => $BillExtracosts_arr->bill_extracost,
                    'bill_id' => $BillExtracosts_arr->bill_id,

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
                    'overall' => $datas->overall,
                    'bill_grand_total' => $datas->bill_grand_total,
                    'bill_paid_amount' => $datas->bill_paid_amount,
                    'bill_balance_amount' => $datas->bill_balance_amount,
                    'products_data' => $products,
                    'extracosts' => $extracosts,
                    'bill_discount_type' => $datas->bill_discount_type,
                    'bill_discount' => $datas->bill_discount,
                    'bill_add_on_note' => $datas->bill_add_on_note,
                );


        }

        return view('page.backend.bill.index', compact('Bill_data', 'today'));
    }

    public function create()
    {
        $customer = Customer::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        $product = Product::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');


        $Latest_Bill = Bill::latest('id')->first();
        if($Latest_Bill != ''){
            $billno = $Latest_Bill->billno + 1;
        }else {
            $billno = 1;
        }

        return view('page.backend.bill.create', compact('customer', 'today', 'timenow', 'product', 'bank', 'billno'));
    }


    public function convertbillstore(Request $request)
    {

        $quotation_id = $request->get('quotation_id');
        $QuotationData = Quotation::findOrFail($quotation_id);


        $randomkey = Str::random(5);

        $data = new Bill();

        $data->unique_key = $randomkey;
        $data->quotation_id = $request->get('quotation_id');
        $data->billno = $request->get('billno');
        $data->date = $request->get('date');
        $data->time = $request->get('time');
        $data->customer_id = $QuotationData->customer_id;
        $data->bank_id = $request->get('bank_id');
        $data->bill_discount_type = $QuotationData->discount_type;
        $data->bill_discount = $request->get('bill_discount');
        $data->bill_tax_percentage = $QuotationData->tax_percentage;
        $data->bill_add_on_note = $request->get('bill_add_on_note');


        $data->bill_sub_total = $request->get('bill_sub_total');
        $data->bill_discount_price = $request->get('bill_discount_price');
        $data->bill_total_amount = $request->get('bill_total_amount');
        $data->bill_tax_amount = $request->get('bill_tax_amount');
        $data->bill_extracost_amount = $request->get('bill_extracost_amount');
        $data->overall = $request->get('overall');
        $data->bill_grand_total = $request->get('bill_grand_total');
        $data->bill_paid_amount = $request->get('bill_paid_amount');
        $data->bill_balance_amount = $request->get('bill_balance_amount');
        

        $data->save();

        $bill_id = $data->id;

        foreach ($request->get('bill_product_id') as $key => $bill_product_id) {

            $BillProduct = new BillProduct;
            $BillProduct->bill_id = $bill_id;
            $BillProduct->bill_product_id = $bill_product_id;
            $BillProduct->bill_width = $request->bill_width[$key];
            $BillProduct->bill_height = $request->bill_height[$key];
            $BillProduct->bill_qty = $request->bill_qty[$key];
            $BillProduct->bill_areapersqft = $request->bill_areapersqft[$key];
            $BillProduct->bill_rate = $request->bill_rate[$key];
            $BillProduct->bill_product_total = $request->bill_product_total[$key];
            $BillProduct->save();
        }


        foreach ($request->get('bill_extracost_note') as $key => $bill_extracost_note) {
            if ($bill_extracost_note != "") {

                $BillExtracost = new BillExtracost;
                $BillExtracost->bill_id = $bill_id;
                $BillExtracost->bill_extracost_note = $bill_extracost_note;
                $BillExtracost->bill_extracost = $request->bill_extracost[$key];
                $BillExtracost->save();
            }
        }


        $PaymentBalanceDAta = PaymentBalance::where('customer_id', '=', $QuotationData->customer_id)->first();
        if($PaymentBalanceDAta != ""){
            $old_grossamount = $PaymentBalanceDAta->customer_amount;
            $old_paid = $PaymentBalanceDAta->customer_paid;

            $gross_amount = $request->get('bill_grand_total');
            $payable_amount = $request->get('bill_paid_amount');

            $new_grossamount = $old_grossamount + $gross_amount;
            $new_paid = $old_paid + $payable_amount;
            $new_balance = $new_grossamount - $new_paid;

            DB::table('payment_balances')->where('customer_id', $QuotationData->customer_id)->update([
                'customer_amount' => $new_grossamount,  'customer_paid' => $new_paid, 'customer_balance' => $new_balance
            ]);
        }else {
            $gross_amount = $request->get('bill_grand_total');
            $payable_amount = $request->get('bill_paid_amount');
            $balance_amount = $gross_amount - $payable_amount;

            $data = new PaymentBalance();

            $data->customer_id = $QuotationData->customer_id;
            $data->customer_amount = $request->get('bill_grand_total');
            $data->customer_paid = $request->get('bill_paid_amount');
            $data->customer_balance = $balance_amount;
            $data->save();
        }


        DB::table('quotations')->where('id', $quotation_id)->update([
            'status' => 1
        ]);


        return redirect()->route('bill.index')->with('message', 'Added !');
    }


    public function store(Request $request)
    {

        $custmerid = $request->get('customer_id');

        $randomkey = Str::random(5);

        $data = new Bill();

        $data->unique_key = $randomkey;
        $data->billno = $request->get('billno');
        $data->date = $request->get('date');
        $data->time = $request->get('time');
        $data->customer_id = $request->get('customer_id');
        $data->bank_id = $request->get('bank_id');
        $data->bill_discount_type = $request->get('bill_discount_type');
        $data->bill_discount = $request->get('bill_discount');
        $data->bill_tax_percentage = $request->get('bill_tax_percentage');
        $data->bill_add_on_note = $request->get('bill_add_on_note');


        $data->bill_sub_total = $request->get('bill_sub_total');
        $data->bill_discount_price = $request->get('bill_discount_price');
        $data->bill_total_amount = $request->get('bill_total_amount');
        $data->bill_tax_amount = $request->get('bill_tax_amount');
        $data->bill_extracost_amount = $request->get('bill_extracost_amount');
        $data->overall = $request->get('overall');
        $data->bill_grand_total = $request->get('bill_grand_total');
        $data->bill_paid_amount = $request->get('bill_paid_amount');
        $data->bill_balance_amount = $request->get('bill_balance_amount');

        $data->save();

        $bill_id = $data->id;

        foreach ($request->get('bill_product_id') as $key => $bill_product_id) {

            $BillProduct = new BillProduct;
            $BillProduct->bill_id = $bill_id;
            $BillProduct->bill_product_id = $bill_product_id;
            $BillProduct->bill_width = $request->bill_width[$key];
            $BillProduct->bill_height = $request->bill_height[$key];
            $BillProduct->bill_qty = $request->bill_qty[$key];
            $BillProduct->bill_areapersqft = $request->bill_areapersqft[$key];
            $BillProduct->bill_rate = $request->bill_rate[$key];
            $BillProduct->bill_product_total = $request->bill_product_total[$key];
            $BillProduct->save();
        }


        foreach ($request->get('bill_extracost_note') as $key => $bill_extracost_note) {
            if ($bill_extracost_note != "") {

                $BillExtracost = new BillExtracost;
                $BillExtracost->bill_id = $bill_id;
                $BillExtracost->bill_extracost_note = $bill_extracost_note;
                $BillExtracost->bill_extracost = $request->bill_extracost[$key];
                $BillExtracost->save();
            }
        }


        $PaymentBalanceDAta = PaymentBalance::where('customer_id', '=', $custmerid)->first();
        if($PaymentBalanceDAta != ""){
            $old_grossamount = $PaymentBalanceDAta->customer_amount;
            $old_paid = $PaymentBalanceDAta->customer_paid;

            $gross_amount = $request->get('bill_grand_total');
            $payable_amount = $request->get('bill_paid_amount');

            $new_grossamount = $old_grossamount + $gross_amount;
            $new_paid = $old_paid + $payable_amount;
            $new_balance = $new_grossamount - $new_paid;

            DB::table('payment_balances')->where('customer_id', $custmerid)->update([
                'customer_amount' => $new_grossamount,  'customer_paid' => $new_paid, 'customer_balance' => $new_balance
            ]);
        }else {
            $gross_amount = $request->get('bill_grand_total');
            $payable_amount = $request->get('bill_paid_amount');
            $balance_amount = $gross_amount - $payable_amount;

            $data = new PaymentBalance();

            $data->customer_id = $custmerid;
            $data->customer_amount = $request->get('bill_grand_total');
            $data->customer_paid = $request->get('bill_paid_amount');
            $data->customer_balance = $balance_amount;
            $data->save();
        }

        return redirect()->route('bill.index')->with('message', 'Added !');
    }


    public function edit($unique_key)
    {
        $BillData = Bill::where('unique_key', '=', $unique_key)->first();
        $customer = Customer::where('soft_delete', '!=', 1)->get();
        $product = Product::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        $BillProducts = BillProduct::where('bill_id', '=', $BillData->id)->get();
        $BillExtracosts = BillExtracost::where('bill_id', '=', $BillData->id)->get();

        return view('page.backend.bill.edit', compact('BillData', 'customer', 'bank', 'product', 'BillProducts', 'BillExtracosts'));
    }


    public function update(Request $request, $unique_key)
    {
        $BillData = Bill::where('unique_key', '=', $unique_key)->first();

        $Billdata_customerid = $BillData->customer_id;

        $billbranchwiseData = PaymentBalance::where('customer_id', '=', $Billdata_customerid)->first();
        if($billbranchwiseData != ""){

            $old_grossamount = $billbranchwiseData->customer_amount;
            $old_paid = $billbranchwiseData->customer_paid;

            $oldentry_grossamount = $BillData->bill_grand_total;
            $oldentry_paid = $BillData->bill_paid_amount;

            $gross_amount = $request->get('bill_grand_total');
            $payable_amount = $request->get('bill_paid_amount');


            if($oldentry_grossamount > $gross_amount){
                $newgross = $oldentry_grossamount - $gross_amount;
                $updated_gross = $old_grossamount - $newgross;
            }else if($oldentry_grossamount < $gross_amount){
                $newgross = $gross_amount - $oldentry_grossamount;
                $updated_gross = $old_grossamount + $newgross;
            }else if($oldentry_grossamount == $gross_amount){
                $updated_gross = $old_grossamount;
            }



            if($oldentry_paid > $payable_amount){
                $newPaidAmt = $oldentry_paid - $payable_amount;
                $updated_paid = $old_paid - $newPaidAmt;
            }else if($oldentry_paid < $payable_amount){
                $newPaidAmt = $payable_amount - $oldentry_paid;
                $updated_paid = $old_paid + $newPaidAmt;
            }else if($oldentry_paid == $payable_amount){
                $updated_paid = $old_paid;
            }

            $new_balance = $updated_gross - $updated_paid;

            DB::table('payment_balances')->where('customer_id', $Billdata_customerid)->update([
                'customer_amount' => $updated_gross,  'customer_paid' => $updated_paid, 'customer_balance' => $new_balance
            ]);
        }


        $BillData->quotation_id = $request->get('quotation_id');
        $BillData->billno = $request->get('billno');
        $BillData->date = $request->get('date');
        $BillData->time = $request->get('time');
        $BillData->customer_id = $request->get('customer_id');
        $BillData->bank_id = $request->get('bank_id');
        $BillData->bill_discount_type = $request->get('bill_discount_type');
        $BillData->bill_discount = $request->get('bill_discount');
        $BillData->bill_tax_percentage = $request->get('bill_tax_percentage');
        $BillData->bill_add_on_note = $request->get('bill_add_on_note');


        $BillData->bill_sub_total = $request->get('bill_sub_total');
        $BillData->bill_discount_price = $request->get('bill_discount_price');
        $BillData->bill_total_amount = $request->get('bill_total_amount');
        $BillData->bill_tax_amount = $request->get('bill_tax_amount');
        $BillData->bill_extracost_amount = $request->get('bill_extracost_amount');
        $BillData->overall = $request->get('overall');
        $BillData->bill_grand_total = $request->get('bill_grand_total');
        $BillData->bill_paid_amount = $request->get('bill_paid_amount');
        $BillData->bill_balance_amount = $request->get('bill_balance_amount');

        $BillData->update();

        $bill_id = $BillData->id;


        $getInserted = BillProduct::where('bill_id', '=', $bill_id)->get();
        $bill_products = array();
        foreach ($getInserted as $key => $getInserted_produts) {
            $bill_products[] = $getInserted_produts->id;
        }

        $updated_products = $request->bill_detail_id;
        $updated_product_ids = array_filter($updated_products);
        $different_ids = array_merge(array_diff($bill_products, $updated_product_ids), array_diff($updated_product_ids, $bill_products));

        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                BillProduct::where('id', $different_id)->delete();
            }
        }




        // Products
        foreach ($request->get('bill_detail_id') as $key => $bill_detail_id) {
            if ($bill_detail_id > 0) {


                $ids = $bill_detail_id;
                $bill_product_id = $request->bill_product_id[$key];
                $bill_width = $request->bill_width[$key];
                $bill_height = $request->bill_height[$key];
                $bill_qty = $request->bill_qty[$key];
                $bill_areapersqft = $request->bill_areapersqft[$key];
                $bill_rate = $request->bill_rate[$key];
                $bill_product_total = $request->bill_product_total[$key];

                DB::table('bill_products')->where('id', $ids)->update([
                    'bill_id' => $bill_id, 'bill_product_id' => $bill_product_id, 'bill_width' => $bill_width, 'bill_height' => $bill_height, 'bill_qty' => $bill_qty, 'bill_areapersqft' => $bill_areapersqft, 'bill_rate' => $bill_rate, 'bill_product_total' => $bill_product_total
                ]);

            } else if ($bill_detail_id == '') {

                $BillProduct = new BillProduct;
                $BillProduct->bill_id = $bill_id;
                $BillProduct->bill_product_id = $request->bill_product_id[$key];
                $BillProduct->bill_width = $request->bill_width[$key];
                $BillProduct->bill_height = $request->bill_height[$key];
                $BillProduct->bill_qty = $request->bill_qty[$key];
                $BillProduct->bill_areapersqft = $request->bill_areapersqft[$key];
                $BillProduct->bill_rate = $request->bill_rate[$key];
                $BillProduct->bill_product_total = $request->bill_product_total[$key];
                $BillProduct->save();
            }
        }


        $getInsertedextracost = BillExtracost::where('bill_id', '=', $bill_id)->get();
        $quotaton_extracost = array();
        foreach ($getInsertedextracost as $key => $getInsertedextracosts) {
            $quotaton_extracost[] = $getInsertedextracosts->id;
        }

        $updated_extracosts = $request->billextracost_detail_id;
        $updated_extracosts_ids = array_filter($updated_extracosts);
        $different_ex_cost_ids = array_merge(array_diff($quotaton_extracost, $updated_extracosts_ids), array_diff($updated_extracosts_ids, $quotaton_extracost));

        if (!empty($different_ex_cost_ids)) {
            foreach ($different_ex_cost_ids as $key => $different_ex_cost_id) {
                BillExtracost::where('id', $different_ex_cost_id)->delete();
            }
        }

        // Extracost
        $BillExtracosts = BillExtracost::where('bill_id', '=', $bill_id)->first();
        if($BillExtracosts != ""){
            foreach ($request->get('billextracost_detail_id') as $key => $billextracost_detail_id) {
                $ids = $billextracost_detail_id;
                $bill_extracost_note = $request->bill_extracost_note[$key];
                $bill_extracost = $request->bill_extracost[$key];

                DB::table('bill_extracosts')->where('id', $ids)->update([
                    'bill_id' => $bill_id, 'bill_extracost_note' => $bill_extracost_note, 'bill_extracost' => $bill_extracost
                ]);
            }
        }else {
            foreach ($request->get('bill_extracost_note') as $key => $bill_extracost_note) {
                if ($bill_extracost_note != "") {

                    $BillExtracostData = new BillExtracost;
                    $BillExtracostData->bill_id = $bill_id;
                    $BillExtracostData->bill_extracost_note = $bill_extracost_note;
                    $BillExtracostData->bill_extracost = $request->bill_extracost[$key];
                    $BillExtracostData->save();
                }
            }
        }


        return redirect()->route('bill.index')->with('info', 'Updated !');
    }


    public function delete($unique_key)
    {
        $data = Bill::where('unique_key', '=', $unique_key)->first();


        $billcustomerid = $data->customer_id;


        $PurchasebranchwiseData = PaymentBalance::where('customer_id', '=', $billcustomerid)->first();
        if($PurchasebranchwiseData != ""){


            $old_grossamount = $PurchasebranchwiseData->customer_amount;
            $old_paid = $PurchasebranchwiseData->customer_paid;

            $oldentry_grossamount = $data->bill_grand_total;
            $oldentry_paid = $data->bill_paid_amount;

         
                $updated_gross = $old_grossamount - $oldentry_grossamount;
                $updated_paid = $old_paid - $oldentry_paid;

                $new_balance = $updated_gross - $updated_paid;

            DB::table('payment_balances')->where('customer_id', $billcustomerid)->update([
                'customer_amount' => $updated_gross,  'customer_paid' => $updated_paid, 'customer_balance' => $new_balance
            ]);

        }



        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('bill.index')->with('warning', 'Deleted !');
    }


    public function print($unique_key)
    {
        $BillData = Bill::where('unique_key', '=', $unique_key)->first();

        if($BillData->bill_discount_type == 'percentage'){
            $tag = '%';
        }else if($BillData->bill_discount_type == 'fixed'){
            $tag = '';
        }else {
            $tag = '';
        }

        $customer = Customer::findOrFail($BillData->customer_id);

        $product = Product::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();


        $productsdata = [];
        $BillProducts = BillProduct::where('bill_id', '=', $BillData->id)->get();
        foreach ($BillProducts as $key => $BillProducts_arr) {

            $product = Product::findOrFail($BillProducts_arr->bill_product_id);
            $productsdata[] = array(
                'bill_width' => $BillProducts_arr->bill_width,
                'bill_height' => $BillProducts_arr->bill_height,
                'bill_qty' => $BillProducts_arr->bill_qty,
                'bill_areapersqft' => $BillProducts_arr->bill_areapersqft,
                'bill_rate' => $BillProducts_arr->bill_rate,
                'bill_product_total' => $BillProducts_arr->bill_product_total,
                'product_name' => $product->name,
                'bill_id' => $BillProducts_arr->bill_id,

            );
        }


        $BillExtracosts = BillExtracost::where('bill_id', '=', $BillData->id)->get();

        return view('page.backend.bill.print', compact('BillData', 'customer', 'bank', 'product', 'productsdata', 'BillExtracosts', 'tag'));
    }




    public function oldbalanceforCustomerPayment()
    {
        $customerid = request()->get('customerid');



        $last_idrow = PaymentBalance::where('customer_id', '=', $customerid)->first();
        if($last_idrow != ""){

            if($last_idrow->customer_balance != NULL){

                $output[] = array(
                    'payment_pending' => $last_idrow->customer_balance,
                );
            }else {
                $output[] = array(
                    'payment_pending' => 0,
                );


            }
        }else {
            $output[] = array(
                'payment_pending' => 0,
            );
        }

        echo json_encode($output);
    }

}
