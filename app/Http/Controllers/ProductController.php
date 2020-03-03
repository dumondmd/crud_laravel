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
        //$this->middleware('auth')->except('index');
    }
    
    public function index()
    {
        $teste = 123;
        $teste2 = 321;
        $teste3 = [1,2,3,4,5];
        $products = ['TV', 'Geladeira', 'Forno', 'Sofá'];        
        return view('admin.pages.products.index', compact('teste', 'teste2', 'teste3', 'products'));
    }

    
    public function create()
    {
        return view('admin.pages.products.create');
    }

    
    public function store(Request $request)
    {
        dd('Cadastrando...');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
    }

    
    public function update(Request $request, $id)
    {
        dd("Editando o produto {$id}");
    }

   
    public function destroy($id)
    {
        //
    }
}
