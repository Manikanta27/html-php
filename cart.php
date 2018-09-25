<?php include 'navbar.php'; ?>
<?php include 'login-validation.php'; ?>
<?php 
error_reporting(0);//Ignore Warning
include 'connection.php';
if (isset($_POST['cart'])) { 
$id= $_POST['id'];

//$qty= $_POST['qty']?1:$_POST['qty'];
$price= $_POST['price'];
$quan=$_POST['qty'];
if ($quan<=0) {
 $quan=1;
}
$user_id= $_SESSION['id'];  
//$total_food=$qty*$price;
$type=$_POST['type'];

// $query= "INSERT INTO `cart` (user_id,product_id,price,quantity,type) values('$user_id','$id','$price','$quan','$type')";
//  mysqli_query($conn,$query);

 //if($type=='tiffin'){

$query="select product_id,quantity from cart where user_id='$user_id' and product_id='$id' and type='$type'" ;
//}
$result=mysqli_query($conn,$query) ;
if(mysqli_num_rows($result)>0){
  
  while($rows=mysqli_fetch_array($result)){
    $quan+=$rows['quantity'];
    
    }
    
   
  $query="update cart set quantity='$quan' where product_id='$id' and user_id='$user_id' and type='$type'";
  mysqli_query($conn,$query);
}
else{
  $query= "INSERT INTO `cart` (user_id,product_id,price,quantity,type) values('$user_id','$id','$price','$quan','$type')";
 mysqli_query($conn,$query);

}

}
/*else{
  
 mysqli_query($conn,$query);
}}
    
    if($result)
      {
        //echo 'added to cart'; 
      }
}*/
 ?>
 <?php  
 $total_food_price=0;
$id= $_SESSION['id'];
 $query= "SELECT * FROM `tiffin` t join `cart` c on c.product_id=t.id where `user_id` ='$id' and type='tiffin' union SELECT * FROM `room` r join `cart` c on c.product_id=r.id where `user_id` ='$id' and type='room' ";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
      {
        
       echo '<table class="table">
      <thead class="thead-dark">
      <tr>
        <th scope="col"> Name</th>
        <th scope="col"> Price</th>
        <th scope="col"> Description</th>
        <th scope="col"> Quantity</th>
        
        <th scope="col"> Actions</th>
        
      </tr>
      </thead>
      <tbody>';

        while($rows=mysqli_fetch_array($result)){

          $total= $rows['price'] * $rows['quantity']; 
          $total_food_price+= $total ;
          echo '<tr>';
          echo '<td>';
          echo  $rows['name'];
          echo '</td>';
          
          echo '<td>';
          echo  $rows['price'];
          echo '</td>';
          
          echo '<td>';
          echo  $rows['facilities'];
          echo '</td>';
         
          echo '<td>';
          echo  $rows['quantity'];
          echo '</td>';


          
          // echo'<tr>'; 
          echo'<td>'; 
          echo'<form action="cart.php" method="POST">'; 
          // echo '<input type="text" placeholder="qty" name="qty"/>' ;
          echo '<input type="hidden" name="cart_id" value="';echo $rows['cart_id'];echo'"/>';
          // echo '<input type="hidden" name="price" value="';echo $rows['price'];echo'"/>';
          echo '<input type="submit" name="remove" value=Remove />';
          echo'</td>';
          echo'</tr>';

        }
        echo '<tr>';
        echo '<td>Total Price:</td>';
        echo'<td>';
        echo $total_food_price;
        echo'</td>'; 
        echo '<td></td>';
        echo '</tr>';
      echo '</tbody>';  
      echo '</table>';
      }


 ?>
 <?php 
if (isset($_POST['remove'])) { 
$id= $_POST['cart_id']; 
//echo $id;
 $query= "DELETE FROM `cart` WHERE `cart_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
      {
        echo 'item removed from cart'; 
        header('location:cart.php');
      }
}
echo '<a href="payment.php?amount=';echo $total_food_price; echo'" class=" btn btn-sec">Check out</a>';
  ?>
 
 <!-- <button >check out <a href="payment.php"></button> -->
  
  