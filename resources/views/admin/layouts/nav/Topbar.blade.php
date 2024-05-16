 <!-- Topbar Start -->
 {{-- <div class="container-fluid ">
     <div class="d-flex justify-content-between align-items-center bg-secondary py-1 px-xl-5 ">
        <div class=" d-none d-lg-block ">
            <div class="d-inline-flex align-items-center ">
                <a class="text-body mr-3" href="">About</a>
                <a class="text-body mr-3" href="">Contact</a>
                <a class="text-body mr-3" href="">Help</a>
                <a class="text-body mr-3" href="">FAQs</a>
            </div>
        </div>
         <div class="text-center text-lg-right ">
             <ul class="d-flex align-items-center flex-wrap  justify-content-lg-start justify-content-center mb-0 ">

                 <!-- Authentication Links -->
                 @guest
                     @if (Route::has('login'))
                         <li class="nav-item  ">
                             <a class="nav-link w-fit-content" href="{{ route('login') }}">{{ __('private.Login') }}</a>
                         </li>
                     @endif
                     @if (Route::has('register'))
                         <li class="nav-item  ">
                             <a class="nav-link" href="{{ route('register') }}">{{ __('private.Register') }}</a>
                         </li>
                     @endif
                 @else
                     <li class="nav-item dropdown btn-group">
                         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                             data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             {{ Auth::user()->name }}
                         </a>

                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                 {{ __('private.logout') }}
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                         </div>
                     </li>
                 @endguest
                 <li class="nav-item dropdown btn-group ">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle text-sm text-decoration-none" href="#"
                         role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         <span class="fi fi-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                         {{ Config::get('languages')[App::getLocale()]['display'] }}
                     </a>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                         @foreach (Config::get('languages') as $lang => $language)
                             @if ($lang != App::getLocale())
                                 <a class="dropdown-item" href="{{ Route('lang.switch', $lang) }}">
                                     <span class="fi fi-{{ $language['flag-icon'] }}"></span>
                                     {{ $language['display'] }}
                                 </a>
                             @endif
                         @endforeach
                     </div>
                 </li>
                 <li class="nav-item dropdown btn-group">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                         data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         USD
                     </a>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="">
                             YR
                         </a>
                     </div>
                 </li>
                 <div class="d-inline-flex align-items-center d-block d-lg-none">
                     <a href="" class="btn px-0 ml-2">
                         <i class="fas fa-heart text-dark"></i>
                         <span class="badge text-dark border border-dark rounded-circle"
                             style="padding-bottom: 2px;">0</span>
                     </a>
                     <a href="" class="btn px-0 ml-2">
                         <i class="fas fa-shopping-cart text-dark"></i>
                         <span class="badge text-dark border border-dark rounded-circle"
                             style="padding-bottom: 2px;">0</span>
                     </a>
                 </div>
             </ul>

         </div>
     </div>

 </div> --}}
 <!-- Topbar End -->



 <!-- Start Head -->
 <div class="head bg-primary p-15 between-flex bs-10-ccc bb-eee">
     <div class="toggle-sidebar cursor-pointer hide-lage">
         <i class="fa-solid fa-bars fa-fw"></i>
     </div>
     <ul>
         <li class="nav-item dropdown btn-group ">
             <a id="navbarDropdown" class="nav-link dropdown-toggle text-sm text-decoration-none" href="#"
                 role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 <span class="fi fi-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                 {{ Config::get('languages')[App::getLocale()]['display'] }}
             </a>
             <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                 @foreach (Config::get('languages') as $lang => $language)
                     @if ($lang != App::getLocale())
                         <a class="dropdown-item" href="{{ Route('lang.switch', $lang) }}">
                             <span class="fi fi-{{ $language['flag-icon'] }}"></span>
                             {{ $language['display'] }}
                         </a>
                     @endif
                 @endforeach
             </div>
         </li>
     </ul>
     <div class="search p-relative">
         <input class="p-10 border-ccc rad-10 pl-30 w-175" type="search" placeholder="" />
        <i class="fa-solid fa-magnifying-glass p-absolute fw-900 top-half left-10 fs-14"></i>
     </div>
     <div class="icons d-flex align-center">
         <div class="notifications p-relative w-32 h-32 rad-half center-flex bg-secondary fs-14">
             <i class="fa-regular fa-bell fa-lg w-full h-full cursor-pointer center-flex"></i>
             <span class="red-circle"></span>
             <ul
                 class="notification-list bg-primary p-10 m-0 rad-10 border-eee bs-10-ccc p-absolute right-m15 z-3000 top-43 w-340 h-460 flowY-auto d-none">
             </ul>
         </div>
         <a href="{{ route('profile.edit',auth()->user()->id) }}"><img src="{{ asset('dechbord/imgs/avatar.png') }}" alt="avatar" class="cursor-pointer w-32 h-32 ml-15 mr-15" /></a>
     </div>
 </div>
 <!-- End Head -->
 <!-- to Here -->
 <div class="title between-flex">
     <h1 class="p-relative mb-40 ml-15 mr-15">{{ __($namePage) }}</h1>
     <ul class="view d-flex">
         <li class="grid p-relative mr-15">
             <i
                 class="grid active fa-solid fa-border-all fa-fw center-flex w-32 h-32 fs-19 rad-half cursor-pointer"></i>
             <span class="p-absolute d-none rad-4 top-m25 c-white fs-14 p-2 bg-grey">Grid</span>
         </li>
         <li class="list p-relative mr-20">
             <i class="list fa-solid fa-table-list fa-fw center-flex w-32 h-32 fs-19 rad-half cursor-pointer"></i>
             <span class="p-absolute d-none rad-4 top-m25 c-white fs-14 p-2 bg-grey">list</span>
         </li>
     </ul>
 </div>
