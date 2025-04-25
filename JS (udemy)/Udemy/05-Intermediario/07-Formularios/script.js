document.getElementById("mostrar").onclick = function() {

    var campo = document.getElementById("options");
    var indice = campo.options.selectedIndex;
    var valor = campo.options[indice].innerHTML;

    var radio = document.getElementsByName('genero');

    document.getElementById("resultado").innerHTML = "";

    for (var i = 0; i < radio.length; i++) {
        if (radio[i].checked){
            document.getElementById("resultado").innerHTML +="<li>"+radio[i].value+"</li>";
        }
    }
}