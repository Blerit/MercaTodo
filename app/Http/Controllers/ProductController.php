<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    //analizar el request, es util tenerlo acá?
    {
        if($request->has('search')){
            $query = trim($request->get('search'));
            //Cambiar la variable query por algo mas relacionado//Añadir el Or where in title, para elegir tambien el nombre en el título 
            $products = Products::where('tags', 'LIKE', '%'.$query.'%')->paginate(10);

            //Buscar comando para realizar una búsqueda con artisan|patrón repositorio/factory
            
            //Buscar Collection y entender
        } else {
            $query = '';
            $products = Products::paginate(10);           
        }

        return view('products.index', compact('products', 'query'));
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
        //
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
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->fill($request->all());
        $product->save();

        return redirect('products');
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

    public function welcome()
    {
        $products = Products::all();
        return view('welcome', compact('products'));
    }
}
