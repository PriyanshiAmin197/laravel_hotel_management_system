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
            padding-top: 30px;
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

        <div class="div_center">
        <h1 style="font-size:30px; font-weight:bold;">Add Rooms</h1>
            <form action="{{ url('add_room')}}" method="POST" enctype="multipart/form-data"> 

            @csrf
                <div class="div_deg">
                    <label for="">Room Title</label>
                    <input type="text" name="title">
                </div>
                <div class="div_deg">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" required="required"></textarea>
                </div>
                <div class="div_deg">
                    <label for="">Price</label>
                    <input type="number" name="price">
                </div>
                <div class="div_deg">
                    <label for="">Room Type</label>
                    <select name="room_type" id="">
                        <option selected value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                </div>

                <div class="div_deg">
                    <label for="">Free Wifi</label>
                    <select name="wifi" id="">
                        <option selected value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="div_deg">
                    <label for="">Upload Image</label>
                    <input type="file" name="image">
                </div>

                <div class="div_deg">
                    <input class="btn btn-primary" type="submit" value="Add Room">
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>

    @include('admin.footer')
  </body>
</html>