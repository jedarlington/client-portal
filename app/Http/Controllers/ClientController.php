<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
// use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Client::all();

        return Inertia::render('Clients', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:1']
        ])->validate();

        // $user = [
        //     'name' => 'Audi',
        //     'email' => 'info@audi.com',
        //     'password' => 'password',
        //     'role' => 'client'
        // ];

        // User::create($user);

        Client::create($request->all());

        session()->flash('flash.banner', 'Client Created Successfully.');

        return redirect()->back();
    }
}
