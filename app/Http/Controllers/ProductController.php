<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProductRequest;

class ProductController extends Controller
{

    protected $request, $user;
    private $repository;

    public function __construct(Request $request, User $user, Product $product)
    {
        $this->repository = $product;
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
        
        $products = Product::latest()->paginate();        
        
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
        $data = $request->only('name', 'description', 'price');
        
        $this->repository->create($data);

        return redirect()->route('products.index');
        

    }

    
    public function show($id)
    {
        //$product = Product::where('id', $id)->first();
        

        if(!$product = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    
    public function edit($id)
    {        
        if(!$product = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.products.edit', compact('product'));
    }

    /***
     * Update the specified resource in storage.
     * 
     * @param \App\Http\Requests\StoreUpdateProductRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        if(!$product = $this->repository->find($id))
            return redirect()->back();
        $product->update($request->all());    

        return redirect()->route('products.index');
    }

   
    public function destroy($id)
    {
        
        if(!$product = $this->repository->find($id))
        return redirect()->back();

        $product->delete();

        return redirect()->route('products.index');
    }

    /**
     * Search Products
     */
    public function search(Request $request) {

        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters,
        ]);
    }
}
