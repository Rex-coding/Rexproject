<?php
class Model{
/**
 * @param $connections stock la connexion chargée
 */
static $connections = array();

  /**
   * On recupere les information de la base 
   * @param $db stock ces information
   */
  public $conf= 'default';
  public $tables= false;
  public $db;

 public function __construct(){
  //je me connecte a la base
  $conf = Conf::$database[$this->conf];
  if(isset(Model::$connections[$this->conf])){
    $this->db = Model::$connections[$this->conf];
    return true;
  }
  try{
    $pdo = new PDO('mysql:host='.$conf['host'].';
          dbname='.$conf['database'].';charset=utf8',$conf['login'], $conf['password']);
          Model::$connections[$this->conf] = $pdo;
          $this->db = $pdo;
        }catch(PDOException $e){
        if(Conf::$debug >=1){
             die($e->getMessage());
    }else{
        die('Impossible de se connecter à la base de données');
    }
 
  }
//j'initialise auelaues variables
  if($this->tables===false){
    $this->tables = strtolower(get_class($this)).'s';
  }
}
  public function find($req){
    
  }
}

