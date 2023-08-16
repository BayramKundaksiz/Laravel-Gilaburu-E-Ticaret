<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color
        {
            color: black;
        }

        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
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
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{route('add_category')}}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="category" placeholder="Write Category Name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </form>

                </div>

                <table class="center">

                    <tr>
                        <td>Sıra No</td>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>

                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->category_name}}</td>
                        <td>
                            <div>                              
                               <a onclick="return confirm('Silmek istediğinden emin misin ?')" class="btn btn-danger" href="{{ route('delete_category',$data->id)}}">Delete</a>
                               </form>
                            </div>
                            
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