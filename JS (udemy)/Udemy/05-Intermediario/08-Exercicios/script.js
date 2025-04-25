document.getElementById("casa").onchange = function(){
    localStorage.setItem("selected", document.getElementById("casa").value);
}

if(localStorage.selected){
    document.getElementById("casa").value = localStorage.selected;
}
