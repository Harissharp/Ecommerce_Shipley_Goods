<!---DB connection --->
<?php

$host = "localhost";
$username = "119019";
$password = "saltaire";
$dbname = "119019";

$dsn = "mysql:host=$host;dbname=$dbname"; 
// get all users
$sql = "SELECT * FROM psw_main";
try{
  $pdo = new PDO($dsn, $username, $password);
  $stmt = $pdo->query($sql);
   
  if($stmt === false){
   die("Error");
  }
   
}catch (PDOException $e){
  echo $e->getMessage();
}

?>
<!--- Counter to alternate between 2 colours on DB output --->
<?php $counter_in_itemloader=0?>
<!--- Making of each item card --->
<div class="row">
<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <div class="col-4">
        <?php if($counter_in_itemloader==0){
            echo'<div class="p-3 mb-2 bg-info text-white">';
            $counter_in_itemloader = $counter_in_itemloader+1;
        }else{
            echo'<div class="p-3 mb-2 bg-primary text-white">';
            $counter_in_itemloader = $counter_in_itemloader-1;
        }?>
        
            <div class="i"></div>
            <img width="100px" height="100px" src="assets/images/Items_photo/<?php echo $row['image'];?>" alt="">
            <div class="trend__item__text">
                <h6><?php echo htmlspecialchars($row['name']); ?></h6>
                <div class="product__price"><?php echo htmlspecialchars($row['price']); ?></div>
                <div class="product__price"><?php echo htmlspecialchars($row['category']); ?></div>
                <p><?php echo htmlspecialchars($row['description']); ?> </p>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</div>