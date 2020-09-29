



var map = L.map('map',{
    center: [41.178346, -8.595829],
    zoom: 15,
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: ''
    }).addTo(map);

    var firefoxIcon = L.icon({
      iconUrl: 'img/icon.png',
      iconSize: [48, 55], // size of the icon
      });
      map.scrollWheelZoom.disable();
      map.on('focus', () => { map.scrollWheelZoom.enable(); });
      map.on('blur', () => { map.scrollWheelZoom.disable(); });
  var marker = L.marker([41.178346, -8.595829], {icon: firefoxIcon}).addTo(map).bindPopup('<h3><b>ExplicaFeup</b></h3><br><b>phone: </b>(+351) 926789452<br><b>Email: </b>explicaFeup@example.com<br> <b>Adress: </b> R. Dr. Roberto Frias, 4200-465 Porto').addTo(map);;
