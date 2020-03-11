<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProductRequest;

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
        
        $products = Product::paginate(20);        
        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    
    public function create()
    {
        return view('admin.pages.products.create');
    }

    
    public function store(StoreUpdateProductRequest $request)
    {
        dd('OK');
        /*
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image',
        ]);
        */
        

        //dd($request->only(['name', 'description']));
        //dd($request->all());
        //dd($request->only(['name', 'description']));
        //dd($request->has('teste'));
        //dd($request->input('name', 'Campo que não existe valor default'));
        //dd($request->except('_token'));
        if($request->file('photo')->isValid()){
            //dd($request->file('photo')->store('products'));
            $nameFile = $request->name . '.' . $request->photo->extension();
            dd($request->file('photo')->storeAs('products', $nameFile));
        }

    }

    
    public function show($id)
    {
        //$product = Product::where('id', $id)->first();
        

        if(!$product = Product::find($id))
            return redirect()->back();

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
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
