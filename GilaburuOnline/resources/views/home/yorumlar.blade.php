<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      
      @include('home.css')

      <title>Yorumlar</title>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      @include('home.whatsapp')

   </head>
   <body>
      
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
      <!-- why section -->
     
      <!-- end why section -->
      
      <!-- arrival section -->
      
      <!-- end arrival section -->
      
      <!-- product section -->
      
      <!-- end product section -->

      {{-- Yorum başlangıç yeri --}}

      <div style="text-align: center; padding-bottom: 30px;">

         <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">

            Yorumlar

         </h1>

         <form action="{{route('add_comment')}}" method="POST">

            @csrf

            <textarea style="height: 150px; width: 600px;" name="comment" placeholder="Lütfen yorumunuzu yazınız" name="" id="" cols="30" rows="10"></textarea>
            <br>
            
            <input type="submit" class="btn btn-primary" value="Comment">

         </form>

      </div>


      <div style="padding-left: 20%;">


         <h1 style="font-size: 20px; padding-bottom: 20px;"> Bütün Yorumlar </h1>

         @foreach ($comment as $comment)
             
         <div>

            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>

            <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

            @foreach ($reply as $rep)          
            
            @if($rep->comment_id==$comment->id)

            <div style="padding-left: 3%; padding-bottom:10px; padding-bottom: 10px;">
            
               <b>{{$rep->name}}</b>
               <p>{{$rep->reply}}</p>
               <a style="color:blue;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

            </div>

            @endif

            @endforeach

         </div>

         
         @endforeach

         {{-- Reply text --}}

         <div style="display: none;" class="replyDiv">

            <form action="{{route('add_reply')}}" method="POST">

               @csrf

            <input type="text" id="commentId" name="commentId" hidden="">
            <textarea style="height: 100px; width: 500px;" name="reply" placeholder="Bir şeyler yaz"></textarea>
   
            <br>

            

            <button type="submit" class="btn btn-warning">Reply</button>

            <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Close</a>

         </form>
   
         </div>

      </div>

      

      {{-- Yorum bitiş yeri --}}

      <!-- subscribe section -->
      
      <!-- end subscribe section -->
      <!-- client section -->
      
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2023 <a href="http://gilaburu.online/"> Gilaburu.online</a></p>
      </div>

      <script type="text/javascript">
      
      function reply(caller)
      {

         document.getElementById('commentId').value=$(caller).attr('data-Commentid');

         $('.replyDiv').insertAfter($(caller));

         $('.replyDiv').show();
      }

      function reply_close(caller)
      {
         $('.replyDiv').hide();
      }
      
      </script>

      <script>
         document.addEventListener("DOMContentLoaded", function(event) { 
       var scrollpos = localStorage.getItem('scrollpos');
       if (scrollpos) window.scrollTo(0, scrollpos);
         });

         window.onbeforeunload = function(e) {
       localStorage.setItem('scrollpos', window.scrollY);
         };
      </script>


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