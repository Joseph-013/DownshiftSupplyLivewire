
async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    const map = new Map(document.getElementById("map"), {
        center: { lat: 14.629639825768203, lng: 121.0009090238659 },
        zoom: 14,
        mapId: "c1568d819b26135",
    });
    const contentString = '<p><b>Downshift Supply</b></p>';
    const infowindow = new google.maps.InfoWindow({
        content: contentString,
        ariaLabel: "Downshift Supply",
    });
    const marker = new AdvancedMarkerElement({
        map,
        position: { lat: 14.629639825768203, lng: 121.0009090238659 },
        title: "Downshift Supply"
    });
    marker.addListener("click", () => {
        infowindow.open({
            anchor: marker,
            map,
        });
    });
}

initMap();
