<?php
session_start();
require "../globals/database.php";
$db = Database::getInstance();

if (isset($_POST['lead'])) {
    $leadId = $_POST['lead'];
    $userId = $_SESSION['user']['id'];
    
    $db->query("INSERT INTO `assigned`(`id_user`, `id_lead`, `status`) 
    VALUES ('$userId', '$leadId', 'default')");
}

    $db->query("SELECT *
                FROM leads
                LEFT JOIN assigned
                ON leads.id = assigned.id_lead
                WHERE assigned.id_lead is Null");
    $leads = $db->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignacion manual de leads</title>
</head>
<body>
    <form action="" method="post">
        <select name="lead">
            <?php
                foreach ($leads as $lead) {
                    ?> 
                    <option value="<?=$lead['id'];?>"><?=$lead['name'] ." " . $lead['phone']?></option>                   
                    <?php
                }
            ?>
        </select>
        <button type="submit">Asignar lead al usuario actual</button>
    </form>

    <a href="../index.php">Volver</a>
</body>
</html>