document.getElementById('btn').onclick = function(){
    let saida = new Date(document.getElementById('saida').value);
    let chegada = new Date(document.getElementById('chegada').value).getTime();
    
    if(!saida || !chegada){
        alert("Campo Data vazio");
    }else if(chegada <= saida){
        alert('Dia de Saida Maior que dia de Chegada');
    }else{
        let resultado = Math.trunc((chegada - saida) / 86400000);
        document.getElementById('resultado').innerHTML = "Sua entrega demorou :"+resultado+" dias";
    }
    
}


