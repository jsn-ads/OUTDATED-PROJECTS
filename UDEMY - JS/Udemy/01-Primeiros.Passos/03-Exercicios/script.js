console.log('\n01-------------------------------------------------------------------------------');

let nome = "Jose Alves";
let nasc = new Date(1989,10,20);
let atual = new Date();
let idade = atual.getFullYear() - nasc.getFullYear();

console.log('nome: '+nome+"\nIdade: "+idade);

console.log('\n02-------------------------------------------------------------------------------');

let aluno = "Jose Neto";
let n1 = 7;
let n2 = 6.5;
let media = (n1+n2)/2;

console.log('aluno: '+aluno+"\nmedia: "+media);

console.log('\n03-------------------------------------------------------------------------------');

let fone = '993518323';

let result = fone.length >= 9;
 
console.log('telefone e :'+result);

console.log('\n04-------------------------------------------------------------------------------');

console.log('32 elevado a sexta potencia e :'+Math.pow(32,6));