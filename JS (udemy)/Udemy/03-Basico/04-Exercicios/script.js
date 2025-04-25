let btn = document.getElementById('btn1');

btn.style['backgroundColor'] = 'green';
btn.style['color'] = 'white';
btn.style['width'] = '100px';
btn.style['height'] = '50px';


btn.onclick = function(){
    
    let c = document.getElementById('c1').value;
    document.getElementById('f1').value = (9 * c / 5) + 32;
    btn.style['transition'] = '2s'
    btn.style['backgroundColor'] = 'red';
}

