<?php
require "../globals/database.php";
$db = Database::getInstance();
$userId = $_SESSION['user']['id'];

if (isset($_POST['lead'])) {
    //INFORMACION DEL LEAD SELECCIONADO
    $lead = $_POST['lead'];
    $db->query("SELECT * FROM leads WHERE id = '$lead'");
    $leadData = $db->fetchAll();

    //INFORMACION DEL MENSAJE Y NOMBRE/FOTO DEL USUARIO
    $db->query("SELECT messages.*, users.name, users.photo FROM messages LEFT JOIN users ON messages.id_lead = '$lead'");
    $messages = $db->fetchAll();
}

if (isset($_POST['btnModification'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $province = $_POST['province'];
    $course = $_POST['course'];
    $description = $_POST['description'];
    $contactMethod = $_POST['contactMethod'];
    $ok = 0;

    try {
        $db->query("UPDATE `leads` SET `description`='$description' WHERE id = '$lead'");
        $db->query("INSERT INTO `modifications`(`id_user`, `id_lead`, `field`, `value`) VALUES ('$userId','$lead', 'description', '$description')");


        $_SESSION['mensaje'] = "Cambios guardados!";
        $_SESSION['msg_status'] = 1;
    } catch (Exception $e) {
        $_SESSION['mensaje'] = "Error al guardar, contacte con el administrador " . $e->getMessage();
        $_SESSION['msg_status'] = 0;
    }
}

if ($_SESSION['mensaje'] != "") {
    if ($_SESSION['msg_status'] == 1) { ?>
        <div class="alert alert-success text-center"> <?php } else { ?> <div class="alert alert-danger text-center"> <?php } ?>
            <?php echo $_SESSION['mensaje']; ?>
            </div>
        <?php  }
    $_SESSION['mensaje'] = ""; ?>

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
            <div class="container mt-4">
                <form>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Nombre</label>
                        <input type="text" disabled class="form-control" id="inputPassword4" name="name" value="<?= $leadData[0]['name'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Domicilio</label>
                        <input type="text" disabled class="form-control" id="inputAddress" name="province" value="<?= $leadData[0]['province'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Curso</label>
                        <input type="text" disabled class="form-control" id="inputAddress2" name="course" value="<?= $leadData[0]['course'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Telefono</label>
                        <input type="text" disabled class="form-control" id="inputAddress2" name="phone" value="<?= $leadData[0]['phone'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" disabled class="form-control" id="inputEmail4" name="email" value="<?= $leadData[0]['email'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Metodo de contacto</label>
                        <input type="text" disabled class="form-control" id="inputAddress2" name="contactMethod" value="<?= $leadData[0]['contactMethod'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="leadStatus">Estado del lead</label>
                        <select class="form-control" style="border: 1px solid red" name="leadStatus" id="">
                            <option value="7">Promesa</option>
                            <option value="6">Cuasi Promesa</option>
                            <option value="5">Interesado</option>
                            <option value="4">No interesado</option>
                            <option value="3">Vendido</option>
                        </select>
                    </div>

                    <ul class="nav nav-tabs mt-4">
                        <li class="nav-item">
                            <a href="#userMessage" class="nav-link active" role="tab" data-toggle="tab">Comentario del interesado</a>
                        </li>

                        <li class="nav-item">
                            <a href="#internalMessages" class="nav-link" role="tab" data-toggle="tab">Mensajes internos</a>
                        </li>
                    </ul>

                    <div class="container">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fadein active" id="userMessage">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" disabled rows="3" name="description"><?= $leadData[0]['description'] ?></textarea>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="internalMessages">
                                <div class="list-group">
                                    <?php
                                    foreach ($messages as $msg) { ?>
                                        <h2><?= $msg['name']; ?></h2>
                                        <p><?= $msg['message']; ?></p>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-2 btn btn-success" name="btnModification">Guardar</button>
                    <a href="../index.php" class="mt-2 btn btn-danger" name="btnModification">Volver</a>
                </form>
            </div>













            <script>
                $("#btnSearch").click(function() {
                    var datos = $('#dni_user').val();
                    if (datos) {
                        $('#dni_user').prop("disabled", true);
                        $("#btnSearch").prop("disabled", true);
                        $.ajax({
                            type: 'get',
                            url: 'search.php',
                            data: {
                                dni: datos
                            },
                            success: function(response) {
                                var data_alumno = JSON.parse(response);
                                if (data_alumno == null) {
                                    alert("No se encontro usuario.")
                                    location.reload();
                                }
                                $("#nombre").val(data_alumno.nombre);
                                $("#apellido").val(data_alumno.apellido);
                                $("#email").val(data_alumno.email);
                                $("#tel").val(data_alumno.telefono);
                                $("#user_type").val(data_alumno.acceso);
                                $("#btn_alta").hide();
                                $(".botones").append("<button class='btn btn-success' type='button' id='btnUpdate' onclick='update();'>Modificar datos</button>");
                                $(".botones").append("<button class='btn btn-danger ml-3' type='button' onclick='cancel();' id='btnCancel'>Cancelar</button>");
                            }
                        });
                    }
                });


                function cancel() {
                    $('#dni_user').prop("disabled", false);
                    $('#form_user ').trigger("reset");
                    location.reload();
                }

                function update() {
                    if (!($('#nombre').val() && $('#apellido').val())) {
                        alert("Nombre y apellido son obligatorios");
                        return;
                    }
                    var info = {
                        "dni": $('#dni_user').val(),
                        "nombre": $("#nombre").val(),
                        "apellido": $("#apellido").val(),
                        "mail": $("#email").val(),
                        "tel": $("#tel").val(),
                        "type": $("#user_type").val()
                    };

                    if (info) {
                        $.ajax({
                            type: 'POST',
                            url: 'update.php',
                            data: info,
                            success: function(response) {
                                alert("Actualizado " + $('#dni_user').val());
                                location.reload();
                            }
                        });
                    }
                }
            </script>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
        </body>

        </html>