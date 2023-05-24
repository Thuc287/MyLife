<div id="table">
<?php if ($action=='result99') {?>
  <div style="text-align: center;"><h5>F - 99</h5></div>
<?php }else{ ?>
  <div style="text-align: center;"><h5>F - 999</h5></div>
<?php } ?>
<table class="table table-hover">
    <thead class="text-center">
        <tr>
            <th>Period</th>
            <th>Result</th>
            <th>Prize</th>
        </tr>
    </thead>
<tbody class="text-center">
        <?php foreach ($Result as $result) { ?>
            <tr>
                <td>
                    <?php echo $result["period"] ?>
                </td>
                <td>
                    <?php echo $result["result"] ?>
                </td>
                <td>
                    <?php echo $result["prize"] ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
        </div>
