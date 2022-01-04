<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
        <meta name="generator" content="Hugo 0.83.1" />
        <title><?= !empty($title) ? "$title - 禾酒林" : '禾酒林 - 後臺管理首頁' ?></title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/" />
        <!-- Bootstrap core CSS -->
        <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
        <style>
            ::selection {
                background: gray;
                color: #fff;
            }
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
            .navbar-nav .nav-link {
                text-align: right;
            }
            .btn-toggle-nav a {
                display: inline-flex;
                padding: 0.1875rem 0.5rem;
                margin-top: 0.125rem;
                margin-left: 1.25rem;
                text-decoration: none;
            }
            .btn:focus {
                box-shadow: none;
            }
            .rounded {
                border-radius: 0.25rem !important;
            }
            .link-dark {
                color: #212529;
            }
            .btn-toggle {
                display: inline-flex;
                align-items: center;
                padding: 0.25rem 1rem;
                font-weight: 600;
                color: rgba(0, 0, 0, 0.65);
                background-color: transparent;
                border: 0;
            }
            ul li button i {
                margin-right: 0.5rem;
            }
            th a .fas {
                color: #333;
                transition: 0.1s;
            }
            th a .fas:hover {
                color: #888;
            }
            td .fas {
                color: #999;
            }
            .btn-group-sm > .btn,
            .btn-sm {
                height: 2.2rem;
            }
            .page-item.active .page-link {
                background-color: #888;
                border-color: #888;
            }
            .page-item.active .page-link a {
                color: #fff !important;
            }
            .page-item a {
                color: #888;
            }
            .page-item a:focus {
                color: #333;
            }
            .page-item a:hover {
                color: #333;
            }
            .page-link:focus {
                box-shadow: 0 0 0 0.25rem rgba(88, 88, 88, 0.25);
            }

            input[type='checkbox'] {
                cursor: pointer;
            }
            .form-control:focus {
                box-shadow: 0 0 0 0.25rem rgba(88, 88, 88, 0.25) !important;
                border-color: #ccc;
            }
            .card h5 {
                font-weight: 600;
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="parts/dashboard.css" rel="stylesheet" />
    </head>
</html>
