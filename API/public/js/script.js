
function getapidata()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
        var data = JSON.parse(this.responseText);

        if(data.status == 'error')
        {
            document.getElementById("readapidata").classList.add("error");
            document.getElementById("readapidata").innerHTML = data.data;
        }
        else if(data.status == 'success')
        {
            document.getElementById("readapidata").classList.remove("error");
            document.getElementById("readapidata").innerHTML = data.data;
        }
    }

    xmlhttp.open("GET", "api/users", true);
    xmlhttp.send();

    document.querySelector("#readapidata + hr").style.display = "block";
}

document.addEventListener("DOMContentLoaded", getapidata);

function showinsertdiv()
{
    document.getElementById("insertapidata").style.display = "block";
    document.getElementById("insertForm").addEventListener("submit", insertNewData);
    document.querySelector("#insertapidata + hr").style.display = "block";
}

function insertNewData(event)
{
    event.preventDefault();    

    var InsertForm = document.getElementById("insertForm");
    var InsertFormData = new FormData(InsertForm);

    // Convert form data to a javascript object
    InsertFormData = Object.fromEntries(InsertFormData.entries());

    // Convert form data to json string
    InsertFormData = JSON.stringify(InsertFormData);

    console.log(InsertFormData);

    var xmlhttp = new XMLHttpRequest();
    var insertStatusDiv = document.getElementById("insert_status");

    xmlhttp.onload = function() {
        var data = JSON.parse(this.responseText);

        if(data.status == 'error')
        {
            insertStatusDiv.classList.add("error");
            insertStatusDiv.innerHTML = data.data;
        }
        else if(data.status == 'success')
        {
            insertStatusDiv.classList.remove("error");
            insertStatusDiv.classList.add("success");
            insertStatusDiv.innerHTML = data.data;
            getapidata();
        }
    }

    xmlhttp.open("POST", "api/users", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(InsertFormData);
}


function edit(id)
{
    let id_of_row = id;
    console.log(id_of_row);
    document.getElementById("editapidata").style.display = "block";
    document.querySelector("#editapidata form input[type=hidden]").value = id_of_row;

    document.querySelector("#editapidata + hr").style.display = "block";

    getRecordToEdit(id_of_row);

    document.getElementById("editForm").addEventListener("submit", updateData);
}



function getRecordToEdit(id)
{
    var xmlhttp = new XMLHttpRequest();
    var editStatusDiv = document.getElementById("edit_status");

    xmlhttp.onload = function() {
        var data = JSON.parse(this.responseText);

        if(data.status == 'error')
        {
            editStatusDiv.classList.add("error");
            editStatusDiv.innerHTML = data.data;
        }
        else if(data.status == 'success')
        {
            editStatusDiv.classList.remove("error");
            document.getElementById("newfullname").value = data.newfullname;
            document.getElementById("newemail").value = data.newemail;
        }
    }

    xmlhttp.open("GET", "../API/crud/record.php?id=" + id, true);
    xmlhttp.send();
}



function updateData(event)
{
    event.preventDefault();

    var EditForm = document.getElementById("editForm");
    var EditFormData = new FormData(EditForm);

    // Convert form data to a javascript object
    EditFormData = Object.fromEntries(EditFormData.entries());

    // Convert form data to json string
    EditFormData = JSON.stringify(EditFormData);

    console.log(EditFormData);

    var xmlhttp = new XMLHttpRequest();
    var editStatusDiv = document.getElementById("edit_status");

    xmlhttp.onload = function() {
        var data = JSON.parse(this.responseText);

        if(data.status == 'error')
        {
            editStatusDiv.classList.add("error");
            editStatusDiv.innerHTML = data.data;
        }
        else if(data.status == 'success')
        {
            editStatusDiv.classList.remove("error");
            editStatusDiv.classList.add("success");
            editStatusDiv.innerHTML = data.data;
            getapidata();
        }
    }

    xmlhttp.open("PUT", "../API/crud/update.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(EditFormData);
}




function del(id)
{
    let id_of_row = id;
    console.log(id_of_row);
    document.getElementById("deleteapidata").style.display = "block";
    document.getElementById("recordno").innerHTML = id_of_row;
    document.querySelector("#deleteapidata form input[type=hidden]").value = id_of_row;

    document.getElementById("deleteForm").addEventListener("submit", deleteData);
}




function deleteData(event)
{
    event.preventDefault();

    var DeleteForm = document.getElementById("deleteForm");
    var deleteid = document.getElementById("deleteid").value;


    var xmlhttp = new XMLHttpRequest();
    var deleteStatusDiv = document.getElementById("delete_status");

    xmlhttp.onload = function() {
        var data = JSON.parse(this.responseText);

        if(data.status == 'error')
        {
            deleteStatusDiv.classList.add("error");
            deleteStatusDiv.innerHTML = data.data;
        }
        else if(data.status == 'success')
        {
            deleteStatusDiv.classList.remove("error");
            deleteStatusDiv.classList.add("success");
            deleteStatusDiv.innerHTML = data.data;
            getapidata();
        }
    }

    xmlhttp.open("DELETE", "../API/crud/delete.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(JSON.stringify({deleteid: deleteid}));
}



function hideagain()
{
    document.getElementById("deleteapidata").style.display = "none";
    document.querySelector("#readapidata + hr").style.display = "none";
}
