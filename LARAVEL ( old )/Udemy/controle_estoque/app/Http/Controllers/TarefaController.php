<?php

namespace App\Http\Controllers;

use App\Exports\TarefasExport;
use App\Mail\NotificacaoTarefa;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade;

class TarefaController extends Controller
{

    public function __construct(Tarefa $tarefa , NotificacaoTarefa $notificacaoTarefa)
    {
        $this->dados = array();
        $this->tarefa = $tarefa;                 //injeção Model tarefa
        $this->notificacao = $notificacaoTarefa;   //injeção Mail Notificação de email
    }

    public function index(Request $resquest)
    {

        return view('tarefa.index',[
            'request' => $resquest,
            'tarefas' => $this->tarefa::where('id_user',auth()->user()->id)->paginate(10)
        ]);
    }


    public function create()
    {
        return view('tarefa.create');
    }


    public function store(Request $request)
    {
        //recupera email do usuario logado
        $user_email = auth()->user()->email;

        //valida a requisição
        $request->validate($this->tarefa->rules(), $this->tarefa->feedback());

        //trata os dados para persistencia
        $this->dados['id_user'] = auth()->user()->id;
        $this->dados['tarefa']         = utf8_decode(ucfirst(strtolower($request->input('tarefa'))));
        $this->dados['data_conclusao'] = $request->input('data_conclusao');
        $this->dados = $this->tarefa::create($this->dados);

        //enviar o objeto da tarefa criada para classe notificaço tarefa
        Mail::to($user_email)->send(new NotificacaoTarefa($this->dados));

        return redirect()->route('tarefa.show',['tarefa'=>$this->dados->id]);

    }


    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show',['tarefa'=> $tarefa]);
    }


    public function edit(Tarefa $tarefa)
    {
        //Verifica se a tarefa pertence ao usuario logado , caso contrario e redirecionado para view de acesso negado
        return $tarefa->id_user === auth()->user()->id ? view('tarefa.edit', ['tarefa' => $this->tarefa->find($tarefa->id)]) : view('acesso_negado');
    }


    public function update(Request $request, Tarefa $tarefa)
    {

        //Verifica se a tarefa pertence ao usuario logado , caso contrario e redirecionado para view de acesso negado
        if($tarefa->id_user != auth()->user()->id){
            return view('acesso_negado');
        }

        $request->validate($this->tarefa->rules(), $this->tarefa->feedback());

        $this->tarefa = $this->tarefa->find($tarefa->id);
        $this->tarefa['id_user']        = auth()->user()->id;
        $this->tarefa['tarefa']         = utf8_decode(ucfirst(strtolower($request->input('tarefa'))));
        $this->tarefa['data_conclusao'] = $request->input('data_conclusao');
        $this->tarefa->save();

        return redirect()->route('tarefa.show', [
            'tarefa' => $this->tarefa->id
        ]);

    }


    public function destroy(Tarefa $tarefa)
    {

        if($tarefa->id_user != auth()->user()->id){
            return view('acesso_negado');
        }

        $this->tarefa->find($tarefa->id)->delete();

        return redirect()->route('tarefa.index');
    }

    // metodo para exporta excel
    public function exportar($extensao){

        if(in_array($extensao, ['csv', 'xlsx', 'pdf'])){
            $arquivo = date('dmY-hms').'.tarefa.'.$extensao;
        }else{
            return redirect()->route('tarefa.index');
        }

        return Excel::download(new TarefasExport, $arquivo);
    }

    // metodo para exporta pdf

    public function pdff(){

        $tarefas = auth()->user()->tarefas()->get();

        $arquivo = date('dmyhms').'_tarefa.pdf';

        $pdf = Facade::loadView('tarefa.pdf',['tarefas' => $tarefas]);

        //landscape = 'paisagem' || portrait = 'retrato'
        $pdf->setPaper('a4','landscape');

        return $pdf->stream($arquivo);

        // return $pdf->download($arquivo);

    }
}
