<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Job Pulse</title>

    <!-- index Css Start -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/style.css') }}">
    <!-- index Css End -->

    <!-- Nav And Footer Css start  -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/nav.css') }}">
    <!-- Nav And Footer Css end  -->

    <!-- abouts Css Start -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/about.css') }}">
    <!-- abouts Css End -->

    <!-- sing up Css Start -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/sing-up.css') }}">
    <!-- sing up Css End -->

    {{-- login css start  --}}
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/loging.css') }}">
    {{-- login css end  --}}

    <!-- popap Css Start -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/popap.css') }}">
    <!-- popap Css End -->

    <!-- Blog Css Start -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/blog.css') }}">
    <!-- Blog Css End -->

    <!-- job Css Start -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/job.css') }}">
    <!-- job Css End -->

    <!-- contact Css Start -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/contact.css') }}">
    <!-- contact Css End -->

    <!-- Bootstrap Css Link Start -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/bootstrap/bootstrap.min.css') }}">
    <!-- Bootstrap Css Link End -->




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


    <!-- Font Awesome Ctn Start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome Ctn End -->
    <!-- Add this script tag to include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Axios start  -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <!-- Axios end  -->

</head>

<body>
<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>



    <div>
        @yield('content')
    </div>


    <!-- Popap js Link Start -->
    <script src="{{ asset('front-end/assets/js/popap.js') }}"></script>
    <!-- Popap js Link End -->

    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>

    <!-- Js link Start -->
    <script src="{{ asset('front-end/assets/js/tab.js') }}"></script>
    <!-- Js link End -->

    <!-- Js Bootstrap Link  Start -->
    <script src="{{ asset('front-end/assets/css/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Js Bootstrap Link  End-->
</body>

</html>
