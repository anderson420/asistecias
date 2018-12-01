
function showHint(value,text) {
    if (value=="") { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("respuestaajax").innerHTML = this.responseText;
                


            }
        };
        xmlhttp.open("GET", "../controller/actualizar_datos.php?id_curso=" + value+ "&nombre="+text.selectedOptions[0].text   , true);
        xmlhttp.send();
    }
}
