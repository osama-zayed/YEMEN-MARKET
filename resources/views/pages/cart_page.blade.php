@extends('layouts.app', [
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'cart',
])

@section('content')
   <!-- Cart Start -->
   <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            {{-- /////////////////// --}}
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>{{__("private.number")}}</th>
                        <th>{{__("private.image")}}</th>
                        <th>{{__("private.sidbar.products")}}</th>
                        <th>{{__("private.price")}}</th>
                        <th>{{__("private.Quantity")}}</th>
                        <th>{{__("private.Total")}}</th>
                        <th>{{__("private.delete")}}</th>
                    </tr>
                </thead>
                <tbody class="align-middle" id="tbodycart">
                    {{-- <tr>
                        <td class="align-middle">1</td>
                        <td class="align-middle"> <img src="{{ asset("images/Product/cat-1.jpg") }}" alt="" style="width: 50px;"></td>
                        <td class="align-middle"> Product Name</td>
                        <td class="align-middle">$150</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" >
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">$150</td>
                        <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                    </tr> --}}
                </tbody>

            </table>

              {{-- /////////////////// --}}
        </div>

        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="{{__("private.Apply Coupon")}}">
                    <div class="input-group-append">
                        <button class="btn btn-primary h-100">{{__("private.Apply Coupon")}}</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{__("private.CART SUMMARY")}}</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>{{__("private.Subtotal")}}</h6>
                        <h6>$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">{{__("private.Shipping")}}</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>{{__("private.Total")}}</h5>
                        <h5 id="totel">$160</h5>
                    </div>
                    <button class="btn btn-block btn-primary font-weight-bold my-3 py-3 h-100">{{__("private.Proceed To Checkout")}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

@endsection
