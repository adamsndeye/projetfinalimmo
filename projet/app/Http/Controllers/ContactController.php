<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NewContactSend;

use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;

use Session;
use App\Contact;


class ContactController extends Controller
{
    


	

     public function index(Request $request)
    {
        $contacts = Contact::orderBy('id','DESC')->paginate(5);

        return view('admin.contacts.index')
            ->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new Categorie.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.contacts.create');
    }
    
      public function showFromNotification( Contact $contact , DatabaseNotification $notification)

    {

       $notification->markAsRead();
        return view('admin.contacts.show',compact('contact'));
    }



   
      public function store( Request $request)
    {
       $input= $request->all();
   
     $contact=Contact::create($input);

     //$contact->notify(new NewContactSend($contact));
     Notification::send(auth()->user(), new NewContactSend($contact));
         Session::flash('success', 'The blog con was sucessfully save!');
        return redirect()->back();
    }
     

    /**
     * Store a newly created Categorie in storage.
     *
     * @param CreateCategorieRequest $request
     *
     * @return Response
     */
  
       
    public function destroy($id,Request $request)
    {
     $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.categories.index');
    }




}
