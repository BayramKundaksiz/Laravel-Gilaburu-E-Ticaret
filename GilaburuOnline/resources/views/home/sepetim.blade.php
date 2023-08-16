<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      
      @include('home.css')

      <title>Sepetim</title>

      <style type="text/css">

        .center
        {
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;
        }

        table, th, td
        {
            border: 1px  solid grey;
        }

        .th_deg
        {
            font-size: 30px;
            padding: 5px;
            background: skyblue;
        }

        .img_deg
        {
            height: 200px;
            width: 200px;
        }

        .total_deg
        {
            font-size: 20px;
            padding: 40px;
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
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('urunler')}}">Ürünler</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('neden-biz')}}">Neden Biz</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('iletisim')}}">İLETİŞİM</a>
                        </li>
         
                        <li class="nav-item active">
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
         <!-- slider section -->
         
         <!-- end slider section -->
     
      <!-- why section -->
    
      <div class="center">

        <table>
            <tr>
                <th class="th_deg">Ürün Başlığı</th>
                <th class="th_deg">Ürün Adeti</th>
                <th class="th_deg">Ürün Ücreti</th>
                <th class="th_deg">Ürün Fotoğrafı</th>
                <th class="th_deg">İşlem Yap</th>
            </tr>

            <?php $totalprice=0; ?>

            @foreach ($cart as $cart)
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}} TL</td>
                <td><img class="img_deg" src="/product/{{$cart->image}}" alt=""></td>
                <td><a class ="btn btn-danger" onclick="return confirm('Ürünü silmek istediğinizden emin misiniz ?')" href="{{route('urun_sil', $cart->id)}}">Ürünü Sil</a></td>
            </tr>

            <?php $totalprice=$totalprice + $cart->price ?>

            @endforeach
            
        </table>

        <div>

            <h1 class="total_deg">Toplam Tutar : {{$totalprice}} TL</h1>

        </div>


        <div>

         <h1 style="font-size: 25px; padding-bottom: 15px;">Siparişe Devam Et</h1>

         <a href="{{route('kapida_ode')}}" class="btn btn-danger">Kapıda Öde</a>

         <a href="{{route('stripe',$totalprice)}}" class="btn btn-danger">Kartla Öde</a>

        </div>


      </div>
      <!-- footer start -->
      
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2023 <a href="http://gilaburu.online/"> Gilaburu.online</a></p>
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