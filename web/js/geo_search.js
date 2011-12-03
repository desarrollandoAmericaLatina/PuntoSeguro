// Copyright 2011 The GeoSearch Authors.
// Licensed under the MIT License, see MIT-LICENSE.txt

/**
 * @fileoverview geo_search is the Main JS for the geo_search project.
 *
 * Main controller
 * @author gustavo@lacosox.org (Gustavo Lacoste)
 * @supported IE6+, WebKit 525+, Firefox 2+.
 * @see https://github.com/knxroot/geo_search
 */


/**
 * GeoSearch Master class for the project.
 *
 * Vars on GeoSearch reference to:
 * w the global context.  In most cases this will be 'window'.
 * d the current document.
 * config the global GEOSEARCH_CONFIG config var, GEOSEARCH_CONFIG is defined on
 * the layout
 * @class
 */

var GeoSearch = (function(w, d, config, undefined) {
  var urlRoot = config.urlRoot;
  var isLoggedIn = config.isLoggedIn ? isLoggedIn : false;
  var moduleName = config.moduleName;
  var actionName = config.actionName;
  var geocoder = new google.maps.Geocoder();
  var GMAP = 'none';
  
  var _setGMAP =
      function(el,opts){
        GMAP = new google.maps.Map(el, opts);
      }
  var _autoFormStyle=function(form){
      //
  }

  var _autoCompleteAddr =
      function(el,callback) {
    el.autocomplete({
      //evaluar la dirección que el usuario escribe usando geocodificacion
      source: function(request, response) {
        geocoder.geocode({
            'address': request.term,
            'latLng': new google.maps.LatLng(-38.8890953,-72.9227855),
            'bounds': new google.maps.LatLngBounds(new google.maps.LatLng(-38.7674311,-72.8461155),new google.maps.LatLng(-38.5524561,-72.4662816)),
            'language': 'es',
            'region':'CL'
             },
            function(results, status) {
              response($.map(results, function(item) {
                
                return {
                  label: item.formatted_address,
                  value: item.formatted_address,
                  lat: item.geometry.location.lat(),
                  lng: item.geometry.location.lng(),
                  vp: item.geometry.viewport
                };
              }));
            });
      },
      //This bit is executed upon selection of an address
      select: function(event, ui) {
          // Call callback, if defined.
          callback && callback(ui.item.lat,ui.item.lng,ui.item.vp);
      }
    });
  }
  
  var _geolocationWithMaker=
    function(marker,callback){
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
          GMAP.panTo(pos);
          GMAP.setZoom(11);
          
          marker.setPosition(pos);
          marker.setMap(GMAP);
          
          callback && callback(position);

        }, function() {
          //
        });
      }
    }

  // extend the google.maps.MVCObject
  var _extendNativeMVCObject= function (){

    LatLngBounds.prototype.toBBox = function () {
      var sw = this.getSouthWest();
      var ne = this.getNorthEast();
      return [sw.lng(), sw.lat(), ne.lng(), ne.lat()]
    };

    LatLngBounds.prototype.fromsBBox = function (s) {
      return new GLatLngBounds(new GLatLng(s[1], s[0]), new GLatLng(s[3], s[2]))
    };


  }

  return {
    getModuleName: function(){
        return moduleName;
    },
    getActionName: function(){
        return actionName;
    },
    setGMAP: function(el, opts){
        _setGMAP(el, opts);
        
    },
    getGMAP: function(){
        return GMAP;
    },
    getUrlRoot: function(){
        return urlRoot;
    },
    getGeocoder: function(){
        return geocoder;
    },
    geolocationWithMaker: function(marker,callback){
        return _geolocationWithMaker(marker,callback);
    },
    autoFormStyle: function(form){
        return _autoFormStyle(form);
    },
    
    /** Initialize the autocompletation on the field input 'el'. */
    initAutoCompleteAddr: function(el,callback) {
        
      return _autoCompleteAddr(el,callback);
    }
  };
})(this, this.document, GEOSEARCH_CONFIG);