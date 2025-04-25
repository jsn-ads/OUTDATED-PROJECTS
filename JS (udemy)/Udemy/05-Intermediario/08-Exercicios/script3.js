var veiculos = [
    {'placa': 'xyv-3445', 'categoria': '1'},
    {'placa': 'eiu-8493', 'categoria': '3'},
    {'placa': 'epa-8724', 'categoria': '5'},
    {'placa': 'fjd-3904', 'categoria': '4'},
    {'placa': 'wlj-3859', 'categoria': '2'},
    {'placa': 'kka-9394', 'categoria': '5'}
];

for (let i = 0; i < veiculos.length; i++) {
    document.getElementById('veiculo').innerHTML += '<li> Placa : ' + veiculos[i].placa + ' Categoria : ' + veiculos[i].categoria + '</li>';
}

function valorDoPedagio(veiculos){

    switch (veiculos.categoria) {
        case "1":
            return 10.45;
            break;
        case "2":
            return 17.90;
            break;
        case "3":
            return 22.67;
            break;
        case "4":
            return 31.12;
            break;
        default:
            console.log(veiculos.placa + " Veiculo nao pagou");
            return 0;
            break;
    }
}

document.getElementById("btnCalcularPedagio").onclick = function () {

    let vpagar = 0;

    for (let i = 0; i < veiculos.length; i++) {
       vpagar += valorDoPedagio(veiculos[i]);
    }

    document.getElementById('valorDoPedagio').innerHTML = "R$:"+vpagar.toFixed(2);
}