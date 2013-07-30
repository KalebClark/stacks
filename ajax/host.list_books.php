<?
include('../inc.php');
$sql = new mysql();

$id = filter_var($_GET['stackid'], FILTER_VALIDATE_INT);

$query = "
  SELECT *
  FROM books
  WHERE box_id = '$id'
    AND active = '1'
  ORDER BY book_title
";
$rows = $sql->getRows($query);
?>
<h3>My Books</h3>
<table class="gridtable">
 <thead>
  <tr>
    <th>Unique ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Category</th>
    <th>Remove</th>
  </tr>
 </thead>
 <tbody>
<?
foreach($rows as $book) {
?>
  <tr>
    <td style="text-align: center;"><?=$book->id;?></td>
    <td><?=$book->book_title;?></td>
    <td><?=$book->author;?></td>
    <td><?=$book->category;?></td>
    <td><a href="#" onClick="deactivate_book('<?=$book->id;?>');"><i class="font-icon-remove"></i></a></td>
  </tr>
<?  
}
?>
</tbody>
</table>
<br/>
<script type="text/javascript">
function deactivate_book(id) {
  if(confirm("Do you want to remove this book from your stack?")) {
    mysql.update_one_field('books', id, 'active', '0');
    emerge.ajax_get('ajax/host.main.php', 'slider');
  } else {
    return false;
  }
}
</script>
