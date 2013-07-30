<?
include('../inc.php');
$sql = new mysql();

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

$query = "
  SELECT  *
  FROM books
  WHERE id = '$id'
";
$row = $sql->getRows($query);
$row = $row[0];
?>
<h4>Thank you for adding "<i><?=$row->book_title;?></i>", I am sure you are sad to part with it!</h4>
<p>
  A fun thing to do is to track the book you are adding to your library. We can do this by printing in pencil "stacks.com/<?=$id;?>" on the bottom of the front inside cover of the book.
</p>
<p>
If someone finds this book, and puts the url into their web browser, we will direct them on how to proceed. You may even get a notification of where in the world this book has travled to!
</p>

<button onClick="emerge.ajax_get('ajax/host.main.php', 'slider');">Continue</button>
