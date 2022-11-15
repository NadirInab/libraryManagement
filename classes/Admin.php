<?php
   // include "Book.php" ;
class Admin{
    public $fullName;
    public $email ;
    public $pwd ;

    public function __construct($fullName, $email, $pwd){
        $this->fullName = $fullName ;
        $this->email = $email ;
        $this->pwd = $pwd ;
    
    }
    public static function addBook($title, $type,$connection){
        $Book1 = new Book($title, $type) ;
        $query = "INSERT INTO books(isbn,title,type) VALUES(:isbn, :title, :bookType)" ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':isbn', $Book1->isbn) ;
        $stmt->bindParam(':title', $Book1->title);
        $stmt->bindParam(':bookType', $Book1->type) ;
        $stmt->execute() ;
    }
    public function authenticateUser(){
        echo "hello admin" ;
    }
} 


// require "autoLoader.php" ;
// function throwArray($data){
//     echo "<pre>" ;
//         var_dump($data) ;
//     echo "</pre>" ;
// }
// $taskData = [] ;
// $pdo = new DbConnection ;
// $stmt = $pdo->connect() ;
// $query = "SELECT * FROM tasks" ;
// $data = $stmt->query($query) ;
// //$result = $data->fetchAll(PDO::FETCH_OBJ) ;
// $result = $data->fetchAll(PDO::FETCH_ASSOC) ;   
// $rowCount = $data->rowCount() ;

// if($rowCount > 0) {
//     $taskData = new Task(...$result) ;
// }
// throwArray($taskData) ;

// ====================================================
// require "autoLoader.php" ;
// function throwArray($data){
//     echo "<pre>" ;
//         var_dump($data) ;
//     echo "</pre>" ;
// }
// $taskData = [] ;
// $pdo = new DbConnection ;
// $stmt = $pdo->connect() ;
// $query = "SELECT * FROM tasks" ;
// $data = $stmt->query($query) ;
// while($result = $data->fetch(PDO::FETCH_ASSOC)){
//     array_push($taskData, new Task(...$result) )   ;
// } ;

// throwArray($taskData) ;

// die() ;
// foreach($taskData as $task){
//      var_dump($task) ;
//      echo "<hr>" ;
// }
// ==================================================

// class DbConnection{
//     public $host = "localhost" ;
//     private $user = "root" ;
//     private $pwd = "rainoverme" ;
//     public $dbName = "scrumboard" ;

//     public function connect(){
//         try{
//             $dsn = "mysql:host=$this->host; dbname=$this->dbName" ;
//             $pdo = new PDO($dsn, $this->user, $this->pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION , PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ] ) ;
//             //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ) ;
//             return $pdo ;
//         }
//         catch(PDOException $err){
//             $error = $err->getMessage() ;
//             echo "connection is failed".$error ;
//         }
       
//     }
// }

// ====================================

// <!-- <div class="container bg-muted mt-4">
// <ul class="d-flex justify-content-around">
   
//         <li style="list-style: none ;"> <a style="text-decoration: none ;" href="/phpBox/insert.php?id=<?= $res['id'] ?>&name=<?= $res['title']?>"> <?php echo htmlentities($res['title'])  ; ?>  </a> <strong><?php echo $res['task_date'];  ?></strong>  </li>

<!-- </ul>
</div>  -->



