
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/catalog" id="dropdown02" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown02">
                        <div class="dropdown dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layouts</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-layouts">

                                <div class="dropdown dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Custom</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                        <a class="dropdown-item" href="#">Fullscreen</a>
                                        <a class="dropdown-item" href="#">Empty</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Magic</a>
                                    </div>
                                </div>
                                <div class="dropdown dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Custom</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                        <a class="dropdown-item" href="#">Fullscreen</a>
                                        <a class="dropdown-item" href="#">Empty</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Magic</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Admin</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="https://github.com/dallaslu/bootstrap-5-multi-level-dropdown">View on Github</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">@yield("title")</h1>
        @yield("content")
    </div>
</main>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted"> Test task PHP Developer &copy; 2022 </span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    (function($bs) {
        const CLASS_NAME = 'has-child-dropdown-show';
        $bs.Dropdown.prototype.toggle = function(_orginal) {
            return function() {
                document.querySelectorAll('.' + CLASS_NAME).forEach(function(e) {
                    e.classList.remove(CLASS_NAME);
                });
                let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
                for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
                    dd.classList.add(CLASS_NAME);
                }
                return _orginal.call(this);
            }
        }($bs.Dropdown.prototype.toggle);

        document.querySelectorAll('.dropdown').forEach(function(dd) {
            dd.addEventListener('hide.bs.dropdown', function(e) {
                if (this.classList.contains(CLASS_NAME)) {
                    this.classList.remove(CLASS_NAME);
                    e.preventDefault();
                }
                e.stopPropagation(); // do not need pop in multi level mode
            });
        });

        // for hover
        document.querySelectorAll('.dropdown-hover, .dropdown-hover-all .dropdown').forEach(function(dd) {
            dd.addEventListener('mouseenter', function(e) {
                let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
                if (!toggle.classList.contains('show')) {
                    $bs.Dropdown.getOrCreateInstance(toggle).toggle();
                    dd.classList.add(CLASS_NAME);
                    $bs.Dropdown.clearMenus();
                }
            });
            dd.addEventListener('mouseleave', function(e) {
                let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
                if (toggle.classList.contains('show')) {
                    $bs.Dropdown.getOrCreateInstance(toggle).toggle();
                }
            });
        });
    })(bootstrap);

</script>
</body>
</html>
