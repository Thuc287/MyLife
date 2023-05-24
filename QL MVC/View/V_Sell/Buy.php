<div>
          <div class="float-start">Id :
            <?php echo $idStaff ?>
          </div>
          <div class="float-end">Limit :
            <?php echo $limit . ' $' ?>
          </div>
        </div><br><br>
   <?php if($action=='F99') { ?>
   <h4>&emsp;&emsp;&emsp;-- Game F-99 --</h4>
    <div style="text-align: center;">
    <h5>Period : <?php echo $periodF99;?></h5>
    <form method="post" action="/Controller/C_Sell.php?action=buy99">
    <div class="row">
        <div class="offset-3 col-6">
            <div class="form-group">
               <label for="number">Number</label>
                <input type="number" class="form-control" id="number" name="number" value=""
                    placeholder="10-99" required pattern="[0-9]+" min="10" max="99" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="offset-3 col-6">
              <br>  <button class="btn btn-outline-success">Buy</button>
        </div>
    </div>
    </form>
   </div>
   <?php }else{ ?>
    <h4>&emsp;&emsp;&emsp;-- Game F-999 --</h4>
    <div style="text-align: center;">
    <h5>Period : <?php echo $periodF999;?></h5>
    <form method="post" action="/Controller/C_Sell.php?action=buy999">
    <div class="row">
        <div class="offset-3 col-6">
            <div class="form-group">
                <label for="number">Number</label>
                <input type="number" class="form-control" id="number" name="number" value=""
                    placeholder="100-999" required pattern="[0-9]+" min="100" max="999" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="offset-3 col-6">
             <br>   <button class="btn btn-outline-success">Buy</button>
        </div>
    </div>
    </form>
    </div>
   <?php } ?>
