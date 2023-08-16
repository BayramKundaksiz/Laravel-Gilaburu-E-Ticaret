<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">

      .center
      {
        margin: auto;
        width: 50%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
      }

      .font_size
      {
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
      }

      .img_size
      {
        width: 150px;
        height: 150px;
      }

      .th_color
      {
        background: skyblue;
      }

      .th_deg
      {
        padding: 30px;
      }

    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            @if (session()->has('message'))
                    
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}

                </div>

                @endif

                @if (count($product)==0)

              <h1 class="center" style="font-size: 40px">Ekli Ürün yok</h1>

              @endif

                
            

            @if (count($product)>0)

            <h2 class="font_size">Bütün Ürünler</h2>
            <table class="center">

              <tr class="th_color">
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Description</th>
                <th class="th_deg">Quaintity</th>
                <th class="th_deg">Category</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Discount Price</th>
                <th class="th_deg">Product İmage</th>
                <th class="th_deg">Delete</th>
                <th class="th_deg">Edit</th>
              </tr>

              @endif

              


              
              @foreach ($product as $product)
            
              <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->descripton}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->discount_price}}</td>
                <td>

                  <img class="img_size" src="/product/{{$product->image}}">

                </td>

                <td>
                  <a class="btn btn-danger" onclick="return confirm('{{$product->where('id',$product->id)->select('title')->get()}} Silmek istediğinizden emin misiniz')" href="{{route('delete_product',$product->id)}}">Delete</a>
                </td>
                <td>
                  <a class="btn btn-success" href="{{route('update_product', $product->id)}}">Edit</a>
                </td>
              </tr>
                  
              @endforeach

            </table>

           

            
            

          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>