/**
 * @fileoverview Librería base para Webmapping, versión para testeos.
 *
 * @author Danilo Lacoste <danilo.lacoste@tecogroup.ca>
 * @license Copyright 2011 Tecogroup. All rights reserved.
 *
 * TECO
 * www.teco.cl
 * Valenzuela Puelma #9730, Las Condes, Chile
 * El Convento #762, Las Condes, Chile
 */

var geocoder;
var map;
var mc; //mapclusterer
var todos_los_puntos = [];
var infoWindow = new google.maps.InfoWindow();
var totalBounds;

var santiago_p = new google.maps.LatLng("-33.40000", "-70.66667");
var default_zoom = 9;


/**
 * Initialize declare a maps properties and start configurations
 */
function initialize() {

  geocoder = new google.maps.Geocoder();
  var myOptions = {
    zoom: default_zoom,
    center: santiago_p,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControlOptions: {
      position: google.maps.ControlPosition.TOP_LEFT,
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    }
    
  };
  //alert("HOLA");
  map = new google.maps.Map(document.getElementById('map'), myOptions);


  google.maps.event.addListener(map, 'bounds_changed', function() {
    var zoomLevel = map.getZoom();
    var centro_c = map.getCenter();
    //if (zoomLevel >= 15) { map.setZoom(15); }
    if (zoomLevel <= 2) {
      map.setZoom(2);
      map.setCenter(centro_c);
    }
    if (zoomLevel >= 18) {
      map.setZoom(18);
    }

  });

  var mcOptions = {
    gridSize: 50, 
  maxZoom: 17
};

  mc = new MarkerClusterer(map, [], mcOptions);

}


/**
 * Dada una dirección (extraída desde el campo address) esta función retorna la
 * posición georeferenciada donde se encuentra dicha dirección.
 *
 * @see http://code.google.com/intl/es-ES/apis/maps/documentation/javascript/services.html
 */
function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode({
    'address': address
  }, function(results, status) {

    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}


/********* By danilo ***/
geocoder = new google.maps.Geocoder();
geocoder.responseIndex = 0;
geocoder.responseSet = [];


/**
 * Dada una dirección (extraída desde el campo address) esta función retorna la
 * posición georeferenciada donde se encuentra dicha dirección.
 *
 * @see http://code.google.com/intl/es-ES/apis/maps/documentation/javascript/services.html
 */
function getLatLng(direccion, nombre, id_obra) {

  geocoder.geocode({
    'address': direccion + ', Chile',
    'region': 'CL'
  }, function(results, status) {

    if (status == google.maps.GeocoderStatus.OK && results[0]) {

      //geocoder.responseSet.push(results);
      show_point(results[0].geometry.location, numero_icono, nombre, id_obra, direccion);
      //geocoder.responseIndex++;
    } else {
      //alert("Geocode was not successful for the following reason: " + status);
      ////;
    }
  });
}


/**
 * Dada una dirección y un nombre, busca la posición en el mapa y ajusta el mapa
 * para visualizar todo el contenido.
 *
 * @see http://code.google.com/intl/es-ES/apis/maps/documentation/javascript/services.html
 */
function getPoint(direccion, numero_icono, nombre, id_obra) {

  geocoder.geocode({
    'address': direccion + ', Chile',
    'region': 'CL'
  }, function(results, status) {

    if (status == google.maps.GeocoderStatus.OK && results[0]) {

      //geocoder.responseSet.push(results);
      show_point(results[0].geometry.location, numero_icono, nombre, id_obra, direccion);
      //geocoder.responseIndex++;
    } else {
      //alert("Geocode was not successful for the following reason: " + status);
      //;
    }
  });
}


/**
 * Esta función sólo carga un punto en el mapa y centrar el mapa a un zoom digno
 */
function getPoint_only_one(direccion, numero_icono, nombre) {
  geocoder.geocode({
    'address': direccion + ', Chile',
    'region': 'cl'
  }, function(results, status) {

    if (status == google.maps.GeocoderStatus.OK && results[0]) {
      var companyLogo = new google.maps.MarkerImage('images/map_icons/' + numero_icono + '_azul.png');
      var marker = new google.maps.Marker({
        map: map,
        icon: companyLogo,
        position: results[0].geometry.location,
        title: nombre
      });

      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
      });
      map.setCenter(results[0].geometry.location);
      map.setZoom(16);
    } else {
      //alert("Geocode was not successful for the following reason: " + status);
      //;
    }
  });

}


/**
 * Crea un marcador que representa un punto (organización)
 * @param {string} lat la latitud como string.
 * @param {string} lng la longitud como string.
 * @param {string} numero_icono nombre ícono que se usará para representar a la
 * organización.
 * @param {string} nombre nombre de la organización.
 */
function getPoint_only_one_point(lat, lng, numero_icono, nombre) {
  var companyLogo = new google.maps.MarkerImage('images/map_icons/' + numero_icono + '_azul.png');
  var marker = new google.maps.Marker({
    map: map,
    icon: companyLogo,
    position: new google.maps.LatLng(lat, lng),
    title: nombre
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
  });
  map.setCenter(new google.maps.LatLng(lat, lng));
  map.setZoom(16);
}


/**
 * Crea un marcador y centra el mapa en dicha dirección
 * @param {string} dir dirección.
 * @deprecated
 */
function show_direccion(dir) {

  var tmp_direccion = getPoint(dir);
  //alert(tmp_direccion);

  if (tmp_direccion != null) {
    map.setCenter(tmp_direccion);
    var marker = new google.maps.Marker({
      map: map,
      position: tmp_direccion
    });
  }
}


function show_point(point, numero_icono, nombre, id_ayuda, direccion) {

  //	map.setCenter(point);
  //alert(point+","+numero_icono+","+nombre+","+id_obra+","+direccion)
  if (numero_icono == 0) {
    numero_icono = 'blanco';
  }
  var companyLogo = new google.maps.MarkerImage('images/maker.png');

  var marker = new google.maps.Marker({
    map: map,
    icon: companyLogo,
    position: point,
    title: nombre
  });

  //var contentString = '<div style="min-height:100px">' + '<b>' + nombre + '</b><br>' + '<p>Dirección: ' + direccion + '</p>' + '<p><a target="_blank" href=ficha_ayuda.php?id_ayuda=' + id_ayuda + '>Ver m&aacute;s detalles de la ayuda</a></p>' + '</div>';
  //var contentString = contentString+$('#test').html();
 var titulo= nombre;
 var detalle=direccion;

  
var contentString = '<div class="result_en_infowindows" style="width: 408px">'+
'<ul style="    list-style:none;margin:0;margin-left: -30px; margin-top: -2px">'+
'    <li style="top: 15px; botoom: 15px;padding: 5px;height: 83px;position: relative;border: 1px solid #DADADA;">'+
'        <div style="position:absolute;left:2px;top:2px;width:50px;height:89px;z-index:0">'+
'            <a href="ficha_organizacion.php?id_organizacion=23">'+
'              <img width="50" height="50px" src="uploads/f_org/nuestroshijos.JPG" class="img-logo">'+
'            </a>'+
'        </div>'+
'        <div style="padding:5px;margin:0;position:absolute;left:56px;top:2px;width:250px;height:88px;text-align:left;z-index:1;">'+
'          <font style="font-size:13px" color="#F38307" face="Arial">'+
'            <b><a href="ficha_ayuda.php?id_ayuda=1">'+titulo+'</a></b>'+
'          </font><br>'+
'          <font style="font-size:11px" color="#6A6A6A" face="Arial">'+detalle+'</font>'+
'        </div>'+
'        <div style="position:absolute;left:317px;width:75px;top:35px;height:18px;z-index:4" title="AYUDAR">'+
'            <!-- Boton ayuda -->'+
'            <a href="ficha_ayuda.php?id_ayuda='+id_ayuda+'" class="verayuda_btn">'+
'              <div class="btn_ayudar_secundario"></div>'+
'            </a>'+
'        </div>'+
'        <div style="position:absolute;left:317px;top:70px;width:75px;height:20px;z-index:3; " title="AYUDAR">'+
'            <div class="addthis_btns" style="margin-left: 10px;">'+
'					  <div addthis:title="#Ayudar.cl" addthis:url="http://www.ayudar.cl/ficha_ayuda.php?id_ayuda='+id_ayuda+'" class="addthis_toolbox addthis_default_style">'+
'                                           <a class="addthis_button_twitter at300b" title="Tweet This" href="#"><span class="at300bs at15nc at15t_twitter"></span></a>'+
'                                           <a class="addthis_button_facebook at300b" title="Send to Facebook" href="#"><span class="at300bs at15nc at15t_facebook"></span></a>'+
'                                           <a class="addthis_button_email at300b" title="Email" href="#"><span class="at300bs at15nc at15t_email"></span></a>'+
'                                         </div>'+
'            </div>'+
'        </div>'+
'    </li>'+
'</ul>'+
'</div>';
  
  
  
  
var infowindow = new google.maps.InfoWindow({
    content: '<div style="height: 250px; width: 455px;">'+contentString+'</div>'
//	content: '<div>'+contentString+'</div>'
  });



  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
  });


  //	map.fitBounds(totalBounds); // revisar esto, se producen muchos zoom seguidos.
  //   todos_los_puntos.push(marker);
  mc.addMarker(marker);
  todos_los_puntos.push(marker);
}


function show_point_as_one_point(point , descripcion, alto) {

  var marker = new google.maps.Marker({
    map: map,
    icon: new google.maps.MarkerImage('images/maker.png'),
    position:  point,
    title: ""
  });

  var contentString = ''+
      '<div class="result_en_infowindows" style="width: 408px">'+
                      '<ul style="    list-style:none;margin:0;margin-left: -30px; margin-top: -2px">'+
                      descripcion+
                      '</ul>'+
                      '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: '<div style="height: '+alto+'px; width: 415px;">'+contentString+'</div>'
//  content: '<div style="width: 415px;">'+contentString+'</div>'
  });





  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
    addthis.toolbox(".addthis_toolbox");
  });
  mc.addMarker(marker);
  todos_los_puntos.push(marker);
}


function reajustar_zoom_mapa() {
  map.fitBounds(totalBounds);
}


function clear_map() {

  while (todos_los_puntos[0]) {
    todos_los_puntos.pop().setMap(null);
  }

  totalBounds = new google.maps.LatLngBounds();
  infoWindow.close();

  mc.clearMarkers();
}

function showAll() {
  map.fitBounds(totalBounds);
  infoWindow.close();
}

function Centrar_al_punto_ultima_busqueda(id_punto) {

  map.setCenter(todos_los_puntos[id_punto].getPosition());
  map.setZoom(16);
}

function reset_map() {
  map.setCenter(santiago_p);
  map.setZoom(default_zoom);
}
