<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="javascript::void(o);">
                <img src="{{ asset('assets/backend/img/logo.png') }}" class="img-fluid logo" alt="">
            </a>
            <a href="javascript::void(o);">
                <img src="{{ asset('assets/backend/img/logo-small.png') }}" class="img-fluid logo-small" alt="">
            </a>
        </div>
    </div>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">

            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li class="{{ Route::is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}"><i class="fe fe-home"></i><span>Dashboard</span></a>
                </li>
            </ul>

            <ul>
                <li class="menu-title"><span>Bill Management</span></li>
                <li class="{{ Route::is('quotation.index', 'quotation.create', 'quotation.store', 'quotation.edit' ) ? 'active' : '' }}">
                    <a href="{{ route('quotation.index') }}"><i class="fe fe-file-text"></i> <span>Quotation</span></a>
                </li>
                <li class="{{ Route::is('bill.index', 'bill.create', 'bill.store', 'bill.edit' ) ? 'active' : '' }}">
                    <a href="{{ route('bill.index') }}"><i class="fe fe-database"></i> <span>Bill</span></a>
                </li>
                <li class="{{ Route::is('purchase.index', 'purchase.create', 'purchase.store', 'purchase.edit' ) ? 'active' : '' }}">
                    <a href="{{ route('purchase.index') }}"><i class="fe fe-shopping-cart"></i> <span>Purchase</span></a>
                </li>
                <li class="{{ Route::is('expense.index', 'expense.create', 'expense.store', 'expense.edit') ? 'active' : '' }}">
                    <a href="{{ route('expense.index') }}"><i class="fe fe-credit-card"></i> <span>Expense</span></a>
                </li>
            </ul>

            <ul>
                <li class="menu-title"><span>Payment Management</span></li>
                <li class="{{ Route::is('vendor_payment.index', 'vendor_payment.create', 'vendor_payment.store', 'vendor_payment.edit') ? 'active' : '' }}">
                    <a href="{{ route('vendor_payment.index') }}"><i class="fe fe-dollar-sign"></i> <span>Vendor Payment</span></a>
                </li>
                <li class="{{ Route::is('customer_payment.index', 'customer_payment.create', 'customer_payment.store', 'customer_payment.edit') ? 'active' : '' }}">
                    <a href="{{ route('customer_payment.index') }}"><i class="fe fe-dollar-sign"></i> <span>Customer Payment</span></a>
                </li>
            </ul>

            <ul>
                <li class="menu-title"><span>General</span></li>
                <li class="{{ Route::is('bank.index', 'bank.create', 'bank.store', 'bank.edit') ? 'active' : '' }}">
                    <a href="{{ route('bank.index') }}"><i class="fe fe-pocket"></i> <span>Bank</span></a>
                </li>
                <li class="{{ Route::is('product.index', 'product.create', 'product.store', 'product.edit' ) ? 'active' : '' }}">
                    <a href="{{ route('product.index') }}"><i class="fe fe-package"></i> <span>Product</span></a>
                </li>
                <li class="{{ Route::is('addon.index', 'addon.create', 'addon.store', 'addon.edit' ) ? 'active' : '' }}">
                    <a href="{{ route('addon.index') }}"><i class="fe fe-book-open"></i> <span>Addon</span></a>
                </li>
            </ul>


            <ul>
                <li class="menu-title"><span>User Management</span></li>
                <li class="{{ Route::is('customer.index', 'customer.create', 'customer.store', 'customer.edit' ) ? 'active' : '' }}">
                    <a href="{{ route('customer.index') }}"><i class="fe fe-book-open"></i> <span>Customer</span></a>
                </li>
                <li class="{{ Route::is('vendor.index', 'vendor.create', 'vendor.store', 'vendor.edit' ) ? 'active' : '' }}">
                    <a href="{{ route('vendor.index') }}"><i class="fe fe-user"></i> <span>Vendor</span></a>
                </li>
            </ul>

        </div>
    </div>
</div>
