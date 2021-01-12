<?php
session_start();
require "../globals/database.php";
$db = Database::getInstance();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Vendedor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<ul class="nav">
  <li class="nav-item">
    <a class="btn-sm btn-success" href="../views/addLead.html">Cargar Lead</a>
  </li>
  <li class="nav-item">
    <form action="../views/profile.php" method="post">
      <button class="btn-sm btn-success">
        <span>Mi perfil</span>
        <span>
          <img src="<?= $_SESSION['user']['photo']; ?>" style="max-height: 100px; border: 3px solid black;">
        </span>
      </button>
      <input type="hidden" name="userid" value="<?= $_SESSION['user']['id']; ?>">
    </form>
  </li>
  <li class="nav-item">
    <form action="../funciones/leadsRequest.php" method="post">
      <button class="btn-sm btn-warning">Pedir datos</button>
      <input type="hidden" name="score" value="<?= $_SESSION['user']['score']; ?>">
      <input type="hidden" name="id" value="<?= $_SESSION['user']['id']; ?>">
    </form>
  </li>
  <li class="nav-item">
    <a href="../funciones/promises.php" class="btn-sm btn-info">Promesas</a>
  </li>
  <li class="nav-item">
    <a class="btn-sm btn-danger" href="../logout.php">Logout</a>
  </li>
</ul>

<div class="container">
  <div class="list-group">
    <?php
    $userId = $_SESSION['user']['id'];
    $db->query("SELECT * FROM leads LEFT JOIN assigned ON leads.id = assigned.id_lead WHERE assigned.id_user = '$userId'");
    $leads = $db->fetchAll();

    foreach ($leads as $lead) { ?>
      <form action="./lead.php" method="post">
        <button class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?= $lead['name'] ?></h5>
            <small><?= $lead['date'] ?></small>
          </div>
          <p class="mb-1"><?= $lead['description'] ?></p>
          <small><?= $lead['email'] . " - " . $lead['phone'] ?></small>
        </button>
        <input type="hidden" name="lead" value="<?= $lead['id']; ?>">
      </form>
    <?php } ?>
  </div>
</div>

<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        	<ul class="nav nav-tabs">
        		<li class="nav-item">
        			<a href="#diario" class="nav-link active" role="tab" data-toggle="tab">Diario</a>
        		</li>

        		<li class="nav-item">
        			<a href="#promesas" class="nav-link" role="tab" data-toggle="tab">Promesas</a>
        		</li>

        		<li class="nav-item">
        			<a href="#otro" class="nav-link" role="tab" data-toggle="tab">Otro</a>
        		</li>
        	</ul>

        	<div class="tab-content">
        		<div role="tabpanel" class="tab-pane fade in active" id="diario">
            <p>
              adfasdfasdfasdf
            </p>
            </div>
        		<div role="tabpanel" class="tab-pane fade" id="promesas">
            
            </div>
        		<div role="tabpanel" class="tab-pane fade" id="otro">
            
            </div>
        	</div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
</body>
</html>