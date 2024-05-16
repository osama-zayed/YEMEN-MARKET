@extends('admin.layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'private.sidbar.Setting',
    'activePage' => 'Settings',
    'activeNav' => '',
])

@section('content')
  <form action="{{ route('Setting.store') }}" method="POST">
        @csrf
        <div class="settings-page change-view m-20 d-grid gap-20">
            <!-- Start Settings Box -->
            <div class="p-20 bg-primary rad-10">
                <h2 class="mt-0 mb-10">{{ __('private.name') }}</h2>
                <div class="mb-15">
                    <label for="name" class="fs-14 c-grey d-block mb-10">{{ __('private.name_en') }}</label>
                    <input type="text" id="name" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.name_en') }}" name="name" value="{{ old('name') }}" />
                    <div style="color: red">
                        @error('name')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-15">
                    <label for="name_ar" class="fs-14 c-grey d-block mb-10">{{ __('private.name_ar') }}</label>
                    <input type="text" id="name_ar" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.name_ar') }}" name="name_ar" value="{{ old('name_ar') }}" />
                    <div style="color: red">
                        @error('name_ar')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>

            </div>
            <!-- end Settings -->
            <!-- Start Settings Box -->
            <div class="p-20 bg-primary rad-10">
                <h2 class="mt-0 mb-10">{{ __('private.description_en') }}</h2>
                <textarea class="close-message p-10 rad-6 d-block w-full border-ccc resize-none" rows="5" id="comment "
                    placeholder="{{ __('private.description_en') }}" name="description">{{ old('description')}}</textarea>
                <div style="color: red">
                    @error('description')
                        * {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="p-20 bg-primary rad-10">
                <h2 class="mt-0 mb-10">{{ __('private.description_ar') }}</h2>
                <textarea class="close-message p-10 rad-6 d-block w-full border-ccc resize-none" rows="5" id="comment "
                    placeholder="{{ __('private.description_ar') }}" name="description_ar">{{ old('description_ar') }}</textarea>
                <div style="color: red">
                    @error('description_ar')
                        * {{ $message }}
                    @enderror
                </div>
            </div>
            <!-- End Settings Box -->
            <!-- start contect -->
            <div class="p-20 bg-primary rad-10">
                <h2 class="mt-0 mb-10">{{ __('private.Contact') }}</h2>
                <div class="mb-15">
                    <label for="phone" class="fs-14 c-grey d-block mb-10">{{ __('private.phone number') }}</label>
                    <input type="text" id="phone" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="Phone" name="phone" value="{{ old('phone') }}" />
                    <div style="color: red">
                        @error('phone')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-15">
                    <label for="email" class="fs-14 c-grey d-block mb-10">{{ __('private.Email_Address') }}</label>
                    <input type="email" id="email" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.Email_Address') }}" name="email" value="{{ old('email')}}" />
                    <div style="color: red">
                        @error('email')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-15">
                    <label for="surname" class="fs-14 c-grey d-block mb-10">{{ __('private.Address_ar') }}</label>
                    <input type="{{ __('private.Address_ar') }}" id="surname" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.surname') }}" name="surname" value="{{ old('surname') }}" />
                    <div style="color: red">
                        @error('surname')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <!-- End Settings Box -->



            <!-- Start Settings Box -->
            <div class="p-20 bg-primary rad-10">
                <h2 class="mt-0 mb-10">{{__('private.save site settings')}}</h2>

                <div class="sec-box mb-15 between-flex bb-eee pb-5">
                    <div>
                        <span class="  mb-5">{{__('private.image')}} </span>
                        <input type="file" class="toggle-checkbox c-grey fs-13" name="logo" class="form-control"
                            value="" id="logo">
                        <div style="color: red">
                            @error('logo')
                                * {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <label for="logo" class="mb-5">
                        <input type="checkbox" class="toggle-checkbox" />
                        <div class="toggle-switch"></div>

                    </label>
                </div>
                <div class="mb-15">
                    <label for="country" class="fs-14 c-grey d-block mb-10">{{ __('private.country') }}</label>
                    <input type="{{ __('private.country') }}" id="country" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.country') }}" name="country" value="{{ old('country')}}" />
                    <div style="color: red">
                        @error('country')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-15">
                    <label for="adress" class="fs-14 c-grey d-block mb-10">{{ __('private.Address') }}</label>
                    <input type="text" id="adress" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.Address') }}" name="adress" value="{{ old('adress')}}" />
                    <div style="color: red">
                        @error('adress')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="sec-box mb-15 between-flex bb-eee pb-5">
                    <div>
                        <p class="c-grey mt-5 mb-5 fs-13"> {{ __('private.last modifed in') }} {{ old('updated_at ') }}</p>
                    </div>
                    <input type="submit" class="button bg-blue c-white btn-shape b-none" value="Change">
                </div>
            </div>
            <!-- End Settings Box -->
        </div>
    </form>
@endsection
