var mapp;
var mapsearch;
var mapfilter;

function gMap2(){
	var myLatLng = {lat: 41.8781, lng: 87.6298};

        
        mapp = new google.maps.Map(document.getElementById('mapp'), {
          center: myLatLng,
          zoom: 4
        });

        var marker = new google.maps.Marker({
          map: mapp,
          position: myLatLng
        });

        var evone = document.getElementById('onelocation').innerHTML;
        evone = JSON.parse(evone);
        markOneEvent(evone);

}

function markOneEvent(evone){
	
	var info = new google.maps.InfoWindow;
	Array.prototype.forEach.call(evone, function(d){
		//alert(d[15]);
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		strong.textContent = d[2];
		content.appendChild(strong);
		
		var marker = new google.maps.Marker({
          position: new google.maps.LatLng(d[14], d[15]),
          map: mapp
      });

		marker.addListener('mouseover', function(){
			info.setContent(content);
			info.open(map, marker);
		});

	});

}


function gMap3(){
	var myLatLng = {lat: 41.8781, lng: 87.6298};

        
        mapsearch = new google.maps.Map(document.getElementById('mapsearch'), {
          center: myLatLng,
          zoom: 4
        });

        var marker = new google.maps.Marker({
          map: mapsearch,
          position: myLatLng
        });

        var evone = document.getElementById('searchlocation').innerHTML;
        evone = JSON.parse(evone);
        markSearchEvent(evone);

}

function markSearchEvent(evone){
	
	var info = new google.maps.InfoWindow;
	Array.prototype.forEach.call(evone, function(d){
		//alert(d[15]);
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		strong.textContent = d[2];
		content.appendChild(strong);
		
		var marker = new google.maps.Marker({
          position: new google.maps.LatLng(d[14], d[15]),
          map: mapsearch
      });

		marker.addListener('mouseover', function(){
			info.setContent(content);
			info.open(map, marker);
		});

	});

}


function gMap4(){
	var myLatLng = {lat: 41.8781, lng: 87.6298};

        
        mapfilter = new google.maps.Map(document.getElementById('mapfilter'), {
          center: myLatLng,
          zoom: 4
        });

        var marker = new google.maps.Marker({
          map: mapfilter,
          position: myLatLng
        });

        var evone = document.getElementById('filterlocation').innerHTML;
        evone = JSON.parse(evone);
        markFilterEvent(evone);

}

function markFilterEvent(evone){
	
	var info = new google.maps.InfoWindow;
	Array.prototype.forEach.call(evone, function(d){
		//alert(d[15]);
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		strong.textContent = d[2];
		content.appendChild(strong);
		
		var marker = new google.maps.Marker({
          position: new google.maps.LatLng(d[14], d[15]),
          map: mapfilter
      });

		marker.addListener('mouseover', function(){
			info.setContent(content);
			info.open(map, marker);
		});

	});

}




