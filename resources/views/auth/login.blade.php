<!doctype html>
<html class="no-js" lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>تسجيل الدخول | حزمة إدارة Laravel - رادمين</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">أنت تستخدم متصفحًا <strong>قديمًا</strong>. يرجى <a href="http://browsehappy.com/">ترقية المتصفح</a> لتحسين تجربتك.</p>
    <![endif]-->

    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100">
                <div class="col-xl-4 col-lg-4 col-md-4 m-auto">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="http://radmin.rakibhstu.com"><img height="60" src="{{ asset('img/logo.png') }}" alt="RADMIN"></a>
                        </div>
                        <p>مرحبًا بعودتك!</p>

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group position-relative">
                                <input id="email" type="email" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <i class="ik ik-user position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%);"></i>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group position-relative">
                                <input id="password" type="password" placeholder="كلمة المرور" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                <i class="ik ik-lock position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%);"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                        <span class="custom-control-label">&nbsp;تذكرني</span>
                                    </label>
                                </div>
                                <div class="col text-right">
                                    <a class="btn text-danger" href="{{ url('password/forget') }}">
                                        {{ __('هل نسيت كلمة المرور؟') }}
                                    </a>
                                </div>
                            </div>
                            <div class="sign-btn text-center">
                                <button class="btn btn-custom">تسجيل الدخول</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('src/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('plugins/screenfull/dist/screenfull.js') }}"></script>

</body>
</html>
