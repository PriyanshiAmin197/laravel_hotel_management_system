<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        label
        {
            display: inline-block;
            width: 200px;
        }

        .div_deg
        {
            padding-top: 35px;
        }

        .div_center
        {
            padding-top: 20px;
        }

    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

        <h1 style="font-size:30px; font-weight:bold; margin-bottom:13px; color:white;">Gallary</h1>

        <div class="row" >
        @foreach($gallary as $gallary)
            <div class="col-md-4" style="margin-top:24px;">    
                <img style="height:200px !important; width:300px !important" src="gallary//{{ $gallary->image }}" alt="">

                <a href="{{ url('delete_gallary', $gallary->id)}}" class="btn btn-danger" style="margin-top:10px;">Delete Image</a>
            </div>
        @endforeach
        </div>

                    <div style="margin-top:20px;">
                       @if(session()->has('message'))
                       <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">
                           x
                        </button>
                        {{ session()->get('message') }}
                        </div>
                       @endif
                    </div>

        <form action="{{ url('upload_gallary') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="div_deg">
                <label for="">Upload Image</label>
                    <input type="file" name="image">
            </div>

            <div class="div_deg">
                <input class="btn btn-success" type="submit" value="Add Image">
            </div>

        </form>

        </div>
    </div>
    </div>
    @include('admin.footer')
  </body>
</html>