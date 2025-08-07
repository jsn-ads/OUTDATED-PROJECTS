let c = document.getElementById('cxazul').innerHTML;

function conversao(i){
    let f = (9 * i / 5) + 32;
    return f;
}

document.getElementById('cxamarelo').innerHTML = conversao(c);

