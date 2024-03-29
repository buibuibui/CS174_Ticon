<?php

session_start(); 	

require 'php/connection.php';

$id = array();
$name = array();
$price = array();
$description = array();
$productID = array();

//echo $productID;	
//
$sql = "SELECT product.productID, name, price, description FROM product join warehouse on warehouse.productID=product.productID where warehouse.quantity != '0' ORDER BY rand() fetch first 6 rows only";

	$stmt = db2_prepare($conn, $sql);	

	if ($stmt) {
		$result = db2_execute($stmt);
		
		if (!$result)
		{
			echo "error";
		}
		while ($row = db2_fetch_array($stmt)) {
   			array_push($productID, $row[0]);
   			array_push($name, $row[1]);
   			array_push($price, $row[2]);
   			array_push($description, $row[3]);
		}	
		
		db2_close($conn);
	}
	
	else {
		echo "error";
	}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ticon-Home Page</title>
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand lead2" href="index.php"> T </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="about.php">About</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right">
		
		<?php if(!isset($_SESSION['CurrentUser'])){ ?>	
                    <li>
                        <a href="login.php">Login/SignUp</a>
                    </li> <?php } ?>
		<?php if(isset($_SESSION['CurrentUser'])){?>
		    <li>
                        <a href="php/logout.php"><?php echo $_SESSION['CurrentUser']." (logout)"?></a>
                    </li>
		    <li> 
                        <a href="orderHistory.php">Order History</a> 
                    </li>
                    <li> 
                        <a href="cart.php">
                            <img src="http://findicons.com/files/icons/1700/2d/512/cart.png" alt="cartImage" style="width:20px; height=20px;">
                        </a> 
                    </li><?php } ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 <!-- Page Content -->
    <div class="container">
    	<div class ="row">
    		<div class ="col-md-3">
				<img src = "https://www.cs.sjsu.edu/~fbutt/frankpic3.jpg" class="img-rounded"  alt="">
			</div>

			<div class ="col-md-9">
				<h3>What is Ticon?</h3>
				<br>
				<h4>A Butt Brands&trade; Boutique, sponsored by IBM&reg;</h4>
				<p>Powered by DB2&reg;, the database of choice for robust, enterprise-wide solutions handling high-volume workloads. It is optimized to deliver industry-leading performance while lowering costs. DB2 database software offers industry leading performance, scale, and reliability on your choice of platform from Linux, UNIX and Windows to z/OS. Learn how customers are transforming their data center with DB2.</p>
				<a href="http://www-01.ibm.com/software/data/db2/">Learn more >></a>
			</div>
			
		</div>
	</div>
    
    <!-- /.container -->
    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Ticon 2015</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>