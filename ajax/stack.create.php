<?
include('../inc.php');
?>
<div id="stack-create-q">
  <button onClick="create_stack();">Yes, lets create a stack!</button>
  <button onClick="">No thanks.</button>
</div>
<script type="text/javascript">
function create_stack() {
  emerge.ajax_get('ajax/stack.create_map.php', 'slider');
/*
  jQuery('#map-content').css('display', 'block');
  jQuery('#map-canvas').css('display', 'block');

  var vertCenter = jQuery('#map_content').width() / 2;
  var horzCenter = jQuery('#map_content').height() /2;
  console.log('hc: '+horzCenter);

  jQuery('#ch_vline').css('left', vertCenter);
  jQuery('#ch_hline').css('top', horzCenter);

  jQuery('#ch_vline').css('display', 'block');
  jQuery('#ch_hline').css('display', 'block');
*/   
}
</script>
