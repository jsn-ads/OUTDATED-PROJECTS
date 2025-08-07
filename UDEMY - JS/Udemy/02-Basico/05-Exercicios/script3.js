let grupos = [
    ['joao','maria'],
    ['pedro','joana','andre','julio'],
    ['carolina','helena','marcelo']
]


let lista = [];

for (let i = 0; i < grupos.length; i++) {
    lista.push(grupos[i][grupos[i].length - 2]);
    lista.push(grupos[i][grupos[i].length - 1]);
}

lista.push('Mariana','Felipe','Carla');

document.getElementById('03').innerHTML += '<ul>';

for (let i = 0; i < lista.length; i++) {
    document.getElementById('03').innerHTML += '<li>'+lista[i]+'</li>';
}

document.getElementById('03').innerHTML += '</ul>';