@extends('layouts.app', [
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'cart_page',
])

@section('content')
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="products-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active text-center">
                            <img class="w-fit h-100 ml-auto" src="{{ $products[0]->image }}" alt="Image">
                        </div>
                        {{-- <div class="carousel-item">
                            <img class="w-100 h-100" src="img/products-2.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/products-3.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/products-4.jpg" alt="Image">
                        </div> --}}
                    </div>
                    <a class="carousel-control-prev" href="#products-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#products-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>
                        @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                            {{ $products[0]->name_ar }}
                        @else
                            {{ $products[0]->name }}
                        @endif
                    </h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            @if (!@empty($reviewstar[0]))
                                {{-- @dd($reviewstar[0]->COUNT) --}}
                                @if (!@empty($reviewstar[0]->AVG))
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i > $reviewstar[0]->AVG)
                                            @if ($i % $reviewstar[0]->AVG != 0)
                                                @if ($i - 0.55 <= $reviewstar[0]->AVG)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @elseif ($i <= $reviewstar[0]->AVG)
                                            <i class="fas fa-star"></i>
                                        @endif
                                    @endfor
                                    <small>({{ $reviewstar[0]->COUNT }})</small>
                                @else
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="far fa-star text-primary mr-1"></small>
                                        <small class="far fa-star text-primary mr-1"></small>
                                        <small class="far fa-star text-primary mr-1"></small>
                                        <small class="far fa-star text-primary mr-1"></small>
                                        <small class="far fa-star text-primary mr-1"></small>
                                        <small>(0)</small>
                                    </div>
                                @endif

                            @endif

                        </div>
                        <small class="pt-1">
                            {{-- {{ $products[0]->number_of_ratings }} --}}
                        </small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4"><del>
                            @if (Config::get('app.Currency') == 'USD')
                                ${{ $products[0]->price }}
                            @else
                                {{ $products[0]->price * $AllSetting->dollar }}YR
                            @endif
                        </del>
                        @if (Config::get('app.Currency') == 'USD')
                            ${{ $products[0]->price - $products[0]->discount_price - 0.01 }}
                        @else
                            {{ ($products[0]->price - $products[0]->discount_price) * $AllSetting->dollar }}YR
                        @endif
                    </h3>
                    <p class="mb-4">
                        @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                            {{ $products[0]->description_ar }}
                        @else
                            {{ $products[0]->description }}
                        @endif
                    </p>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">{{ __('private.siza') }}:</strong>
                        <form>
                            @if (!@empty($size))
                                @foreach ($size as $prosize)
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-{{ $prosize->id }}"
                                            name="size" value="{{ $prosize->id }}">
                                        <label class="custom-control-label"
                                            for="size-{{ $prosize->id }}">{{ $prosize->size }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">{{ __('private.color') }}:</strong>
                        <form>
                            @if (!@empty($color))
                                @foreach ($color as $procolor)
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="color-{{ $procolor->id }}"
                                            name="color" value="{{ $procolor->id }}">
                                        <label class="custom-control-label"
                                            for="color-{{ $procolor->id }}">{{ $procolor->color }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </form>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus h-100">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center h-100"
                                value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus h-100">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3 h-100 w-80 m-2"><i class="fa fa-shopping-cart w-80 m-1 h-100">
                            </i> {{ __('private.Add To Cart') }}</button>
                    </div>
                    {{-- <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab"
                            href="#tab-pane-1">{{ __('private.description') }}</a>
                        {{-- <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a> --}}
                        <a class="nav-item nav-link text-dark" data-toggle="tab"
                            href="#tab-pane-3">{{ __('private.Reviews') }}
                            ({{ $reviewstar[0]->COUNT }})</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">{{ __('private.description') }}</h4>
                            <p>
                                @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                    {{ $products[0]->description_ar }}
                                @else
                                    {{ $products[0]->description }}
                                @endif
                            </p>

                        </div>
                        {{-- <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam
                                invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod
                                consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam.
                                Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos
                                dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod
                                nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt
                                tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">{{ $reviewstar[0]->COUNT }} {{ __('private.review for') }}
                                        @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                            {{ $products[0]->name_ar }}
                                        @else
                                            {{ $products[0]->name }}
                                        @endif
                                    </h4>
                                    @if (!@empty($review))
                                        @foreach ($review as $reviews)
                                            <div class="media mb-4">
                                                <div class="media-body">
                                                    <h6>{{ $reviews->user_name }}<small> -
                                                            <i>{{ $reviews->created_at }}</i></small></h6>
                                                    <div class="text-primary mb-2">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i > $reviews->rating)
                                                                @if ($i % $reviews->rating != 0)
                                                                    @if ($i == $reviews->rating + 0.5)
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                    @else
                                                                        <i class="far fa-star"></i>
                                                                    @endif
                                                                @else
                                                                    <i class="far fa-star"></i>
                                                                @endif
                                                            @elseif ($i <= $reviews->rating)
                                                                <i class="fas fa-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <p>{{ $reviews->comment }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('Review.store') }}" method="post">
                                        @csrf
                                        <h4 class="mb-4">{{ __('private.Reviews') }}</h4>
                                        <div class="d-flex my-3">
                                            <p class="mb-0 mr-2">{{ __('private.Your Rating') }} :</p>
                                            <div class="text-primary">
                                                <label for="onestar" id="star1" class="fas fa-star"
                                                    onclick='changstar("1")'></label>
                                                <input type="checkbox" name="ratin" id="onestar" value="1"
                                                    hidden>
                                                <label for="twostar" id="star2" class="far fa-star"
                                                    onclick='changstar("2")'></label>
                                                <input type="checkbox" name="ratin" id="twostar" value="2"
                                                    hidden>
                                                <label for="threestar" id="star3" class="far fa-star"
                                                    onclick='changstar("3")'></label>
                                                <input type="checkbox" name="ratin" id="threestar" value="3"
                                                    hidden>
                                                <label for="fourstar" id="star4" class="far fa-star"
                                                    onclick='changstar("4")'></label>
                                                <input type="checkbox" name="ratin" id="fourstar" value="4"
                                                    hidden>
                                                <label for="fivestar" id="star5" class="far fa-star"
                                                    onclick='changstar("5")'></label>
                                                <input type="checkbox" name="ratin" id="fivestar" value="5"
                                                    hidden>
                                                <input type="input" name="rating" id="totelstar" value="1"
                                                    hidden>
                                                <span style="color: red">*
                                                    @error('rating')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                                <input type="input" name="id" value="{{ $products[0]->id }}"
                                                    hidden>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="message">{{ __('private.Your Review') }} :
                                                <span style="color: red">*
                                                    @error('comment')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </label>
                                            <textarea id="message" cols="30" rows="5" class="form-control" name="comment"></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="{{ __('private.Leave Your Review') }}"
                                                class="btn btn-primary px-3 h-100">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5" dir="ltr">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">{{ __('private.YOU MAY ALSO LIKE') }}</span></h2>
        <div class="row px-xl-5">
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel related-carousel">
                        {{-- <div class="products-item bg-light"> --}}
                        @if (!@empty($Alsoproducts))
                            @foreach ($Alsoproducts as $Product)
                                @include('layouts.items._ProductAnimation')
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
@section('scripts')
    <script>
        function changstar(star) {
            for (let i = 2; i <= 5; i++) {
                var mystar = document.getElementById('star' + i);
                if (i != star) {
                    if (mystar.classList.contains("fas")) {
                        mystar.classList.remove("fas");
                        mystar.classList.add("far");
                        if (mystar.classList.contains("fa-star-half-alt")) {
                            mystar.classList.remove("fa-star-half-alt");
                            mystar.classList.add("fa-star");
                        }
                    }
                }
            }
            var totelsta = document.getElementById('totelstar');
            for (let i = 1; i <= star; i++) {
                var mystar = document.getElementById('star' + i);
                if (i != star) {
                    if (mystar.classList.contains("far") && mystar.classList.contains("fa-star")) {
                        mystar.classList.remove("far");
                        mystar.classList.add("fas");
                        totelsta.value = star;
                        console.log(totelsta.value);
                    }
                } else {
                    if (mystar.classList.contains("far") && mystar.classList.contains("fa-star")) {
                        mystar.classList.remove("far");
                        mystar.classList.add("fas");
                        mystar.classList.remove("fa-star");
                        mystar.classList.add("fa-star-half-alt");
                        totelsta.value = star - 0.5;
                        console.log(totelsta.value);
                    } else if (mystar.classList.contains("fas") && mystar.classList.contains("fa-star-half-alt")) {
                        mystar.classList.remove("fa-star-half-alt");
                        mystar.classList.add("fa-star");
                        totelsta.value = star;
                        console.log(totelsta.value);
                    } else {
                        totelsta.value = 1;
                        console.log(totelsta.value);
                        changstar(0);
                    }
                }
            }
        }
    </script>
@endsection
