<?php require APP_ROOT . '/views/inc/header.php' ?>
<h1><?php echo $data['title']; ?></h1>

<ul>
<?php foreach($data['posts'] as $post) : ?>
<li><?php echo $post->title; ?></li>
<?php endforeach; ?>
</ul>

<?php require APP_ROOT . '/views/inc/footer.php' ?>

<?php
/*

   echo "<pre>";
try {
   $host = 'localhost';
   $user = 'root';
   $password = '';
   $dbname = 'mvc';

   $options = array(
      PDO::ATTR_PERSISTENT    => true,
      PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE =>  PDO::FETCH_OBJ,
      PDO::ATTR_CASE => PDO::CASE_LOWER
   );

   $dsn = 'mysql:host=' . $host . ';charset=utf8;dbname=' . $dbname;
   $pdo = new PDO($dsn, $user, $password, $options);


   $sql_query = "SELECT * FROM users";


   $stmt = $pdo->prepare($sql_query);
   $stmt->execute();
   $clients = $stmt->fetchAll();
   foreach ($clients as $client) {
      echo $client->name . '<br/>';
   }


   $clientid = "36";
   $name  = "teste-fd";
   $uname = "Linux Text";
   $autoprune = 1;
   $fileretention = 365;
   $jobretention = 365;

   $sql_query = "INSERT INTO users (id, name, email, status) values (:id, :name, :email, :status)";
   $stmt = $pdo->prepare($sql_query);

   $id = 3;
   $name = "João Silvério";
   $email = "joao@gmail.com";
   $status = "guest";




   $stmt->bindValue(':id', $id);
   $stmt->bindValue(':name', $name);
   $stmt->bindValue(':email', $email);
   $stmt->bindValue(':status', $status);

   /*
[
                  'id' => $id,
                  'name'=> $name,
                  'email' => $email,
                  'status' => $status
                ]


   $stmt->execute();
   echo "Added client";
}
catch (PDOException $e){
   echo $e->getMessage();
}
*/

