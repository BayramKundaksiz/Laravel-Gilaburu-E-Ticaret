<!DOCTYPE html>
<html>
   <head>

    <base href="/public">
      <!-- Basic -->
      
      
      @include('home.css')

      <title>Neden Biz</title>


      <style>

         .yatay_konum
         {
            width:800px; 
            
         }

      </style>


   </head>
   <body>
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

      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px">
            <div class="img-box" style="padding: 20px">
               <img src="product/{{$product->image}}" alt="">
            </div>
            <div class="detail-box">
               <h5>
                 {{$product->title}}
               </h5>

               @if ($product->discount_price!=null)

               <h6 style="color: red">
                 İndirimli Fiyat
                 <br>
                 ₺{{$product->discount_price}}
               </h6>

               <h6 style="text-decoration: line-through; color: blue">
                 Fiyat
                 <br>
                 ₺{{$product->price}}
               </h6>

               @else

               <h6 style="color: blue">
                 ₺{{$product->price}}
               </h6>
         
               @endif

               <h6>Ürün Kategorisi: {{$product->category}}</h6>

               <div class="yatay_konum">

                  <h6>Ürün Açıklaması: {{$product->description}}</h6>
               </div>
               

               <h6>Stok : {{$product->quantity}}</h6>

               <form action="{{route('add_cart', $product->id)}}" method="POST">

                  @csrf

                  <div class="row">

                     <div class="col-md-4">

                        <input type="number" name="quantity" value="1" min="1" style="width: 100px">

                     </div>

                     <div class="col-md-4">

                        <input type="submit" value="Ekle"> 

                     </div>
                            
                  
               </div>

                </form>



            </div>
         </div>
      </div>
     
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a></p>
      </div>
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