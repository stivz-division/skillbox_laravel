<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validData = $this->validate($request, [
            'email' => 'required',
            'message' => 'required',
        ]);

        Appeal::create($validData);

        return redirect('/');
    }
}
