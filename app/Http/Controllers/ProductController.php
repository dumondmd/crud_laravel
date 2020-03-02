<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $request, $user;

    public function __construct(Request $request, User $user)
    {
        $this->user = $user;
        $this->request = $request;

        //$this->middleware('auth');
        /*
        $this->middleware('auth')->only([
            'create', 'store'
            ]);
        */
        $this->middleware('auth')->except('index');
    }
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
