document.getElementById("btn").onclick = function (){
    switch (document.getElementById("valor").value) {
        case "1":
            document.getElementById("result").innerHTML = "11.22";
            document.getElementById("valor").value = "";
            break;

        case "2":
            document.getElementById("result").innerHTML = "22.45";
            document.getElementById("valor").value = "";
            break;

        case "3":
            document.getElementById("result").innerHTML = "16.88";
            document.getElementById("valor").value = "";
            break;

        case "4":
            document.getElementById("result").innerHTML = "33.65";
            document.getElementById("valor").value = "";
            break;

        default:
            document.getElementById("result").innerHTML = "categoria não encontrada";
            document.getElementById("valor").value = "";
    }
}