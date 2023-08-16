
<!DOCTYPE html>
<html>
   <head>
      
      @include('home.css')

      <title>Ürünler</title>

   </head>
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{route('anasayfa')}}"><img width="250" src="images/gilaburu.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('anasayfa')}}">Anasayfa <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" 
                           role="button" aria-haspopup="true" aria-expanded="true"> 
                           <span class="nav-label">Sayfalar <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="{{route('hakkimizda')}}">Hakkımızda</a></li>
                              <li><a href="{{route('yorumlar')}}">Yorumlar</a></li>
                           </ul>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="{{route('urunler')}}">Ürünler</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('neden-biz')}}">Neden Biz</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('iletisim')}}">İLETİŞİM</a>
                        </li>
         
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('sepetim')}}">SEPETİM</a>
                        </li>
                        
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>
                        
         
                        @if (Route::has('login'))
                            @auth
                              <li class="nav-item">
                                 <form method="POST" action="{{ route('logout') }}" class="inline">
                                     @csrf
                                       <button type="submit" id="logincss" class="btn btn-primary">
                                  {{ __('Çıkış') }}
                                       </button>
                                 </form>
                              </li>
                        
                        @else
         
                        <li class="nav-item">
                           <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Giriş</a>
                        </li>
                        
                        <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Kaydol</a>
                        </li>
         
                        @endauth
         
                        @endif
         
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Ürün Tablomuz</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->
      <!-- footer section -->
      <footer class="footer_section">
         <div class="container">
            <div class="row">
               <div class="col-md-4 footer-col">
                  <div class="footer_contact">
                     <h4>
                        Reach at..
                     </h4>
                     <div class="contact_link_box">
                        <a href="">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>
                        Location
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>
                        Call +01 1234567890
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                        demo@gmail.com
                        </span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="footer_detail">
                     <a href="index.html" class="footer-logo">
                     Famms
                     </a>
                     <p>
                        Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
                     </p>
                     <div class="footer_social">
                        <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="map_container">
                     <div class="map">
                        <div id="googleMap"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-info">
               <div class="col-lg-7 mx-auto px-0">
                  <p>
                     &copy; <span id="displayYear"></span> All Rights Reserved By
                     <a href="https://html.design/">Free Html Templates</a>
                  </p>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer section -->
      <!-- jQery -->
      <script src="{{asset("js/jquery-3.4.1.min.js")}}"></script>
      <!-- popper js -->
      <script src="{{asset("js/popper.min.js")}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset("js/bootstrap.js")}}"></script>
      <!-- custom js -->
      <script src="{{asset("js/custom.js")}}"></script>
   </body>
</html>