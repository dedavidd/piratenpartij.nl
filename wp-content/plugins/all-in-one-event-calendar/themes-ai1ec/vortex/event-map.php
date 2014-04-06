<?php if( $hide_maps_until_clicked ) : ?>
  <div class="ai1ec-gmap-placeholder"><strong><i class="timely-icon-locations-maps timely-icon-large"></i> <?php _e( 'Click to view map', AI1EC_PLUGIN_NAME ) ?></strong></div>
<?php endif; ?>
<div class="ai1ec-gmap-container<?php echo $hide_maps_until_clicked ? ' ai1ec-gmap-container-hidden' : '' ?>">
	<div id="ai1ec-gmap-canvas"><script src="OpenLayers.js"></script>
<script>
    var lat            = 47.35387;
    var lon            = 8.43609;
    var zoom           = 18;
 
    var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var position       = new OpenLayers.LonLat(lon, lat).transform( fromProjection, toProjection);
 
    map = new OpenLayers.Map("Map");
    var mapnik         = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);
 
    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(position));
 
    map.setCenter(position, zoom);
</script></div>
	<input type="hidden" id="ai1ec-gmap-address" value="<?php echo esc_attr( $address ) ?>" />
	<a class="ai1ec-gmap-link btn btn-mini"
		href="" target="_blank">
		<?php _e( 'View Full-Size Map', AI1EC_PLUGIN_NAME ) ?> <i class="timely-icon-forward"></i>
	</a>
</div>
