<div class="product-item bg-light">
    <div class="product-img position-relative overflow-hidden">
        <img class="img-fluid w-100" src='{{ asset("$Product->image") }}' alt="">
        <div class="product-action">
            <a class="btn btn-outline-dark btn-square " id="insert_cart"
                onclick="insert_carts({{ $Product->id }})">
                <i class="fa fa-shopping-cart"></i></a>
            <a class="btn btn-outline-dark btn-square"
                onclick="insert_favorit({{ $Product->id }})">
                <i class="far fa-heart"></i></a>
            <a class="btn btn-outline-dark btn-square"
                href="{{ route('prodect', ['id' => $Product->id]) }}"><i
                    class="fa fa-search"></i></a>
        </div>
    </div>

    <div class="text-center py-4">
        <a class="h6 text-decoration-none text-truncate"
            href="{{ route('prodect', ['id' => $Product->id]) }}">
            @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                {{ $Product->name_ar }} @else{{ $Product->name }}
            @endif
        </a>

        <div class="d-flex align-items-center justify-content-center mt-2">
            <h5>
                @if (Config::get('app.Currency') == 'USD')
                    ${{ $Product->price - $Product->discount_price - 0.01 }}
                @else
                    {{ ($Product->price - $Product->discount_price) * $AllSetting->dollar }}YR
                @endif
            </h5>
            <h6 class="text-muted ml-2 mr-2"><del>
                    @if (Config::get('app.Currency') == 'USD')
                        ${{ $Product->price }}
                    @else
                        {{ $Product->price * $AllSetting->dollar }}YR
                    @endif
                </del></h6>
        </div>
        <div class="d-flex align-items-center justify-content-center mb-1">
            @if (!@empty($Alsoproductreview))
                {{-- @dd($reviewstar[0]->COUNT) --}}
                @foreach ($Alsoproductreview as $reviews)
                    @if ($Product->id == $reviews->id)
                        {{-- @dd([$Product->id, $reviews->id]) --}}
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i > $reviews->AVG)
                                @if ($i % $reviews->AVG != 0)
                                    @if ($i - 0.55 <= $reviews->AVG)
                                        <i
                                            class="fas fa-star-half-alt text-primary mr-1"></i>
                                    @else
                                        <i class="far fa-star text-primary mr-1"></i>
                                    @endif
                                @else
                                    <i class="far fa-star text-primary mr-1"></i>
                                @endif
                            @elseif ($i <= $reviews->AVG)
                                <i class="fas fa-star text-primary mr-1"></i>
                            @endif
                        @endfor
                    <small>({{ $reviews->COUNT }})</small>
                    @endif
                @endforeach
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

        </div>
    </div>
</div>
