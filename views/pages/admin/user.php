<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title> ALL USER</title>
  <link rel="stylesheet" href="../../styles/product.css">
</head>

<body>
  <?php include('menu.php') ?>
  <div id="demo">
    <h1>USER</h1>
    <div class="table-responsive-vertical shadow-z-1">
      <table id="table" class="table table-hover table-mc-light-blue">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Pass</th>
            <th>Email</th>
            <th>Role</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $conn = mysqli_connect("localhost", "root", "", "dacs");
          $sql = "SELECT * from users";
          $KQ = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($KQ)) {
            echo '<tr>
            <td data-title="ID">' . $row['id_user'] . '</td>
            <td data-title="Name">' . $row['username'] . '</td> 
            <td data-title="Pass">' . $row['password'] . '</td>
            <td data-title="Pass">' . $row['email'] . '</td>
            <td data-title="Role">' . $row['role'] . '</td>
            <td data-title="Delete"><a href="'.$url.'routes/user.route.php?method=delete&ID=' . $row['id_user'] . '">DELETE</td> 
            </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
<script src="../../scripts/product.js" type="text/javascript"></script>