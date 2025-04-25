let vendas_curso = [
    {
        'aluno':'Jose Neto',
        'data':'10/06/2018',
        'valor': 22.60,
        'reembolso': null
    },
    {
        'aluno':'Pedroca do Dbd',
        'data':'12/08/2018',
        'valor': 12.67,
        'reembolso': null
    },
    {
        'aluno':'Michael Mayers',
        'data':'9/10/2019',
        'valor': 57.21,
        'reembolso': '12/10/2019'
    },
    {
        'aluno':'Fred',
        'data':'10/06/2018',
        'valor': 22.60,
        'reembolso': null
    }
]

let x = 0;

for (let i = 0; i < vendas_curso.length; i++) {
    if(vendas_curso[i].reembolso == null){
        document.getElementById('cnome').innerHTML += vendas_curso[i].aluno+'<br>';
        document.getElementById('cdata').innerHTML += vendas_curso[i].data+'<br>';
        document.getElementById('cvalor').innerHTML += 'R$ : '+vendas_curso[i].valor+'<br>';
        document.getElementById('cvendas').innerHTML ++;
        x += parseFloat(vendas_curso[i].valor);
        document.getElementById('ctotal').innerHTML = 'R$ : '+x.toFixed(2);
    }
}

