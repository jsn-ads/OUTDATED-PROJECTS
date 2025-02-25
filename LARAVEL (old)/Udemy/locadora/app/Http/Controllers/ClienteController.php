<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Repositories\ClienteRepository;

class ClienteController extends Controller
{

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request)
    {
        $clienteRepository = new ClienteRepository($this->cliente);

        if($request->has('filtro'))
        {
            $clienteRepository->filtro($request->filtro);
        }

        if($request->has('atributos'))
        {
            $clienteRepository->atributos($request->atributos);
        }

        return response()->json($clienteRepository->get(), 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate($this->cliente->rules(), $this->cliente->feedback());

        $this->cliente->nome  = $request->input('nome');

        return response($this->cliente->save(),200);
    }

    public function show($id)
    {
        return ($this->cliente->find($id) != null) ? response($this->cliente->find($id) , 200) : response(['erro'=>'Cliente não encontrado']);
    }

    public function edit(Cliente $cliente)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if($this->cliente->find($id) === null)
        {
            return response(['erro' => 'Erro ao Atualizar , Cliente não encontrado'],404);
        }

        $request->validate($this->cliente->find($id)->rules(), $this->cliente->find($id)->feedback());

        $this->cliente = $this->cliente->find($id);

        $this->cliente->fill($request->all());

        return response()->json($this->cliente->save(),200);
    }

    public function destroy($id)
    {
        return ($this->cliente->find($id) != null) ? response($this->cliente->find($id)->delete(),200) : response(['erro'=>'Erro ao Deletar, Cliente não encontrado'],404);
    }
}
