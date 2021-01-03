<?php
require "./templates/header.php";

if (isset($_POST['btnDatos'])) {
   header("Location: addLead.html");
   exit;
 }
?>

  <form action="" method="post">
    <button name="btnDatos">Cargar lead</button>
  </form>

  <form action="./addUser.html" method="post">
    <button name="btnDatos">Ir a cargar usuarios</button>
  </form>

  <form action="./assignLead.php" method="post">
    <button name="btnDatos">Ir a asignar lead</button>
  </form>


  <form action="./funciones/askLeads.php" method="post">
    <button name="btnPedirDatos">Pedir datos</button>
    <input type="hidden" name="score" value="<?= $_SESSION['user']['score'];?>">
    <input type="hidden" name="id" value="<?= $_SESSION['user']['id'];?>">
  </form>

<div class="main">
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Datos del dia</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Otra categoria</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Categoria 3</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <ul>
        <li>
          <form action="" method="post">
            <button><?= $_SESSION['user']['name'];?></button>
            <input name="lead" type="hidden" value="<?= $temporal[0]['id'];?>">
          </form>
        </li>
        <li>
        <form action="" method="post">
            <button><?= $_SESSION['user']['name'];?></button>
            <input name="lead" type="hidden" value="<?= $temporal[1]['id'];?>">
          </form>
        </li>
        <li><button>Dato1</button></li>
      </ul>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <ul>
      <li><button>Dato1</button></li>
        <li><button>Dato1</button></li>
        <li><button>Dato1</button></li>
      </ul>
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
      <ul>
      <li><button>Dato1</button></li>
        <li><button>Dato1</button></li>
        <li><button>Dato1</button></li>
      </ul>
    </div>
  </div>
</div>

<?php
require "./templates/footer.php";
?>