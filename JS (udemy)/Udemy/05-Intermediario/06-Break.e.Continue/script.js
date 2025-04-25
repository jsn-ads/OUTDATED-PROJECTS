//break

var lista = [1,5,9,33,45,55,6,778,44,5,774,223,455,884];

for (let i = 0; i < lista.length ; i++) {
    if(lista[i] === 774){
        document.getElementById('result').innerHTML = "valor encontrado";
        break;
    }

    console.log("tentativa"+i);
}

//continue

var num = 0;

while(num < 20){
    num++;

    if(num % 2 === 0){
        continue;
    }

    console.log(num);
}