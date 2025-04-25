let btn = document.getElementById('btn');

btn.onclick = function(){
    this.style['backgroundColor'] = 'purple';
    this.style['color'] = 'white';
    this.style['transform'] = 'translateX(100px)';
    this.innerHTML = 'Clicou';
}