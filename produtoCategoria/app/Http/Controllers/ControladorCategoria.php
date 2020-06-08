<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ControladorCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::with('produtos')->get();
        return view('Produto.categoria', compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Produto.nova_categoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nome_categoria = $request->input('categoria');
        
        $categoria->save();
        return redirect('/categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        if(isset($categoria)) {
            return view('Produto.editar_categoria', compact('categoria'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        if(isset($categoria)) {
            $categoria->nome_categoria = $request->input('categoria');
            $categoria->save();
        }
        return redirect('/categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categoria::find($id);
        if (isset($cat)) {
            $cat->delete();
        }
        return redirect("/categoria");
    }

    public function list($id)
    {   
        $categoria = Categoria::with('produtos')->get();
        foreach ($categoria as $cat) {
            if ($cat->id == $id) {
                $produto = $cat->produtos;
                return view('Produto.produto', compact('produto'));
            }
        }
        return redirect("/produto");
        //return view('Produto.produto', compact('produto'));
    }
}
