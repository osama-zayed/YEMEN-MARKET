@extends('admin.layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User',
    'activePage' => 'User',
    'activeNav' => '',
])
@section('content')
    <div class="Product-page m-20">
        <div class="courses-page change-view d-grid m-20 gap-20">
            <form action="{{ route('profile.update', $Alluser->id) }}" method="post">
                {{-- create Product --}}
                <div class="p-20 bg-primary rad-10">
                    @csrf
                    @method('put')
                    <h2 class="mt-0 mb-10">{{ __('private.Edit my data') }}</h2>
                    <div class="mb-15">
                        <label for="name" class="fs-14 c-grey d-block mb-10">{{ __('private.name') }}
                            <span style="color: red">*
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <input type="text" id="name" class="b-none border-ccc p-10 rad-6 d-block w-full"
                            name="name" value="{{ old('name', $Alluser->name) }}" required />
                    </div>
                    <div class="mb-15">
                        <label for="email" class="fs-14 c-grey d-block mb-10">{{ __('private.Email_Address') }}
                            <span style="color: red">*
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <input type="email" id="email" class="b-none border-ccc p-10 rad-6 d-block w-full"
                            name="email" value="{{ old('email', $Alluser->email) }}" required />
                    </div>
                    <div class="mb-15">
                        <label for="old_password" class="fs-14 c-grey d-block mb-10">{{ __('private.Current Password') }}
                            <span style="color: red">*
                                @error('old_password')
                                    {{ __('private.erorr_Password_masseg') }}
                                @enderror
                            </span>
                        </label>
                        <input type="password" id="old_password" class="b-none border-ccc p-10 rad-6 d-block w-full"
                            name="old_password" required />
                    </div>
                    <div class="mb-15">

                        <label for="password" class="fs-14 c-grey d-block mb-10">{{ __('private.Password') }}
                            <span style="color: red">*
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <input type="password" id="password" class="b-none border-ccc p-10 rad-6 d-block w-full"
                            name="password" value="{{ old('password') }}" required autocomplete="new-password" />
                    </div>
                    <div class="mb-15">
                        <label for="password_confirmation"
                            class="fs-14 c-grey d-block mb-10">{{ __('private.ConfirmPassword') }}
                            <span style="color: red">*
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <input type="password" id="password_confirmation"
                            class="b-none border-ccc p-10 rad-6 d-block w-full" name="password_confirmation"
                            value="{{ old('password') }}" required autocomplete="new-password" />
                    </div>
                    {{-- //////////////type//////////////// --}}
                    <div class="mb-15">
                        <label for="parent_id" class="fs-14 c-grey d-block mb-10">{{ __('private.type') }}
                            <span style="color: red">*
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <select name="usertype" id="parent_id" class="b-none border-ccc p-10 rad-6 d-block w-full">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                            <option value="merchant">merchant</option>
                            @if (auth()->user()->usertype == 'superadmin')
                                <option value="superadmin">superadmin</option>
                            @endif
                        </select>
                    </div>
                    {{-- ////////////////////////////// --}}
                    <div class="sec-box mb-15 between-flex bb-eee pb-5">
                        <button class=" bg-transparent  b-none "><a href="{{ route('profile.index') }}"
                                class="button bg-blue c-white btn-shape b-none w-full p-5">
                                {{ __('private.back') }}
                            </a>
                        </button>
                        <input type="submit" class="button bg-blue c-white btn-shape b-none p-5"
                            value="{{ __('private.submit') }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
