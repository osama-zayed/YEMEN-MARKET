@extends('admin.layouts.app', [
    'namePage' => 'private.sidbar.Category',
    'activePage' => 'Category',
    'activeNav' => '',
])
@section('content')
    <div class="Category-page m-20">
        <div class="courses-page change-view d-grid m-20 gap-20">
            {{-- create Category --}}
            <div class="p-20 bg-primary rad-10">
                @if (@empty($Category_updata))
                    <form action="{{ route('Category.store') }}" method="post">
                        @csrf
                    @elseif (!@empty($Category_updata))
                        <form action="{{ route('Category.update', [$Category_updata->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                @endif
                <h2 class="mt-0
                    mb-10"> {{ __('private.insert Category') }}</h2>
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
                    <label for="name" class="fs-14 c-grey d-block mb-10">{{ __('private.name_en') }}
                        <span style="color: red">*
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <input type="text" id="name" class="b-none border-ccc p-10 rad-6 d-block w-full" name="name"
                        value="@if (@empty($Category_updata)) {{ old('name') }}@else{{ old('name', $Category_updata->name) }} @endif" />
                </div>
                <div class="mb-15">
                    <label for="name_ar" class="fs-14 c-grey d-block mb-10">{{ __('private.name_ar') }}
                        <span style="color: red">*
                            @error('name_ar')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <input type="text" id="name_ar" class="b-none border-ccc p-10 rad-6 d-block w-full" name="name_ar"
                        value="@if (@empty($Category_updata)) {{ old('name_ar') }}@else{{ old('name_ar', $Category_updata->name_ar) }} @endif" />
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

                    @if (!@empty($data))
                        <select name="parent_id" id="parent_id" class="b-none border-ccc p-10 rad-6 d-block w-full">
                            <option value="0">{{ __('private.new main section') }}</option>
                            <optgroup label="{{ __('private.main section') }}">
                                @foreach ($data as $Category)
                                    @if ($Category->parent_id == 0)
                                        <option value="{{ $Category->id }}">
                                            @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                                {{ $Category->name_ar }} @else{{ $Category->name }}
                                            @endif
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                            <optgroup label="{{ __('private.sub section') }}">
                                @foreach ($data as $Category)
                                    @if ($Category->parent_id != 0)
                                        <option value="{{ $Category->id }}">
                                            @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                                {{ $Category->name_ar }}
                                            @else
                                                {{ $Category->name }}
                                            @endif
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        </select>
                    @elseif (!@empty($Category_updata))
                        <select name="parent_id" id="parent_id" class="b-none border-ccc p-10 rad-6 d-block w-full">
                            <option value="0">{{ __('private.new main section') }}</option>
                            <optgroup label="{{ __('private.main section') }}">
                                @foreach ($show_parent_id as $Category)
                                    @if ($Category->parent_id == 0 && $Category->id != $Category_updata->id)
                                        <option value="{{ $Category->id }}">
                                            @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                                {{ $Category->name_ar }}
                                            @else
                                                {{ $Category->name }}
                                            @endif
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                            <optgroup label="{{ __('private.sub section') }}">
                                @foreach ($show_parent_id as $Category)
                                    @if ($Category->parent_id != 0 && $Category->id != $Category_updata->id)
                                        <option value="{{ $Category->id }}">
                                            @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                                {{ $Category->name_ar }} @else{{ $Category->name }}
                                            @endif
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        </select>
                    @endif
                </div>
                {{-- ////////////////////////////// --}}


                <div class="sec-box mb-15 between-flex bb-eee pb-5">
                    <div>
                        <p class="c-grey mt-5 mb-5 fs-13">
                            @if (!@empty($Category_updata))
                                {{ __('private.Last updated on') }} {{ $Category_updata->updated_at ?? '' }}
                            @endif
                        </p>
                    </div>
                    @if (!@empty($Category_updata))
                        <input type="submit" class="button bg-blue c-white btn-shape b-none p-5"
                            value="{{ __('private.update') }}">
                    @else
                        <input type="submit" class="button bg-blue c-white btn-shape b-none p-5"
                            value="{{ __('private.submit') }} ">
                    @endif
                </div>
                </form>
            </div>
            {{-- show Category --}}
            @if (!@empty($data))
                @foreach ($data as $Category)
                    <div class="course bg-primary rad-6 p-relative overflow-hidden">
                        <div class="w-full txt-c">
                            <img src='{{ asset("$Category->image") }}' alt="" class="cover maxw-full w-200" />
                        </div>
                        <div class="p-20 mb-25">
                            <h4 class="m-0">
                                @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                    {{ $Category->name_ar }} @else{{ $Category->name }}
                                @endif
                            </h4>
                            <p class="description c-grey mt-15 fs-13 lh-1_6">

                                @if(Config::get('languages')[App::getLocale()]['display'] =='عربي'){{ $Category->description }} @else {{ $Category->description }}@endif
                            </p>
                            @if ($Category->parent_id == 0)
                                <span class="c-grey ">{{ __('private.main section the number of sub section there of') }}
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($data as $parent)
                                        @if ($parent->parent_id == $Category->id)
                                            @php
                                                $i++;
                                            @endphp
                                        @endif
                                    @endforeach
                                    {{ $i }}
                                </span>
                            @else
                                <span class="c-grey">{{ __('private.sub section of') }}
                                    @foreach ($data as $parent)
                                        @if ($parent->id == $Category->parent_id)
                                            @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                                {{ $parent->name_ar }}
                                            @else
                                                {{ $parent->name }}
                                            @endif
                                        @endif
                                    @endforeach
                                </span>
                            @endif
                        </div>

                        <div class="info p-15 p-relative between-flex fs-13 bt-eee">
                            <a href="{{ route('Category.edit', $Category->id) }}"><button
                                    class="title bg-blue c-white btn-shape p-absolute left-75p  b-none">{{ __('private.update') }}
                                </button></a>
                            <form action="{{ route('Category.destroy', $Category->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button name='delete' type="submit"
                                    class="title bg-red c-white btn-shape p-absolute left-25p  b-none ">{{ __('private.delete') }}
                                </button>
                            </form>

                        </div>
                    </div>
                @endforeach
            @elseif (!@empty($Category_updata))
                <div class="course bg-primary rad-6 p-relative overflow-hidden">
                    <div class="w-full txt-c">
                        <img src="{{ asset("$Category_updata->image") }}" alt="" class="cover maxw-full w-200" />
                    </div>
                    <div class="p-20">
                        <h4 class="m-0">
                            @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                {{ $Category_updata->name_ar }}
                            @else
                                {{ $Category_updata->name }}
                            @endif
                        </h4>
                        <p class="description c-grey mt-15 fs-13 lh-1_6">
                            @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                {{ $Category_updata->description_ar }}
                            @else
                                {{ $Category_updata->description }}
                            @endif
                        </p>
                        @if ($Category_updata->parent_id == 0)
                            <span class="c-grey ">{{ __('private.main section the number of sub section there of') }}
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($show_parent_id as $parent)
                                    @if ($parent->parent_id == $Category_updata->id)
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                @endforeach
                                {{ $i }}
                            </span>
                        @else
                            <span class="c-grey">{{ __('private.sub section of') }}
                                @foreach ($show_parent_id as $parent)
                                    @if ($parent->id == $Category_updata->parent_id)
                                        @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                                            {{ $parent->name_ar }}
                                        @else
                                            {{ $parent->name }}
                                        @endif
                                    @endif
                                @endforeach
                            </span>
                        @endif
                    </div>
                    <div class="info p-15 p-relative between-flex fs-13 bt-eee">
                        <a href="{{ route('Category.edit', $Category_updata->id) }}"><button
                                class="title bg-blue c-white btn-shape p-absolute left-75p  b-none">{{ __('private.update') }}
                            </button></a>
                        <form action="{{ route('Category.destroy', $Category_updata->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button name='delete' type="submit"
                                class="title bg-red c-white btn-shape p-absolute left-25p  b-none">{{ __('private.delete') }}</button>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
