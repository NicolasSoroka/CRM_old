<?php
require "../globals/database.php";
$db = Database::getInstance();
session_start();

$userId = $_SESSION['user']['id'];
$db->query("SELECT * FROM leads LEFT JOIN assigned ON leads.id = assigned.id_lead WHERE assigned.id_user = '$userId' AND label = 7");
$leads = $db->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promises</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
  <div class="list-group">
    <?php foreach ($leads as $lead) { ?>
      <form action="./lead.php" method="post">
      <button class="list-group-item list-group-item-action flex-column align-items-start">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1"><?=$lead['name']?></h5>
        <small><?=$lead['date']?></small>
      </div>
      <p class="mb-1"><?=$lead['description']?></p>
      <small><?=$lead['email'] . " - " .$lead['phone']?></small>
    </button>
      <input type="hidden" name="lead" value="<?=$lead['id'];?>">
      </form>
    <?php } ?>
  </div>
</div>
</body>
</html>