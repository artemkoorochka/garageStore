
<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Artem Koorochka">
    <title>@yield("title")</title>


    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        main > .container {
            padding: 60px 15px 0;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Garage Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}">Admin products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.store')}}">Admin categories</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        API for the main entities
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('rest.products')}}" target="_blank">Rest products</a></li>
                        <li><a class="dropdown-item" href="{{route('rest.categories')}}" target="_blank">Rest categories</a></li>
                    </ul>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="https://github.com/artemkoorochka/garageStore">View on Github</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">@yield("title")</h1>
        @if(session('info'))
            <div class="alert alert-info">{{session('info')}}</div>
        @endisset

        <div class="row">
            <div class="col-lg-auto">@yield("menu_categories")</div>
            <div class="col-lg">@yield("content")</div>
        </div>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted"> Test task PHP Developer &copy; 2022 </span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
