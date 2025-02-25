<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Unidade;

use Illuminate\Http\Request;

class AppProdutoController extends Controller
{
    //Exibe a lista de registros [GET|HEAD]
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        return view('app.produto.index',
        [
            'produtos' => $produtos,
            'request'  => $request->all()
        ]);
    }

    //Exibe formulário de criação do registro [GET|HEAD]
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.create',[
            'unidades' => $unidades,
            'fornecedores' => $fornecedores
        ]);

    }

    //Recebe formulário de criação do registro [POST]
    public function store(Request $request)
    {

        $regras = [
            'nome'          => 'required|min:3|max:40',
            'descricao'     => 'required|min:3|max:250',
            'peso'          => 'required|integer',
            'id_unidade'    => 'exists:unidades,id',
            'id_fornecedor' => 'exists:fornecedores,id'
        ];

        $feed = [
            'required'              => 'o campo :attribute e obrigatório',
            'nome.min'              => 'o campo nome deve ter mais 3 caracteres',
            'nome.max'              => 'o campo nome deve ter no maximo 40 caracteres',
            'peso.integer'          => 'o campo peso e invalido',
            'id_unidade.exists'     => 'o campo unidade e invalido',
            'id_fornecedor.exists'  => 'o campo fornecedor e invalido'
        ];

        $request->validate($regras, $feed);

        Produto::create($request->all());

        return redirect()->route('produto.index');
    }

    //Exibe registro específico [GET|HEAD]
    public function show(Produto $produto)
    {
        return view('app.produto.show',[
            'produto' =>$produto
        ]);
    }

    //Exibe formulário de edição do resgistro [GET|HEAD]
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit',[
            'produto'  => $produto,
            'unidades' => $unidades,
            'fornecedores' => $fornecedores
        ]);
    }

    //Recebe formulário de edição do registro [PUT|PATCH]
    public function update(Request $request, Produto $produto)
    {

        $regras = [
            'nome'          => 'required|min:3|max:40',
            'descricao'     => 'required|min:3|max:250',
            'peso'          => 'required|integer',
            'id_unidade'    => 'exists:unidades,id',
            'id_fornecedor' => 'exists:fornecedores,id'
        ];

        $feed = [
            'required'              => 'o campo :attribute e obrigatório',
            'nome.min'              => 'o campo nome deve ter mais 3 caracteres',
            'nome.max'              => 'o campo nome deve ter no maximo 40 caracteres',
            'peso.integer'          => 'o campo peso e invalido',
            'id_unidade.exists'     => 'o campo unidade e invalido',
            'id_fornecedor.exists'  => 'o campo fornecedor e invalido'
        ];

        $request->validate($regras, $feed);

        $produto->update($request->all());

        return redirect()->route('produto.show',[
            'produto' => $produto->id
        ]);
    }

    //Recebe dados para remoção do registro [DELETE]
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
