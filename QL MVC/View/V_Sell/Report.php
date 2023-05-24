<div>
          <div class="float-start">Id :
            <?php echo $idStaff ?>
          </div>
          <div class="float-end">Limit :
            <?php echo $limit . ' $' ?>
          </div>
        </div><br><br>
<h4>&emsp;&emsp;&emsp;&emsp;--Report--</h4>
<div style="text-align: center;" class="container">
<h6>Date :  <?php echo date('d/m/Y - H:i:s'); ?><br>
  <h5>Sell :
    <?php echo $_SESSION['report_Buy']; ?><br>
    <?php echo $_SESSION['report_Buy'] * 2; ?>&nbsp;$
  </h5>
  <h5>Reward :
    <?php echo $_SESSION['report_slreward']; ?><br>
    <?php echo $_SESSION['report_Reward']; ?>&nbsp;$
  </h5>

  <h5> Rose :  <?php echo $rose; ?> &nbsp;$</h5>
</div>
<div class="float-end">
<?php if ($action=='report') { ?>
    <br><a class="btn btn-outline-success" href="C_Sell.php">Close</a>
 <?php } else { ?>
  <br><a onclick="return confirm('Bạn có chắc muốn out không?');" class="btn btn-outline-success" href="C_Sell.php?action=post_log_out">Log_Out</a>
  <?php }?>
 </div>
