function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById("clock").style.color = "white";
  document.getElementById("clock").innerHTML = h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);

}

function checkTime(i) {
  if (i < 10) {i = "0" + i};
  return i;
}



function myMap() {
  var mapOptions = {
    center: new google.maps.LatLng(55.97905, -3.61054),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.HYBRID
  }
  var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}


function townsquareInfo() {

    var para = document.createElement("p");
    para.id = "info";
    para.className = "text-center";
    var node = document.createTextNode("This is what the town square used to look like. Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit");
    para.appendChild(node);
    var element = document.getElementById("townsquare");
    element.appendChild(para);
}

function townsquareImage() {
  var parent = document.getElementById("townsquare");
  var child = document.getElementById("info");
  parent.removeChild(child);

}

function churchInfo() {

    var para = document.createElement("p");
    para.id = "info";
    para.className += "text-center";
    var node = document.createTextNode("These are the grounds of St Michael's RC Church. Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit");
    para.appendChild(node);
    var element = document.getElementById("church");
    element.appendChild(para);
}

function churchImage() {
  var parent = document.getElementById("church");
  var child = document.getElementById("info");
  parent.removeChild(child);

}



function burntpalaceInfo() {

    var para = document.createElement("p");
    para.id = "info";
    para.className += "text-center";
    var node = document.createTextNode("This is an image of the Linlithgow Palace fire. Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit");
    para.appendChild(node);
    var element = document.getElementById("burntpalace");
    element.appendChild(para);
}

function burntpalaceImage() {
  var parent = document.getElementById("burntpalace");
  var child = document.getElementById("info");
  parent.removeChild(child);

}


function loadToday() {
  var day = randomNumber();
  day.toString();
  day = day + ".txt";
  getToday(day);

}


function randomNumber() {
  var number = Math.floor(Math.random() * 3) + 1;

  return number;

}

function getToday(file) {

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tilContent").innerHTML = this.responseText;
      document.getElementById("tilContent").style.color = "white";
      document.getElementById("tilContent").style.fontSize = "18px";
      document.getElementById("tilContent").style.paddingTop = "25px";
    }
  };
  xhttp.open("GET", file, true);
  xhttp.send();
}
