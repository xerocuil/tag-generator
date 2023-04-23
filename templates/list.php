<?php
// Query list
foreach($items_r as $r){
  $cat_id = $r['category_id'];
  $cat_q = $DB->query('SELECT name FROM categories WHERE id='.$cat_id.';');
  $cat_r = $cat_q->fetch(PDO::FETCH_ASSOC);
  if ($r['tag']) {
    $tag = '<img class="check" src="/assets/img/check.svg">';
  } else {
    $tag = "&nbsp";
  }

  echo '
    <tr>
      <td><a href="/items/edit.php?id='.$r['id'].'">'.$r['name'].'</a></td>
      <td>'.$r['description'].'</td>
      <td><a href="/categories/view.php?id='.$cat_id.'">'.$cat_r['name'].'</a></td>
      <td>'.$r['price'].'</td>
      <td>'.$tag.'</td>
      <td><a href="/items/edit.php?id='.$r['id'].'">Edit</a></td>
    </tr>';
}
?>