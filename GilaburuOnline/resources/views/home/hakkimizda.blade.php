
<!DOCTYPE html>
<html>
   <head>

    @include('home.css')
    <title>Hakkımızda</title>
      
    @include('home.whatsapp')


   </head>
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">          
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  
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
                               <li class="nav-item dropdown active">
                                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" 
                                   role="button" aria-haspopup="true" aria-expanded="true"> 
                                   <span class="nav-label">Sayfalar <span class="caret"></span></a>
                                   <ul class="dropdown-menu">
                                      <li><a href="{{route('hakkimizda')}}">Hakkımızda</a></li>
                                      <li><a href="{{route('yorumlar')}}">Yorumlar</a></li>
                                   </ul>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" href="{{route('urunler')}}">Ürünler</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" href="{{route('neden-biz')}}">Neden Biz</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" href="{{route('iletisim')}}">İletişim</a>
                                </li>
                 
                                <li class="nav-item">
                                   <a class="nav-link" href="{{route('sepetim')}}">Sepetim</a>
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
                     <h3>Hakkımızda</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      <!-- arrival section -->
      <section class="arrival_section">
         <div class="container">
            <div class="box">
               <div class="arrival_bg_box">
                  <img src="images/arrival-bg.png" alt="">
               </div>
               <div class="row">
                  <div class="col-md-6 ml-auto">
                     <div class="heading_container remove_line_bt">
                        <h2>
                           GİLABURUNUN ADRESİ
                        </h2>
                     </div>
                     <p style="margin-top: 20px;margin-bottom: 30px;">
                        İç anadolu bölgesinin, Kayseri Gürpınar köyünde yetiştirdiğimiz gilaburu meyvelerimizle sizlere hizmet vermekteyiz. 
                        Ürünlerimiz 100% doğal olmakla birlikte, bahçemizi görmek isteyen herkesi köyümüze bekleriz.
                     </p>
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end arrival section -->
      <!-- footer section -->
      <footer class="footer_section">
         <div class="container">
            <div class="row">
               <div class="col-md-4 footer-col">
                  <div class="footer_contact">
                     <h4>
                        Bize Ulaşın
                     </h4>
                     <div class="contact_link_box">
                        <a href="https://goo.gl/maps/ru1Qr9ScA4TBjQUs7">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>
                        Melikgazi / Kayseri <br><br>
                        Gürpınar
                        </span>
                        </a>
                        <a>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>
                        Bizi arayın 0538 887 97 38
                        </span>
                        </a>
                        <a>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                        kundaksizbayram@gmail.com
                        </span>
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
                     &copy; <span id="displayYear"></span> Gilaburunun Doğru Adresi ->
                     <a href="https://gilaburu.online">gilaburu.online</a>
                  </p>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer section -->
      <!-- jQery -->
      <script src="{{asset("home/js/jquery-3.4.1.min.js")}}"></script>
      <!-- popper js -->
      <script src="{{asset("home/js/popper.min.js")}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset("home/js/bootstrap.js")}}"></script>
      <!-- custom js -->
      <script src="{{asset("home/js/custom.js")}}"></script>
   </body>
</html>