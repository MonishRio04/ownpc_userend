<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" loading="lazy" class="logo-icon"
                alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Affiliate</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="{{ request()->is('affiliate/dashboard') ? 'mm-active' : '' }}">
            <a href="{{ route('affiliate.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="{{ request()->is('affiliate/my-sale') ? 'mm-active' : '' }}">
            <a href="{{ route('affiliate.my.sale') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">My Sale</div>
            </a>
        </li>
        <li class="{{ request()->is('affiliate/products') ? 'mm-active' : '' }}">
            <a href="{{ route('affiliate.products') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Products</div>
            </a>
        </li>
        <li class="{{ request()->is('affiliate/profile') ? 'mm-active' : '' }}">
            <a href="{{ url('affiliate/profile')}}">
                <div class="parent-icon"><i class="bx bx-cookie"></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
        </li>
        <li>
            <a href="" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
