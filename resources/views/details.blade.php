<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    @if ($is_category)
        <title>Prodotti</title>
    @else
        @forelse ($data as $product)
            <title>{{ $product['name'] }}</title>
        @empty
        @endforelse
    @endif
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">
            <a class="nav-link active" aria-current="page" href="/"><img src="/logo-1.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Homepage</a></li>
                    <li class="nav-item"><a class="nav-link" href="/products">Prodotti</a></li>
                    <li class="nav-item"><a class="nav-link" href="/map">Dove Siamo</a></li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-light text-dark ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    @if ($is_category)
        @foreach ($categories as $category)
            <header class="bg-dark position-relative">
                <div class="container-fluid p-0">
                    <img src="https://images.unsplash.com/photo-1458682625221-3a45f8a844c7?q=80&w=2748&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="w-100" height="300px">
                    <div class="text-center text-white position-absolute top-50 start-50 translate-middle">
                        <h1 class=" fw-bolder" style="text-shadow: 0px 0px 6px #000000;">
                            {{ ucfirst(str_replace('-', ' ', $category['slug'])) }}</h1>
                    </div>
                </div>
            </header>
        @endforeach

        <section>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    @forelse ($data as $product)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <img class="card-img-top"
                                    src="{{ $product['image'] ?? 'https://imgs.search.brave.com/wfsnB6LU7T8e4MZpxQXhJ_B7mkSwD6VNcxGwYC4vLtE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly80ZGRp/Zy50ZW5vcnNoYXJl/LmNvbS9pbWFnZXMv/cGhvdG8tcmVjb3Zl/cnkvaW1hZ2VzLW5v/dC1mb3VuZC5qcGc' }}"
                                    height="200" width="auto" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">{{ $product['name'] }}</h5>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p>€ {{ $product['price'] }}</p>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="btn-group">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                                href="/{{ $product['category'] }}/{{ strtolower(str_replace(' ', '-', $product['name'])) }}">View
                                                options</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Nothing to display</p>
                    @endforelse

                </div>
            </div>
        </section>
    @else
        @forelse ($data as $product)
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col text-center">
                        <h1>{{ str_replace('-', ' ', $product['name']) }}</h1>
                        <img src="{{ $product['image'] }}" class="py-2" style="height: 300px; width:auto">
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row align-items-center">
                    <div class="col-6 offset-3 ">
                        <form method="POST" action="/richiesta-informazioni">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success text-center animate__animated animate__fadeOut animate__slower"
                                    role="alert" style="animation-duration: 10s; ">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                <input type="name" class="form-control" value="{{ old('name') }}" name="name"
                                    id="exampleFormControlInput1" placeholder="Mario Rossi" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" value="{{ old('email') }}"
                                    name="email" id="exampleFormControlInput1" placeholder="name@example.com"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="10"
                                    placeholder="Put your text here" required>{{ old('text') }}</textarea>
                            </div>
                            <input type="hidden" name="item"
                                value="{{ ucfirst(str_replace('-', ' ', $product['name'])) }}">
                            <div class="py-3 text-center">
                                <button class="btn btn-secondary" type="submit">Invia</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    @endif
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
