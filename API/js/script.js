
function getapidata()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
        document.getElementById("readapidata").innerHTML = this.responseText;
    }

    xmlhttp.open("GET", "../API/crud/read.php");
    xmlhttp.send();

    document.querySelector("#readapidata + hr").style.display = "block";
}

document.addEventListener("DOMContentLoaded", getapidata);

function showinsertdiv()
{
    document.getElementById("insertapidata").style.display = "block";
    document.querySelector("#insertapidata + hr").style.display = "block";
}

function edit(id)
{
    let id_of_row = id;
    console.log(id_of_row);
    document.getElementById("editapidata").style.display = "block";
    document.querySelector("#editapidata form input[type=hidden]").value = id_of_row;

    document.querySelector("#editapidata + hr").style.display = "block";
}

function del(id)
{
    let id_of_row = id;
    console.log(id_of_row);
    document.getElementById("deleteapidata").style.display = "block";
    document.getElementById("recordno").innerHTML = id_of_row;
    document.querySelector("#deleteapidata form input[type=hidden]").value = id_of_row;
}

function hideagain()
{
    document.getElementById("deleteapidata").style.display = "none";
    document.querySelector("#readapidata + hr").style.display = "none";
}
