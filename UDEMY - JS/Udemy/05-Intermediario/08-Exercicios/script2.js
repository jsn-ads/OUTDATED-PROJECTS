function add_zero_esquerda(number){
    if(number < 10){
        return "0" + number.toString();
    }else{
        return number.toString();
    }
}

function format_date(timestamp){
    var dia = add_zero_esquerda(new Date(timestamp).getDate());
    var mes = add_zero_esquerda(new Date(timestamp).getMonth() + 1);
    var ano = add_zero_esquerda(new Date(timestamp).getFullYear());

    return dia + "-" + mes + "-" + ano;
}


document.getElementById('entrega').onchange = function () {

    var valor = document.getElementById('entrega').value;

    if (!valor) {
        document.getElementById("btn").disabled = true;
        document.getElementById("saida").innerHTML = "";
        document.getElementById("chegada").innerHTML = "";
    } else {
        if (valor == 8) {
            document.getElementById("btn").disabled = false;
            var dias_de_entrega = 8;
        } else if (valor == 15) {
            document.getElementById("btn").disabled = false;
            var dias_de_entrega = 15;
        }

        var data_envio = new Date().getTime();
        var data_entrega = data_envio + (dias_de_entrega * 86400000);

        document.getElementById("saida").innerHTML =  "<br /> Saida:"+format_date(data_envio)+"<br/>";
        document.getElementById("chegada").innerHTML = "Chegada:"+format_date(data_entrega)+"<br/>";
    }
}

