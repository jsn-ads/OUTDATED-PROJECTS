// Strings

let nome = "José";
let sobrenome = "Neto";
let cpf = "033.229.411-08";
let numero = "993518323";
let email = "jsn.ads@gmail.com";

// console.log('Nome completo: '+nome+" "+sobrenome);
// console.log('posição: '+nome[0]);
// console.log('quantidade de caracteres: '+nome.length);

// Numbers

let num1 = 10;
let num2 = 5;

let soma = num1 + num2;
let subtracao = num1 - num2;
let divisao = num1 / num2;
let multiplicacao = num1 * num2;

console.log(soma);
console.log(subtracao);
console.log(divisao);
console.log(multiplicacao);

var media = (num1 + num2) / 2;
console.log(media);

console.log(Math.pow(num1,4));

let increment = 10;

increment+=3;

console.log(increment);

increment++;
increment--;

//conversao de numero para string e string para numero

let numero_string = numero.toString();

let numeros = parseInt(numero_string);

// tipoas boleanos 

let vtype = true;

console.log(typeof vtype);