<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require "../globals/database.php";
    $db = Database::getInstance();

    if (isset($_POST['lead'])) {
        $lead = $_POST['lead'];
        $db->query("SELECT * FROM leads WHERE id = '$lead'");
        $leadData = $db->fetchAll();
    }
    ?>

    <div class="container mt-4">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" disabled class="form-control" id="inputEmail4" value="<?=$leadData[0]['email']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Nombre</label>
                    <input type="text" disabled class="form-control" id="inputPassword4" value="<?=$leadData[0]['name']?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Provincia</label>
                <input type="text" disabled class="form-control" id="inputAddress" value="<?=$leadData[0]['province']?>">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Telefono</label>
                <input type="text" disabled class="form-control" id="inputAddress2" value="<?=$leadData[0]['phone']?>">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Curso</label>
                <input type="text" disabled class="form-control" id="inputAddress2" value="<?=$leadData[0]['course']?>">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Metodo de contacto</label>
                <input type="text" disabled class="form-control" id="inputAddress2" value="<?=$leadData[0]['contactMethod']?>">
            </div>
            <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripcion</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value="<?=$leadData[0]['contactMethod']?>"></textarea>
  </div>
            
            <button type="submit" class="mt-2 btn btn-primary">Sign in</button>
        </form>
    </div>

</body>
</html>