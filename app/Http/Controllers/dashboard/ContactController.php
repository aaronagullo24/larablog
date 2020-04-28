<?php

namespace App\Http\Controllers\dashboard;

use App\Contact;
use App\ContactImage;
use App\Helpers\CustomUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(15);

        return view('dashboard.contact.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CustomUrl::hola_mundo();
        $categories = Category::pluck('id', 'title');
        return view("dashboard.contact.create", ['contact' => new Contact(), 'categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        // $contact = Contact::findOrFail($id);

        return view('dashboard.contact.show', ["contact" => $contact]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //echo "eliminar";

        $contact->delete();
        return back()->with('status', 'Contact eliminado con exito');
    }
}
