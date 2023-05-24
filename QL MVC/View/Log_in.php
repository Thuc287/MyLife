<?php
include_once("../connect.php");
$action = "";
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
$id = "";
if (isset($_POST['id'])) {
  $id = $_POST['id'];
}
$password = "";
if (isset($_POST['password'])) {
  $password = $_POST['password'];
}
function function_alert($message)
{
  echo "<script>alert('$message');</script>";
}
if (isset($_GET['actionB']) == 'alert') {
  function_alert('Incorrect Id or Password !');
}
switch ($action) {
  case 'post_Staff':
    $Staff = array();
    $sql = "SELECT * From Staff WHERE id='$id' and password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if ($action == "update") {
          $Staff = $row;
        } else {
          array_push($Staff, $row);
        }
      }
    }
    if ($Staff != null) {
      header("location:/Controller/C_Sell.php?idStaff=".$id);
    } else {
      header("location: " . $_SERVER['HTTP_REFERER'] . "&actionB=alert");
    }
    break;
  case 'post_Admin':
    if ($id == 999999 && $password == 999999) {
      header("location:/Controller/C_Result.php");
    } else {
      header("location: " . $_SERVER['HTTP_REFERER'] . "&actionB=alert");
    }
    break;
}
?>

<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .body {
      background-color: rgba(0, 0, 0, 0.92);
      height: 300px;
      padding: 20px;
      color: white;
      margin-top: 50px;
    }
  </style>
  <title>Nguyễn Xuân Thức - WD1301</title>
</head>

<body>

  <section class="container pt-5">
    <div class="row grid-demo">
      <div class="col-md-4"> </div>
      <div class="col-md-4">
        <div class='body'>
          <div style="text-align: center;">
            <?php if ($_GET['action'] == 'Admin') { ?>
            <h3>Log In Admin</h3>
            <?php } else { ?>
            <h3>Log In Staff</h3>
            <?php } ?>
            <br>
            <form method="post" action="<?php if ($action == 'Admin') {
  echo "/View/Log_in.php?action=post_Admin";
} elseif ($action == 'Staff') {
  echo "/View/Log_in.php?action=post_Staff";
} ?>">

              <div class="offset-3 col-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="id" name="id" value="" placeholder="id..." required
                    pattern="[0-9]+" minlength="4" maxlength="6">
                </div><br>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" value=""
                    placeholder="password..." required pattern="[0-9]+" minlength="6" maxlength="6">
                </div>
              </div>
              <div class="row">
                <div class="offset-3 col-6"><br>
                  <button class="btn btn-primary">Log In</button>
                </div>
              </div>
            </form>
          </div>

          <a class="btn btn-success" href="../index.php">Exit</a>
        </div>
      </div>
      <div class="col-md-4"> </div>
    </div>
  </section>

</body>
<html lang="vi">
