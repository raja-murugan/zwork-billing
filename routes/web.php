<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddonController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\VendorPaymentController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');

Route::get('/service', [FrontendController::class, 'service'])->name('frontend.service');

Route::get('/project', [FrontendController::class, 'project'])->name('frontend.project');

Route::get('/contactus', [FrontendController::class, 'contactus'])->name('frontend.contactus');

Auth::routes();

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // DASHBOARD
    Route::middleware(['auth:sanctum', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home');
});
// BANK CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/bank', [BankController::class, 'index'])->name('bank.index');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/bank/store', [BankController::class, 'store'])->name('bank.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/bank/edit/{unique_key}', [BankController::class, 'edit'])->name('bank.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/bank/delete/{unique_key}', [BankController::class, 'delete'])->name('bank.delete');
});
// PRODUCT CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/product', [ProductController::class, 'index'])->name('product.index');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/product/store', [ProductController::class, 'store'])->name('product.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/product/edit/{unique_key}', [ProductController::class, 'edit'])->name('product.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/product/delete/{unique_key}', [ProductController::class, 'delete'])->name('product.delete');
});
// ADDON CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/addon', [AddonController::class, 'index'])->name('addon.index');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/addon/store', [AddonController::class, 'store'])->name('addon.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/addon/edit/{unique_key}', [AddonController::class, 'edit'])->name('addon.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/addon/delete/{unique_key}', [AddonController::class, 'delete'])->name('addon.delete');
});
// CUSTOMER CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/customer', [CustomerController::class, 'index'])->name('customer.index');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/customer/edit/{unique_key}', [CustomerController::class, 'edit'])->name('customer.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/customer/delete/{unique_key}', [CustomerController::class, 'delete'])->name('customer.delete');
    // CHECK DUPLICATE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/customer/checkduplicate', [CustomerController::class, 'checkduplicate'])->name('customer.checkduplicate');
    // VIEW
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/customer/view/{unique_key}', [CustomerController::class, 'view'])->name('customer.view');
});
// VENDOR CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/vendor', [VendorController::class, 'index'])->name('vendor.index');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/vendor/store', [VendorController::class, 'store'])->name('vendor.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/vendor/edit/{unique_key}', [VendorController::class, 'edit'])->name('vendor.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/vendor/delete/{unique_key}', [VendorController::class, 'delete'])->name('vendor.delete');
    // CHECK DUPLICATE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/vendor/checkduplicate', [VendorController::class, 'checkduplicate'])->name('vendor.checkduplicate');
    // VIEW
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/vendor/view/{unique_key}', [VendorController::class, 'view'])->name('vendor.view');
});
// QUOTATION CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/quotation', [QuotationController::class, 'index'])->name('quotation.index');
    // CREATE
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/quotation/create', [QuotationController::class, 'create'])->name('quotation.create');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/quotation/store', [QuotationController::class, 'store'])->name('quotation.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/quotation/edit/{unique_key}', [QuotationController::class, 'edit'])->name('quotation.edit');
    // UPDATE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/quotation/update/{unique_key}', [QuotationController::class, 'update'])->name('quotation.update');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/quotation/delete/{unique_key}', [QuotationController::class, 'delete'])->name('quotation.delete');
    // GENERATE BILL
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/quotation/convertbill/{unique_key}', [QuotationController::class, 'convertbill'])->name('quotation.convertbill');
    // DATAE FILTER
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/quotation/datefilter', [QuotationController::class, 'datefilter'])->name('quotation.datefilter');
    // PRINT
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/quotation/print/{unique_key}', [QuotationController::class, 'print'])->name('quotation.print');
});
// BILL CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/bill', [BillController::class, 'index'])->name('bill.index');
    // CREATE
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/bill/create', [BillController::class, 'create'])->name('bill.create');
    // QUOTATION TO BILL STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/bill/convertbillstore', [BillController::class, 'convertbillstore'])->name('bill.convertbillstore');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/bill/store', [BillController::class, 'store'])->name('bill.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/bill/edit/{unique_key}', [BillController::class, 'edit'])->name('bill.edit');
    // UPDATE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/bill/update/{unique_key}', [BillController::class, 'update'])->name('bill.update');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/bill/delete/{unique_key}', [BillController::class, 'delete'])->name('bill.delete');
    // DATAE FILTER
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/bill/datefilter', [BillController::class, 'datefilter'])->name('bill.datefilter');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/bill/print/{unique_key}', [BillController::class, 'print'])->name('bill.print');
});
// EXPENSES CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/expense', [ExpenseController::class, 'index'])->name('expense.index');
    // CREATE
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/expense/create', [ExpenseController::class, 'create'])->name('expense.create');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/expense/edit/{unique_key}', [ExpenseController::class, 'edit'])->name('expense.edit');
    // UPDATE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/expense/update/{unique_key}', [ExpenseController::class, 'update'])->name('expense.update');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/expense/delete/{unique_key}', [ExpenseController::class, 'delete'])->name('expense.delete');
    // DATAE FILTER
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/expense/datefilter', [ExpenseController::class, 'datefilter'])->name('expense.datefilter');
});
// CUSTOMER PAYMENT CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/customer_payment', [CustomerPaymentController::class, 'index'])->name('customer_payment.index');
     // CREATE
     Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/customer_payment/create', [CustomerPaymentController::class, 'create'])->name('customer_payment.create');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/customer_payment/store', [CustomerPaymentController::class, 'store'])->name('customer_payment.store');
     // EDIT
     Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/customer_payment/edit/{unique_key}', [CustomerPaymentController::class, 'edit'])->name('customer_payment.edit');
     // UPDATE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/customer_payment/update/{unique_key}', [CustomerPaymentController::class, 'update'])->name('customer_payment.update');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/customer_payment/delete/{unique_key}', [CustomerPaymentController::class, 'delete'])->name('customer_payment.delete');
    // DATAE FILTER
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/customer_payment/datefilter', [CustomerPaymentController::class, 'datefilter'])->name('customer_payment.datefilter');

});
// VENDOR PAYMENT CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/vendor_payment', [VendorPaymentController::class, 'index'])->name('vendor_payment.index');
     // CREATE
     Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/vendor_payment/create', [VendorPaymentController::class, 'create'])->name('vendor_payment.create');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/vendor_payment/store', [VendorPaymentController::class, 'store'])->name('vendor_payment.store');
     // EDIT
     Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/vendor_payment/edit/{unique_key}', [VendorPaymentController::class, 'edit'])->name('vendor_payment.edit');
     // UPDATE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/vendor_payment/update/{unique_key}', [VendorPaymentController::class, 'update'])->name('vendor_payment.update');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/vendor_payment/delete/{unique_key}', [VendorPaymentController::class, 'delete'])->name('vendor_payment.delete');
    // DATAE FILTER
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/vendor_payment/datefilter', [VendorPaymentController::class, 'datefilter'])->name('vendor_payment.datefilter');

});
// PURCHASE CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/purchase', [PurchaseController::class, 'index'])->name('purchase.index');
    // CREATE
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/purchase/store', [PurchaseController::class, 'store'])->name('purchase.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/purchase/edit/{unique_key}', [PurchaseController::class, 'edit'])->name('purchase.edit');
    // UPDATE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/purchase/update/{unique_key}', [PurchaseController::class, 'update'])->name('purchase.update');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/purchase/delete/{unique_key}', [PurchaseController::class, 'delete'])->name('purchase.delete');
    // DATAE FILTER
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/purchase/datefilter', [PurchaseController::class, 'datefilter'])->name('purchase.datefilter');
});
Route::get('getProducts/', [ProductController::class, 'getProducts']);
Route::get('/oldbalanceforCustomerPayment', [BillController::class, 'oldbalanceforCustomerPayment']);
Route::get('/oldbalanceforvendorPayment', [PurchaseController::class, 'oldbalanceforvendorPayment']);
