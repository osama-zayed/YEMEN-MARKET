@extends('admin.layouts.app', [
    'namePage' => 'private.sidbar.Product',
    'activePage' => 'Product',
    'activeNav' => '',
])
@section('content')
    <div class="Product-page m-20">
        <div class="courses-page change-view d-grid m-20 gap-20">
            <form action="{{ route('Product.store') }}" method="POST"
            enctype="multipart/form-data">
                {{-- create Product --}}
                <div class="p-20 bg-primary rad-10">
                    @csrf

                    <h2 class="mt-0 mb-10"> {{__('private.insert Products')}}</h2>
                    <div class="sec-box mb-15 between-flex bb-eee pb-5">
                        <div>
                            <span class=" mb-5">{{__('private.image')}}</span>
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
                             name="name" value="{{ old('name') }}" />
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
                             name="name_ar" value="{{ old('name_ar') }}" />
                    </div>
                    <div class="mb-15">
                        <label for="price" class="fs-14 c-grey d-block mb-10">{{__('private.price')}}
                            <span style="color: red">*
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <input type="text" id="price" class="b-none border-ccc p-10 rad-6 d-block w-full"
                            name="price" value="{{ old('price') }}" />
                    </div>
                    <div class="mb-15">
                        <label for="discount_price" class="fs-14 c-grey d-block mb-10">{{__('private.discount_price')}}
                        </label>
                        <input type="text" id="discount_price" class="b-none border-ccc p-10 rad-6 d-block w-full"
                             name="discount_price" value="{{ old('discount_price') }}" />
                    </div>
                    {{-- //////////////الاقسام//////////////// --}}
                    <div class="mb-15">
                        <label for="parent_id" class="fs-14 c-grey d-block mb-10">{{__('private.sidbar.Category')}}
                            <span style="color: red">*
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        @if (!@empty($Category))
                            <select name="parent_id" id="parent_id" class="b-none border-ccc p-10 rad-6 d-block w-full">
                                <optgroup label="{{__("private.main section")}}">
                                    @foreach ($Category as $CategoryProduct)
                                        @if ($CategoryProduct->parent_id == 0)
                                            <option value="{{ $CategoryProduct->id }}">@if(Config::get('languages')[App::getLocale()]['display'] =='عربي'){{$CategoryProduct->name_ar}} @else{{$CategoryProduct->name}}@endif</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                                <optgroup label="{{__("private.sub section")}}">
                                    @foreach ($Category as $CategoryProduct)
                                        @if ($CategoryProduct->parent_id != 0)
                                            <option value="{{ $CategoryProduct->id }}">@if(Config::get('languages')[App::getLocale()]['display'] =='عربي'){{$CategoryProduct->name_ar}} @else{{$CategoryProduct->name}}@endif
                                            </option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            </select>
                        @endif
                    </div>
                    {{-- ////////////////////////////// --}}
                    <div class="mb-15">
                        <label for="description" class="fs-14 c-grey d-block mb-10">{{__('private.description_en')}}
                            <span style="color: red">*
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <textarea class="close-message p-10 rad-6 d-block w-full border-ccc resize-none" rows="5"
                            id="comment" name="description">{{ old('description') }}</textarea>
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
                            id="comment_ar" name="description_ar">{{ old('description_ar') }}</textarea>
                    </div>
                    {{-- ////////////////////////////// --}}
                    <div class="sec-box mb-15 between-flex bb-eee pb-5">
                        <input type="submit" class="button bg-blue c-white btn-shape b-none p-5" value="{{__('private.submit')}}">
                    </div>
                </div>
            </form>

            {{-- <div class="widgets-control p-20 bg-primary rad-10">
                <h2 class="mt-0 mb-10">الاحجام</h2>
                <p class="mt-0 mb-20 c-grey fs-15">ماهي الاحجام المتوفرة</p>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="s" class="appearance-none" checked="" value="S"
                        name="size">
                    <label for="s" class="pl-30 cursor-pointer p-relative">S</label>
                </div>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="M" class="appearance-none" checked="" value="M"
                        name="size">
                    <label for="M" class="pl-30 cursor-pointer p-relative">M</label>
                </div>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="L" class="appearance-none" checked="" value="L"
                        name="size">
                    <label for="L" class="pl-30 cursor-pointer p-relative">L</label>
                </div>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="XL" class="appearance-none" checked="" value="XL"
                        name="size">
                    <label for="XL" class="pl-30 cursor-pointer p-relative">XL</label>
                </div>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="XXL" class="appearance-none" checked="" value="XXL"
                        name="size">
                    <label for="XXL" class="pl-30 cursor-pointer p-relative">XXL</label>
                </div>
                <h2 class="mt-0 mb-10">الالوان</h2>
                <div class="control around-flex  mb-15 ">
                    <form action="{{ route('Product.create') }}">
                        @csrf
                        <input type="color" id="color" value="" name="color">
                        <input type="submit" class="button bg-blue c-white btn-shape b-none p-5 " value="اضافة لون"
                            name="add_color">
                    </form>
                </div>
            </div> --}}
            {{-- show Product --}}
            @if (!@empty($Product))
                @foreach ($Product as $Products)
                    <div class="course bg-primary rad-6 p-relative overflow-hidden">
                        <div class="w-full txt-c">
                            <img src='{{ asset("$Products->image") }}' alt="" class="cover maxw-full w-200" />
                        </div>
                        <div class="p-20 mb-25">
                            <h4 class="m-0">@if(Config::get('languages')[App::getLocale()]['display'] =='عربي'){{$Products->name_ar}} @else{{$Products->name}}@endif</h4>
                            <p class="description c-grey mt-15 fs-13 lh-1_6">
                                @if(Config::get('languages')[App::getLocale()]['display'] =='عربي'){{$Products->description_ar}} @else{{$Products->description}}@endif
                            </p>
                            <p class="description c-grey mt-15 fs-13 lh-1_6">
                                {{$Products->price}}$
                            </p>



                        </div>

                        <div class="info p-15 p-relative between-flex fs-13 bt-eee">
                            <a href="{{ route('Product.edit', $Products->id) }}"><button
                                    class="title bg-blue c-white btn-shape p-absolute left-75p  b-none">{{__('private.update')}}
                                    </button></a>
                            <form action="{{ route('Product.destroy', $Products->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button name='delete' type="submit"
                                    class="title bg-red c-white btn-shape p-absolute left-25p  b-none ">{{__('private.delete')}}
                                    </button>
                            </form>

                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
