<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Branch</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/b7a72b64a1.js" crossorigin="anonymous"></script>
      <link href="style.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="modalanimate.css" rel="stylesheet">

  </head>
  <body style="background:#ffffff;overflow-x:hidden">
    <div  style="overflow-x:hidden">
      <?php
          include 'dbconnect.php';
          $conn = OpenCon();
          $branch = $_GET['id'];
          $raw_results = mysqli_query($conn,"SELECT * FROM branches1 WHERE id=$branch") or die(mysql_error());
          $packages_info = mysqli_query($conn,"SELECT * FROM packages_info where branch_id=$branch") or die(mysql_error());
          $branches = mysqli_query($conn,"SELECT * FROM branches") or die(mysql_error());

      ?>
    </div>
  </body>
</html>
