@extends('layouts.app', [
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'Home',
])

@section('content')

    <!-- Carousel Start  -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row container-fluid ">
            <div class="col-lg-12 mb-3 " dir="ltr">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active">
                            @if (!@empty($offerimage[3]))
                                <a href="{{ $offerimage[3]->url }}"><img class="position-absolute w-100 h-100"
                                        src='{{ asset($offerimage[0]->image) }}' alt="" style="object-fit: fill;">
                                </a>
                                @guest
                                @else
                                    @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                                        <a id="navbarDropdown" class="setting" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-cog fa-spin fa-fw"></i>
                                        </a>
                                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                            <form action="{{ route('offerimage.update', $offerimage[0]->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="file" id="file0" name="image" hidden>
                                                <label for="file0">{{ __('private.image') }}</label>
                                                <input type="url" name="url" placeholder="{{ __('private.url') }}"
                                                    style="background: #fff ;color: #000;">
                                                <input type="submit" name="submit">
                                            </form>
                                        </div>
                                    @endif
                                @endguest
                            @endif
                        </div>

                        <div class="carousel-item position-relative ">
                            @if (!@empty($offerimage[1]))
                                <a href="{{ $offerimage[1]->url }}"><img class="position-absolute w-100 h-100"
                                        src='{{ asset($offerimage[1]->image) }}' alt="" style="object-fit: fill;">
                                </a>
                                @guest
                                @else
                                    @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                                        <a id="navbarDropdown" class="setting" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-cog fa-spin fa-fw"></i>
                                        </a>
                                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                            <form action="{{ route('offerimage.update', $offerimage[1]->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="file" id="file1" name="image" hidden>
                                                <label for="file1">{{ __('private.image') }}</label>
                                                <input type="url" name="url" placeholder="{{ __('private.url') }}"
                                                    style="background: #fff ;color: #000;">
                                                <input type="submit" name="submit">
                                            </form>
                                        </div>
                                    @endif
                                @endguest
                            @endif
                        </div>
                        <div class="carousel-item position-relative">
                            @if (!@empty($offerimage[2]))
                                <a href="{{ $offerimage[2]->url }}"><img class="position-absolute w-100 h-100"
                                        src='{{ asset($offerimage[2]->image) }}' alt="" style="object-fit: fill;">
                                </a>
                                @guest
                                @else
                                    @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                                        <a id="navbarDropdown" class="setting" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-cog fa-spin fa-fw"></i>
                                        </a>
                                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                            <form action="{{ route('offerimage.update', $offerimage[2]->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="file" id="file2" name="image" hidden>
                                                <label for="file2">{{ __('private.image') }}</label>
                                                <input type="url" name="url" placeholder="{{ __('private.url') }}"
                                                    style="background: #fff ;color: #000;">
                                                <input type="submit" name="submit">
                                            </form>
                                        </div>
                                    @endif
                                @endguest
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-offer mb-30" style="height: 300px;">
                    @if (!@empty($offerimage[3]))
                        <a href="{{ $offerimage[3]->url }}"><img class="img-fluid"
                                src="{{ asset($offerimage[3]->image) }}" alt=""></a>
                        @guest
                        @else
                            @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                                <a id="navbarDropdown" class="setting" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-cog fa-spin fa-fw"></i>
                                </a>
                                <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                    <form action="{{ route('offerimage.update', $offerimage[3]->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" id="file3" name="image" hidden>
                                        <label for="file3">{{ __('private.image') }}</label>
                                        <input type="url" name="url" placeholder="{{ __('private.url') }}"
                                            style="background: #fff ;color: #000;">
                                        <input type="submit" name="submit">
                                    </form>
                                </div>
                            @endif
                        @endguest
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-offer mb-30" style="height: 300px;">
                    @if (!@empty($offerimage[4]))
                        <a href="{{ $offerimage[4]->url }}"><img class="img-fluid"
                                src="{{ asset($offerimage[4]->image) }}" alt=""></a>
                        @guest
                        @else
                            @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                                <a id="navbarDropdown" class="setting" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-cog fa-spin fa-fw"></i>
                                </a>
                                <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                    <form action="{{ route('offerimage.update', $offerimage[4]->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" id="file4" name="image" hidden>
                                        <label for="file4">{{ __('private.image') }}</label>
                                        <input type="url" name="url" placeholder="{{ __('private.url') }}"
                                            style="background: #fff ;color: #000;">
                                        <input type="submit" name="submit">
                                    </form>
                                </div>
                            @endif
                        @endguest
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-offer mb-30" style="height: 300px;">
                    @if (!@empty($offerimage[5]))
                        <a href="{{ $offerimage[5]->url }}"><img class="img-fluid"
                                src="{{ asset($offerimage[5]->image) }}" alt=""></a>
                        @guest
                        @else
                            @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                                <a id="navbarDropdown" class="setting" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-cog fa-spin fa-fw"></i>
                                </a>
                                <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                    <form action="{{ route('offerimage.update', $offerimage[5]->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" id="file5" name="image" hidden>
                                        <label for="file5">{{ __('private.image') }}</label>
                                        <input type="url" name="url" placeholder="{{ __('private.url') }}"
                                            style="background: #fff ;color: #000;">
                                        <input type="submit" name="submit">
                                    </form>
                                </div>
                            @endif
                        @endguest
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0" id="Quality">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">{{ __('private.sidbar.Category') }}</span></h2>
        <div class="row px-xl-5 pb-3">
            @if (!@empty($AllCategory))
                @foreach ($AllCategory as $Category)
                    @if ($Category->parent_id == 0)
                        @include('layouts.items._category')
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <!-- Categories End -->

    <!-- Products Start -->
    <div class="container-fluid py-5" dir="ltr">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">
                {{ __('private.sidbar.Product') }}</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    {{-- <div class="product-item bg-light"> --}}
                    @if (!@empty($AllProduct))
                        @foreach ($AllProduct as $Product)
                            @if ($Product->Category_id <= 30)
                                @include('layouts.items._ProductAnimation')
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3" dir="ltr">
        <div class="row px-xl-5">
            <div class="col-md-4">
                <div class="product-offer mb-30" style="height: 300px;">
                    @if (!@empty($offerimage[6]))
                        <a href="{{ $offerimage[6]->url }}"><img class="img-fluid"
                                src="{{ asset($offerimage[6]->image) }}" alt=""></a>
                        @guest
                        @else
                            @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                                <a id="navbarDropdown" class="setting" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-cog fa-spin fa-fw"></i>
                                </a>
                                <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                    <form action="{{ route('offerimage.update', $offerimage[6]->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" id="file6" name="image" hidden>
                                        <label for="file6">{{ __('private.image') }}</label>
                                        <input type="url" name="url" placeholder="{{ __('private.url') }}"
                                            style="background: #fff ;color: #000;">
                                        <input type="submit" name="submit">
                                    </form>
                                </div>
                            @endif
                        @endguest
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-offer mb-30" style="height: 300px;">
                    @if (!@empty($offerimage[7]))
                        <a href="{{ $offerimage[7]->url }}"><img class="img-fluid"
                                src="{{ asset($offerimage[7]->image) }}" alt=""></a>
                        @guest
                        @else
                            @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                                <a id="navbarDropdown" class="setting" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-cog fa-spin fa-fw"></i>
                                </a>
                                <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                    <form action="{{ route('offerimage.update', $offerimage[7]->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" id="file7" name="image" hidden>
                                        <label for="file7">{{ __('private.image') }}</label>
                                        <input type="url" name="url" placeholder="{{ __('private.url') }}"
                                            style="background: #fff ;color: #000;">
                                        <input type="submit" name="submit">
                                    </form>
                                </div>
                            @endif
                        @endguest
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-offer mb-30" style="height: 300px;">
                    @if (!@empty($offerimage[8]))
                        <a href="{{ $offerimage[8]->url }}"><img class="img-fluid"
                                src="{{ asset($offerimage[8]->image) }}" alt=""></a>
                        @guest
                        @else
                            @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                                <a id="navbarDropdown" class="setting" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-cog fa-spin fa-fw"></i>
                                </a>
                                <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                    <form action="{{ route('offerimage.update', $offerimage[8]->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" id="file8" name="image" hidden>
                                        <label for="file8">{{ __('private.image') }}</label>
                                        <input type="url" name="url" placeholder="{{ __('private.url') }}"
                                            style="background: #fff ;color: #000;">
                                        <input type="submit" name="submit">
                                    </form>
                                </div>
                            @endif
                        @endguest
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">
                {{ __('private.sidbar.Product') }}</span></h2>
        <div class="row px-xl-5">
            @if (!@empty($AllProduct))
                @foreach ($AllProduct as $Product)
                    @include('layouts.items._Product')
                @endforeach
            @endif
        </div>
    </div>
    <!-- Products End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5" dir="ltr">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    @if (!@empty($merchant))
                        @foreach ($merchant as $merchants)
                            {{-- @dd($merchants->image) --}}
                            <a href="{{ route('merchant', ['id' => $merchants->user_id]) }}">
                                <div class="bg-light p-4">
                                    <img src='{{ asset("images/$merchants->image") }}' alt="">
                                </div>
                            </a>
                        @endforeach
                    @endif

                    {{-- <div class="bg-light p-4">
                        <img src="{{ asset('images/Product/vendor-2.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ asset('images/Product/vendor-3.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ asset('images/Product/vendor-4.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ asset('images/Product/vendor-5.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ asset('images/Product/vendor-6.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ asset('images/Product/vendor-7.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ asset('images/Product/vendor-8.jpg') }}" alt="">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection
