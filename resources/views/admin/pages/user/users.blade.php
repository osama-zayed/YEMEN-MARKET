@extends('admin.layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'private.sidbar.User',
    'activePage' => 'User',
    'activeNav' => '',
])
@section('content')
    <div class="profile-page m-20">
        <div class="p-20 bg-primary rad-10 m-20 box-shadow">
            <h2 class="mt-0 mb-20">{{ __('private.sidbar.User') }}</h2>
            <div class="d-flex f-jc-end ">
                <a href="{{ route('profile.edit') }}"
                    class="button bg-blue c-white btn-shape b-none p-5 mr-5 mb-5">{{ __('private.Edit my data') }}</a>
                <a href="{{ route('createUser') }}"
                    class="button bg-blue c-white btn-shape b-none p-5 mr-5 mb-5">{{ __('private.new user') }}</a>
            </div>
            <div class="responsive-table">
                <table class="fs-15 w-full">
                    <thead>
                        <tr>
                            <td>{{ __('private.name') }}</td>
                            <td>{{ __('private.Email_Address') }}</td>
                            <td>{{ __('private.created_at') }}</td>
                            <td>{{ __('private.type') }}</td>
                            <td>{{ __('private.sidbar.Setting') }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!@empty($Alluser))
                            @foreach ($Alluser as $user)
                                @if (auth()->user()->usertype == 'admin' && $user->usertype == 'superadmin')
                                @else
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->usertype }}</td>

                                        <td class="d-flex around-flex">
                                            <a href="{{ route('profile.edit', $user->id) }}"
                                                class="button bg-blue c-white btn-shape b-none p-5">{{ __('private.Edit') }}</a>
                                            @if (auth()->user()->usertype == 'superadmin')
                                                @if ($user->usertype != 'superadmin' || $user->id == auth()->user()->id)
                                                    <form action="{{ route('profile.delete', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit"
                                                            class="button bg-red c-white btn-shape b-none p-5"
                                                            value="{{ __('private.delete')}}">
                                                    </form>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
