<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administrador</title>
</head>
<body>
    <form action="./views/addLead.html" method="post">
        <button name="btnDatos">Cargar lead</button>
      </form>
    
      <form action="./views/addUser.html" method="post">
        <button name="btnDatos">Ir a cargar usuarios</button>
      </form>
          
      <form action="./views/assignLead.php" method="post">
        <button name="btnDatos">Ir a asignar lead</button>
      </form>

      <a href="../logout.php">Cerrar Sesion</a>
    
</body>
</html>