<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetController extends Controller
{
    public function contactList(){
        // $contactList = Contact::all()->paginate(10);
        $userId = auth()->id();
        $contactList = DB::table('contacts')->where('uid', $userId)->paginate(10);

        return view('index', ['contactData' => $contactList]);
    }
}
