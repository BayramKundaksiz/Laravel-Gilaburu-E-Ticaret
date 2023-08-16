<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">


    @include('admin.css')

    <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }

        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color
        {
            color:black;
            padding-bottom: 20px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }

        .div_design
        {
            padding-bottom: 15px;
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

                <div class="div_center">

                    <h1 class="font_size">Add Product</h1>

                    <form action="{{route('update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">

                        @csrf

                    <div class="div_design">
                        <label>Ürün Başlığı :</label>
                        <input class="text_color" type="text" name="title" placeholder="Lütfen Başlık Yazınız" required="" 
                        value="{{$product->title}}">
                    </div>

                    <div class="div_design">
                        <label>Ürün Açıklaması :</label>
                        <textarea class="text_color" type ="text" name="description" cols="40" rows="5" required="">{{$product->description}}</textarea>
                    </div>

                    <div class="div_design">
                        <label>Ürün Ücreti :</label>
                        <input class="text_color" type="number" name="price" placeholder="Lütfen ücret Yazınız" required="" 
                        value="{{$product->price}}">
                    </div>

                    <div class="div_design">
                        <label>Discount Price :</label>
                        <input class="text_color" type="number" name="dis_price" placeholder="Lütfen discount price Yazınız" 
                        value="{{$product->discount_price}}">
                    </div>

                    <div class="div_design">
                        <label>Ürün Kalitesi :</label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="Lütfen quantity Yazınız" required="" 
                        value="{{$product->quantity}}">
                    </div>

                   

                    <div class="div_design">
                        <label>Ürün Kategorisi :</label>
                        <select class="text_color" name="category" required="">
                            @foreach ($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <label>Eski Fotoğrafı :</label>
                        <img style="margin:auto" height="100" width="100" src="/product/{{$product->image}}" alt="">
                    </div>


                    <div class="div_design">
                        <label>Ürün Fotoğrafı Değiştir :</label>
                        <input type="file" name="image">
                    </div>


                    <div class="div_design">
                        
                        <input type="submit" value="Güncelle" class="btn btn-primary">
                    </div>

                </form>
                    

                </div>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>