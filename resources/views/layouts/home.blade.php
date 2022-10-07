<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Yumeal</title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8" />
  <meta name="keywords"
    content="Snacks Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

{{-- 可選擇是否要繼承的style部份 --}}
@section('style_filterDiv')
<style>
    .filterDiv {
      float: left;
      background-color: #2196F3;
      color: #ffffff;
      width: 100px;
      line-height: 100px;
      text-align: center;
      margin: 2px;
      display: none;
    }
</style>
@show

@section('style_show')
<style>
    .show {
      display: block;
    }
</style>
@show

@section('style_container')
<style>
    .container {
      margin-top: 20px;
      overflow: hidden;
    }
</style>
@show

@section('style_btn')
<style>
    /* Style the buttons */
    .btn {
      border: none;
      outline: none;
      padding: 12px 16px;
      background-color: #f1f1f1;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #ddd;
    }

    .btn.active {
      background-color: #666;
      color: white;
    }
</style>
@show

  <!--// Meta tag Keywords -->

  <!-- Custom-Files -->
  {{-- 將以下全部原模板的css & js & image檔案路徑都改成laravel專案的路徑assets --}}
  <!-- jack0708 update to BS5 -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <!-- BS5.2 CSS only -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Bootstrap-Core-CSS -->
  {{-- <link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" /> --}}
  <link href="{{ asset('assets/css/smoothbox.css') }}" rel="stylesheet">

  <!-- gallery light box -->
  {{-- <link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> --}}
  <link href="{{ asset('assets/css/style-food.css') }}" rel="stylesheet">

  <!-- Style-CSS -->
  {{-- <link rel="stylesheet" href="css/fontawesome-all.css"> --}}
  <link href="{{ asset('assets/css/fontawesome-all.css') }}" rel="stylesheet">

  <!-- Font-Awesome-Icons-CSS -->
  <!-- //Custom-Files -->

  <!-- Web-Fonts -->
  <!-- <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
    rel="stylesheet">
  <link
    href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext"
    rel="stylesheet"> -->
  <!-- //Web-Fonts -->

</head>

<body>
  <!-- header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light py-4">
      <div class="container">
        <h1>
          <a class="navbar-brand" href="#about">
            {{-- <i class="fas fa-utensils"></i> --}}
            Yumeal
          </a>
        </h1>
        <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mx-auto text-center">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link scroll" href="#about">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
              <div class="dropdown-menu text-lg-left text-center" aria-labelledby="navbarDropdown">
                <a class="dropdown-item scroll" href="#services">Services</a>
                <a class="dropdown-item scroll" href="#specials">Specials</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item scroll" href="#gallery">Gallery</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link scroll" href="#contact">Contact Us</a>
            </li>
          </ul>
          <div class="forms-w3ls-agilesm text-center mt-lg-0 mt-4">
            <ul>
                @auth
              <li class="login-list-w3ls d-inline border-right pr-3 mr-3">
                {{-- <a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1">Dashboard</a> --}}
                <a href="{{ url('/dashboard') }}" class="text-white">管理</a>
                {{-- <a href="{{ url('/logout') }}" class="text-white">登出</a> --}}
              </li>
              @else
              <li class="login-list-w3ls d-inline border-right pr-3 mr-3">
                {{-- <a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1">Login</a> --}}
                <a href="{{ url('/login') }}" class="text-white">登入</a>
              </li>
              @if (Route::has('register'))
              <li class="login-list-w3ls d-inline">
                {{-- <a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2">Register</a> --}}
                <a href="{{ url('/register') }}" class="text-white">註冊</a>
              </li>
              @endif
              @endauth
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- login -->
  <!-- jack0708 update to BS5 -->
  <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            {{-- <span aria-hidden="true">&times;</span> --}}
          </button>
        </div>
        <div class="modal-body">
          <div class="login px-sm-4 mx-auto mw-100">
            <h5 class="text-center mb-4">Login Now</h5>
            <form action="#" method="post">
              <div class="form-group">
                <label>Your Name</label>
                <input type="text" class="form-control" name="name" placeholder="" required="">
              </div>
              <div class="form-group">
                <label class="mb-2">Password</label>
                <input type="password" class="form-control" name="password" placeholder="" required="">
              </div>
              <button type="submit" class="btn btn-primary submit mb-4">Login</button>
              <p class="text-center pb-4">
                <a href="#">Forgot your password?</a>
              </p>
              <p class="text-center pb-4 create-w3ls">
                Don't have an account?
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter2">Create one now</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- //login -->
  <!-- register -->
  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="login px-sm-4 mx-auto mw-100">
            <h5 class="text-center mb-4">Register Now</h5>
            <form action="#" method="post">
              <div class="form-group">
                <label>Your Name</label>
                <input type="text" class="form-control" name="name" placeholder="" required="">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="" required="">
              </div>
              <div class="form-group">
                <label class="mb-2">Password</label>
                <input type="password" class="form-control" name="password" id="password1" placeholder="" required="">
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password" id="password2" placeholder="" required="">
              </div>
              <button type="submit" class="btn btn-primary submit mb-4">Register</button>
              <p class="text-center pb-4">
                <a href="#">By clicking Register, I agree to your terms</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- //register -->
  <!-- //header -->



@yield('content')

@yield('footer')

  <!-- footer -->
  <footer class="pt-5">
    <div class="container py-xl-5 py-lg-3">
      <div class="row footer-grids py-4">
        <div class="col-lg-4 footer-grid text-left">
          <div class="footer-logo">
            <h2 class="mb-3">
              <a class="logo text-white" href="index.html">
                <i class="fas fa-utensils mr-2"></i>Snacks</a>
            </h2>
          </div>
        </div>
        <div class="col-lg-2 col-6  footer-grid my-lg-0 my-4">
          <h3 class="mb-sm-4 mb-3 pb-3">Home</h3>
          <ul class="list-unstyled">
            <li>
              <a href="index.html">Index</a>
            </li>
            <li class="my-2">
              <a class="scroll" href="#about">About</a>
            </li>
            <li>
              <a class="scroll" href="#services">Services</a>
            </li>
            <li class="my-2">
              <a class="scroll" href="#gallery">Gallery</a>
            </li>
            <li>
              <a class="scroll" href="#contact">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2 col-6 footer-grid my-lg-0 my-4">
          <h3 class="mb-sm-4 mb-3 pb-3"> Navigation </h3>
          <ul class="list-unstyled">
            <li>
              <a class="scroll" href="#services">Advantages</a>
            </li>
            <li class="my-2">
              <a class="scroll" href="#specials">Specials</a>
            </li>
            <li>
              <a class="scroll" href="#some">Some More</a>
            </li>
            <li class="my-2">
              <a class="scroll" href="#gallery">Gallery</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2 col-6 footer-grid">
          <h3 class="mb-sm-4 mb-3 pb-3"> Company</h3>
          <ul class="list-unstyled">
            <li>
              <a href="#">Link Here</a>
            </li>
            <li class="my-2">
              <a href="#">Link Here</a>
            </li>
            <li>
              <a href="#">Link Here</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2 col-6 footer-grid footer-contact">
          <h3 class="mb-sm-4 mb-3 pb-3"> Contact Us</h3>
          <ul class="list-unstyled">
            <li>
              +01(24) 8543 8088
            </li>
            <li class="mt-2">
              <a href="mailto:info@example.com">info@example.com</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- copyright -->
    <div class="copy_right">
      <p class="text-center text-white py-sm-4 py-3">© 2018 Snacks. All rights reserved | Design by
        <a href="http://w3layouts.com/">W3layouts</a>
      </p>

    </div>
    <!-- //copyright -->
  </footer>
  <!-- //footer -->


  <!-- Js files -->
  <!-- JavaScript -->
@section('js_jquery')
  {{-- <script src="js/jquery-2.2.3.min.js"></script> --}}
  <script src="{{ asset('assets/js/jquery-2.2.3.min.js') }}"></script>
  <!-- Default-JavaScript-File -->
@show

@section('js_banner')
  <!-- banner slider -->
  {{-- <script src="js/responsiveslides.min.js"></script> --}}
  <script src="{{ asset('assets/js/responsiveslides.min.js') }}"></script>


  <script>
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 4
      $("#slider3").responsiveSlides({
        auto: true,
        pager: true,
        nav: false,
        speed: 500,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });

    });
  </script>
  <!-- //banner slider -->
  @show

  @section('js_password')
  <!-- password-script -->
  <script>
    window.onload = function () {
      console.log("start");
      document.getElementById("password1").onchange = validatePassword;
      document.getElementById("password2").onchange = validatePassword;
      console.log("password1");
    }

    function validatePassword() {
      console.log("validate start");
      var pass2 = document.getElementById("password2").value;
      var pass1 = document.getElementById("password1").value;
      console.log(pass1);
      if (pass1 != pass2)
        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
      else
        document.getElementById("password2").setCustomValidity('');
      //empty string means no validation error
    }
  </script>
  <!-- //password-script -->
@show

@section('js_gallery')
  <!-- gallery light box -->
  {{-- <script src="js/smoothbox.jquery2.js"></script> --}}
  <script src="{{ asset('assets/js/smoothbox.jquery2.js') }}"></script>
  <!-- //gallery light box -->
@show

@section('js_scrolling')
  <!-- smooth scrolling -->
  {{-- <script src="js/SmoothScroll.min.js"></script> --}}
  <script src="{{ asset('assets/js/SmoothScroll.min.js') }}"></script>
  <!-- //smooth scrolling -->
@show

@section('js_moveTop')
  <!-- move-top -->
  {{-- <script src="js/move-top.js"></script> --}}
  <script src="{{ asset('assets/js/move-top.js') }}"></script>
@show

@section('js_easing')
  <!-- easing -->
  {{-- <script src="js/easing.js"></script> --}}
  <script src="{{ asset('assets/js/easing.js') }}"></script>
@show

@section('js_snacks')
  <!--  necessary snippets for few javascript files -->
  {{-- <script src="js/snacks.js"></script> --}}
  <script src="{{ asset('assets/js/snacks.js') }}"></script>
@show

  <!-- jack0708 update to BS5 -->
  <!-- <script src="js/bootstrap.js"></script> -->
  <!-- Necessary-JavaScript-File-For-Bootstrap -->
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <!-- //Js files -->

</body>

</html>

