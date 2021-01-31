<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('nombre','ASC')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sku' => 'required|string|min:4|unique:products',
            'nombre' => 'required|string|min:4',
            'descripcion' => 'required|string|min:4|max:255',
            'category' => 'required|integer',
        ]);

        if ($request->precio) {
            $this->validate($request, [
                'precio' => 'integer',
            ]);

            if ($request->precio < 0) {
               return redirect('/products/create')->with('danger','El precio no puede ser menor que cero');
            }
        }

        $product = new Product;
        $product->sku = $request->sku;
        $product->nombre = $request->nombre;
        $product->precio = $request->precio;
        $product->descripcion = $request->descripcion;
        $product->category_id = $request->category;
        $product->save();

        return redirect('/products')->with('success','El producto se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function getProduct(Product $product)
    {
        $images = Image::select('imagen')->where('product_id', $product->id)->where('active',1)->get();
        return view('products.getProduct', compact('product','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('products.edit', compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'sku' => 'required|string|min:4',
            'nombre' => 'required|string|min:4',
            'descripcion' => 'required|string|min:4|max:255',
            'category' => 'required|integer',
        ]);

        if ($request->precio) {
            $this->validate($request, [
                'precio' => 'integer',
            ]);

            if ($request->precio < 0) {
               return redirect('/products/' . $product->id . 'edit')->with('danger','El precio no puede ser menor que cero');
            }
        }

        $product = Product::find($product->id);
        $product->sku = $request->sku;
        $product->nombre = $request->nombre;
        $product->precio = $request->precio;
        $product->descripcion = $request->descripcion;
        $product->category_id = $request->category;
        $product->save();

        return redirect('/products/' . $product->id)->with('success','El producto se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    #metodo para buscar producto por sku
    public function searchProduct(Request $request)
    {
        #return $request;
        $this->validate($request, [
            'sku' => 'required|string|min:4',
        ]);

        $product = Product::with('category')->where('sku', $request->sku)->first();

        if (!isset($product)) {
            return redirect('/products')->with('danger','No se encontró un producto con el SKU enviado');
        }

        return view('products.searchProduct', compact('product'));
    }

}
