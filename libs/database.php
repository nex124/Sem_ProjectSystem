<?php
session_start();
require_once 'config.php';



class DB
{

  public static function connect($value='')
  {
    // create a new PDO connection
    $pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
  }

  public static function run($sql, $args = NULL) {
    if (!$args) 
    {
      return DB::connect()->query($sql);
    }
    $stmt = DB::connect()->prepare($sql);
    try {
      $stmt->execute($args);
      return $stmt;
    }
    catch (PDOException $e){
      echo $e->getMessage();
      die();
    }   
  }

}
?>
<?php 

$connection = mysqli_connect("localhost","root","","myDatabase");

if(!$connection)
{
	echo "Database connection failed...";
}

$retrive = mysqli_query($connection, "SELECT * FROM itemorderlist ");
$row= mysqli_fetch_array($retrive);



?>


