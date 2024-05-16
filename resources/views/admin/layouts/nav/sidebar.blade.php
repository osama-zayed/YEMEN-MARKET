
<!-- Start Sidebar -->
<div class="sidebar bg-primary p-20 w-250 h-100vh p-sticky top-0 bs-5-ccc d-flex fd-c">
    <div class="side-head d-flex align-center">
        <span class="logo bg-lightBlue c-white w-32 h-32 txt-c fs-14 fw-bold rad-8 lh-32 d-block mr-7 mr-10 ml-10">YM</span>
        <div class="info">
            <span class="d-block fs-14">{{ __('private.name_web') }}</span>
        </div>
    </div>
    <ul class="top flex-1">
        <li>
            <div class="toggle-sidebar d-flex align-center cursor-pointer w-fit fs-15 rad-6 p-10 mb-5 hide-mobile">
                <i class="fa-solid fa-bars fa-fw"></i>
            </div>
        </li>
        <li>
            <a class="@if ($activePage == 'Dashboard') active @endif d-flex align-center fs-14 c-black rad-6 p-10 mb-5 p-relative"
                href="{{ route('home') }}">
                <i class="fa-solid fa-square-poll-vertical fa-fw"></i>
                <span class="fs-14 ml-10 mr-10 ">{{ __('private.sidbar.Dashboard') }}</span>
            </a>
        </li>
        <li>
            <a class="@if ($activePage == 'index') active @endif d-flex align-center fs-14 c-black rad-6 p-10 mb-5 p-relative"
                href="{{ route('index') }}">
                <i class="fa-solid fa-folder-o fa-fw"aria-hidden="true" ></i>
                <span class="fs-14 ml-10 mr-10 ">{{ __('private.Home') }}</span>
            </a>
        </li>

        @if (auth()->user()->usertype=="superadmin"||auth()->user()->usertype=="admin")
        <li>
            <a class="@if ($activePage == 'Category') active @endif d-flex align-center fs-14 c-black rad-6 p-10 mb-5 p-relative"
                href="{{ route('Category.index') }}">
                <i class="fa-solid fa-folder-o fa-fw"aria-hidden="true" ></i>
                <span class="fs-14 ml-10 mr-10">{{ __('private.sidbar.Category') }}</span>
            </a>
        </li>
        @endif
        <li>
            <a class="@if ($activePage == 'Product') active @endif d-flex align-center fs-14 c-black rad-6 p-10 mb-5 p-relative"
                href="{{ route('Product.index') }}">
                <i class="fa-solid fa-folder-o fa-fw"aria-hidden="true" ></i>
                <span class="fs-14 ml-10 mr-10">{{ __('private.sidbar.Product') }}</span>
            </a>
        </li>
@if (auth()->user()->usertype=="superadmin"||auth()->user()->usertype=="admin")
<li>
    <a class="@if ($activePage == 'User') active @endif d-flex align-center fs-14 c-black rad-6 p-10 mb-5 p-relative"
        href="{{ route('profile.index') }}">
        <i class="fa-solid fa-user fa-fw"></i>
        <span class="fs-14 ml-10 mr-10">{{ __('private.sidbar.User') }}</span>
    </a>
</li>
@endif
        <li>
            <a class="@if ($activePage == 'Settings') active @endif d-flex align-center fs-14 c-black rad-6 p-10 mb-5 p-relative"
                href="{{ route('Setting.index') }}">
                <i class="fa-solid fa-gear fa-fw"></i>
                <span class="fs-14 ml-10 mr-10"> {{ __('private.sidbar.Setting') }}</span>
            </a>
        </li>
    </ul>
    <ul class="bottom m-0">
        <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 mb-5 p-relative" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket fa-fw"></i>
                <span class="fs-14 ml-10 mr-10">{{ __('private.logout') }}</span>
            </a>
        </li>
        <li class="theme active d-flex align-center space-between fs-14 c-black rad-6 p-10 cursor-pointer">
            <span class="select-none theme-state">light</span>
            <div class="toggle-mode bg-ccc w-60 h-26 rad-16 p-relative td-0_4 cursor-pointer"></div>
            <span class="select-none theme-state">Dark</span>
        </li>
    </ul>
</div>
<!-- End Sidebar -->
