<?
include('../inc.php');
$sql = new mysql();

$query = "
  SELECT category
  FROM books
  GROUP BY category
";
$rows = $sql->getRows($query);
?>
<section id="content" class="margin-80">
  <div class="container">
    <div class="row">
<?
foreach($rows as $genre) {
  if($genre->category == 'null') { continue; };
  if($genre->category == '') { continue; };
?>
            <div class="span4">
                <a class="tile" href="#" onClick="emerge.ajax_get('ajax/book_search.php?search_term=<?=$genre->category;?>', 'slider');" title="">
                    <img src="img/<?=$genre->category;?>.jpg" alt="Title Name">
                    <h4><?=$genre->category;?></h4>
                </a>
            </div>

<?
}
?>
    </div>
  </div>
</section>
