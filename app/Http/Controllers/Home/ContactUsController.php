<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact_Us;
use Illuminate\Support\Carbon;

class ContactUsController extends Controller
{
    public function Contact_us(){
        return view('frontend.contact_us');
    } // end mehtod 


    public function StoreMessage(Request $request){

        Contact_us::insert([

            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message, 
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Your Message Submited Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 


    public function ContactMessage(){

        $contacts = Contact_us::latest()->get();
        return view('admin.contact.allcontact',compact('contacts'));

    } // end mehtod 


    public function DeleteMessage($id){

     Contact_us::findOrFail($id)->delete();

     $notification = array(
            'message' => 'Your Message Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end mehtod 






}