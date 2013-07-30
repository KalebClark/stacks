<?
include('../inc.php');

$query_term   = filter_var($_GET['query'], FILTER_SANITIZE_STRING);
$query_term   = urlencode($query_term);
//$query_term   = urlencode("name of the wind");
$key          = "AIzaSyAJsXs9HHywzBcR_JSfcgQeWmrEyaPu28c";
$google_url   = "https://www.googleapis.com/books/v1/";
$query        = "volumes?q=".$query_term;

$json         = file_get_contents($google_url.$query);

//print $json;
$book_array = json_decode($json);
foreach($book_array->items as $book) {
  $ii = $book->volumeInfo->industryIdentifiers;
  $isbn_10 = NULL;
  if($ii[0]->type != 'ISBN_10') {
    continue;
  }
  $isbn_10 = $ii[0]->identifier;
  $image_links = $book->volumeInfo->imageLinks;
  $img_url_small = $image_links->thumbnail;
  $json_out = array(
    'ext_ref' => $isbn_10,
    'author'  => $book->volumeInfo->authors[0], 
    'book_title' => $book->volumeInfo->title,
    'category'  => $book->volumeInfo->categories[0]
  );
  $json = json_encode($json_out);
  ?>
  <div> 
    <img onClick="add_book('ident-<?=$isbn_10;?>');" src="<?=$img_url_small;?>" />
    <span id="ident-<?=$isbn_10;?>" style="display: none;"><?=$json;?></span>
    <span>ISBN: <?=$isbn_10;?></span>
    <hr/>
  </div>
  <?
}

?>
<script type="text/javascript">
function add_book(id) {
  var obj = $('#'+id).html();
  obj = eval('('+obj+')');
  var uri = 'ext_ref='+obj.ext_ref+'&book_title='+obj.book_title+'&author='+obj.author+'&cat='+obj.category;
  //uri = encodeURI(uri);

  var unique_id = emerge.ajax_post('ajax/add_book.php', uri);
  alert('thank you. Your book is: '+unique_id);
  $('#main_content').empty();
  emerge.ajax_get('ajax/main.php', 'main_content');
  $('#search_term').focus();
}
</script>
