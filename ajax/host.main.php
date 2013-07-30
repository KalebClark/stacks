<?
include('../inc.php');
$sql = new mysql();
$stackid = '1';
?>
<div class="container content-box"> 
  <div>
    <nav id="menu" style="float: left;">
      <ul id="host-nav">
        <li><a href="#" id="host-list-books">List Books</a></li>
        <li><a href="#" id="host-manage-stack">Manage Stack</a></li>
      </ul>
    </nav>
     Add Book: <span style="position: relative; top: 4px;"><input id="host-add-books" type="text" /></span>
  </div>
  <div style="clear: both;"></div>
  <div id="host-content" class="container">
    Content Here.
  </div>
</div>
<script type="text/javascript">
jQuery(function() {

  /* onLoad
  *  ====== */
  emerge.ajax_get('ajax/host.list_books.php?stackid=<?=$stackid;?>', 'host-content');

  /* All Events
  *  ========== */
  jQuery('#host-add-books').off();
  jQuery('#host-add-books').on('keydown', function(e) {
    if(e.which == 13) {
      var search_term = jQuery('#host-add-books').val();
      emerge.ajax_get('ajax/host.book_search.php?query='+search_term, 'host-content');
    }
  });
  jQuery('#host-list-books').off();
  jQuery('#host-list-books').on('click', function() {
    emerge.ajax_get('ajax/host.main.php', 'host-content');
  });
  jQuery('#host-manage-stack').off();
  jQuery('#host-manage-stack').on('click', function() {
    emerge.ajax_get('ajax/host.manage_stack.php', 'host-content');
  });

});
</script>
