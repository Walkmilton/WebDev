$(document).ready(function() {
  $.simpleWeather({
    location: '55.97905, -3.61054',
    woeid: '',
    unit: 'c',
    success: function(weather) {
      html = '<h2 id="H2"><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
      html += '<p>'+weather.city+', '+weather.region+'</p>';
      html += '<p class="currently">'+weather.currently+'</p>';

      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });
});
