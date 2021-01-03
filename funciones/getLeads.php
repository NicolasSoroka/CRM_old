<?php  //Creo que esto no hace falta, chequear los imports.
require "../globals/database.php";

function getLeads($score) {
    $db = Database::getInstance();
    $db->query("SELECT *
                FROM leads
                LEFT JOIN assigned
                ON leads.id = assigned.id_lead  
                WHERE assigned.id_lead is Null");
    
    $leads = $db->fetchAll();
    $scoreDefault = array();
    $scoreTop = array();
    $scoreMid = array();
    $scoreLow = array();
    
    foreach ($myArray as $key => $value) {
        if (strpos($value, "hidden") !== false) {
            $secondaryArray[] = $value;
            unset($myArray[$key]);
        }
    }
    


}


?>