<?php if( $hide_maps_until_clicked ) : ?>
  <div class="ai1ec-gmap-placeholder"><strong><i class="timely-icon-locations-maps timely-icon-large"></i> <?php _e( 'Click to view map', AI1EC_PLUGIN_NAME ) ?></strong></div>
<?php endif; ?>
<div class="ai1ec-gmap-container<?php echo $hide_maps_until_clicked ? ' ai1ec-gmap-container-hidden' : '' ?>">
	<div id="ai1ec-gmap-canvas"><script src="OpenLayers.js"></script>
<script>
        var map, layer;

            OpenLayers.ProxyHost = "proxy.cgi?url=";
            map = new OpenLayers.Map('map');
            layer = new OpenLayers.Layer.OSM("OpenStreetMap", null, {
                transitionEffect: 'resize'
            });
            map.addLayers([layer]);
            map.zoomToMaxExtent();

            var queryString = <?php esc_attr( $address ) ?>;
            OpenLayers.Request.POST({
                url: "http://www.openrouteservice.org/php/OpenLSLUS_Geocode.php",
                scope: this,
                failure: this.requestFailure,
                success: this.requestSuccess,
                headers: {"Content-Type": "application/x-www-form-urlencoded"},
                data: "FreeFormAdress=" + encodeURIComponent(queryString) + "&MaxResponse=1"
            });

        function requestSuccess(response) {
            var format = new OpenLayers.Format.XLS();
            var output = format.read(response.responseXML);
            if (output.responseLists[0]) {
                var geometry = output.responseLists[0].features[0].geometry;
                var foundPosition = new OpenLayers.LonLat(geometry.x, geometry.y).transform(
                        new OpenLayers.Projection("EPSG:4326"),
                        map.getProjectionObject()
                        );
                map.setCenter(foundPosition, 16);
            } else {
                alert("Sorry, no address found");
            }
        }
        function requestFailure(response) {
            alert("An error occurred while communicating with the OpenLS service. Please try again.");
        }

    
</script></div>
	<input type="hidden" id="ai1ec-gmap-address" value="<?php echo esc_attr( $address ) ?>" />
	<a class="ai1ec-gmap-link btn btn-mini"
		href="" target="_blank">
		<?php _e( 'View Full-Size Map', AI1EC_PLUGIN_NAME ) ?> <i class="timely-icon-forward"></i>
	</a>
</div>
