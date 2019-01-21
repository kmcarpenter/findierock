var findierock, maps;

findierock = {
	bindPager: function(select, slider_id, page_class, page_id, pages) {
		var f = function(select, slider_id, page_class, page_id, pages) {
			var fromSelect, lastPage, slider;
			fromSelect = false;
			lastPage = 0;
			select = $(select);
			slider = $('<div id="' + slider_id + '"></div>').insertAfter(select).slider({
				min: 1,
				max: pages,
				range: "min",
				value: select[0].selectedIndex + 1,
				change: function(event, ui) {
					if (select[0].selectedIndex == (ui.value - 1) && !fromSelect)
						return;
					
					select[0].selectedIndex = ui.value - 1;
					$(page_class + ":visible").each( 
							function(index)
							{
								var dirIn, dirOut;
								dirIn = (ui.value > lastPage) ? 'right' : 'left';
								dirOut = (ui.value > lastPage) ? 'left' : 'right';
								lastPage = ui.value;
								$(this).hide('slide',{direction: dirIn},400, function()
									{
										$(page_id + ui.value).show('slide',{direction: dirOut},400);
									}
								);
							});
				}
			});
			$(select).change(function() {
				fromSelect = true;
				slider.slider("value", this.selectedIndex + 1);
				fromSelect = false;
			});
		};
		f(select, slider_id, page_class, page_id, pages);
	},
	bindAutoComplete: function(id, url, minLength) {
		$(id).autocomplete({    
 			source: function(req, add){  
 				$.getJSON(url, req, function(data) {    
 					var suggestions = [];  
 		     
 					$.each(data, function(i, val){  
 						suggestions.push(val);  
 					});  
 					add(suggestions);  
 				});  
 			},
 			minLength: minLength
 		});
	},
	bindSearch: function(form, button, url, target) {
		var searchAction = function(e) {
			$.ajax({	
						url: url,
						type: "post",
						data: $(form).serialize(),
						dataType: "json",
						success: function(data) {
							if (data != null) {
								if (data.valid) {
									$(target).html(data.detail);
								}
							}
						}
					});
			e.preventDefault();
		};
				
		$(form).submit(searchAction);
		$(button).click(searchAction);
	},
	saveAlbumRating: function(ui, type, value) {
		$.ajax({ url: "/Albums/save-rating", type: "POST", data: { albumid: $("#albumid").val(), rating: value }});
	},
	saveArtistRating: function(ui, type, value) {
		$.ajax({ url: "/Artists/save-rating", type: "POST", data: { artistid: $("#artistid").val(), rating: value }});
	},
	saveVenueRating: function(ui, type, value) {
		$.ajax({ url: "/Venues/save-rating", type: "POST", data: { venueid: $("#venueid").val(), rating: value }});
	}
};

maps = {
	city: "unknown",
	latitude: 0.0,
	longitude: 0.0,
	events: null,
	initMap: function(cLat, cLong, zoom, div, title) {
		var cityLatLng, options, map;
        cityLatLng = new google.maps.LatLng(cLat, cLong);

        options = {
            zoom: zoom,
            center: cityLatLng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        
        map = new google.maps.Map(document.getElementById(div), options);

        return map;
    },
    addMarker: function(lat, longitude, title, map) {
            var eventLatLng = new google.maps.LatLng( lat, longitude);
            return new google.maps.Marker({ position: eventLatLng, map: map, title: title });
    },
    setMapMarkers: function(markers, div) {
        if (markers.loaded)
                return;
		var map, e;

        map = maps.initMap(maps.latitude, maps.longitude, 8, div, maps.city);

        for(i=0;i<markers.data.length;i++) {
                e = markers.data[i];
                maps.addMarker( e.latitude, e.longitude, e.title, map );
        }

        markers.loaded = true;
    },
    startUpTabs: function(tab, today, tomorrow, mapdivPrefix) {
    	$(tab).tabs({
			show: function(event, ui) {
					if (ui.panel == $("#" + tomorrow)[0]) {
						maps.setMapMarkers(maps.events.tomorrow, mapdivPrefix + tomorrow);
					} else {
						var x = parseInt(ui.panel.id.charAt(3), 10);
						if (!isNaN(x)) {
							maps.setMapMarkers(maps.events.week[x], mapdivPrefix + x);
						}
					}
				}
			});
    	
    	maps.addMaps("maps.startUpTabsCallback");
    },
    addMaps: function(callback)
    {
    	var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=" + callback;
		document.body.appendChild(script);
    },
    startUpTabsCallback: function() {
		maps.setMapMarkers(maps.events.today, "maptoday");
    },
    startUpDummy: function() {
    	
    },
    getLatLong: function(address, id)
    {
    	geocoder = new google.maps.Geocoder();
    	geocoder.geocode( { 'address': address}, function(results, status) {
    	      if (status == google.maps.GeocoderStatus.OK) {
    	    	  var loc = results[0].geometry.location
    	    	  $(id).html(loc.toUrlValue());
    	      }
    	});
    }
};