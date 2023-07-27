<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GetController extends Controller
{
    public function contactList(){
        // $contactList = Contact::all()->paginate(10);
        $userId = auth()->id();
        $contactList = DB::table('contacts')->where('uid', $userId)->paginate(10);

        return view('index', ['contactData' => $contactList]);
    }

    public function contactData($id){
        $contactData = DB::table('contacts')->where('id', $id)->get();
        // return redirect('/editContact')->with('contactData', $contactData);
        return view('pages.editContacts', ['contactData' => $contactData]);
    }
    public function editContactData(Request $req){
        
        $validator = Validator::make($req->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $name = $req->input('name');
        $company = $req->input('company');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $id = $req->input('id');

        
        $contact = Contact::findOrFail($id);
        $contact->name = $name;
        $contact->company = $company;
        $contact->phone = $phone;
        $contact->email = $email;
        $contact->save();
        return redirect('/')->with('message','Edit contact Successful!');
    }
    public function delete($id){
        $contact = Contact::findOrFail($id);
        // dd($contact);
        $contact->delete();
        return redirect('/')->with('message', 'Deleted Successfuly');
    }
    public function search(Request $req){
        $inputSearch = $req->input('search');

        $contacts = Contact::where('name', 'like', '%' . $inputSearch . '%')
                           ->orWhere('company', 'like', '%' . $inputSearch . '%')
                           ->orWhere('phone', 'like', '%' . $inputSearch . '%')
                           ->orWhere('email', 'like', '%' . $inputSearch . '%')
                           ->get();
                           

        return view('ajax.search', ['result' => $contacts]);
                           
    }
}
