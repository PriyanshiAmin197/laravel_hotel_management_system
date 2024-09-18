<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;
use App\Models\Contact;
use Illuminate\support\Facades\Auth;
use App\Notifications\MyFirstNotification;
use Notification;

class AdminController extends Controller
{
    public function index()
    {

        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            if($usertype == 'user')
            {
                $room = Room::all();
                $gallary = Gallary::all();
                return view('home.index', compact('room', 'gallary'));
            }

            else if($usertype == 'admin')
            {
                return view('admin.index');
            }
            else
            {
                return redirect()->back();
            }
        }
        
    }

    public function home()
    {
        $room = Room::all();
        $gallary = Gallary::all();
        return view('home.index', compact('room', 'gallary'));
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $req)
    {
        $data = new Room();
        $data->room_title  = $req->title;
        $data->description  = $req->description;
        $data->price  = $req->price;
        $data->wifi  = $req->wifi;
        $data->room_type  = $req->room_type;
        $image = $req->image;

        if($image)
        {
            $imagename = time() .'.'. $image->getClientOriginalExtension();
            $req->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
    }

    public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }

    public function room_delete($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function room_update($id)
    {
        $data = Room::find($id);

        return view('admin.update_room', compact('data'));
    }

    public function edit_room(Request $req, $id)
    {
        $data = Room::find($id);
        $data->room_title = $req->title;
        $data->description = $req->description;
        $data->price = $req->price;
        $data->wifi = $req->wifi;
        $data->room_type = $req->room_type;
        $image = $req->image;

        if($image)
        {
            $imagename = time() .'.'. $image->getClientOriginalExtension();
            $req->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
    }

    public function bookings()
    {
        $data = Booking::all();

        return view('admin.booking', compact('data'));
    }

    public function delete_booking($id)
    {
        $data = Booking::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function approve_room($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'approve';
        $booking->save();
        return redirect()->back(); 
    }

    public function reject_room($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'rejected';
        $booking->save();
        return redirect()->back();
    }

    public function view_gallary(Request $req)
    {
        $gallary = Gallary::all();
        return view('admin.gallary', compact('gallary'));
    }

    public function upload_gallary(Request $req)
    {
        $data = new Gallary();

        $image = $req->image;

        if($image)
        {
            $imagename = time() .'.'. $image->getClientOriginalExtension();
            $req->image->move('gallary', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back()->with('message', 'Gallary uploaded successfully.');

    }

    public function delete_gallary($id)
    {
        $data = Gallary::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function all_messages()
    {
        $data = Contact::all();

        return view('admin.all_message', compact('data'));
    }

    public function send_mail($id)
    {
        $data = Contact::find($id);
        return view('admin.send_mail',compact('data'));
    }

    public function mail(Request $req, $id)
    {
        $data = Contact::find($id);
        $details = [
            'greeting' =>$req->greeting,
            'body' =>$req->body,
            'action_text' =>$req->action_text,
            'action_url' =>$req->action_url,
            'end_line' =>$req->end_line,
        ];
        Notification::send($data, new MyFirstNotification($details));
        return redirect()->back();
    }

}
