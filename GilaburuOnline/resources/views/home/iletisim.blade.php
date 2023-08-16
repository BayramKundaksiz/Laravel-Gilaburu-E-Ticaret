<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      
      @include('home.css')
      
      <title>İletişim</title>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
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
                               <li class="nav-item dropdown">
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
                                <li class="nav-item active">
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
                     <h3>İLETİŞİM</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form action="index.html">
                        <fieldset>
                           <input type="text" placeholder="Lütfen ad-soyad yazınız" name="name" required />
                           <input type="email" placeholder="E-posta adresiniz" name="email" required />
                           <input type="text" placeholder="Konu" name="subject" required />
                           <textarea placeholder="Mesajınızı yazınız" required></textarea>
                           <input type="submit" value="Gönder" />
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end why section -->
      <!-- arrival section -->
      
      <!-- end arrival section -->
      <!-- footer section -->
      @include('home.footer')
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