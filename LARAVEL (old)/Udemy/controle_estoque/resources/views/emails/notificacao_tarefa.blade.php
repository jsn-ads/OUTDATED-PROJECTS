@component('mail::message')
# {{$tarefa}}

Data Limite de conclusão: {{$data_conclusao}}

@component('mail::button', ['url' => $url])
Clique aqui para ver a tarefa
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
