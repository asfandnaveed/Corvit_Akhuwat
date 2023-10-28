<?php

session_start();

 $serverAddress = 'localhost';
$username = 'u600561363_food';
$password = 'W3s$j[4KZX^|';
$dbName = 'u600561363_food';

$con = new mysqli($serverAddress,$username,$password,$dbName);


if( isset($_SESSION['login']) ){
    
    
    if( isset($_POST['name']) ){
        $productName = $_POST['name'];
        $productPrice = $_POST['price'];
        $productStock = $_POST['stock'];
        $productDescription = $_POST['description'];
        
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileData = $_FILES['image']['tmp_name'];
        
        $t = time();
        
        if($fileType == 'image/jpg' || $fileType == 'image/png' || $fileType == 'image/jpeg'){
            
            
            move_uploaded_file($fileData , 'images/'.$t.$fileName);
            
            $imagePath = 'images/'.$t.$fileName;
            
            $dateTime = date('Y-m-d H:m:s');
            
            $sql = "INSERT INTO products (p_name,p_price,p_description,p_stock,p_image,created_at) VALUES ('$productName','$productPrice','$productDescription','$productStock','$imagePath','$dateTime')";
            
            if($con->query($sql) ==TRUE){
                echo 'Product Inserted !';
            }
        }
        
    }
    
}else{
    
    header('Location: login.php');
}




?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    


    <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Add Product</h3>
        
            <div class="card">
                <h5 class="text-center mb-4"></h5>
                <form class="form-card" method="POST" action="addproduct.php" enctype="multipart/form-data">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Product Name<span class="text-danger"> *</span></label> <input type="text" required id="fname" name="name" placeholder="Enter your first name" > 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Product Price<span class="text-danger"> *</span></label> <input type="text" id="lname" name="price" placeholder="Enter your name" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Product Stock<span class="text-danger"> *</span></label> <input type="number" id="email" name="stock" placeholder="" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Product Image<span class="text-danger"> *</span></label> <input type="file" id="mob" name="image" placeholder="" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Product Description<span class="text-danger"> *</span></label> <input type="text" id="job" name="description" placeholder="" onblur="validate(5)"> </div>
                    
                       
                    </div>
                  
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Add Product</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>