<?php
class Database {

    private $cn = false;
    private $res; 
    private static $instance = false;

    private function __construct() {}

    public static function getInstance() {
        if (!self::$instance) self::$instance = new Database();
        return self::$instance;
    }

    private function connect() {
        $this->cn = mysqli_connect("localhost", "root", "", "crm");
    }

    public function query($q) {
        if (!$this->cn) $this->connect();
        $this->res = mysqli_query($this->cn, $q);
        if (!$this->res) die (mysqli_error($this->cn) . " -- Consulta: " . $q);
    }
    
    public function numRows() {
        return mysqli_num_rows($this->res);
    }

    public function fetch() {
        return mysqli_fetch_assoc($this->res);
    }

    public function fetchAll() {
        $aux = array();
        while($fila = $this->fetch()) $aux[] = $fila;
        return $aux;
    }

    public function escape($str){
        if (!$this->cn) $this->connect();
        return mysqli_escape_string($this->cn, $str);
    }

    public function escapeWildcards ($str) {
        $str = str_replace('%','\%', $str);
        $str = str_replace('_','\_', $str);
        return $str;
    }

    public function checkLeads($id) {
        $this->query("SELECT status FROM assigned WHERE id_user = '$id'");
        $result = true;
        $this->fetchAll();
        foreach ($this as $temp) {
            if ($temp == 'default') $result == false;
        }
        return $result;
    }

    public function giveLeads($id, $score){
        $this->getLeads($score);
        $leadsToBeAssigned = $this->fetchAll();
    }

    public function getLeads($score) {
        //aca hay que traer por las categorias S A B C segun el score.
    }
}
?>