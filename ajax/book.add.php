<?
include('../inc.php');

$ext_ref    = filter_var($_POST['ext_ref']);
$author     = filter_var($_POST['author']);
$book_title = filter_var($_POST['book_title']);
$category   = filter_var($_POST['cat']);

$query = "
  INSERT INTO books (id, active, box_id, genre_id, category, ext_ref, author, book_title)
    VALUES
      ('0', '1', '1', '1', '$category', '$ext_ref', '$author', '$book_title');
";
$sql = new mysql();
$id = $sql->insert($query);
print $id;

?>
