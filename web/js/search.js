// Copyright 2011 The GeoSearch Authors.
// Licensed under the MIT License, see MIT-LICENSE.txt

/**
 * @fileoverview Funcionalidades específicas de pantalla new Local
 *
 * @author Gustavo Lacoste <gustavo.lacoste@tecogroup.ca>
 * @version 0.1 as of 28 Oct 2011
 * @license Copyright 2011 Lacosox.org. All rights reserved.
 * @supported IE6+, WebKit 525+, Firefox 2+.
 */


var Search = function(w, d, config, undefined) {
  var lat = config.lat;
  var lng = config.lng;
  var bound= config.bound;
  var find_loc = config.find_loc;
  var data=config.data;
  var markers = [];
  var GMAP="";
  var geocoder=GeoSearch.getGeocoder();
  
  var _makeLocalMarkerIcon=function(local){

var marker_ico='/images/icons/local_maker_show.png';
console.log(local.category_id);
switch(local.category_id)
{
case '1':
  marker_ico='/images/icons/denuncia.png';
  break;
case '2':
  marker_ico='/images/icons/prevension.png';
case '3':
  marker_ico='/images/icons/carabineros.png';
  break;
}

    var marker = new google.maps.Marker({ 
          map:  GMAP,
          draggable: false,
          icon: new google.maps.MarkerImage(
                    GeoSearch.getUrlRoot()+marker_ico,
                    new google.maps.Size(34, 34), new google.maps.Point(0, 0)),
          position:  new google.maps.LatLng(local.lat, local.lng),
          title: local.nombre_local
    });    

    
   var contentString="<h3>"+local.nombre_local+"</h3><br>"+"<p><a href='"+GeoSearch.getUrlRoot()+"/GUI/event.php?lat="+local.lat+"&lon="+local.lng+"'>Ir a la discusión</a></p>";
   var infowindow = new google.maps.InfoWindow({
    content: '<div style="height: 250px; width: 200px;">'+contentString+'</div>'
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(GMAP, marker);
  });
  return marker;
  }
  
  
  var _updateLiveSearch = function(){
        bound=GMAP.getBounds();
        var c=GMAP.getCenter();
        lat=c.lat();
        lng=c.lng();
        /*geocoder.geocode({'latLng': c}, 
        function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
              $('#find_loc').val(results[0].formatted_address);
            }              
          }
        });*/
      var sw = bound.getSouthWest();
      var ne = bound.getNorthEast();
      var bbox='bbox='+sw.lng()+','+sw.lat()+','+ne.lng()+','+ne.lat();
      var filters='';
      $('input[id^="filterIn"]:checkbox:checked').each( function(i,e) {
        filters+=$(e).attr('id')+'=YES&';
      });
      filters=filters.substring(0, filters.length-1);
      
      $('#info').html(filters+'&'+bbox);   
    }  


    var _initEventListener= function(){
         /* google.maps.event.addListener(GMAP, 'idle', function() {
            if(document.getElementById("live_search").checked){_updateLiveSearch();}
          })
          $('input[id^="filterIn"]:checkbox').change(function() {
              _updateLiveSearch();
          });
          $('#live_search').change(function() {
              if(this.checked){_updateLiveSearch();}
          });    */
    }



  return {

    initMapWithResults: function (){
        
        
         var gmapSearchOptions = {
                mapTypeId: google.maps.MapTypeId.HYBRID,
                mapTypeControl: true,
                mapTypeControlOptions: {
                  style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                  position: google.maps.ControlPosition.TOP_CENTER
                },
                navigationControl: true,
                navigationControlOptions: {
                  style: google.maps.NavigationControlStyle.ZOOM_PAN,
                  position: google.maps.ControlPosition.TOP_LEFT
                },
                scaleControl: true,
                scaleControlOptions: {
                  position: google.maps.ControlPosition.BOTTOM_RIGHT
                },
                zoom: 9,
                center: new google.maps.LatLng(lat,lng)
            };     
          GeoSearch.setGMAP(document.getElementById('map_canvas'), gmapSearchOptions);
          GMAP=GeoSearch.getGMAP();
          GMAP.fitBounds(bound);
          
          $.each(data, function(i, item) {
               var local=_makeLocalMarkerIcon(data[i]);
               markers.push(local);
            //alert(.nombre_local);
          });

          
      },   

    getFind_loc: function(emapid, mapopt){
        return find_loc;
    },
    initEventListener: function(){
      _initEventListener();
    }

  };
}

