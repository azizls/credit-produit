var color1 = document.getElementsByClassName('fa-thumbs-up')[0];
var color2 = document.getElementsByClassName('fa-thumbs-down')[0];
var lClicks = 0;
var dClicks = 0;

function likes() {
    if (color1.style.color == "blue") {
        color1.style.color = "black";
    } else {
        color1.style.color = "blue";
    }
    color2.style.color = "black";

    lClicks += 1;
    document.getElementById("l-counter").innerHTML = lClicks;
}

function dislikes() {
    if (color2.style.color == "blue") {
        color2.style.color = "black";
    } else {
        color2.style.color = "red";
    }
    color1.style.color = "black";
    dClicks += 1;
    document.getElementById("d-counter").innerHTML = dClicks;
}