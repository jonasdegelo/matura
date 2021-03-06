Array.prototype.max = function() {
return Math.max.apply(null, this);
};
Array.prototype.min = function() {
return Math.min.apply(null, this);
};

var latMax = lat.max();
var latMin = lat.min();
var lngMax = lng.max();
var lngMin = lng.min();

var centerLat = (latMax + latMin)/2;
var centerLng = (lngMax + lngMin)/2;

function initMap() {
var map = new google.maps.Map(document.getElementById('map'), {
    //zoom: 12,
    //center: {lat: centerLat, lng: centerLng},
    center: new google.maps.LatLng(0, 0),
    zoom: 0,
    mapTypeId: 'terrain'
});
//create array of latlng objects from arrays
var trackCoordinates = [];
var length = lat.length;
for(i=0; i<length; i++){
    var point = new google.maps.LatLng(lat[i],lng[i]);
    trackCoordinates.push(point);
}
var track = new google.maps.Polyline({
    path: trackCoordinates,
    geodesic: true,
    strokeColor: '#66a0ff',
    strokeOpacity: 1.0,
    strokeWeight: 4
});
var latlngbounds = new google.maps.LatLngBounds();
        for (var i = 0; i < trackCoordinates.length; i++) {
            latlngbounds.extend(trackCoordinates[i]);
        }
map.fitBounds(latlngbounds);
track.setMap(map);
}