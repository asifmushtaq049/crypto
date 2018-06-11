<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CRYPTO-ONE</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('front/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('front/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('front/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('front/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">

@yield('css')
  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="fa fa-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links float-right">
        <!-- <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
        @guest
        <a href="/login" class="linkedin">Login</a>
        <a href="/register" class="linkedin">Register</a>
        @endguest
      </div>
      <form action="/search" style="margin-top:20px; display:block;" class="clear" method="get">
        <div class="input-group">
          <input name="search" class="form-control border-secondary py-2" type="search" placeholder="What you are looking for?">
          <select name="type">
              <option>Posts</option>
              <option>Wallets</option>
              <option>Companies</option>
              <option>Equipments</option>
          </select>
          <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">
                  <i class="fa fa-search"></i>
              </button>
          </div>
      </div>
    </form>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="/" class="scrollto">CRYPTO<span>ONE</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->

      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu"><a href="/">HOME</a></li>
          <li class="menu-has-children"><a href="#about">PREDICTION</a>
            <ul>
              <li><a href="/posts">POSTS</a></li>
              <li><a href="/posts/create">CREATE A POST</a></li>
              <li><a href="/blog">BLOG</a></li>
            </ul></li>
          <li class="menu-has-children"><a href="#services">MINING</a>
            <ul>
              <li><a href="/mining/calculator">MINING CALCULATOR</a></li>
              <li><a href="/mining/equipment">MINING EQUIPMENT</a></li>
              <li><a href="/mining/company">MINING COMPANIES</a></li>
            </ul></li>
          <li class="menu-has-children"><a href="/wallet">WALLETS</a>
            <ul>
              <li><a href="/wallet/top-rated">TOP RATED WALLETS</a></li>
            </ul></li>
          <!-- <li class="menu-has-children"><a href="#team">ANALYSIS</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          @auth
          <li class="menu-has-children btn btn-primary profile-top-menu"><a href="#" class="text-light">{{ Auth::user()->name }}</a>
            <ul>
              <li><a href="/profile">Profile</a></li>
              <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
          @endauth
        </ul>
      </nav><!-- #nav-menu-container -->

  </div>

  </header><!-- #header -->
  @yield("slider")
  <main id="main">
@yield("main")
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>CRYPTO ONE</strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('front/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('front/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('front/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('front/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('front/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('front/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('front/lib/magnific-popup/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('front/lib/sticky/sticky.js') }}"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->
  <!-- Contact Form JavaScript File -->

  <!-- Template Main Javascript File -->
  <script src="{{ asset('front/js/main.js') }}"></script>

  @yield('script')

</body>
</html>
