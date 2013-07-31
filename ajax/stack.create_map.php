<?
include('../inc.php');
?>
<style>
#stack-canvas {
  height: 340px;
  width: 100%;
}
#map-content {
  height: 340px;
  width: 100%;
}
#ch_vline {
  position: absolute;
  left: 0px;
  width: 1px;
  height: 340px;
  background: #000;
  z-index: 10000;
  display: none;
}

#ch_hline {
  position: relative;
  height: 1px;
  width: 100%;
  background: #000;
  z-index: 10001;
}
</style>
<div class="container content-box">
  <h3>Move the map to center on your stack</h3>
</div>
<div id="map_content">
  <div id="ch_vline"></div>
  <div id="ch_hline"></div>
  <div id="stack-canvas"></div>
</div>
<div id="address-box" class="container content-box">
Is this your address: <i><span id="addr_field">...</span></i>?
<button onClick="stack_add();">Yes</button>
<form id="addr-form">
  <label>Name this stack</label>
  <input id="stack_name" name="stack_name" type="text" />
  <br/>
  <input id="addr_house_number" name="house_number" type="hidden" value="" />
  <input id="addr_street_name" name="street_name" type="hidden" value="" />
  <input id="addr_city_name" name="city_name" type="hidden" value="" />
  <input id="addr_zip_code" name="zip_code" type="hidden" value="" />
  <input id="lat" name="lat" type="hidden" value="" />
  <input id="lon" name="lon" type="hidden" value="" />
</form>
</div>
<script type="text/javascript">
  function stack_add() {
    emerge.ajax_post_form('ajax/stack.add_database.php', 'addr-form');
    var addr = jQuery('#addr_field').html();
    var house_number  = jQuery('#addr_house_number').val();
    var street_name   = jQuery('#addr_street_name').val();
    var city_name     = jQuery('#addr_city_name').val();
    var zip_code      = jQuery('#addr_zip_code').val();
    emerge.ajax_get('ajax/host.main.php', 'slider');
  }
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
    var map = new google.maps.Map(document.getElementById("stack-canvas"), mapOptions);
    map.dragInProgress = false;

    /* Build Markers
    *  ============= */
    jQuery.ajax({
      url: 'ajax/gmaps.fetch_markers.php?lat='+lat+'&lon='+lon,
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
            title: val.stack_title
          });

          /* Get Result List per item
          *  ======================== */
          jQuery.ajax({
            url: 'ajax/stack.tile_detail.php?id='+val.id+'&distance='+val.distance,
            type: 'GET',
            success: function(details) {
              jQuery('#result_list').append(details);
            }
          });

          /* Setup Click event for each marker */
          google.maps.event.addListener(markers[i], 'click', function() {
            console.log(val.stack_title)
          });

          google.maps.event.addListener(map, 'tilesloaded', function() {
            var vertCenter = jQuery('#stack-canvas').width() / 2;
            var horzCenter = jQuery('#stack-canvas').height() /2;

            jQuery('#ch_vline').css('left', vertCenter);
            jQuery('#ch_hline').css('top', horzCenter);

            jQuery('#ch_vline').css('display', 'block');
            jQuery('#ch_hline').css('display', 'block');

          });
          google.maps.event.addListener(map, 'dragend', function() {
            console.log(map.dragInProgress);
            if(map.dragInProgress == false) {
              map.dragInProgress = true;
              setTimeout(function() {
                //console.log(map.getCenter());
                var loc = map.getCenter();
                var lat = loc.lat();
                var lon = loc.lng();

                var address = emerge.ajax_get('ajax/stack.rgeocode.php?lat='+lat+'&lon='+lon);
                address = eval('('+address+')');
                var house_number  = address.results[0].address_components[0].long_name;
                var street_name   = address.results[0].address_components[1].long_name;
                var city_name     = address.results[0].address_components[3].long_name;
                var zip           = address.results[0].address_components[7].long_name;;
                jQuery('#addr_house_number').val(house_number);
                jQuery('#addr_street_name').val(street_name);
                jQuery('#addr_city_name').val(city_name);
                jQuery('#addr_zip_code').val(zip);
                jQuery('#lat').val(lat);
                jQuery('#lon').val(lon);
                var fmat_address = address.results[0].formatted_address;

                jQuery('#addr_field').html(fmat_address);

                map.dragInProgress = false;
              }, 100);
            }
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
