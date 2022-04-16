@extends("template")

@section("title")
    Catalog
@endsection

@section("content")
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

        @foreach($products as $product)
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-repeat: no-repeat; background-image: url('https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                    <a href="#" class="text-white-50 text-decoration-none text-center pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                        {{$product->name}}
                    </a>
                    <ul class="list-unstyled mt-auto">

                        <li class="text-secondary">
                            <small>Section name</small>
                        </li>
                        <li class="text-secondary">
                            <small>Section name</small>
                        </li>
                        <li class="text-secondary">
                            <small>Section name</small>
                        </li>

                        <li class="mt-3 me-auto d-flex align-items-baseline">
                            <div class="display-6 me-auto">{{$product->price}} {{$product->currency}}</div>
                            <a href="#" class="btn btn-outline-danger">Купить</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection
