<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Gallary;
use App\Models\Booking;
use App\Models\Contact;
use Illuminate\support\Facades\Auth;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $req, $id)
    {
        $req->validate([
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ]);

        $data = new Booking;
        $data->room_id = $id;
        $data->name = $req->name2;
        $data->phone = $req->phone;
        $data->email = $req->email;

        $startDate = $req->startDate;
        $endDate = $req->endDate;

        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)
            ->exists();

        if($isBooked)
        {
            return redirect()->back()->with('message', 'Room is already booked. Please try different date');
        } 
        else
        {
            $data->start_date = $req->startDate;
            $data->end_date = $req->endDate;
            $data->save();

            return redirect()->back()->with('message', 'Room booked successfully.');
        }
    }

    public function contact(Request $req)
    {
        $contact = new Contact;
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->phone = $req->phone;
        $contact->message = $req->message;
        $contact->save();
        return redirect()->back()->with('message', 'Message sent successfully!');
    }

    public function our_room()
    {
        $room = Room::all();
        return view('home.our_room', compact('room'));

    }

    public function hotel_gallery()
    {
        $gallary  = Gallary::all();
        return view('home.hotel_gallery', compact('gallary'));

    }

    public function contact_us()
    {
        $contact  = Contact::all();
        return view('home.contact_us', compact('contact'));

    }
}
