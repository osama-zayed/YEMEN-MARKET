@extends('admin.layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'private.sidbar.Setting',
    'activePage' => 'Settings',
    'activeNav' => '',
])

@section('content')
    <form action="{{ route('Setting.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="settings-page change-view m-20 d-grid gap-20">
            <!-- Start Settings Box -->
            <div class="p-20 bg-primary rad-10">
                <h2 class="mt-0 mb-10">{{ __('private.name') }}</h2>
                <div class="mb-15">
                    <label for="name" class="fs-14 c-grey d-block mb-10">{{ __('private.name_en') }}</label>
                    <input type="text" id="name" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.name_en') }}" name="name" value="{{ $data->name }}" />
                    <div style="color: red">
                        @error('name')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-15">
                    <label for="name_ar" class="fs-14 c-grey d-block mb-10">{{ __('private.name_ar') }}</label>
                    <input type="text" id="name_ar" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.name_ar') }}" name="name_ar" value="{{ $data->name_ar }}" />
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
                    placeholder="{{ __('private.description_en') }}" name="description">{{ $data->description }}</textarea>
                <div style="color: red">
                    @error('description')
                        * {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="p-20 bg-primary rad-10">
                <h2 class="mt-0 mb-10">{{ __('private.description_ar') }}</h2>
                <textarea class="close-message p-10 rad-6 d-block w-full border-ccc resize-none" rows="5" id="comment "
                    placeholder="{{ __('private.description_ar') }}" name="description_ar">{{ $data->description_ar }}</textarea>
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
                        placeholder="Phone" name="phone" value="{{ $data->phone }}" />
                    <div style="color: red">
                        @error('phone')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-15">
                    <label for="email" class="fs-14 c-grey d-block mb-10">{{ __('private.Email_Address') }}</label>
                    <input type="email" id="email" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.Email_Address') }}" name="email" value="{{ $data->email }}" />
                    <div style="color: red">
                        @error('email')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-15">
                    <label for="address" class="fs-14 c-grey d-block mb-10">{{ __('private.Address_en') }}</label>
                    <input type="text" id="address" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.Address_en') }}" name="address" value="{{ $data->address }}" />
                    <div style="color: red">
                        @error('address')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-15">
                    <label for="address_ar" class="fs-14 c-grey d-block mb-10">{{ __('private.Address_ar') }}</label>
                    <input type="{{ __('private.Address_ar') }}" id="address_ar" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="{{ __('private.Address_ar') }}" name="address_ar" value="{{ $data->address_ar }}" />
                    <div style="color: red">
                        @error('address_ar')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <!-- End Settings Box -->
            <!-- Start Settings Box -->
            <div class="social-boxes p-20 bg-primary rad-10">
                <h2 class="mt-0 mb-10">{{ __('private.Social Link') }}</h2>
                <div class="facebook d-flex align-center mb-15">
                    <i class="fa-brands fa-facebook-f center-flex w-40 h-40 border-ddd "></i>
                    <input type="text" class="w-full h-40 border-ddd pl-10 pr-10" placeholder="facebook" id="facebook"
                        name="facebook" value="{{ $data->facebook }}">
                    <div style="color: red">
                        @error('facebook')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="tiktok d-flex align-center mb-15">
                    <i class="fa-brands fa-tiktok center-flex w-40 h-40 border-ddd "></i>
                    <input type="text" class="w-full h-40 border-ddd pl-10 pr-10" placeholder="tiktok" id="tiktok"
                        name="tiktok" value="{{ $data->tiktok }}">
                    <div style="color: red">
                        @error('tiktok')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="youtube d-flex align-center mb-15">
                    <i class="fa-brands fa-youtube center-flex w-40 h-40 border-ddd"></i>
                    <input type="text" class="w-full h-40 border-ddd pl-10 pr-10" placeholder="youtube" id="youtube"
                        name="youtube" value="{{ $data->youtube }}">
                    <div style="color: red">
                        @error('youtube')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="youtube d-flex align-center mb-15">
                    <i class="fa-brands fa-twitter center-flex w-40 h-40 border-ddd"></i>
                    <input type="text" class="w-full h-40 border-ddd pl-10 pr-10" placeholder="twitter" id="twitter"
                        name="twitter" value="{{ $data->twitter }}">
                    <div style="color: red">
                        @error('twitter')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="instagram d-flex align-center mb-15">
                    <i class="fa-brands fa-instagram center-flex w-40 h-40 border-ddd"></i>
                    <input type="text" class="w-full h-40 border-ddd pl-10 pr-10" placeholder="instagram" id="instagram"
                        name="instagram" value="{{ $data->instagram }}">
                    <div style="color: red">
                        @error('instagram')
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
                        <span class="  mb-5">{{__('private.logo')}} </span>
                        <input type="file" class="toggle-checkbox c-grey fs-13" name="logo" class="form-control"
                            value="{{ $data->logo }}" id="logo">
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
                <div class="sec-box mb-15 between-flex bb-eee pb-5">
                    <div>
                        <span class=" ">{{__('private.image')}}</span>
                        <input type="file" class="toggle-checkbox c-grey fs-13" name="favicon" class="form-control"
                            value="{{ $data->favicon }}" id="favicon">
                    </div>
                    <label for="favicon">
                        <input type="checkbox" class="toggle-checkbox" />
                        <div class="toggle-switch"></div>
                    </label>
                </div>
                <div class="mb-15">
                    <label for="dollar" class="fs-14 c-grey d-block mb-10">{{ __('private.dollar') }}</label>
                    <input type="number" id="dollar" class="b-none border-ccc p-10 rad-6 d-block w-full"
                        placeholder="dollar" name="dollar" value="{{ $data->dollar }}" />
                    <div style="color: red">
                        @error('dollar')
                            * {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="sec-box mb-15 between-flex bb-eee pb-5">
                    <div>
                        <p class="c-grey mt-5 mb-5 fs-13"> {{ __('private.last modifed in') }} {{ $data->updated_at }}</p>
                    </div>
                    <input type="submit" class="button bg-blue c-white btn-shape b-none" value="Change">
                </div>
            </div>
            <!-- End Settings Box -->
        </div>
    </form>
@endsection
