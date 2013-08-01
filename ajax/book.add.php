<?
include('../inc.php');

$ext_ref    = filter_var($_POST['ext_ref']);
$author     = filter_var($_POST['author']);
$book_title = filter_var($_POST['book_title']);
$category   = filter_var($_POST['cat']);
$stack_id   = filter_var($_POST['stack_id']);

$query = "
  INSERT INTO books (id, active, stack_id, genre_id, category, ext_ref, author, book_title)
    VALUES
      ('0', '1', '$stack_id', '1', '$category', '$ext_ref', '$author', '$book_title');
";
$sql = new mysql();
$id = $sql->insert($query);
print $id;

?>
