<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../Html/Sell/sell.css">
  <title>Nguyễn Xuân Thức - WD1301</title>
</head>

<body>
  <section class=" ">
    <div class="header">
      <div class="container">
        <div class="row grid-demo">

          <div class="col-md-2">
            <img src="../Html/Sell/img10.png" style="width:150px">
          </div>
          <div style=" margin-top: 110px;" class="col-md-2">
          <div style=" display: inline">
            <?php if ($_SESSION['buy'] == 0 && $_SESSION['reward'] == 0) { ?>
              <button class="btn dropdown-toggle" data-bs-toggle="dropdown">
                Result
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="C_Sell.php?action=result99">F-99</a></li>
                <li><a class="dropdown-item" href="C_Sell.php?action=result999">F-999</a></li>
              </ul>
              <a class="btn" href="C_Sell.php">Sell</a>
            <?php } else { ?>
              <a class=" dropdown-toggle ">Result</a>&emsp;
              <a class="">Sell</a>
            <?php } ?>
          </div>
            </div>
          <div class="col-md-4 "><br>
            <div style="text-align:center;">
              <h1>-- Elective Lottery --</h1>
              <p>- Cơ hội để tốt hơn -</p>
            </div>
          </div>
          <div id="tt" class="col-md-4">
            <div style="text-align:right">
              <a class="" href="">0378665580</a>
            </div>
            <div style="text-align:center;margin-top: 90px">
              <?php if ($_SESSION['buy'] == 0 && $_SESSION['reward'] == 0) { ?>
                <a class="" href="C_Sell.php?action=report">Report</a>&emsp;
                <a class="" href="C_Sell.php?action=log_out">Log Out</a>
              <?php } else { ?>
                <a class=" ">Report</a>&emsp;
                <a class="">Log Out</a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row grid-demo">
      <div id="tt" style="text-align:center;" class="col-md-3">
        <br>
        <h5>F - 99</h5>
        <h6>Kì hiện tại :
          <?php echo $periodF99 - 1 ?>
        </h6>
        <h5>
          <?php echo $resultF99 ?>
        </h5>
        <img src="../Html/Sell/img1.png" style="height:230px ;" alt="">

      </div>

      <div class="col-md-6">
      <div class="sell">
