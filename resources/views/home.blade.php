@extends('layouts.app', [
    'class' => 'login-page sidebar-mini ',
    'activePage' => '',
])

@section('content')
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            @include('layouts.items._filter')
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">

                    <!-- Categories Start -->
                    <div class="container-fluid pt-5">
                        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                                class="bg-secondary pr-3">{{ __('private.sidbar.Category') }}</span></h2>
                        <div class="row px-xl-5 pb-3">
                            @if (!@empty($AllCategory))
                                @foreach ($AllCategory as $Category)
                                    @if ($Category->parent_id == 0)
                                        @include('layouts.items._category')
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Categories End -->
                    @include('layouts.items._Sorting')
                    <!-- Products Start -->
                    <div class="container-fluid pt-5 pb-3">
                        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                                class="bg-secondary pr-3">
                                {{ __('private.sidbar.Product') }}</span></h2>
                        <div class="row px-xl-5">
                            @if (!@empty($AllProduct))
                                @foreach ($AllProduct as $Product)
                                    @include('layouts.items._Product')
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Products End -->

                    <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

@endsection
