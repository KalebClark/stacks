<?
include('../inc.php');
$sql = new mysql();

$id       = filter_var($_GET['id'], FILTER_VALIDATE_INT);
$distance = filter_var($_GET['distance']);

$query = "
  SELECT  *
  FROM stacks
  WHERE id = '$id'
";
$row = $sql->getRows($query);
$row = $row[0];

$book_count = "
  SELECT count(id) AS cnt
  FROM books
  WHERE box_id = '$id'
";
$cnt = $sql->getRows($book_count);
$cnt = $cnt[0]->cnt;

$distance = sprintf("%1.2f", $distance);


?>
<div class="stacks-list">
  <div class="span4">
    <h4><?=$row->box_title;?></h4>
    <div>
      <h5>Distance</h5>
      <p><?=$distance;?> miles</p>
    </div>
    <div>
      <h5>Books</h5>
      <p><?=$cnt;?></p>
    </div>
  </div>
</div>
