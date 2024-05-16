 <!-- Topbar Start -->
 <div class="container-fluid " id="top">
     <div class="d-flex justify-content-between align-items-center bg-secondary py-1 px-xl-5 ">
         <div class=" d-none d-lg-block">
             <div class="d-inline-flex align-items-center ">
                 <a class="text-body mr-3" href="">{{ __('private.About Us') }}</a>
                 <a class="text-body mr-3" href="">{{ __('private.Contact') }}</a>
                 <a class="text-body mr-3" href="">{{ __('private.Help') }}</a>
                 <a class="text-body mr-3" href="">{{ __('private.FAQs') }}</a>
             </div>
         </div>
         <div class="text-center text-lg-right ">
             <ul class="d-flex align-items-center flex-wrap  justify-content-lg-start justify-content-center">

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
                             <a class="dropdown-item" href="{{ route('profile.edit', Auth::user()->id) }}">{{__("private.My Account")}}</a>
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
                     <a id="navbarDropdown" class="nav-link dropdown-toggle text-sm text-decoration-none" href="#"
                         role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         {{ Config::get('app.Currency') }}
                     </a>
                     <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                         @foreach (Config::get('mony') as $lang => $language)
                             @if ($lang != Config::get('app.Currency'))
                                 <a class="dropdown-item" href="{{ Route('curr.switch', $lang) }}">
                                     {{ $language['display'] }}
                                 </a>
                             @endif
                         @endforeach
                     </div>
                 </li>
                 {{-- <li class="nav-item dropdown btn-group ">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-sm text-decoration-none" href="#"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Config::get('currency')[App::getLocale()]['display'] }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- @foreach (Config::get('currency') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <a class="dropdown-item" href="{{ Route('lang.switch', $lang) }}">
                                    <span class="fi fi-{{ $language['flag-icon'] }}"></span>
                                    {{ $language['display'] }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </li> --}}
                 <div class="d-inline-flex align-items-center d-block d-lg-none">
                     <a href="{{ route('My_Favorites') }}" class="btn px-0 ml-2">
                         <i class="fas fa-heart text-dark"></i>
                         <span class="badge text-dark border border-dark rounded-circle" id="numberoflovied"
                             style="padding-bottom: 2px;">0</span>
                     </a>
                     <a href="{{ route('cartPage') }}" class="btn px-0 ml-2">
                         <i class="fas fa-shopping-cart text-dark"></i>
                         <span class="badge text-dark border border-dark rounded-circle"id="numberofcart"
                             style="padding-bottom: 2px;">0</span>
                     </a>
                 </div>
             </ul>

         </div>
     </div>

     <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex justify-content-between">
         <div class="col-lg-4 text-center">
             <a href="" class="text-decoration-none">
                 <span class="h1 text-uppercase text-primary bg-dark px-2">{{ __('private.Yemen') }}</span>
                 <span class="h1 text-uppercase text-dark bg-primary px-2 ">{{ __('private.Market') }}</span>
             </a>
         </div>
         <div class="col-lg-4 col-6 text-center">
             <form action="">
                 <div class="input-group">
                     <input type="text" class="form-control" placeholder="">
                     <div class="input-group-append">
                         <span class="input-group-text bg-transparent text-primary">
                             <i class="fa fa-search"></i>
                         </span>
                     </div>
                 </div>
             </form>
         </div>
         <div class="col-lg-4 col-6 text-center">
             <p class="m-0">{{ __('private.Customer Service') }}</p>
             <h5 class="m-0">
                 @if (!@empty($AllSetting))
                     {{ $AllSetting->phone }}
                 @endif
             </h5>
         </div>
     </div>

 </div>
 <!-- Topbar End -->
