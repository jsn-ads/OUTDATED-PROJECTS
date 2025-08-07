<?php

namespace App\Mail;

use App\Models\Tarefa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacaoTarefa extends Mailable
{
    use Queueable, SerializesModels;
    // esse atributos ja estão no contexto da build que encaminhado direto para blade
    public $tarefa;
    public $data_conclusao;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa->tarefa;
        $this->data_conclusao = date('d/m/Y', strtotime($tarefa->data_conclusao));
        $this->url = 'http://localhost:8000/tarefa/'.$tarefa->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notificacao_tarefa')->subject("Nova Tarefa Criada");
    }
}
