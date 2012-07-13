var mdGoogleMap = {
  map: null,
  infoWindow: null
};

/**
 * Called when clicking anywhere on the map and closes the info window.
 */
mdGoogleMap.closeInfoWindow = function() {
  mdGoogleMap.infoWindow.close();
};

/**
 * Opens the shared info window, anchors it to the specified marker, and
 * displays the marker's position as its content.
 */
mdGoogleMap.openInfoWindow = function(marker) {
  /*var markerLatLng = marker.getPosition();
  mdGoogleMap.infoWindow.setContent([
    '<b>Marker position is:</b><br/>',
    markerLatLng.lat(),
    ', ',
    markerLatLng.lng()
  ].join(''));
  mdGoogleMap.infoWindow.open(mdGoogleMap.map, marker);*/
},


mdGoogleMap.setCenter = function(lat, lng){
    var latLng = new google.maps.LatLng(lat, lng);
    mdGoogleMap.map.setCenter(latLng);
},

/**
 * Called only once on initial page load to initialize the map.
 */
mdGoogleMap.init = function(options) {

    this.options_default = {
        latitude : -33.1,
        longitude: -56.1,
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scroll: false,
        localSearch: false,
        markers: [],
        onClickMarker: null,
        onDragEndMarker: null
    }

    options = options || {};

    this.latitude   = (typeof options.latitude == 'undefined' ? this.options_default.latitude : options.latitude);
    this.longitude  = (typeof options.longitude == 'undefined' ? this.options_default.longitude : options.longitude);
    this.zoom       = (typeof options.zoom == 'undefined' ? this.options_default.zoom : options.zoom);
    this.mapTypeId  = (typeof options.mapTypeId == 'undefined' ? this.options_default.mapTypeId : options.mapTypeId);
    this.scroll     = (typeof options.scroll == 'undefined' ? this.options_default.scroll : options.scroll);
    this.localSearch= (typeof options.localSearch == 'undefined' ? this.options_default.localSearch : options.localSearch);
    this.markers    = (typeof options.markers == 'undefined' ? this.options_default.markers : options.markers);
    this.onClickMarker= (typeof options.onClickMarker == 'undefined' ? this.options_default.onClickMarker : options.onClickMarker);
    this.onDragEndMarker= (typeof options.onDragEndMarker == 'undefined' ? this.options_default.onDragEndMarker : options.onDragEndMarker);

    // Create single instance of a Google Map.
    var centerLatLng = new google.maps.LatLng(this.latitude , this.longitude);
    mdGoogleMap.map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: this.zoom,
        center: centerLatLng,
        mapTypeId: this.mapTypeId
    });
    
    var marker1;
    for (var i = 0; i < this.markers.length; ++i)
    {
        centerLatLng = new google.maps.LatLng(this.markers[i].latitude , this.markers[i].longitude);
        // Add multiple markers
        // First random marker
        marker1 = new google.maps.Marker({
            map: mdGoogleMap.map,
            position: centerLatLng,
            draggable: this.markers[i].draggable
        });
        
        marker1.set("object_class_name", this.markers[i].object_class_name);
        marker1.set("object_id", this.markers[i].object_id);
        
        // Register event listeners to each marker to open a shared info
        // window displaying the marker's position when clicked or dragged.
        google.maps.event.addListener(marker1, 'click', function() {
            if(typeof mdGoogleMap.onClickMarker == 'function')
                mdGoogleMap.onClickMarker(marker1);
        });

        google.maps.event.addListener(marker1, 'dragend', function() {
            if(typeof mdGoogleMap.onDragEndMarker == 'function')
                mdGoogleMap.onDragEndMarker(marker1);
        });

    }

    // Create a single instance of the InfoWindow object which will be shared
    // by all Map objects to display information to the user.
    mdGoogleMap.infoWindow = new google.maps.InfoWindow();

    // Make the info window close when clicking anywhere on the map.
    google.maps.event.addListener(mdGoogleMap.map, 'click', mdGoogleMap.closeInfoWindow);

}
