let pessoa = {
    'nome':'jose alves',
    'idade':31,
    'contato' : ['(62)993518323','jsn.ads@gmail.com'],
    'nomeidade': function(){
        return this.nome+' - '+this.idade;
    }
};

console.log(pessoa);

console.log(pessoa.nomeidade());