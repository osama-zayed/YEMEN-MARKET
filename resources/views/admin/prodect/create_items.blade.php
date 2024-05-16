@extends('admin.layouts.app', [
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
    <form action="{{ route('dachbord.store') }}" method="post">
        @csrf
        <div class="inputs">
            <input type="text" name="title" placeholder="NAME" value="{{old('title')}}">
            <div style="color: red">
                @error('title')
                   * {{ $message }}
                @enderror
            </div>
            <div class="fl">
                <div class="price">
                    <div>
                        <input type="number" name="price" placeholder="PRICE" value="{{old('price')}}">
                        <input type="text" name="TYPE" placeholder="TYPE" value="{{old('TYPE')}}"><br>
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
                        <input type="number" name="discount" placeholder="discount" value="{{old('discount')}}">
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
            <button name='add' type="submit">اضافة</button>

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

<div class="container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                {{-- <th>images</th> --}}
                <th>الاسم</th>
                <th>السعر</th>
                <th>الضرائب</th>
                <th>الاعلانات</th>
                <th>التخفيض</th>
                <th>الاجمالي</th>
                <th>النوع</th>
                {{-- <th>تاريخ الانشاء</th>
                <th>تاريخ التعديل</th> --}}
                <th>تعديل</th>
                <th>حذف</th>
            </tr>



        </thead>
        <tbody id="tbody">
            @if (!@empty($data))
                @php
                    $i = 1;
                @endphp
                @foreach ($data as $produc)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $produc->TITLE }}</td>
                        <td>{{ $produc->PRICE }}</td>
                        <td>{{ $produc->TAXES }}</td>
                        <td>{{ $produc->ADS }}</td>
                        <td>{{ $produc->DISCOUNT }}</td>
                        <td>{{ $produc->TOTAL }}</td>
                        <td>{{ $produc->CATEGORY }}</td>
                        {{-- <td>{{ $produc->created_at }}</td>
                        <td>{{ $produc->updated_at }}</td> --}}
                        <td><a href="{{ route('dachbord.edit', $produc->id) }}"><button name='update'>تعديل</button></a>
                        </td>
                        <td>
                            <form action="{{ route('dachbord.destroy', $produc->id) }}" method="post">
                               @csrf
                               @method('delete')
                                <button name='delete' type="submit">حذف</button>
                            </form>
                        </td>

                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            @endif
        </tbody>
    </table>


</div>
@endsection
