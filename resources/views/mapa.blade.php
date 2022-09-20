<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Mapa simple de OpenStreetMap con Leaflet</title>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css">
</head>
<body>
<h1>Mapa simple de OpenStreetMap con Leaflet</h1>  
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>	  
<div id="map" class="map map-home" style="margin:12px 0 12px 0;height:400px;"></div>
<script>
	var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
		osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});
	var map = L.map('map').setView([-26.82414, -65.2226], 12).addLayer(osm);
	

    ubicacion();

    function ubicacion()
    {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(muestraPosicion);
      }


}

function muestraPosicion(pos){
  L.marker([pos.coords.latitude, pos.coords.longitude])
		.addTo(map)
		.bindPopup('Punto de referencia.')
		.openPopup();
}

</script>
  </body>
</html>