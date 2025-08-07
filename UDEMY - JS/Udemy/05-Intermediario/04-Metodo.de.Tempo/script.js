
window.setInterval( function (){

    let hora_atual = new Date();

    let horas = hora_atual.getHours();
    let minutos = hora_atual.getMinutes();
    let segundos = hora_atual.getSeconds();

    function format_time (time){
        if(time >= 0 && time <= 9){
            var formatted_time = time.toString();
            formatted_time = "0" + formatted_time;
        }else{
            var formatted_time = time.toString();
        }
        return formatted_time;
    }

    document.getElementById("resultado").innerHTML = format_time(horas) + ":" + format_time(minutos) + ":" + format_time(segundos);

},1000);

