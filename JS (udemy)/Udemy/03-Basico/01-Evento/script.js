/*
    eventos mais utilizados são

    onclick     = quando clicla em algum elemento da pagina
    onchange    = quando um elemento html muda, é muito comum utilizar esse evento para controlar o preenchimento de campos de um formulário
    onmouseover = quando o usuario passa o cursor sobre algum elemento
    onmouseout  = quando o cursor que estava sobre algum elemento e sai
    onkeydown   = quando alguma tecla e pressionada
*/

document.getElementById('btn1').onclick = function(){
    alert('clicou no elemento');
}

document.getElementById('btn2').onmouseover = function(){
    alert('passou no elemento');
}

document.getElementById('btn3').onmouseout = function(){
    alert('saiu do elemento');
}