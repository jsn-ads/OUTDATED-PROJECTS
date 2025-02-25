<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\Unidade;

use Illuminate\Http\Request;

class AppProdutoDetalheController extends Controller
{

    public function index(Request $request)
    {

        $produto_detalhes = ProdutoDetalhe::paginate(10);

        return view('app.produto_detalhe.index',[
            'produto_detalhes' => $produto_detalhes,
            'request' => $request->all()
        ]);

    }

    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create',[
            'unidades' => $unidades
        ]);
    }

    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());

        return redirect()->route('produto_detalhe.index');
    }

    public function show(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }

    public function edit(ProdutoDetalhe $produtoDetalhe)
    {

        $unidades = Unidade::all();

        return view('app.produto_detalhe.edit',[
            'produto_detalhe' => $produtoDetalhe,
            'unidades'=> $unidades
        ]);
    }

    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        //
    }

    public function destroy(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }
}
