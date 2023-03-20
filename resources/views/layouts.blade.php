<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    body {
        margin: 0;
        font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #858796;
        text-align: left;
        background-color: #fff;
    }

    footer {
        background-color: #ffffff;
        margin-top: 20px;
        padding: 20px;
    }

    .bg-gradient-primary {
        background-color: #4e73df;
        background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
        background-size: cover;
    }

    .btn-primary {
        color: #fff;
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #2e59d9;
        border-color: #2653d4;
    }

    .btn-primary:focus,
    .btn-primary.focus {
        color: #fff;
        background-color: #2e59d9;
        border-color: #2653d4;
        box-shadow: 0 0 0 0.2rem rgba(105, 136, 228, 0.5);
    }

    .btn-primary.disabled,
    .btn-primary:disabled {
        color: #fff;
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .btn-primary:not(:disabled):not(.disabled):active,
    .btn-primary:not(:disabled):not(.disabled).active,
    .show>.btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #2653d4;
        border-color: #244ec9;
    }

    .btn-primary:not(:disabled):not(.disabled):active:focus,
    .btn-primary:not(:disabled):not(.disabled).active:focus,
    .show>.btn-primary.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(105, 136, 228, 0.5);
    }

    .btn-success {
        color: #fff;
        background-color: #1cc88a;
        border-color: #1cc88a;
    }

    .btn-success:hover {
        color: #fff;
        background-color: #17a673;
        border-color: #169b6b;
    }

    .btn-success:focus,
    .btn-success.focus {
        color: #fff;
        background-color: #17a673;
        border-color: #169b6b;
        box-shadow: 0 0 0 0.2rem rgba(62, 208, 156, 0.5);
    }

    .btn-success.disabled,
    .btn-success:disabled {
        color: #fff;
        background-color: #1cc88a;
        border-color: #1cc88a;
    }

    .btn-success:not(:disabled):not(.disabled):active,
    .btn-success:not(:disabled):not(.disabled).active,
    .show>.btn-success.dropdown-toggle {
        color: #fff;
        background-color: #169b6b;
        border-color: #149063;
    }

    .btn-success:not(:disabled):not(.disabled):active:focus,
    .btn-success:not(:disabled):not(.disabled).active:focus,
    .show>.btn-success.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(62, 208, 156, 0.5);
    }

    .btn-danger {
        color: #fff;
        background-color: #e74a3b;
        border-color: #e74a3b;
    }

    .btn-danger:hover {
        color: #fff;
        background-color: #e02d1b;
        border-color: #d52a1a;
    }

    .btn-danger:focus,
    .btn-danger.focus {
        color: #fff;
        background-color: #e02d1b;
        border-color: #d52a1a;
        box-shadow: 0 0 0 0.2rem rgba(235, 101, 88, 0.5);
    }

    .btn-danger.disabled,
    .btn-danger:disabled {
        color: #fff;
        background-color: #e74a3b;
        border-color: #e74a3b;
    }

    .btn-danger:not(:disabled):not(.disabled):active,
    .btn-danger:not(:disabled):not(.disabled).active,
    .show>.btn-danger.dropdown-toggle {
        color: #fff;
        background-color: #d52a1a;
        border-color: #ca2819;
    }

    .btn-danger:not(:disabled):not(.disabled):active:focus,
    .btn-danger:not(:disabled):not(.disabled).active:focus,
    .show>.btn-danger.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(235, 101, 88, 0.5);
    }

    .pagination {
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: 0.35rem;
    }

    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #4e73df;
        background-color: #fff;
        border: 1px solid #dddfeb;
    }

    .page-link:hover {
        z-index: 2;
        color: #224abe;
        text-decoration: none;
        background-color: #eaecf4;
        border-color: #dddfeb;
    }

    .page-link:focus {
        z-index: 3;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .page-item:first-child .page-link {
        margin-left: 0;
        border-top-left-radius: 0.35rem;
        border-bottom-left-radius: 0.35rem;
    }

    .page-item:last-child .page-link {
        border-top-right-radius: 0.35rem;
        border-bottom-right-radius: 0.35rem;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .page-item.disabled .page-link {
        color: #858796;
        pointer-events: none;
        cursor: auto;
        background-color: #fff;
        border-color: #dddfeb;
    }

    .pagination-lg .page-link {
        padding: 0.75rem 1.5rem;
        font-size: 1.25rem;
        line-height: 1.5;
    }

    .pagination-lg .page-item:first-child .page-link {
        border-top-left-radius: 0.3rem;
        border-bottom-left-radius: 0.3rem;
    }

    .pagination-lg .page-item:last-child .page-link {
        border-top-right-radius: 0.3rem;
        border-bottom-right-radius: 0.3rem;
    }

    .pagination-sm .page-link {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
    }

    .pagination-sm .page-item:first-child .page-link {
        border-top-left-radius: 0.2rem;
        border-bottom-left-radius: 0.2rem;
    }

    .pagination-sm .page-item:last-child .page-link {
        border-top-right-radius: 0.2rem;
        border-bottom-right-radius: 0.2rem;
    }

    @yield('style');
</style>

<body class="bg-gradient-primary">
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>
<footer>
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto text-center">
                <span class="text-muted">© 2023 by Pandora Studio's. Proudly created with Laravel.</span>
            </div>
        </div>
    </div>
</footer>

</html>
