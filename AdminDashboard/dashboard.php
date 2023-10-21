<?php
session_start();


if( isset($_SESSION['login']) ){
    
}else{
    header('Location: login.php');
}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
      
      
    <div class="py-4">
        <button class="btn btn-success btn-lg w-50">Add Product</button>
    </div>
      
      
    <table class="table table-striped table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Description</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
    
    <?php
    
        $serverAddress = 'localhost';
        $username = 'u600561363_food';
        $password = 'W3s$j[4KZX^|';
        $dbName = 'u600561363_food';
        
        $con = new mysqli($serverAddress,$username,$password,$dbName);
        
        $sql = "SELECT * FROM products";
        
        $result = $con ->query($sql);
        
        if( $result-> num_rows > 0){
            
            while($row =  $result-> fetch_assoc() ){
                
                echo '<tr>
                        <th>1</th>
                        <td>
                            <img src="'.$row['p_image'].'" class="img-fluid w-25">
                        </td>
                        <td>'.$row['p_name'].'</td>
                        <td>'.$row['p_price'].'</td>
                        <td>15</td>
                        <td>Cocomo Mujhe bhi do</td>
                        <td>
                            <button class="btn btn-info">Edit</button>
                        </td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>';
                
            }
        }
    
    ?>
    
    
    
    
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>