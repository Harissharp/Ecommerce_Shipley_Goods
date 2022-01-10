<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <style>
      body {
        font-family: 'Comic Neue', cursive;
        font-size: 10px;
      }
    </style>
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
	        	<figure class="card card-product">
	        		<div class="img-wrap"><img src="assets/images/Items_photo/<?php echo $row['image'];?>" width="100" height="100"></div>
	        		<figcaption class="info-wrap">
	        				<h4 class="title"><?php echo htmlspecialchars($row['name']); ?></h4>
	        				<p class="desc"><?php echo htmlspecialchars($row['description']); ?></p>
	        				<div class="rating-wrap">
	        					<div class="label-rating">132 reviews</div>
	        					<div class="label-rating">154 orders </div>
	        				</div> <!-- rating-wrap.// -->
	        		</figcaption>
	        		<div class="bottom-wrap">
	        			<a href="" class="btn btn-sm btn-primary float-right">Order Now</a>	
	        			<div class="price-wrap h5">
	        				<span class="price-new"><?php echo htmlspecialchars($row['price']); ?></span> <del class="price-old">$1980</del>
	        			</div> <!-- price-wrap.// -->
	        		</div> <!-- bottom-wrap.// -->
	        	</figure>
	        </div> <!-- col // -->
	        </div> <!-- row.// -->



	        </div> 
	        <!--container.//-->

<?php endwhile; ?>
</div>