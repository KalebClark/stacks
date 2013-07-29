<?
include('../inc.php');
?>
<script type="text/javascript">
jQuery(function() {
  jQuery('#tile-stacks').click(function() {
    emerge.ajax_get('ajax/book_result_map.php', 'main_content');
  });
  jQuery('#tile-logon').click(function() {
    emerge.ajax_get('ajax/login.php', 'main_content');
  });
});
</script>
<!--   <div id="tile-find" class="tile">
    <input type="text" id="search_term" /><br/>
    <button onClick="search_for_book(); return false;">Search</button>
  </div>
  <div id="tile-stacks" class="tile">
   near me 
  </div>
  <div id="tile-genres" class="tile">
      <div class="genre-img active-genre-img">
        <img src="http://placekitten.com/505/200">
      </div>
      <div class="genre-img">
        <img src="http://placekitten.com/501/200">
      </div>
      <div class="genre-img">
        <img src="http://placekitten.com/500/200">
      </div>
  </div>
  <div id="tile-logon" class="tile">
    Login
  </div> -->
