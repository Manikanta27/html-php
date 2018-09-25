<?php include 'navbar.php'; ?>
<?php include 'login-validation.php'; ?>

<?php 
include 'connection.php';
$id= $_GET['id'];
$type= $_GET['type'];
 $query= "SELECT * FROM $type where `id` ='$id' ";
 echo '<table class="table">
      <thead class="thead-dark">
      <tr>
        <th scope="col"> Name</th>
          <th scope="col"> Price</th>
        <th scope="col"> Category</th>
        <th scope="col"> Description</th>';
        if ($type=="tiffin") {
         echo ' <th scope="col"> Quantity</th>';
        }
       
        
      echo '</tr></thead><tbody>';

    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
      {
        
        while($rows=mysqli_fetch_array($result)){ 
          echo '<tr>';
          echo '<td>';
          echo $rows['name'];
          echo '</td>';
        
          echo '<td>';
          echo $rows['price'];
          echo '</td>';
          
          echo '<td>';
          echo $rows['category'];
          echo '</td>';
          
          echo '<td>';
          echo $rows['facilities'];
          echo '</td>';
           
          
          echo'<form action="cart.php" method="POST">';
       if ($type=="tiffin") { 
        echo '<td>';
          echo '<input type="text" placeholder="qty" name="qty"/>' ;
            echo '</td>';
        }
          echo '<input type="hidden" name="id" value="';echo $rows['id'];echo'"/>';
          echo '<input type="hidden" name="price" value="';echo $rows['price'];echo'"/>';
          echo '<input type="hidden" name="type" value="';echo $type;echo'" />';
            echo '<td>';
          echo '<input type="submit" name="cart" value="Add to cart" />';
            echo '</td>';
           echo'</form>';
          
          echo'</tr>';

        }
      echo '</table>';
      }
 ?>