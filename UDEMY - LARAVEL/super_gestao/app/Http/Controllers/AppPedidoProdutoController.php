<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ValidadorController;

use App\Models\PedidoProduto;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class AppPedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {

        $produtos = Produto::all();
        return view('app.pedido_produto.create',[
            'pedido'=>$pedido,
            'produtos'=>$produtos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Pedido $pedido)
    {
        $request->validate(ValidadorController::regras($request) , ValidadorController::feed());

        $dados = new PedidoProduto();
        $dados->id_pedido = $pedido->id;
        $dados->id_produto = $request->get('id_produto');
        $dados->save();

        return redirect()->route('pedido_produto.create',['pedido' => $pedido->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto , Pedido $pedido)
    {
        $pedidoProduto->delete();

        return redirect()->route('pedido_produto.create',['pedido'=>$pedido->id]);

    }
}
