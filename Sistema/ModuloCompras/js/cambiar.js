// VARIABLES

var sillas = new Array();
var contarSillas = 0;



for (var index = 0; index < 61; index++) {
    sillas[index] = document.getElementById("btn" + index);
}


function changeColor(x) {
    if (x.style.background == "steelblue") {
        contarSillas--;
        if (x.classList.contains('btnPre')) {
            x.style.background = "gold";
        } else if (x.classList.contains('btn')) {

            x.style.background = "limegreen";
        }
    } else {
        x.style.background = "steelblue";
        contarSillas++;
    }
    return false;
}

function darSillas() {
    document.getElementById("valor").innerHTML = contarSillas;
    console.log(contarSillas);
    return contarSillas;
}

window.setInterval(
    function() {
        document.getElementById("valor").innerHTML = contarSillas;
        console.log(contarSillas);

    }
    // Intervalo de tiempo
    , 100);