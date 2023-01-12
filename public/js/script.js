var navLinks = document.getElementById("nav-links");

function showMenu(){
    navLinks.style.right = "0px";
}

function hideMenu(){
    navLinks.style.right = "-200px";
}


var heslo = document.getElementById("password");
var sprava = document.getElementById("message");

sprava.innerHTML = 'Zadaj heslo!';
heslo.addEventListener('input', () => {
    if (heslo.value.length < 3){
        sprava.innerHTML = "Heslo musi mat viac ako 2 znaky!"
        heslo.style.borderColor = "red";
        sprava.style.color = "red";
    }
    if (heslo.value.length > 2 && heslo.value.length < 6){
        sprava.innerHTML = "Tvoje heslo je slabe"
        heslo.style.borderColor = "orange";
        sprava.style.color = "orange";

    } else if (heslo.value.length > 5 && heslo.value.length < 8) {
        sprava.innerHTML = "Tvoje heslo je stredne silne"
        heslo.style.borderColor = "lightgreen";
        sprava.style.color = "lightgreen";
    } else if(heslo.value.length > 8) {
        sprava.innerHTML = "Tvoje heslo je silne"
        heslo.style.borderColor = "green";
        sprava.style.color = "green";
    }

})



var buttonCheckName;
var buttonCheckEmail;
function checkUsername(){
    $.ajax({
        url: "?c=Users&a=checkCredentials",
        type: 'POST',
        dataType: "html",
        data: {
            name: $('#name').val(),
            column: 'name',
        },
        success: function(response) {
            console.log(response);
            premena = JSON.parse(response);
            if (premena === 1){
                buttonCheckName = premena;
                $("#check-username").html("<span style='color:red'> Sorry User already exists .");
                disableButton();
            } else {
                buttonCheckName = premena;
                $("#check-username").html("\<span style='color:green'> User available for Registration </span>");
                enableButton();
            }
        }
    });

}

function checkEmail(){
    $.ajax({
        url: "?c=Users&a=checkCredentials",
        type: 'POST',
        dataType: "html",
        data: {
            name: $('#email').val(),
            column: 'email',
        },
        success: function(response) {
            console.log(response);
            premena = JSON.parse(response);
             if(premena === 1){
                 buttonCheckEmail = 1;
                $("#check-email").html("<span style='color:red'> Sorry Email already exists .");
                disableButton();
            }else {
                 buttonCheckEmail = 2;
                $("#check-email").html("\<span style='color:green'> Email is available for Registration </span>");
                enableButton();
            }
        }
    });
}

    function enableButton(){
    if (buttonCheckName === 2 && buttonCheckEmail === 2){
        document.getElementById('submit').disabled = false;
    }
    }

    function disableButton() {
    document.getElementById('submit').disabled = true;
}



