@extends('admin.layouts.app', [
    'namePage' => 'Product',
    'activePage' => 'Product',
    'activeNav' => '',
])
@section('content')
    <div class="Product-page m-20">
        <div class="courses-page change-view d-grid m-20 gap-20">
            <form action="{{ route('Product.update', $Product->id) }}" method="POST" enctype="multipart/form-data">
                {{-- create Product --}}
                <div class="p-20 bg-primary rad-10">
                    @csrf
                    @method('PUT')
                    <h2 class="mt-0 mb-10"> اضافة منتج</h2>
                    <div class="sec-box mb-15 between-flex bb-eee pb-5">
                        <div>
                            <span class=" mb-5">{{ __('private.image') }}</span>
                            <input type="file" class="toggle-checkbox c-grey fs-13" name="image" id="image">
                            <div style="color: red">
                                @error('image')
                                    * {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <label for="image" class="mb-5">
                            <input type="checkbox" class="toggle-checkbox" />
                            <div class="toggle-switch"></div>
                        </label>
                    </div>
                    <div class="mb-15">
                        <label for="name" class="fs-14 c-grey d-block mb-10">{{__('private.name_en')}}
                            <span style="color: red">*
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <input type="text" id="name" class="b-none border-ccc p-10 rad-6 d-block w-full"
                            placeholder="Name" name="name" value="{{ old('name', $Product->name) }}" />
                    </div>
                    <div class="mb-15">
                        <label for="name_ar" class="fs-14 c-grey d-block mb-10">{{__('private.name_ar')}}
                            <span style="color: red">*
                                @error('name_ar')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <input type="text" id="name_ar" class="b-none border-ccc p-10 rad-6 d-block w-full"
                             name="name_ar" value="{{ old('name_ar', $Product->name_ar) }}" />
                    </div>
                    <div class="mb-15">
                        <label for="price" class="fs-14 c-grey d-block mb-10">{{ __('private.price') }}
                            <span style="color: red">*
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <input type="text" id="price" class="b-none border-ccc p-10 rad-6 d-block w-full"
                            placeholder="price" name="price" value="{{ old('name', $Product->price) }}" />
                    </div>
                    <div class="mb-15">
                        <label for="discount_price" class="fs-14 c-grey d-block mb-10">{{ __('private.discount_price') }}
                        </label>
                        <input type="text" id="discount_price" class="b-none border-ccc p-10 rad-6 d-block w-full"
                            placeholder="discount_price" name="discount_price"
                            value="{{ old('name', $Product->discount_price) }}" />
                    </div>
                    {{-- //////////////الاقسام//////////////// --}}
                    <div class="mb-15">
                        <label for="parent_id" class="fs-14 c-grey d-block mb-10">{{ __('private.sidbar.Category') }}
                            <span style="color: red">*
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        @if (!@empty($Category))
                            <select name="parent_id" id="parent_id" class="b-none border-ccc p-10 rad-6 d-block w-full">
                                <optgroup label="الاقسام الرئيسية">
                                    @foreach ($Category as $CategoryProduct)
                                        @if ($CategoryProduct->parent_id == 0)
                                            <option value="{{ $CategoryProduct->id }}">@if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                                {{ $CategoryProduct->name_ar }} @else{{ $CategoryProduct->name }}
                                            @endif
                                            </option>
                                        @endif
                                    @endforeach
                                </optgroup>
                                <optgroup label="الاقسام الفرعيه">
                                    @foreach ($Category as $CategoryProduct)
                                        @if ($CategoryProduct->parent_id != 0)
                                            <option value="{{ $CategoryProduct->id }}">@if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                                {{ $CategoryProduct->name_ar }} @else{{ $CategoryProduct->name }}
                                            @endif
                                            </option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            </select>
                        @endif
                    </div>
                    {{-- ////////////////////////////// --}}
                    <div class="mb-15">
                        <label for="description" class="fs-14 c-grey d-block mb-10">{{ __('private.description') }}
                            <span style="color: red">*
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <textarea class="close-message p-10 rad-6 d-block w-full border-ccc resize-none" rows="5"
                            id="comment "placeholder="description" name="description">{{ old('description', $Product->description) }}</textarea>
                    </div>
                    <div class="mb-15">
                        <label for="description_ar" class="fs-14 c-grey d-block mb-10">{{__('private.description_ar')}}
                            <span style="color: red">*
                                @error('description_ar')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <textarea class="close-message p-10 rad-6 d-block w-full border-ccc resize-none" rows="5"
                            id="comment_ar" name="description_ar">{{ old('description_ar', $Product->description_ar) }}</textarea>
                    </div>
                    {{-- ////////////////////////////// --}}
                    <div class="sec-box mb-15 between-flex bb-eee pb-5">
                        <button class=" bg-transparent  b-none "><a href="{{ route('Product.index') }}"
                                class="button bg-blue c-white btn-shape b-none w-full p-5">
                                {{ __('private.back') }}
                            </a>
                        </button>
                        <input type="submit" class="button bg-blue c-white btn-shape b-none p-5"
                            value="{{ __('private.submit') }}">
                    </div>
                </div>
            </form>

            <div class="widgets-control p-20 bg-primary rad-10">
                <form action="{{ route('Product.show', $Product->id) }}">
                    @csrf
                    <h2 class="mt-0 mb-10">{{ __('private.siza') }}</h2>
                    <div class="mb-15">
                        <label for="S"><input type="checkbox" name="size[]" id="S"
                                value="S">S</label><br>
                        <label for="M"><input type="checkbox" name="size[]" id="M"
                                value="M">M</label><br>
                        <label for="L"><input type="checkbox" name="size[]" id="L"
                                value="L">L</label><br>
                        <label for="XL"><input type="checkbox" name="size[]" id="XL"
                                value="XL">XL</label><br>
                        <label for="XXL"><input type="checkbox" name="size[]" id="XXL"
                                value="XXL">XXL</label><br>
                    </div>
                    <h2 class="mt-0 mb-10">{{ __('private.color') }}</h2>
                    <div class="mb-15">
                        <label for="Red"><input type="checkbox" name="color[]" id="Red"
                                value="Red">Red</label><br>
                        <label for="Blue"><input type="checkbox" name="color[]" id="Blue"
                                value="Blue">Blue</label><br>
                        <label for="Green"><input type="checkbox" name="color[]" id="Green"
                                value="Green">Green</label><br>
                        <label for="Yellow"><input type="checkbox" name="color[]" id="Yellow"
                                value="Yellow">Yellow</label><br>
                        <label for="Purple"><input type="checkbox" name="color[]" id="Purple"
                                value="Purple">Purple</label><br>
                        <label for="Orangr"><input type="checkbox" name="color[]" id="Orangr"
                                value="Orangr">Orangr</label><br>
                    </div>
                    <input type="submit" class="button bg-blue c-white btn-shape b-none p-5 " value="اضافة لون"
                        name="add_color">
                </form>
            </div>
            {{-- show Product --}}
            @if (!@empty($Product))
                <div class="course bg-primary rad-6 p-relative overflow-hidden">
                    <div class="w-full txt-c">
                        <img src='{{ asset("$Product->image") }}' alt="" class="cover maxw-full w-200" />
                    </div>
                    <div class="p-20 mb-25">
                        <h4 class="m-0">@if(Config::get('languages')[App::getLocale()]['display'] =='عربي'){{$Product->name_ar}} @else{{$Product->name}}@endif</h4>
                        <p class="description c-grey mt-15 fs-13 lh-1_6">
                            @if(Config::get('languages')[App::getLocale()]['display'] =='عربي'){{$Product->description_ar}} @else{{$Product->description}}@endif
                        </p>


                    </div>

                    <div class="info p-15 p-relative between-flex fs-13 bt-eee">
                        <a href="{{ route('Product.edit', $Product->id) }}"><button
                                class="title bg-blue c-white btn-shape p-absolute left-75p  b-none">{{ __('private.update') }}
                            </button></a>
                        <form action="{{ route('Product.destroy', $Product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button name='delete' type="submit"
                                class="title bg-red c-white btn-shape p-absolute left-25p  b-none ">{{ __('private.delete') }}
                            </button>
                        </form>

                    </div>
                    <div class="color ">
                        <li class="bb-eee d-flex around-flex f-wrap">
                            @if (!@empty($ProductColor))
                                @foreach ($ProductColor as $ProductColors)
                                    @if ($ProductColors->product_id == $Product->id)
                                        <span class="key  mr-15 ml-15 mb-15 rad-half w-32 h-32 red-glow"
                                            style="background:{{ $ProductColors->color }}"></span>
                                    @endif
                                @endforeach
                            @endif
                        </li>
                        <li class="bb-eee d-flex around-flex f-wrap">
                            @if (!@empty($ProductSize))
                                @foreach ($ProductSize as $Sizes)
                                    @if ($Sizes->product_id == $Product->id)
                                        <span
                                            class="key  mr-15 ml-15 mb-15 rad-half w-32 h-32 red-glow">{{ $Sizes->size }}</span>
                                    @endif
                                @endforeach
                            @endif
                        </li>
                    </div>
                </div>

            @endif

        </div>
    </div>
@endsection
