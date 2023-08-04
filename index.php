<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PROJECT</title>
</head>
<body>
<h2>
    Simple Crud
</h2>
<a href="create.php">Add Users</a>
<br><br>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "crud_project";
  
  
  //Create a database connection
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  
  //Check COnnection
  
  if($conn->connect_error){
      die("Connection Refused" . $conn->connect_error);
  }

    //Fetch Users From Databases
    $sql = "SELECT * FROM Users";
    $result = mysqli_query($conn, $sql);

    //Display Data in The Table

    while ($row = mysqli_fetch_assoc($result));
    echo "<tr>";
    echo "<td>" . $row ['id'] . "</td>";


    ?>

</table>
</body>
</html>
