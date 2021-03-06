<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\updateRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $search = trim($request->get('search'));
            $products = Products::where('tags', 'like', '%'.$search.'%')
            ->orWhere('title', 'like', '%'.$search.'%')
            ->paginate(10);
        } else {
            $search = '';
            $products = Products::paginate(10);           
        }

        return view('products.index', compact('products', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $path = $request->file('image')->store('productsImg', 'public');
        $img = Image::make(public_path("storage/$path"))->fit(1000,500);
        $img->save();
        $product = new Products();
        $product->fill($request->all());
        $product->image = $path;
        $product->save();
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $product = Products::find($id); 
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        $product = Products::find($id);
        $product->fill($request->all());
        if($request->file('image')){
            $path = $request->file('image')->store('productsImg', 'public');
            $img = Image::make(public_path("storage/$path"))->fit(1000,500);
            $img->save();
            $product->image = $path;
        }
        $product->save();

        return redirect('products');
    }

    public function statusUpdate($id)
    {
        $product = Products::find($id);        
        if ($product->isEnabled){
            $check = false;
        } else {
            $check = true;
        }

        $product->isEnabled = $check;
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {         
        $product = Products::find($id);
        $image_path = public_path().'/storage/'.$product->image;
        unlink($image_path);
        $product->delete();

        return redirect('products');
    }

    public function welcome(Request $request)
    {
        if($request->has('search')){
            $search = trim($request->get('search'));
            $products = Products::where('tags', 'like', '%'.$search.'%')
            ->orWhere('title', 'like', '%'.$search.'%')
            ->paginate(9);
        } else {
            $search = '';
            $products = Products::paginate(9);           
        }

        return view('welcome', compact('products', 'search'));
    }
    public function __construct()
    {
        $this->middleware('auth')->except('welcome', 'show');
        $this->middleware('checked')->except('welcome', 'show');
        $this->middleware('verified')->except('welcome', 'show');
    }
}
