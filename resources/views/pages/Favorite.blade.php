@extends('layouts.app', [
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'cart_page',
])

@section('content')
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">
                {{ __('private.sidbar.Product') }}</span></h2>
        <table class="table table-light table-borderless table-hover text-center mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>{{ __('private.number') }}</th>
                    <th>{{ __('private.image') }}</th>
                    <th>{{ __('private.sidbar.products') }}</th>
                    <th>{{ __('private.price') }}</th>
                    <th>{{ __('private.Quantity') }}</th>
                    <th>{{ __('private.Total') }}</th>
                    <th>{{ __('private.delete') }}</th>
                </tr>
            </thead>
            <tbody class="align-middle" id="tbodyflovied">

            </tbody>
        </table>
    </div>
    <!-- Products End -->
@endsection
