<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //lista de imagenes principales de productos
        $images = Image::with('product')->where('active', 1)->where('principal', 1)->get();

        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    #metodos get y post para registrar imagenes por producto
    public function addImage(Product $product)
    {
        return view('images.addImage', compact('product'));
    }

    public function setImage(Request $request, Product $product)
    {
        $this->validate($request, [
            'titulo' => 'required|string|min:4',
            'imagen' => 'required|image|unique:images',
        ]);

        if($request->descripcion){
            $this->validate($request, [
                'descripcion' => 'string|min:6|max:255',
            ]);
        }


        $file = $request->file('imagen');
        $nom_image = $file->getClientOriginalName();

        $file->move(public_path('img_products'), $nom_image);

        $consulta = Image::where('imagen', $nom_image)->first();

        if($consulta){
            return redirect('/products/' . $product->id)->with('danger','Esta imagen ya se ha registrado en el sistema... Intenta con otra');
        }

        $image = Image::where('product_id', $product->id)->where('principal', 1)->first();

        if($image){
            $principal = 2;
        }else{
            $principal = 1;
        }

        $img = new Image;
        $img->titulo = $request->titulo;
        $img->imagen = $nom_image;
        $img->descripcion = $request->descripcion;
        $img->active = 1;
        $img->principal = $principal;
        $img->product_id = $product->id;
        $img->save();

        return redirect('/products/' . $product->id)->with('success','La imagen se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $products = Product::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('images.edit', compact('image','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $this->validate($request, [
            'titulo' => 'required|string|min:4',
            'imagen' => 'image',
            'active' => 'required|integer',
            'principal' => 'required|integer',
            'product' => 'required|integer',
        ]);

        if($request->descripcion){
            $this->validate($request, [
                'descripcion' => 'string|min:6|max:255',
            ]);
        }

        
        $file = $request->file('imagen');
        $nom_image = $file->getClientOriginalName();

        $file->move(public_path('img_products'), $nom_image);


        $image = Image::where('product_id', $product->id)->where('principal', 1)->first();

        if($image){
            return redirect('/products/' . $product->id)->with('danger','Ya existe una imagen principal para este producto.. Intenta con otra o modifica la imagen principal');
        }

        $img = Image::find($image->id);
        $img->titulo = $request->titulo;
        $img->imagen = $nom_image;
        $img->descripcion = $request->descripcion;
        $img->active = $request->active;
        $img->principal = $principal;
        $img->product_id = $product->id;
        $img->save();

        return redirect('/products/' . $product->id)->with('success','La imagen se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
