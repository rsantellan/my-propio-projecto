// Register event listeners to each marker to open a shared info
// window displaying the marker's position when clicked or dragged.
function onDragEndMarker(marker){

    var markerLatLng = marker.getPosition();
    var lat  = markerLatLng.lat();
    var lng  = markerLatLng.lng();
    $.ajax({
        url: __MD_CONTROLLER_FRONTEND_SYMFONY + '/google-map-coordinates',
        data: { latitude: lat, longitude: lng, object_class_name: marker.get("object_class_name"), object_id: marker.get("object_id") },
        type: 'post',
        dataType: 'json',
        success: function(json){
            if(json.response == "OK"){

            }else {

            }
        },
        complete: function(){

        },
	error: function(){
	}
    });

}