<div>
          <div class="float-start">Id :
            <?php echo $idStaff ?>
          </div>
          <div class="float-end">Limit :
            <?php echo $limit . ' $' ?>
          </div>
        </div><br><br>
<h4>&emsp;&emsp;&emsp;&emsp;--Bill--</h4>
<div style="text-align: center;">
<h6>Date :  <?php echo date('d/m/Y - H:i:s'); ?><br>
  <h5>Buy :
    <?php echo $_SESSION['buy']; ?><br>
    <?php echo $_SESSION['buy'] * 2; ?>&nbsp;$
  </h5>
  <h5>Reward :
    <?php echo $_SESSION['slreward']; ?><br>
    <?php echo $_SESSION['reward']; ?>&nbsp;$
  </h5>

  <?php
  if ($bill >= 0) { ?>
    <h5> Tiền thu khách hàng :
      <?php echo $bill; ?>&nbsp;$
    </h5>
  <?php } else { ?>
    <h5> Thanh toán :
      <?php echo abs($bill); ?>&nbsp;$
    </h5>
  <?php } ?>
  </div>
  <div class="float-end">
  <br><a class="btn btn-outline-success " href="C_Sell.php?action=deleteBill">Xuất bill</a>
</div>
