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

var Local = (function(w, d) {
  var name = '';
  var description = '';
  var location= new google.maps.LatLng(-33.44, -70.63); /*Santiago, Chile*/
  var direction = '';
  var marker = '';
  var editionMode=false;
  var GMAP='';

  /* Center the map on a specific direction or show the contaniner error */
  function _centerMapOnDirection(direction, errorContainer){;
    GeoSearch.getGeocoder().geocode({'address':direction},
        function(results, status){
          if(status == google.maps.GeocoderStatus.OK){
              errorContainer.hide();
              var address='';
              if (results[0]) {
                address=results[0].formatted_address;
              }
              marker.setPosition(results[0].geometry.location);
              _updateLocalPosition(marker.getPosition(),address);
              _centerMapOnLocation(results[0].geometry.location);
              
              
          }else{
            errorContainer.effect("shake",{ times:3 }, 300)
            alert("No se pudieron determinar las coordenadas exactas");
          }
        }
    );
  }
  
  function _centerMapOnLocation(location){
      GMAP.setCenter(location);              
      GMAP.panTo(location);
      GMAP.setZoom(13);
  }
  

  
  function _updateLocalPosition(position,dir){
      $('#local_lat').val(position.lat());
      $('#local_lng').val(position.lng());
      $('#local_direccion').val(dir);      
      location=position;
      direction=dir;
  }

  return {
    
    setEditionMode: function(mode){
        editionMode=mode; 
    },
    
    getEditionMode: function(){
        return editionMode; 
    },
    
    
    setLocation: function(lat,lng){
        location = new google.maps.LatLng(lat, lng); 
    },
    
    getLocation: function(){
        return location; 
    },
    
    initFormCreateNew: function(emapid, mapopt){

        if(GeoSearch.getActionName()=='edit'){
            editionMode=true;
            location= new google.maps.LatLng($('#local_lat').val(), $('#local_lng').val());
        }
        
        
        var gmapNewLocalOptions = {
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
            zoom: 11,
            center: location
        };        
        
        GeoSearch.setGMAP(document.getElementById('map_canvas'), gmapNewLocalOptions);
        var geocoder=GeoSearch.getGeocoder();
        GMAP=GeoSearch.getGMAP();
        /*represent the position of the local*/
        marker = new google.maps.Marker({ 
          map:  GMAP,
          draggable: true,
          icon: new google.maps.MarkerImage(
                    GeoSearch.getUrlRoot()+'/images/icons/local_maker.png', 
                    new google.maps.Size(34, 34), new google.maps.Point(0, 0))
        });
        marker.setPosition(location);
        GMAP.setCenter(location);

        // if not edition mode then calculate the geolocation...(if is possible)
        

        
        if(!editionMode){
            GeoSearch.geolocationWithMaker(marker,function(position){
                $('#local_lat').val(marker.getPosition().lat());
                $('#local_lng').val(marker.getPosition().lng());
                
                geocoder.geocode({'latLng': marker.getPosition()}, 
                function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                  var address='';
                  if (results[0]) {
                    address=results[0].formatted_address;
                  }
                  _updateLocalPosition(marker.getPosition(),address);
                }
                });
            });
        }
        
        /* Disable submit on button click, center the map on the direction */
        $("#goto-position-button").click(function (e) {
            e.preventDefault();
            $('#mapa_error_posicion_container').hide();
            _centerMapOnDirection($("#local_direccion").val(),
                                  $('#mapa_error_posicion_container'));
        });
        
        /* Disable submit on enter key press, center the map on the direction */
        $('#local_direccion').keypress(function(e) {
          $('#mapa_error_posicion_container').hide();
          if(e.which == 13) {
            e.preventDefault();
            $(this).blur();
            _centerMapOnDirection($("#local_direccion").val(),
                                  $('#mapa_error_posicion_container'));
          }
        });

        google.maps.event.addListener(marker, 'drag', function() {
            geocoder.geocode({'latLng': marker.getPosition()}, 
            function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  var address='';
                  if (results[0]) {
                    address=results[0].formatted_address;
                  }
                  _updateLocalPosition(marker.getPosition(),address);               
              }
            });
        });


        GeoSearch.initAutoCompleteAddr($('#local_direccion'),function(lat, lng, vp){
           if(vp){
               GMAP.fitBounds(vp);
               marker.setPosition(new google.maps.LatLng(lat, lng));
               marker.setMap(GMAP);
               _updateLocalPosition(new google.maps.LatLng(lat, lng),$("#local_direccion").val());
           }else{
               _centerMapOnLocation(new google.maps.LatLng(lat, lng));
               marker.setPosition(new google.maps.LatLng(lat, lng));
               marker.setMap(GMAP);
               _updateLocalPosition(new google.maps.LatLng(lat, lng),$("#local_direccion").val());
           }
           
        });
        
        
    }
  };
})(this, this.document);


