var geocoder;
var map;
var mapp;
function gMap(){
	var myLatLng = {lat: 41.8781, lng: 87.6298};

        // Create a map object and specify the DOM element
        // for display.
        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 4
        });

        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          title: 'Hello World!'
        });

        var loc = document.getElementById('location').innerHTML;
        loc = JSON.parse(loc);
        geocoder = new google.maps.Geocoder();
        codeAddress(loc);

        var ev = document.getElementById('evlocation').innerHTML;
        ev = JSON.parse(ev);
        markAllEvents(ev);

        /*var evone = document.getElementById('onelocation').innerHTML;
        evone = JSON.parse(evone);
        console.log(evone);
        markOneEvent(evone);*/

}

function gMap2(){
	var myLatLng = {lat: 41.8781, lng: 87.6298};

        // Create a map object and specify the DOM element
        // for display.
        mapp = new google.maps.Map(document.getElementById('mapp'), {
          center: myLatLng,
          zoom: 4
        });

        var marker = new google.maps.Marker({
          map: mapp,
          position: myLatLng
          //title: 'Hello World!'
        });

        var evone = document.getElementById('onelocation').innerHTML;
        evone = JSON.parse(evone);
        //console.log(evone);
        markOneEvent(evone);

}

function markOneEvent(evone){
	//var myLatLng = {lat: 41.8781, lng: 87.6298};
	/*var info = new google.maps.InfoWindow;
	Array.prototype.forEach.call(evone, function(d){
		//alert(d[15]);
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		strong.textContent = d[2];
		content.appendChild(strong);
		
		var marker = new google.maps.Marker({
          position: new google.maps.LatLng(d[14], d[15]),
          map: map
      });

		marker.addListener('mouseover', function(){
			info.setContent(content);
			info.open(map, marker);
		});

	});*/


	var info = new google.maps.InfoWindow;
	Array.prototype.forEach.call(evone, function(d){
		//alert(d[15]);
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		strong.textContent = d[2];
		content.appendChild(strong);
		
		var marker = new google.maps.Marker({
          position: new google.maps.LatLng(d[14], d[15]),
          map: map
      });

		marker.addListener('mouseover', function(){
			info.setContent(content);
			info.open(map, marker);
		});

	});




}

function markAllEvents(ev){
	var info = new google.maps.InfoWindow;
	Array.prototype.forEach.call(ev, function(d){
		//alert(d[15]);
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		strong.textContent = d[2];
		content.appendChild(strong);
		var marker = new google.maps.Marker({
          position: new google.maps.LatLng(d[14], d[15]),
          map: map
      });

		marker.addListener('mouseover', function(){
			info.setContent(content);
			info.open(map, marker);
		});

	});
}


function codeAddress(loc) {
	Array.prototype.forEach.call(loc, function(d){
		   	var loca = d[2] + ' ' + d[6] + ' ' + d[8] + ' ' + d[9] + ' ' + d[10];
		    geocoder.geocode( { 'address': loca}, function(results, status) {
		      if (status == 'OK') {
		        map.setCenter(results[0].geometry.location);
		        var p = {};
		        p.id = d[0];
		        p.lat = map.getCenter().lat();
		        p.lng = map.getCenter().lng();
		        insertLatandLng(p);		        
		      } else {
		        alert('Geocode was not successful for the following reason: ' + status);
		      }
    	});
	});

  }


function insertLatandLng(p){

	$.ajax({
		url: "insertLatLng.php",
		method: "post",
		data: p,
		success: function(result){
				console.log(result);
		}
	});

	
}



