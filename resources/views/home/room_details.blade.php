<!DOCTYPE html>
<html lang="en">
   <head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <base href="/public">
    @include('home.css')

   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <header>
         @include('home.header')
      </header>


      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>

            <div class="row">
            

                <div class="col-md-8">
                  <div id="serv_hover"  class="room">
                     <div style="padding:20px" class="room_img">
                        <figure><img style="margin: auto; height:300px; width:800px;" src="/room/{{ $room->image }}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{ $room->room_title }}</h3>
                        <p style="padding:12px;">{{ $room->description }}</p>

                        <h4 style="padding:12px;">Free Wifi : {{ $room->wifi }}</h4>
                        <h4 style="padding:12px;">Room Type : {{ $room->room_type }}</h4>
                        <h3 style="padding:12px;">Price : {{ $room->price }} $</h3>
                       
                     </div>
                  </div>
                </div>

                <div class="col-md-4">
                    <h1 style="font-size:30px;">Book Room</h1>
                    <div>
                       @if(session()->has('message'))
                       <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">
                           x
                        </button>
                        {{ session()->get('message') }}
                        </div>
                       @endif
                    </div>

                    @if($errors)
                        @foreach($errors->all() as $error)
                        <li style="color:red;">{{ $error }}</li>
                        @endforeach
                    @endif

                    <form action="{{ url('add_booking', $room->id) }}" method="POST">
                        @csrf
                    <div>
                        <label for="">Name</label>
                        <input class="form-control" type="text" name="name2" 
                        @if(Auth::id())
                           value="{{ Auth::user()->name }}"
                        @endif
                        >
                    </div>
                    <div style="padding-top:5px;">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email"
                        @if(Auth::id())
                           value="{{ auth()->user()->email }}"
                        @endif
                        >
                    </div>
                    <div style="padding-top:5px;">
                        <label for="">Phone</label>
                        <input class="form-control" type="number" name="phone"
                        @if(Auth::id())
                           value="{{ auth()->user()->phone }}"
                        @endif
                        >
                    </div>
                    <div style="padding-top:5px;">
                        <label for="">Start Date</label>
                        <input class="form-control" type="date" name="startDate" id="startDate">
                    </div>
                    <div style="padding-top:5px;">
                        <label for="">End Date</label>
                        <input class="form-control" type="date" name="endDate" id="endDate">
                    </div>
                    <div style="padding-top:20px;">
                        <input  type="submit" name="name" class="btn btn-primary" value="Book Room">
                    </div>
                    </form>

                </div>

            </div>
         </div>
      </div>

      @include('home.footer')
      
    <script type="text/javascript">

    $(function(){
        var dtToday = new Date();
        var month = dtToday.getMonth() +1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();

        if(day < 10)
            day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);

    });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
   </body>
</html>