<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('private.name_web') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="{{ asset('animate/animate.min.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @if (Config::get('languages')[App::getLocale()]['language'] == 'Arabic')
        <link rel="stylesheet" href="{{ asset('css/Arabic.css') }}">
    @endif
</head>

<body>

    @include('layouts.nav.Topbar')
    @include('layouts.nav.navbar')
    @include('layouts.nav.breadcrumbstart')
    @yield('content')
    @include('layouts.nav.footer')

    <!-- Back to Top -->
    <a href="#top" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/easing.min.js') }}"></script>
    <script src="{{ asset('js/lib/owl.carousel.min.js') }}"></script>
    <!-- Contact Javascript File -->
    <script src="{{ asset('js/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
    <script>
        let datapro = [];
        if (localStorage.product_cart != null) {
            datapro = JSON.parse(localStorage.product_cart);
            document.getElementById("numberofcart").innerHTML = datapro.length;
            document.getElementById("numberofcarts").innerHTML = datapro.length;
            showCart();
        }

        function insert_carts(idProdect) {
            for (let i = 0; i < datapro.length; i++) {
                if (datapro[i] == idProdect) {
                    return;
                }
            }
            let newpro = idProdect;
            datapro.push(newpro);
            localStorage.setItem('product_cart', JSON.stringify(datapro));
            document.getElementById("numberofcart").innerHTML = datapro.length;
            document.getElementById("numberofcarts").innerHTML = datapro.length;
            showCart();
        }

        function delete_data(id) {
            for (let i = 0; i < datapro.length; i++) {
                if (datapro[i] == id) {
                    console.log(datapro[i])
                    datapro.splice(i, 1)
                }
                // if (datapro[i] == id) {
                // }
            }
            localStorage.product_cart = JSON.stringify(datapro);
            document.getElementById("numberofcart").innerHTML = datapro.length;
            document.getElementById("numberofcarts").innerHTML = datapro.length;
            showCart();
        }
        /////////////////////////
        function showCart() {
            var data_cart = JSON.stringify();
            var xhr = new XMLHttpRequest();
            xhr.open("post", "http://127.0.0.1:8000/api/aaa/Product", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    let table = '';
                    let totel = 0;

                    for (let i = 0; i < response.Product.length; i++) {
                        for (let j = 0; j < response.Product.length; j++) {
                            if (datapro[i] == response.Product[j].id) {
                                // totel+=response.Product[i].price;
                                // console.log(response.Product[i]);
                                table += `
                  <tr>
                        <td class="align-middle">${i+1}</td>
                        <td class="align-middle"> <img src="{{ asset('${response.Product[i].image}') }}" alt="" style="width: 50px;"></td>
                        <td class="align-middle">@if(Config::get('languages')[App::getLocale()]['display'] =='عربي')${response.Product[i].name_ar} @else${response.Product[i].name}@endif </td>
                        <td class="align-middle">$${response.Product[i].price}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" onclick="countincr(${i})">
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="number" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus" onclick="countplas(${response.Product[i].id})">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">$${response.Product[i].price}</td>
                        <td class="align-middle"><button class="btn btn-sm btn-danger" onclick="delete_data(${datapro[i]})"><i class="fa fa-times"></i></button></td>
                    </tr>
           `;
                            }
                        }
                    }

                    document.getElementById('tbodycart').innerHTML = table;
                    document.getElementById('totel').innerHTML = totel;

                }
                // console.log(xhr.readyState);
            }
            xhr.send(data_cart);
        }







        /////////flovied
        // let dataflovied = [];
        // if (localStorage.product_flovied != null) {
        //     dataflovied = JSON.parse(localStorage.product_flovied);
        //     document.getElementById("numberoflovied").innerHTML = dataflovied.length;
        //     document.getElementById("numberoflovieds").innerHTML = dataflovied.length;
        // }

        // function insert_favorit(idProdect) {
        //     let newpro = {
        //         id: idProdect,
        //     }
        //     dataflovied.push(newpro);
        //     localStorage.setItem('product_flovied', JSON.stringify(dataflovied));
        //     document.getElementById("numberoflovied").innerHTML = dataflovied.length;
        //     document.getElementById("numberoflovieds").innerHTML = dataflovied.length;
        // }
        //////////////////////////////////////////
        let dataflovied = [];
        if (localStorage.product_flovied != null) {
            dataflovied = JSON.parse(localStorage.product_flovied);
            document.getElementById("numberoflovied").innerHTML = dataflovied.length;
            document.getElementById("numberoflovieds").innerHTML = dataflovied.length;
            showflovied();
        }

        function insert_favorit(idProdect) {
            for (let i = 0; i < dataflovied.length; i++) {
                if (dataflovied[i] == idProdect) {
                    return;
                }
            }
            let newpro = idProdect;
            dataflovied.push(newpro);
            localStorage.setItem('product_flovied', JSON.stringify(dataflovied));
            document.getElementById("numberoflovied").innerHTML = dataflovied.length;
            document.getElementById("numberoflovieds").innerHTML = dataflovied.length;
            showflovied();
        }

        function delete_flovied(id) {
            for (let i = 0; i < dataflovied.length; i++) {
                if (dataflovied[i] == id) {
                    console.log(dataflovied[i])
                    dataflovied.splice(i, 1)
                }
                // if (datapro[i] == id) {
                // }
            }
            localStorage.product_flovied = JSON.stringify(dataflovied);
            document.getElementById("numberoflovied").innerHTML = dataflovied.length;
            document.getElementById("numberoflovieds").innerHTML = dataflovied.length;
            showflovied();
        }
        /////////////////////////
        function showflovied() {
            var data_flovied = JSON.stringify();
            var xhr = new XMLHttpRequest();
            xhr.open("post", "http://127.0.0.1:8000/api/aaa/Product", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    let table = '';
                    let totel = 0;

                    for (let i = 0; i < response.Product.length; i++) {
                        for (let j = 0; j < response.Product.length; j++) {
                            if (dataflovied[i] == response.Product[j].id) {

                                // totel+=response.Product[i].price;
                                // console.log(response.Product[i]);
                                table += `
                                <tr>
                        <td class="align-middle">${i+1}</td>
                        <td class="align-middle"> <img src="{{ asset('${response.Product[i].image}') }}" alt="" style="width: 50px;"></td>
                        <td class="align-middle">@if(Config::get('languages')[App::getLocale()]['display'] =='عربي')${response.Product[i].name_ar} @else${response.Product[i].name}@endif </td>
                        <td class="align-middle">$${response.Product[i].price}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" onclick="countincr(${i})">
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="number" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus" onclick="countplas(${response.Product[i].id})">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">$${response.Product[i].price}</td>
                        <td class="align-middle"><button class="btn btn-sm btn-danger" onclick="delete_flovied(${dataflovied[i]})"><i class="fa fa-times"></i></button></td>
                    </tr>
           `;
                            }
                        }
                    }

                    document.getElementById('tbodyflovied').innerHTML = table;
                    document.getElementById('totelflovied').innerHTML = totel;

                }
                console.log(xhr.readyState);
            }
            xhr.send(data_flovied);
        }
    </script>

</body>

</html>
