<<<<<<< HEAD
timely.define(["jquery_timely","domReady","ai1ec_config","scripts/add_new_event/event_location/input_coordinates_utility_functions","external_libs/jquery.autocomplete_geomod","external_libs/geo_autocomplete"],function(e,t,n,r){var i,s,o,u,a,f,l=function(t){e("input.longitude").val(t.latLng.lng()),e("input.latitude").val(t.latLng.lat()),e("#ai1ec_input_coordinates:checked").length===0&&e("#ai1ec_input_coordinates").trigger("click")},c=function(){!navigator.geolocation||navigator.geolocation.getCurrentPosition(function(e){var t=r.check_if_address_or_coordinates_are_set();if(t===!1){var n=e.coords.latitude,i=e.coords.longitude;s=new google.maps.LatLng(n,i),a.setPosition(s),u.setCenter(s),u.setZoom(15),f=e}})},h=function(){n.disable_autocompletion||e("#ai1ec_address").geo_autocomplete(new google.maps.Geocoder,{selectFirst:!1,minChars:3,cacheLength:50,width:300,scroll:!0,scrollHeight:330,region:n.region}).result(function(e,t){t&&d(t)}).change(function(){if(e(this).val().length>0){var t=e(this).val();i.geocode({address:t,region:n.region},function(e,t){t===google.maps.GeocoderStatus.OK&&d(e[0])})}})},p=function(){i=new google.maps.Geocoder,s=new google.maps.LatLng(9.965,-83.327),o={zoom:0,mapTypeId:google.maps.MapTypeId.ROADMAP,center:s},t(function(){e("#ai1ec_map_canvas").length>0&&(u=new google.maps.Map(e("#ai1ec_map_canvas").get(0),o),a=new google.maps.Marker({map:u,draggable:!0}),google.maps.event.addListener(a,"dragend",l),a.setPosition(s),c(),h(),m())})},d=function(t){u.setCenter(t.geometry.location),u.setZoom(15),a.setPosition(t.geometry.location),e("#ai1ec_address").val(t.formatted_address),e("#ai1ec_latitude").val(t.geometry.location.lat()),e("#ai1ec_longitude").val(t.geometry.location.lng()),e("#ai1ec_input_coordinates").is(":checked")||e("#ai1ec_input_coordinates").click();var n="",r="",i="",s=0,o=0,f="";for(var l=0;l<t.address_components.length;l++)switch(t.address_components[l].types[0]){case"street_number":n=t.address_components[l].long_name;break;case"route":r=t.address_components[l].long_name;break;case"locality":i=t.address_components[l].long_name;break;case"administrative_area_level_1":f=t.address_components[l].long_name;break;case"postal_code":s=t.address_components[l].long_name;break;case"country":o=t.address_components[l].long_name}var c=n.length>0?n+" ":"";c+=r.length>0?r:"",s=s!==0?s:"",e("#ai1ec_city").val(i),e("#ai1ec_province").val(f),e("#ai1ec_postal_code").val(s),e("#ai1ec_country").val(o)},v=function(){var t=parseFloat(e("input.latitude").val()),n=parseFloat(e("input.longitude").val()),r=new google.maps.LatLng(t,n);u.setCenter(r),u.setZoom(15),a.setPosition(r)},m=function(){e("#ai1ec_input_coordinates:checked").length===0?(e("#ai1ec_table_coordinates").css({visibility:"hidden"}),e("#ai1ec_address").change()):v()},g=function(){return a},y=function(){return f};return{init_gmaps:p,ai1ec_update_map_from_coordinates:v,get_marker:g,get_position:y}});
=======
timely.define(["jquery_timely","domReady","ai1ec_config","scripts/add_new_event/event_location/input_coordinates_utility_functions","external_libs/jquery.autocomplete_geomod","external_libs/geo_autocomplete"],function(e,t,n,r){var i,s,o,u,a,f,l=function(t){e("input.longitude").val(t.latLng.lng()),e("input.latitude").val(t.latLng.lat()),e("#ai1ec_input_coordinates:checked").length===0&&e("#ai1ec_input_coordinates").trigger("click")},c=function(){!navigator.geolocation||navigator.geolocation.getCurrentPosition(function(e){var t=r.check_if_address_or_coordinates_are_set();if(t===!1){var n=e.coords.latitude,i=e.coords.longitude;s=new google.maps.LatLng(n,i),a.setPosition(s),u.setCenter(s),u.setZoom(15),f=e}})},h=function(){n.disable_autocompletion||e("#ai1ec_address").geo_autocomplete(new google.maps.Geocoder,{selectFirst:!1,minChars:3,cacheLength:50,width:300,scroll:!0,scrollHeight:330,region:n.region}).result(function(e,t){t&&d(t)}).change(function(){if(e(this).val().length>0){var t=e(this).val();i.geocode({address:t,region:n.region},function(e,t){t===google.maps.GeocoderStatus.OK&&d(e[0])})}})},p=function(){i=new google.maps.Geocoder,s=new google.maps.LatLng(9.965,-83.327),o={zoom:0,mapTypeId:google.maps.MapTypeId.ROADMAP,center:s},t(function(){e("#ai1ec_map_canvas").length>0&&(u=new google.maps.Map(e("#ai1ec_map_canvas").get(0),o),a=new google.maps.Marker({map:u,draggable:!0}),google.maps.event.addListener(a,"dragend",l),a.setPosition(s),c(),h(),m())})},d=function(t){u.setCenter(t.geometry.location),u.setZoom(15),a.setPosition(t.geometry.location),e("#ai1ec_address").val(t.formatted_address),e("#ai1ec_latitude").val(t.geometry.location.lat()),e("#ai1ec_longitude").val(t.geometry.location.lng()),e("#ai1ec_input_coordinates").is(":checked")||e("#ai1ec_input_coordinates").click();var n="",r="",i="",s=0,o=0,f="",l;for(var c=0;c<t.address_components.length;c++)switch(t.address_components[c].types[0]){case"street_number":n=t.address_components[c].long_name;break;case"route":r=t.address_components[c].long_name;break;case"locality":i=t.address_components[c].long_name;break;case"administrative_area_level_1":f=t.address_components[c].long_name;break;case"postal_code":s=t.address_components[c].long_name;break;case"country":l=t.address_components[c].short_name,o=t.address_components[c].long_name}var h=n.length>0?n+" ":"";h+=r.length>0?r:"",s=s!==0?s:"",e("#ai1ec_city").val(i),e("#ai1ec_province").val(f),e("#ai1ec_postal_code").val(s),e("#ai1ec_country").val(o),e("#ai1ec_country_short").val(l)},v=function(){var t=parseFloat(e("input.latitude").val()),n=parseFloat(e("input.longitude").val()),r=new google.maps.LatLng(t,n);u.setCenter(r),u.setZoom(15),a.setPosition(r)},m=function(){e("#ai1ec_input_coordinates:checked").length===0?(e("#ai1ec_table_coordinates").css({visibility:"hidden"}),e("#ai1ec_address").change()):v()},g=function(){return a},y=function(){return f};return{init_gmaps:p,ai1ec_update_map_from_coordinates:v,get_marker:g,get_position:y}});
>>>>>>> 9efb4dcb7bab652eca0d348558c1d99ac49cc27f
