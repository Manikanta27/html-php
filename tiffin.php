<?php include 'navbar.php';?>
<?php include 'login-validation.php' ;?>

<body>
<form action="payment.php" method="POST">

</form>
  
</body>

</html>

<?php
include "connection.php"; 
    $query= "SELECT * FROM `tiffin`";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
     {
       
      echo '<table class="table">
      <thead class="thead-dark">
      <tr>
        <th scope="col"> Name</th>
        <th scope="col"> Price</th>
        <th scope="col"> Category</th>
        <th scope="col"> Description</th>
        <th scope="col"> Details</th>

      </tr>
      </thead>
      <tbody>';

        while($rows=mysqli_fetch_array($result)){
         
          
          echo '<tr>';
          echo '<td>';
          echo  $rows['name'];
          echo  '</td>';
          
          echo '<td>';
          echo  $rows['price'];
          echo '</td>';
          echo '<td>';
          echo $rows['category'];
          echo '</td>';
          echo '<td>';
          echo $rows['facilities'];
          echo '</td>';
         
          echo '<td>' ;
          echo '<a href="details.php?type=tiffin&id=';echo $rows['id'];  echo'">View Details</a>';
          echo '</td>';
          echo '</tr>';
          

        }
      echo '</tbody>';  
      echo '</table>';
      }
      ?>
