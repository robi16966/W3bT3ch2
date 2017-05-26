var	map = {
	options: {
		zoom: 15,
		center: new google.maps.LatLng(48.151853,17.073345),

	},
	markers:{
			list:
				[
						[
							"Slovenská Technická Univerzita  - Fakulta Elektrotechniky a Informatiky",
							48.151853,
							17.073345
						]
				],
			classList: {markers: [], infos: []},
			bus_stations: [],
			bus_stations_infos: []

		},
	container: null,
	streetview: null,
	directionsService: null,
	placeService: null,
	transitLayer: null,
  	renderer: null,
};


var form = {
	autocomplete: null,
	controls: {
		startPoint: null,
		startPointSearchbox: null
	}
};




function init() {
 	map.container = new google.maps.Map(document.getElementById('googlemap'), map.options);
 	map.renderer = new google.maps.DirectionsRenderer({suppressMarkers: true});
 	map.placeService = new google.maps.places.PlacesService(map.container);
 	map.renderer.setMap(map.container);
 	map.transitLayer = new google.maps.TransitLayer();
 	map.transitLayer.setMap(map.container);
 	map.directionsService = new google.maps.DirectionsService();
 	map.streetview =  new google.maps.StreetViewPanorama(document.getElementById('streetview'),
 	{
 		//https://maps.google.com/maps?z=17&layer=c&cbll=48.15161,17.072415&panoid=kZoBfs0SK2tjmZxmGZa0JA&cbp=12,62.287927391663644,,-2,2.1308098988540563&hl=sk-SK&gl=US&mapclient=apiv3
   		position: new google.maps.LatLng(48.15161,17.072415),
   		pov: {
   			heading:60,
   			pitch:0
   		}

	});
	map.container.setStreetView(map.streetview);

 	form.controls.startPoint = document.getElementById('autocomplete');
 	form.autocomplete = new google.maps.places.Autocomplete(form.controls.startPoint,{ types: ['geocode'] });
 	form.autocomplete.bindTo('bounds', map.container);
 	form.controls.startPointSearchbox = new google.maps.places.SearchBox(form.controls.startPoint);

	google.maps.event.addListener(form.controls.startPointSearchbox, 'place_changed', function(e) {
  		getRoute($('#routeForm').serializeArray());

   	});



  	google.maps.event.addListener(form.autocomplete, 'place_changed', function(e) {
  		getRoute($('#routeForm').serializeArray());

   	});




}

function closeAllInfoWindows() {
	for(var i=0;i < map.markers.classList.infos.length; i++) {
		map.markers.classList.infos[i].close();
	}
}



function getRoute(f) {
   var place = form.autocomplete.getPlace();
   var selectedMode = f[1].value;
   if(!place || place && !place.geometry)
   	return false;

   var request = {
       origin: place.geometry.location,
       destination: map.options.center,
       travelMode: google.maps.TravelMode[selectedMode]
   };

   map.directionsService.route(request, function(response, status) {
     if (status == google.maps.DirectionsStatus.OK) {
     	closeAllInfoWindows();
     	map.markers.classList.infos[0].open(map.container,map.markers.classList.markers[0]);
     	map.renderer.setDirections(response);

 		var warns = response.routes[0].warnings;
 		var warnings = $('#warnings');
     	warnings.html('');
     	warnings.hide();
     	if(warns.length > 0) {
     		for(var i = 0; i<warns.length;i++) {
     			warnings.append('<li>'+warns[i]+'</li>');
     		}
     		warnings.show();
     	}

 		var step = response.routes[0].legs[0].steps;
 		var steps = $('#steps');
     	steps.html('');
     	steps.hide();

     	if(step.length > 0) {
     		for(var i = 0; i<step.length;i++) {
     			steps.append('<li>'+step[i].instructions+' (Vzdialenost: '+step[i].distance.text+' Cas: '+step[i].duration.text+') </li>');
     		}
     		steps.show();
     	}

     	$('#distance').html(response.routes[0].legs[0].distance.text);

     	map.placeService.nearbySearch({
     		location: map.options.center,
     		radius: '500',
     		types: ['bus_station']
     	}, function(res,s) {
     		var busstops = $('#busstops');
     		var busstopsinfo = $('#bussinfo');
     		var mark,info,lat,lng;
     		busstops.html('');
     		busstops.hide();
     		clearBusMarkers();
			if (s == google.maps.places.PlacesServiceStatus.OK) {
				if(res.length > 0) {
					for(var i = res.length-1; i>=0;i--) {

				     	lat = res[i].geometry.location.k;
				     	lng = res[i].geometry.location.D;
				     	info =  new google.maps.InfoWindow({
					       content: lat + "<br>" + lng
					    });


						mark = new MarkerWithLabel({
					       position: res[i].geometry.location,
					       map: map.container,
					       draggable: false,
					       raiseOnDrag: false,
					       labelContent: res[i].name,
					       labelAnchor: new google.maps.Point(-20, 60),
					       labelClass: "maplabel",
					       labelInBackground: true,
					       info: info

				     	});

						busstops.append('<li>'+res[i].name+'</li>');




						map.markers.bus_stations.push(mark);
						map.markers.bus_stations_infos.push(info);

						google.maps.event.addListener(mark, "click", function (e) {

							this.info.open(map.container, this);
						});


					}

				}
				busstops.show();
			}
     	});

     	//console.log(map.markers.classList.markers[0])

     }
   });
   $('#details').show();
}

function clearBusMarkers() {
	if(map.markers.bus_stations.length > 0) {
		for (var i = map.markers.bus_stations.length - 1; i >= 0; i--) {
			map.markers.bus_stations[i].setMap(null);
			map.markers.bus_stations[i] = null;
			map.markers.bus_stations_infos[i].setMap(null);
			map.markers.bus_stations_infos[i] = null;
		};
		map.markers.bus_stations = [];
		map.markers.bus_stations_infos = [];
	}
}


function setMarkers() {
	var tmp,marker, infoWindow;
	for (var i =  map.markers.list.length - 1; i >= 0; i--) {
		tmp = new google.maps.LatLng(map.markers.list[i][1], map.markers.list[i][2]);
		 marker = new MarkerWithLabel({
	       position: tmp,
	       map: map.container,
	       draggable: false,
	       raiseOnDrag: false,
	       labelContent: map.markers.list[i][0],
	       labelAnchor: new google.maps.Point(-20, 60),
	       labelClass: "maplabel",
	       labelInBackground: true,
     	});

	  	infoWindow = new google.maps.InfoWindow({
	       content: map.markers.list[i][1] + "<br>" + map.markers.list[i][2]
	    });


	    google.maps.event.addListener(marker, "click", function (e) { infoWindow.open(map.container, this); });

	    map.markers.classList.markers.push(marker);
	    map.markers.classList.infos.push(infoWindow);


	}
}


jQuery(document).ready(function($) {
	var details = $('#details');

	details.hide();
	init();
	setMarkers();
	var f = $('#routeForm');


	f.submit(function(e,data){
		details.hide();
		getRoute(f.serializeArray());

		e.preventDefault();
		return false;
	});
	f.find('input[type="radio"]').change(function(){
		getRoute(f.serializeArray());
	});


});