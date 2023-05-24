<div>
          <div class="float-start">Id :
            <?php echo $idStaff ?>
          </div>
          <div class="float-end">Limit :
            <?php echo $limit . ' $' ?>
          </div>
        </div><br><br>
<h4>&emsp;&emsp;&emsp;&emsp;--Ticket--</h4>
<div  style="text-align: center;"  class="container">
    <h5>Game :
      <?php echo $Ticket['game']; ?>
    </h5>
    <h5>Id :
      <?php echo $Ticket['id'] ?>
    </h5>
    <h5>Period :
      <?php echo $Ticket['period'] ?>
    </h5>
    <h5>Number :
      <?php echo $Ticket['number'] ?>
    </h5>
</div>
<div class="float-end">
<br><a class="btn btn-outline-success" href="C_Sell.php">Close</a>
</div>
