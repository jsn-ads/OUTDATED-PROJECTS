// window.localStorage.setItem('nome','José Neto');

// console.log(localStorage['nome']);

// localStorage.removeItem('nome');


// se local store estiver preenchido mostrar bem vindo se nao estiver logado mostra formulario

if(localStorage.usuario){

    document.getElementById('form').style['display'] = 'none';
    document.getElementById('bvindo').style['display'] = 'initial';

    document.getElementById('logado').innerHTML = "Bem vindo "+ localStorage.usuario; 

    document.getElementById('sair').onclick = function(){
        
        localStorage.removeItem('usuario');

        window.location.reload();

    }


}else{

    document.getElementById('form').style['display'] = 'initial';
    document.getElementById('bvindo').style['display'] = 'none';
    
    document.getElementById('btn').onclick = function(){
        
        let nome = document.getElementById('usuario').value;
        window.localStorage.setItem('usuario', nome);

        window.location.reload();
    }

}