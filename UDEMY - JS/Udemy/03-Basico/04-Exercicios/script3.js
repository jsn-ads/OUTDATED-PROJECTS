let btn3 = document.getElementById('btn3');

btn3.style['backgroundColor'] = 'green';
btn3.style['color'] = 'white';
btn3.style['width'] = '100px';
btn3.style['height'] = '50px';

btn3.onclick = function(){

    let n1 = parseFloat(document.getElementById('n1').value);
    let n2 = parseFloat(document.getElementById('n2').value);
    let falta = parseFloat(document.getElementById('ft').value);

    let media = (n1 + n2) / 2;
    falta = 100 - ((falta * 100) / 20);

    if(media >= 6.5){
        if(falta < 70){
            document.getElementById('re').innerHTML = 'Reprovado por falta , presença:'+falta+'%'+' media : '+media;
            btn3.style['transition'] = '2s'
            btn3.style['backgroundColor'] = 'red';
        }else{
            document.getElementById('re').innerHTML = 'Aprovado , presença:'+falta+'%'+' media : '+media;
            btn3.style['transition'] = '2s'
            btn3.style['backgroundColor'] = 'blue';
        }
    }else{
        if(falta > 70){
            document.getElementById('re').innerHTML = 'Reprovado por media , presença:'+falta+'%'+' media : '+media;
            btn3.style['transition'] = '2s'
            btn3.style['backgroundColor'] = 'red';
        }else{
            document.getElementById('re').innerHTML = 'Reprovado por media e falta, presença:'+falta+'%'+' media : '+media;
            btn3.style['transition'] = '2s'
            btn3.style['backgroundColor'] = 'red';
        }
    }

}
