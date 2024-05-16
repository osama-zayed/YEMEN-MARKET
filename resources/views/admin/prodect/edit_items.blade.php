@extends('admin.layouts.dachbord', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'prodect',
])
@section('content')
<div class="crud" id="up">
    <div class="head">
        <h2>متجر صنعاء</h2>
        <p>prouduct mamgment ssssystem</p>
    </div>

    <form action="{{ route('dachbord.update',[$produc->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="inputs">
            <input type="text" name="title" placeholder="NAME" value="{{$produc->TITLE}}">
            <div style="color: red">
                @error('title')
                   * {{ $message }}
                @enderror
            </div>
            <div class="fl">
                <div class="price">
                    <div>
                        <input type="number" name="price" placeholder="PRICE" value="{{$produc->PRICE}}">
                        <input type="text" name="TYPE" placeholder="TYPE" value="{{$produc->CATEGORY}}"><br>
                        <div style="color: red">
                            @error('price')
                                * {{ $message }}
                            @enderror
                        </div>
                        <div style="color: red">
                            @error('TYPE')
                                * {{ $message }}
                            @enderror
                        </div>
                        <input type="number" name="discount" placeholder="discount" value="{{$produc->DISCOUNT}}">
                        <input type="file" name="photo" class="file" value="{{old('photo')}}">
                        <div style="color: red">
                            @error('discount')
                                * {{ $message }}

                            @enderror
                        </div>

                        {{-- <button type="submit" name="implod_image">implod image</button> --}}
                    </div>

                </div>
                <div class="divimages">
                    {{-- <?= '<img src="images//' . $name_image . '"  style="width: 300px;">' ?> --}}
                </div>
            </div>
            <button name='edit' type="submit">تعديل</button>

        </div>
    </form>

    <div class="outputs">
        <div class="searchblock">
            <input type="text" name="" class="search" placeholder="search">
            <div class="btnsearch">
                <button class="searchtitle">Search by title</button>
                <button type="" class="searchcategory">Search by category</button>
            </div>
        </div>
    </div>
</div>

@endsection
