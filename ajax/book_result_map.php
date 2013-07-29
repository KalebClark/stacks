<?
include('../inc.php');
?>
<style>
#result_map_canvas {
  margin-top: 5px;
  height: 340px;
  width: 100%;
}

#results {
}

#result_list {
  z-index: 1;
}

#result_detail {
  height: 300px;
  width: 100%;
  background-color: #CCC;
  z-index: 99;
}
</style>
<div id="result_map_canvas"></div>
<div id="results">
  <div id="result_list"></div>
</div>

<script type="text/javascript">
jQuery(function() {
  function error(msg) {
    conosle.log("ERR: "+msg);
  }

  /* found_position()
  *  ================ */
  function found_position(pos) {
    var lat = pos.coords.latitude;
    var lon = pos.coords.longitude;
    var center = new google.maps.LatLng(lat, lon);
    var mapOptions = {
      center: center,
      disableDoubleClickZoom: true,
      keyboardShortcuts: false,
      mapTypeControl: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      maxZoom: 19,
      minZoom: 9,
      panControl: false,
      rotateControl: false,
      scaleControl: false,
      scrollwheel: false,
        streetViewControl: true,
      zoom: 16,
      zoomControl: true
    };
    var map = new google.maps.Map(document.getElementById("result_map_canvas"), mapOptions);

    /* Build Markers
    *  ============= */
    jQuery.ajax({
      url: 'ajax/get_markers.php?lat='+lat+'&lon='+lon,
      type: "POST",
      success: function(data) {
        /* Request was a success */
        data = eval('('+data+')');
        var markers = new Array();
        /* Loop through each stack, and create marker */
        jQuery.each(data, function(i, val) {
          var stack_latlng = new google.maps.LatLng(val.lat, val.lon);
          console.log(val);
          markers[i] = new google.maps.Marker({
            position: stack_latlng,
            map: map,
            title: val.box_title
          });

          /* Get Result List per item
          *  ======================== */
          jQuery.ajax({
            url: 'ajax/stack_detail_tile.php?id='+val.id+'&distance='+val.distance,
            type: 'GET',
            success: function(details) {
              jQuery('#result_list').append(details);
            }
          });

          /* Setup Click event for each marker */
          google.maps.event.addListener(markers[i], 'click', function() {
            console.log(val.box_title)
          });
        });
      }
    }); /* End Build Markers */
  }

  /* Geolocate Navigation
  *  ==================== */
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(found_position, error);
  } else {
    console.log('Geolocation not supported');
  }

});
</script>
