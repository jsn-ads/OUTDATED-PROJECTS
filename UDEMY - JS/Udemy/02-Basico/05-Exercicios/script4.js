let curso = {
    'titulo':"Aprenda programação em Python",
    'categoria': ['programação','tecnologia','python'],
    'n_aval_5_estrelas':420,
    'n_aval_4_estrelas':80,
    'n_aval_3_estrelas':33,
    'n_aval_2_estrelas':20,
    'n_aval_1_estrelas':4,
}


document.getElementById('curso').innerHTML = curso.categoria[0];

function t(){
    let t = curso.n_aval_5_estrelas + curso.n_aval_4_estrelas + curso.n_aval_3_estrelas + curso.n_aval_2_estrelas + curso.n_aval_1_estrelas;
    return t;
}

document.getElementById('total').innerHTML = t();

function media(){
    let media = ((curso.n_aval_5_estrelas * 5) + (curso.n_aval_4_estrelas * 4) + (curso.n_aval_3_estrelas * 3) + (curso.n_aval_2_estrelas * 2) + (curso.n_aval_1_estrelas * 1)) / (5+4+3+2+1);
    return media;
}

document.getElementById('media').innerHTML = media();