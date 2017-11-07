function myMap() {
  var mapOptions = {
    center: new google.maps.LatLng(55.97905, -3.61054),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.HYBRID
  }
  var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
