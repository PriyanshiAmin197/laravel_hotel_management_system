<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .table_deg{
            border:2px solid white;
            margin:auto;
            width:90%;
            text-align:center;
            margin-top:40px;
        }

        .th_deg
        {
            background-color:skyblue;
            padding:13px;
        }

        td
        {
            padding: 5px;
        }

        tr 
        {
            border: 1px solid white;
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

            <table class="table_deg">
                        <tr>
                            <th class="th_deg">Room Id</th>
                            <th class="th_deg">Customer Name</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Phone</th>
                            <th class="th_deg">Arrival Date</th>
                            <th class="th_deg">Leaving Date</th>
                            <th class="th_deg">Status</th>
                            <th class="th_deg">Room Title</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Image</th>
                            <th class="th_deg">Action</th>

                        </tr>
 
                        @foreach($data as $data)
                        <tr>
                            <td>{{ $data->room_id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->start_date }}</td>
                            <td>{{ $data->end_date }}</td>
                            <td>
                                @if($data->status == 'approve')
                                    <span style="color:skyblue">Approved</span>
                                @endif

                                @if($data->status == 'rejected')
                                    <span style="color:red">Rejected</span>
                                @endif

                                @if($data->status == 'waiting')
                                    <span style="color:yellow">Waiting</span>
                                @endif
                            </td>
                            <td>{{ $data->room->room_title }}</td>
                            <td>{{ $data->room->price }}</td>
                            <td>
                                <img width="100" src="room//{{ $data->room->image }}" alt="">
                            </td>
                            <td>
                                <span style="padding-bottom:12px; margin-top:10px;">
                                    <a href="{{ url('approve_room', $data->id) }}" class="btn btn-success">Approve</a>
                                </span>
                                    <a href="{{ url('reject_room', $data->id) }}" class="btn btn-warning">Rejected</a>
                                <span style="padding:12px">
                                    <a onclick="return confirm('Are you sure to delete this.');" href="{{ url('delete_booking', $data->id) }}" class="btn btn-danger">Delete</a>
                                </span>    
                            </td>
                        </tr>
                        @endforeach
            </table>
        </div>
    </div>
    </div>
    </div>
        @include('admin.footer')
  </body>
</html>