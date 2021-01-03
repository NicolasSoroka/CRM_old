<?php
require '../globals/database.php';
session_start();
$db = Database::getInstance();

//cambiar estas dos por las variables de session, asi no me gusta.
$userId = $_POST['id'];
$score = $_POST['score'];

$db->query("SELECT *
            FROM assigned
            WHERE id_user = '$userId'");
$leads = $db->fetchAll();

$ok = 1;
foreach ($leads as $lead) {
    if ($lead['status'] == "default") $ok = 0;
}

if ($ok == 0){
    echo "no reviso todos los datos aun!";
    exit; 
} 
else {    
    $db->query("SELECT *
                FROM leads
                LEFT JOIN assigned
                ON leads.id = assigned.id_lead  
                WHERE assigned.id_lead is Null");
    $leads = $db->fetchAll();

    switch ($score) {
        case 0:   //el caso analiza el score del vendedor,
            echo 1;   //se seleccionan los leads correspondientes al score
            $db->query("INSERT INTO `assigned`(`id_user`, `id_lead`, `status`) 
            VALUES ('$userId', '$leadId', 'default')");            //se hace la asignacion en la tabla 'assigned'
            //$leadId es el ID del lead seleccionado por el score
            break;

            /* EJEMPLO DE MULTIPLES INSERCIONES
            INSERT INTO 
            projects(name, start_date, end_date)
        VALUES
	('AI for Marketing','2019-08-01','2019-12-31'),
    ('ML for Sales','2019-05-15','2019-11-20');
    */

        case 1:
            echo 2;
            break; 
    }
    //aca ya tengo en $leads los leads no ocupados, falta ordenar por score y asignar.
}