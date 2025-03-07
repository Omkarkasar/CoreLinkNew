<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        /* Updated background color */
        body.bg-gradient-primary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        }

        /* Card shadow & border */
        .card {
            border-radius: 12px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.15);
        }

        /* Form input fields */
        .form-control-user {
            border: 1px solid #d1d3e2;
            border-radius: 30px;
            padding: 12px 15px;
            font-size: 0.9rem;
        }

        /* Login button */
        .btn-user {
            background-color: #4e73df;
            border-color: #4e73df;
            font-weight: bold;
            border-radius: 30px;
        }

        .btn-user:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }

        /* Optional: Text color tweaks */
        .text-gray-900 {
            color: #333333 !important;
        }

        /* Error message */
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            border-radius: 6px;
            padding: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>

                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <form class="user" action="{{ route('loginuser') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user"
                                        placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                            </form>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>