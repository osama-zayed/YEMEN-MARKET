    <!-- Footer Start -->
    {{-- @dd(Config::get('languages')[App::getLocale()]['display']) --}}
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">
                    @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                        @if (!@empty($AllSetting))
                            {{ $AllSetting->name_ar }}
                        @endif
                    @else
                        @if (!@empty($AllSetting))
                            {{ $AllSetting->name }}
                        @endif
                    @endif
                </h5>
                <p class="mb-4">
                    @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                        @if (!@empty($AllSetting))
                            {{ $AllSetting->description_ar }}
                        @endif
                    @else
                        @if (!@empty($AllSetting))
                            {{ $AllSetting->description }}
                        @endif
                    @endif
                </p>
                <p class="mb-2"><i class="fa fa-map-marker text-primary mr-3 ml-3" aria-hidden="true"></i>
                    @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                        @if (!@empty($AllSetting))
                            {{ $AllSetting->address_ar }}
                        @endif
                    @else
                        @if (!@empty($AllSetting))
                            {{ $AllSetting->address }}
                        @endif
                    @endif
                </p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3 ml-3" aria-hidden="true"></i>
                    @if (!@empty($AllSetting))
                        {{ $AllSetting->email }}
                    @endif
                </p>
                <p class="mb-1"><i class="fa fa-phone text-primary mr-3 ml-3" aria-hidden="true"></i>
                    @if (!@empty($AllSetting))
                        {{ $AllSetting->phone }}
                    @endif
                </p>
                <p class="mb-0">
                    @if (!@empty($AllSetting))
                    <div class="col-md-6 px-xl-0 text-center text-md-right">
                        <img class="img-fluid" src='{{ asset("$AllSetting->logo") }}' alt="">
                    </div>
                    @endif
                </p>

            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">{{ __('private.Shop') }}</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="{{ route('index') }}"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.Home') }}</a>
                            <a class="text-secondary mb-2" href="home"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.Shop') }}</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.sale') }}</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.newest') }}</a>
                            <a class="text-secondary mb-2" href="{{ route('cartPage') }}"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.cart') }}</a>
                            <a class="text-secondary" href="{{ route('My_Favorites') }}"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.loved it') }} </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">{{ __('private.MENU') }}</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="{{ route('index') }}"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.Home') }}</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.About Us') }}</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.Contact') }}</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.Help') }}</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('private.FAQs') }}</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">{{ __('private.Customer Service') }}</h5>
                        <p>
                            @if (!@empty($AllSetting))
                                {{ $AllSetting->phone }} @endif
                        </p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary  h-100">{{ __('private.Contact') }}</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">{{ __('private.Social Link') }}</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href=" @if (!@empty($AllSetting)){{ $AllSetting->twitter }}  @endif"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href=" @if (!@empty($AllSetting)){{ $AllSetting->facebook }}  @endif"><i
                                    class="fab fa-facebook-f"></i></a>
                            {{-- <a class="btn btn-primary btn-square mr-2" href="{{$AllSetting->tiktok}}"><i class="fab fa-tiktok-f"></i></a> --}}
                            <a class="btn btn-primary btn-square mr-2" href=" @if (!@empty($AllSetting)){{ $AllSetting->instagram }}  @endif"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href=" @if (!@empty($AllSetting)){{ $AllSetting->youtube }}  @endif"><i
                                    class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4 text-center " style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class=" px-xl-0 text-center  ">
                <p class="mb-md-0 text-center  text-secondary">
                    &copy; <a class="text-primary" href="sama-zayed.github.io/portfolio/">Create</a>
                    by
                    <a class="text-primary" href="sama-zayed.github.io/portfolio/">osama zayed</a>
                </p>
            </div>

        </div>
    </div>
    <!-- Footer End -->
