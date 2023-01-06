<?php
// Query list
foreach($items_r as $r){
  $cat_id = $r['category_id'];
  $cat_q = $DB->query('SELECT name FROM categories WHERE id='.$cat_id.';');
  $cat_r = $cat_q->fetch(PDO::FETCH_ASSOC);
  echo '
    <tr>
      <td>'.$r['name'].'</td>
      <td>'.$r['description'].'</td>
      <td><a href="/categories/view.php?id='.$cat_id.'">'.$cat_r['name'].'</a></td>
      <td>'.$r['price'].'</td>
      <td>'.$r['tag'].'</td>
    </tr>';
}
?>