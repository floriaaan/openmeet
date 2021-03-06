var mymap = L.map('map').setView([46.728427, 2.611003], 4);

function displayMap() {
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom: 18,
            attribution: 'OpenMeet',
            id: 'mapbox.streets'
        })
        .addTo(mymap);
}

function displayEvent(lon, lat) {
    var greenIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });


    L.marker([lat, lon], {icon: greenIcon})
        .addTo(mymap);


}
