let usuario = {
    'nome':'Jose Alves',
    'sobrenome':'Souza Neto',
    'email':'jsn.ads@gmail.com'
}

function formulario(object){
    let html = '<div class="tablebox">';
        html += '<table border="1">';
        html += '<tr>';
        html += '<th>Nome Completo</th>';
        html += '<th>Email</th>';
        html += '</tr>';
        html += '<tr>';
        html += '<td>'+object.nome+" "+object.sobrenome+'</td>';
        html += '<td>'+object.email+'</td>';
        html += '</tr>';
        html += '</table>';
        html += '</div>';
    return html;
}

document.getElementById('05').innerHTML = formulario(usuario);