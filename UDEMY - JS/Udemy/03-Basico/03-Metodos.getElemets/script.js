let squad = document.getElementsByClassName('quad');

let quad1 = document.getElementById('qd1');

let cont = document.getElementsByClassName('container');



quad1.style['backgroundColor'] = 'red';

cont[0].style['display'] = 'flex';

squad[1].style['backgroundColor'] = 'pink';
squad[2].style['backgroundColor'] = 'blue';



for (let i = 0; i < squad.length; i++) {
    squad[i].style['margin'] = '5px';
}

for (let i = 0; i < squad.length; i++) {
    squad[i].style['width'] = '100px';
}

for (let i = 0; i < squad.length; i++) {
    squad[i].style['height'] = '100px';
}


