<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Vendor;
use App\Models\Bank;
use App\Models\Product;
use App\Models\PaymentBalance;
use App\Models\Purchase;
use App\Models\PurchaseProduct;
use App\Models\PurchaseExtracost;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class PurchaseController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        
        $data = Purchase::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();
        $products = [];
        $Purchasedata = [];
        $extracosts = [];
        foreach ($data as $key => $datas) {
            $vendor = Vendor::findOrFail($datas->vendor_id);
            $bank = Bank::findOrFail($datas->bank_id);

            $PurchaseProducts = PurchaseProduct::where('purchase_id', '=', $datas->id)->orderBy('id', 'DESC')->get();
            foreach ($PurchaseProducts as $key => $PurchaseProducts_arr) {

                $product = Product::findOrFail($PurchaseProducts_arr->purchase_productid);
                $products[] = array(
                    'purchase_quantity' => $PurchaseProducts_arr->purchase_quantity,
                    'purchase_rateperquantity' => $PurchaseProducts_arr->purchase_rateperquantity,
                    'purchase_producttotal' => $PurchaseProducts_arr->purchase_producttotal,
                    'product_name' => $product->name,
                    'purchase_id' => $PurchaseProducts_arr->purchase_id,

                );
            }

            $PurchaseExtracost = PurchaseExtracost::where('purchase_id', '=', $datas->id)->get();
            foreach ($PurchaseExtracost as $key => $PurchaseExtracost_arr) {
                $extracosts[] = array(
                    'purchase_extracostnote' => $PurchaseExtracost_arr->purchase_extracostnote,
                    'purchase_extracost' => $PurchaseExtracost_arr->purchase_extracost,
                    'purchase_id' => $PurchaseExtracost_arr->purchase_id,

                );
            }

                $Purchasedata[] = array(
                    'unique_key' => $datas->unique_key,
                    'id' => $datas->id,
                    'purchase_number' => $datas->purchase_number,
                    'vocher_number' => $datas->vocher_number,
                    'date' => $datas->date,
                    'time' => $datas->time,
                    'vendor' => $vendor->name,
                    'bank' => $bank->name,
                    'purchase_subtotal' => $datas->purchase_subtotal,
                    'purchase_discountprice' => $datas->purchase_discountprice,
                    'purchase_totalamount' => $datas->purchase_totalamount,
                    'purchase_taxamount' => $datas->purchase_taxamount,
                    'purchase_taxpercentage' => $datas->purchase_taxpercentage,
                    'purchase_extracostamount' => $datas->purchase_extracostamount,
                    'overall' => $datas->overall,
                    'purchase_grandtotal' => $datas->purchase_grandtotal,
                    'purchase_paidamount' => $datas->purchase_paidamount,
                    'purchase_balanceamount' => $datas->purchase_balanceamount,
                    'products_data' => $products,
                    'extracosts' => $extracosts,
                    'purchase_discounttype' => $datas->purchase_discounttype,
                    'purchase_discount' => $datas->purchase_discount,
                    'purchase_addon_note' => $datas->purchase_addon_note,
                );


        }
        
        return view('page.backend.purchase.index', compact('Purchasedata', 'today'));
    }



    public function datefilter(Request $request) {
        $today = $request->get('from_date');

        $data = Purchase::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();
        $products = [];
        $Purchasedata = [];
        $extracosts = [];
        foreach ($data as $key => $datas) {
            $vendor = Vendor::findOrFail($datas->vendor_id);

            $PurchaseProducts = PurchaseProduct::where('purchase_id', '=', $datas->id)->get();
            foreach ($PurchaseProducts as $key => $PurchaseProducts_arr) {

                $product = Product::findOrFail($PurchaseProducts_arr->purchase_productid);
                $products[] = array(
                    'purchase_quantity' => $PurchaseProducts_arr->purchase_quantity,
                    'purchase_rateperquantity' => $PurchaseProducts_arr->purchase_rateperquantity,
                    'purchase_producttotal' => $PurchaseProducts_arr->purchase_producttotal,
                    'product_name' => $product->name,
                    'purchase_id' => $PurchaseProducts_arr->purchase_id,

                );
            }

            $PurchaseExtracost = PurchaseExtracost::where('purchase_id', '=', $datas->id)->get();
            foreach ($PurchaseExtracost as $key => $PurchaseExtracost_arr) {
                $extracosts[] = array(
                    'purchase_extracostnote' => $PurchaseExtracost_arr->purchase_extracostnote,
                    'purchase_extracost' => $PurchaseExtracost_arr->purchase_extracost,
                    'purchase_id' => $PurchaseExtracost_arr->purchase_id,

                );
            }

                $Purchasedata[] = array(
                    'unique_key' => $datas->unique_key,
                    'id' => $datas->id,
                    'purchase_number' => $datas->purchase_number,
                    'vocher_number' => $datas->vocher_number,
                    'date' => $datas->date,
                    'time' => $datas->time,
                    'vendor' => $vendor->name,
                    'purchase_subtotal' => $datas->purchase_subtotal,
                    'purchase_discountprice' => $datas->purchase_discountprice,
                    'purchase_totalamount' => $datas->purchase_totalamount,
                    'purchase_taxamount' => $datas->purchase_taxamount,
                    'purchase_taxpercentage' => $datas->purchase_taxpercentage,
                    'purchase_extracostamount' => $datas->purchase_extracostamount,
                    'overall' => $datas->overall,
                    'purchase_grandtotal' => $datas->purchase_grandtotal,
                    'purchase_paidamount' => $datas->purchase_paidamount,
                    'purchase_balanceamount' => $datas->purchase_balanceamount,
                    'products_data' => $products,
                    'extracosts' => $extracosts,
                    'purchase_discounttype' => $datas->purchase_discounttype,
                    'purchase_discount' => $datas->purchase_discount,
                    'purchase_addon_note' => $datas->purchase_addon_note,
                );


        }

        return view('page.backend.purchase.index', compact('Purchasedata', 'today'));
    }


    public function create()
    {
        $vendor = Vendor::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        $product = Product::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        $LatestPurchase = Purchase::latest('id')->first();
        if($LatestPurchase != ''){
            $purchase_number = $LatestPurchase->purchase_number + 1;
        }else {
            $purchase_number = 1;
        }



        return view('page.backend.purchase.create', compact('vendor', 'today', 'timenow', 'product', 'bank', 'purchase_number'));
    }



    public function store(Request $request)
    {

        $vendor_id = $request->get('vendor_id');

        $randomkey = Str::random(5);

        $data = new Purchase();

        $data->unique_key = $randomkey;
        $data->purchase_number = $request->get('purchase_number');
        $data->vocher_number = $request->get('vocher_number');
        $data->date = $request->get('date');
        $data->time = $request->get('time');
        $data->vendor_id = $request->get('vendor_id');
        $data->bank_id = $request->get('bank_id');
        $data->purchase_discounttype = $request->get('purchase_discounttype');
        $data->purchase_discount = $request->get('purchase_discount');
        $data->purchase_taxpercentage = $request->get('purchase_taxpercentage');
        $data->purchase_addon_note = $request->get('purchase_addon_note');


        $data->purchase_subtotal = $request->get('purchase_subtotal');
        $data->purchase_discountprice = $request->get('purchase_discountprice');
        $data->purchase_totalamount = $request->get('purchase_totalamount');
        $data->purchase_taxamount = $request->get('purchase_taxamount');
        $data->purchase_extracostamount = $request->get('purchase_extracostamount');
        $data->overall = $request->get('overall');
        $data->purchase_grandtotal = $request->get('purchase_grandtotal');
        $data->purchase_paidamount = $request->get('purchase_paidamount');
        $data->purchase_balanceamount = $request->get('purchase_balanceamount');

        $data->save();

        $purchase_id = $data->id;

        foreach ($request->get('purchase_productid') as $key => $purchase_productid) {

            $PurchaseProduct = new PurchaseProduct;
            $PurchaseProduct->purchase_id = $purchase_id;
            $PurchaseProduct->purchase_productid = $purchase_productid;
            $PurchaseProduct->purchase_quantity = $request->purchase_quantity[$key];
            $PurchaseProduct->purchase_rateperquantity = $request->purchase_rateperquantity[$key];
            $PurchaseProduct->purchase_producttotal = $request->purchase_producttotal[$key];
            $PurchaseProduct->save();
        }


        foreach ($request->get('purchase_extracostnote') as $key => $purchase_extracostnote) {
            if ($purchase_extracostnote != "") {

                $PurchaseExtracost = new PurchaseExtracost;
                $PurchaseExtracost->purchase_id = $purchase_id;
                $PurchaseExtracost->purchase_extracostnote = $purchase_extracostnote;
                $PurchaseExtracost->purchase_extracost = $request->purchase_extracost[$key];
                $PurchaseExtracost->save();
            }
        }


        $PaymentBalanceDAta = PaymentBalance::where('vendor_id', '=', $vendor_id)->first();
        if($PaymentBalanceDAta != ""){
            $old_grossamount = $PaymentBalanceDAta->vendor_amount;
            $old_paid = $PaymentBalanceDAta->vendor_paid;

            $gross_amount = $request->get('purchase_grandtotal');
            $payable_amount = $request->get('purchase_paidamount');

            $new_grossamount = $old_grossamount + $gross_amount;
            $new_paid = $old_paid + $payable_amount;
            $new_balance = $new_grossamount - $new_paid;

            DB::table('payment_balances')->where('vendor_id', $vendor_id)->update([
                'vendor_amount' => $new_grossamount,  'vendor_paid' => $new_paid, 'vendor_balance' => $new_balance
            ]);
        }else {
            $gross_amount = $request->get('purchase_grandtotal');
            $payable_amount = $request->get('purchase_paidamount');
            $balance_amount = $gross_amount - $payable_amount;

            $data = new PaymentBalance();

            $data->vendor_id = $vendor_id;
            $data->vendor_amount = $request->get('purchase_grandtotal');
            $data->vendor_paid = $request->get('purchase_paidamount');
            $data->vendor_balance = $balance_amount;
            $data->save();
        }

        return redirect()->route('purchase.index')->with('message', 'Added !');
    }


    public function edit($unique_key)
    {
        $PurchaseData = Purchase::where('unique_key', '=', $unique_key)->first();
        $vendor = Vendor::where('soft_delete', '!=', 1)->get();
        $product = Product::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        $PurchaseProducts = PurchaseProduct::where('purchase_id', '=', $PurchaseData->id)->get();
        $PurchaseExtracosts = PurchaseExtracost::where('purchase_id', '=', $PurchaseData->id)->get();

        return view('page.backend.purchase.edit', compact('PurchaseData', 'vendor', 'bank', 'product', 'PurchaseProducts', 'PurchaseExtracosts'));
    }



    public function update(Request $request, $unique_key)
    {
        $PurchaseData = Purchase::where('unique_key', '=', $unique_key)->first();

        $purchasedata_vendorid = $PurchaseData->vendor_id;

        $branchwiseData = PaymentBalance::where('vendor_id', '=', $purchasedata_vendorid)->first();
        if($branchwiseData != ""){

            $old_grossamount = $branchwiseData->vendor_amount;
            $old_paid = $branchwiseData->vendor_paid;

            $oldentry_grossamount = $PurchaseData->purchase_grandtotal;
            $oldentry_paid = $PurchaseData->purchase_paidamount;

            $gross_amount = $request->get('purchase_grandtotal');
            $payable_amount = $request->get('purchase_paidamount');


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

            DB::table('payment_balances')->where('vendor_id', $purchasedata_vendorid)->update([
                'vendor_amount' => $updated_gross,  'vendor_paid' => $updated_paid, 'vendor_balance' => $new_balance
            ]);
        }


        $PurchaseData->purchase_number = $request->get('purchase_number');
        $PurchaseData->vocher_number = $request->get('vocher_number');
        $PurchaseData->date = $request->get('date');
        $PurchaseData->time = $request->get('time');
        $PurchaseData->vendor_id = $request->get('vendor_id');
        $PurchaseData->bank_id = $request->get('bank_id');
        $PurchaseData->purchase_discounttype = $request->get('purchase_discounttype');
        $PurchaseData->purchase_discount = $request->get('purchase_discount');
        $PurchaseData->purchase_taxpercentage = $request->get('purchase_taxpercentage');
        $PurchaseData->purchase_addon_note = $request->get('purchase_addon_note');


        $PurchaseData->purchase_subtotal = $request->get('purchase_subtotal');
        $PurchaseData->purchase_discountprice = $request->get('purchase_discountprice');
        $PurchaseData->purchase_totalamount = $request->get('purchase_totalamount');
        $PurchaseData->purchase_taxamount = $request->get('purchase_taxamount');
        $PurchaseData->purchase_extracostamount = $request->get('purchase_extracostamount');
        $PurchaseData->overall = $request->get('overall');
        $PurchaseData->purchase_grandtotal = $request->get('purchase_grandtotal');
        $PurchaseData->purchase_paidamount = $request->get('purchase_paidamount');
        $PurchaseData->purchase_balanceamount = $request->get('purchase_balanceamount');
        
        $PurchaseData->update();

        $purchase_id = $PurchaseData->id;


        $getInserted = PurchaseProduct::where('purchase_id', '=', $purchase_id)->get();
        $purchase_products = array();
        foreach ($getInserted as $key => $getInserted_produts) {
            $purchase_products[] = $getInserted_produts->id;
        }

        $updated_products = $request->purchase_detail_id;
        $updated_product_ids = array_filter($updated_products);
        $different_ids = array_merge(array_diff($purchase_products, $updated_product_ids), array_diff($updated_product_ids, $purchase_products));

        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                PurchaseProduct::where('id', $different_id)->delete();
            }
        }




        // Products
        foreach ($request->get('purchase_detail_id') as $key => $purchase_detail_id) {
            if ($purchase_detail_id > 0) {


                $ids = $purchase_detail_id;
                $purchase_productid = $request->purchase_productid[$key];
                $purchase_quantity = $request->purchase_quantity[$key];
                $purchase_rateperquantity = $request->purchase_rateperquantity[$key];
                $purchase_producttotal = $request->purchase_producttotal[$key];

                DB::table('purchase_products')->where('id', $ids)->update([
                    'purchase_id' => $purchase_id, 'purchase_productid' => $purchase_productid, 'purchase_quantity' => $purchase_quantity, 'purchase_rateperquantity' => $purchase_rateperquantity, 'purchase_producttotal' => $purchase_producttotal
                ]);

            } else if ($purchase_detail_id == '') {

                $PurchaseProduct = new PurchaseProduct;
                $PurchaseProduct->purchase_id = $purchase_id;
                $PurchaseProduct->purchase_productid = $request->purchase_productid[$key];
                $PurchaseProduct->purchase_quantity = $request->purchase_quantity[$key];
                $PurchaseProduct->purchase_rateperquantity = $request->purchase_rateperquantity[$key];
                $PurchaseProduct->purchase_producttotal = $request->purchase_producttotal[$key];
                $PurchaseProduct->save();
            }
        }


        $getInsertedextracost = PurchaseExtracost::where('purchase_id', '=', $purchase_id)->get();
        $quotaton_extracost = array();
        foreach ($getInsertedextracost as $key => $getInsertedextracosts) {
            $quotaton_extracost[] = $getInsertedextracosts->id;
        }

        $updated_extracosts = $request->purchaseextracost_detail_id;
        $updated_extracosts_ids = array_filter($updated_extracosts);
        $different_ex_cost_ids = array_merge(array_diff($quotaton_extracost, $updated_extracosts_ids), array_diff($updated_extracosts_ids, $quotaton_extracost));

        if (!empty($different_ex_cost_ids)) {
            foreach ($different_ex_cost_ids as $key => $different_ex_cost_id) {
                PurchaseExtracost::where('id', $different_ex_cost_id)->delete();
            }
        }

        // Extracost
        $Extracosts = PurchaseExtracost::where('purchase_id', '=', $purchase_id)->first();
        if($Extracosts != ""){
            foreach ($request->get('purchaseextracost_detail_id') as $key => $purchaseextracost_detail_id) {
                $ids = $purchaseextracost_detail_id;
                $purchase_extracostnote = $request->purchase_extracostnote[$key];
                $purchase_extracost = $request->purchase_extracost[$key];

                DB::table('purchase_extracosts')->where('id', $ids)->update([
                    'purchase_id' => $purchase_id, 'purchase_extracostnote' => $purchase_extracostnote, 'purchase_extracost' => $purchase_extracost
                ]);
            }
        }else {
            foreach ($request->get('purchase_extracostnote') as $key => $purchase_extracostnote) {
                if ($purchase_extracostnote != "") {

                    $PurchaseExtracost = new PurchaseExtracost;
                    $PurchaseExtracost->purchase_id = $purchase_id;
                    $PurchaseExtracost->purchase_extracostnote = $purchase_extracostnote;
                    $PurchaseExtracost->purchase_extracost = $request->purchase_extracost[$key];
                    $PurchaseExtracost->save();
                }
            }
        }


        return redirect()->route('purchase.index')->with('info', 'Updated !');
    }



    public function delete($unique_key)
    {
        $data = Purchase::where('unique_key', '=', $unique_key)->first();

        $purchasevendorid = $data->vendor_id;


        $PurchasebranchwiseData = PaymentBalance::where('vendor_id', '=', $purchasevendorid)->first();
        if($PurchasebranchwiseData != ""){


            $old_grossamount = $PurchasebranchwiseData->vendor_amount;
            $old_paid = $PurchasebranchwiseData->vendor_paid;

            $oldentry_grossamount = $data->purchase_grandtotal;
            $oldentry_paid = $data->purchase_paidamount;

         
                $updated_gross = $old_grossamount - $oldentry_grossamount;
                $updated_paid = $old_paid - $oldentry_paid;

                $new_balance = $updated_gross - $updated_paid;

            DB::table('payment_balances')->where('vendor_id', $purchasevendorid)->update([
                'vendor_amount' => $updated_gross,  'vendor_paid' => $updated_paid, 'vendor_balance' => $new_balance
            ]);

        }

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('purchase.index')->with('warning', 'Deleted !');
    }



    public function oldbalanceforvendorPayment()
    {
        $vendorid = request()->get('vendorid');



        $last_idrow = PaymentBalance::where('vendor_id', '=', $vendorid)->first();
        if($last_idrow != ""){

            if($last_idrow->vendor_balance != NULL){

                $output[] = array(
                    'payment_pending' => $last_idrow->vendor_balance,
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
