<?
include('../inc.php');
$sql = new mysql();
$search_term = filter_var($_GET['search_term'], FILTER_SANITIZE_STRING);

$query = "
  SELECT  books.*
      ,   stacks.lat
      ,   stacks.lon
      ,   stacks.stack_title
  FROM books
  LEFT JOIN stacks ON
    books.stack_id = stacks.id
  WHERE author LIKE '%$search_term%'
    OR book_title LIKE '%$search_term%'
    OR category LIKE '%$search_term%'
";
$rows = $sql->getRows($query);
$markers = array();
if(count($rows) == 0) {
  print "-1";
}
?>

<div id="map-canvas" style="height: 340px; width: 100%;"></div>
<div class="container">
<div class="thumbnails-wrapper" data-results="<? print count($rows);?>">
  <ul>
<?
$lat = '';
$lon = '';
$i = 0;
foreach($rows as $row) {
  $book = get_one_book($row->ext_ref);
  $vi = $book->items[0]->volumeInfo;
  $title    = $vi->title;
  $author   = $vi->authors[0];
  $img      = $vi->imageLinks->thumbnail;
  $lat = $row->lat;
  $lon = $row->lon;
  $markers[$i++] = array(
    'lat'   => $lat,
    'lon'   => $lon,
    'title' => $row->stack_title
  );
?>
  <li>
    <img src="<?=$img;?>">
    <div class="book-info">
      <h4><?=$title;?></h4>
      <p><?=$author;?></p>
      <p><?=$row->stack_title;?></p>
    </div>
  </li>
<?
}
$markers = json_encode($markers);
?>
        </ul>
</div>
</div> <!-- /container -->

<?
function get_one_book($isbn) {
  $google_url   = "https://www.googleapis.com/books/v1/";
  $query        = "volumes?q=isbn:".$isbn;
  $json         = file_get_contents($google_url.$query);
  return json_decode($json);
}
?>
<script type="text/javascript">
    //var lat = '38.579303';
    //var lon = '-121.480894';
    var lat = '<?=$lat;?>';
    var lon = '<?=$lon;?>';
    var center = new google.maps.LatLng(lat, lon);
    console.log(center);
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
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    var php_markers = eval(<?=$markers;?>);
    var markers = new Array();
    jQuery.each(php_markers, function(i, val) {
      var stack_latlng = new google.maps.LatLng(val.lat, val.lon);
      console.log(val);
      markers[i] = new google.maps.Marker({
        position: stack_latlng,
        map: map,
        title: val.stack_title
      });


      /* Click Events
      *  ============ */
      google.maps.event.addListener(markers[i], 'click', function() {
        console.log(val);
      });
    });

</script>
