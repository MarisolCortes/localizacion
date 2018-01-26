<!-- Se escribe un mapa con la localizacion anterior-->
<div id="datos"></div>
<div id="mapholder"></div>

<script type="text/javascript">

if (navigator.geolocation) {

	navigator.geolocation.getCurrentPosition(showPosition,showError);

	function showPosition(position)
		{
		lat=position.coords.latitude;
		lon=position.coords.longitude;
		latlon=new google.maps.LatLng(lat, lon)
		mapholder=document.getElementById('mapholder')
		mapholder.style.height='250px';
		mapholder.style.width='500px';
		var myOptions={
		center:latlon,zoom:16,
		mapTypeId:google.maps.MapTypeId.ROADMAP,
		mapTypeControl:false,
		navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}};

		var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
		var marker=new google.maps.Marker({position:latlon,map:map,title:"q pedo aqui!"});

		var div = document.getElementById("datos");
		div.innerHTML = "Latitud: " + lat + "<br>Longitud: " + lon ;
		}
	function showError(error)
		{
		switch(error.code)
			{
			case error.PERMISSION_DENIED:
				x.innerHTML="Denegada la peticion de Geolocalización en el navegador."

				break;
			case error.POSITION_UNAVAILABLE:
				x.innerHTML="La información de la localización no esta disponible."
				break;
			case error.TIMEOUT:
				x.innerHTML="El tiempo de petición ha expirado."
				break;
			case error.UNKNOWN_ERROR:
				x.innerHTML="Ha ocurrido un error desconocido."
				break;
			}
		}

	} else {alert("¡Error! Este navegador no soporta la Geolocalización.");}


</script>
<script src="http://maps.google.com/maps/api/js?v=3.26&key=AIzaSyDflxHEYyd21yBSbwSpBVQVG58ndc7HRSE&sensor=false"></script>
