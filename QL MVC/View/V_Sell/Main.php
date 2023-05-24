<div>
          <div class="float-start">Id :
            <?php echo $idStaff ?>
          </div>
          <div class="float-end">Limit :
            <?php echo $limit . ' $' ?>
          </div>
        </div><br><br>
<div class="selec" style="text-align: center;">
    <h5>Choose Game</h5><br>
<a class="btn btn-outline-secondary" href="C_Sell.php?action=F99"><img src="../Html/Sell/logo1.png" style="height:100px ;"><br>10 - 99</a>&emsp;&emsp;&emsp;&emsp;&emsp;
<a class="btn btn-outline-secondary" href="C_Sell.php?action=F999"><img src="../Html/Sell/img9.png" style="height:100px ;"><br>100 - 999</a><br><br>
<a class="btn btn-outline-secondary" href="C_Sell.php?action=reward">Reward</a><br>
</div>
<?php if($_SESSION['buy']!=0 || $_SESSION['reward']!=0){ ?>
  <a class="btn btn-outline-success" href="C_Sell.php?action=bill">Bill</a>
<?php }?><br>
