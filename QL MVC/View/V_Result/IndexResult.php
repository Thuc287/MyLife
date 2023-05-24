
<div style="text-align: center;"><h3>Result Management</h3></div>
<div class="row grid-demo">
<div class="container col-md-6">
<div style="text-align: center;"><h4>F - 99</h4></div>
<table class="table table-striped">
    <thead class="text-center">
        <tr>
            <th>Period</th>
            <th>Result</th>
            <th>Prize</th>
            <th><a class="btn btn-outline-success" href="C_Result.php?action=insert&game=F99" >Create</a></th>
        </tr>
    </thead>
<tbody class="text-center">
        <?php foreach ($F99 as $result) { ?>
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
                <td><a class="btn btn-outline-warning" href="C_Result.php?action=update&game=F99&period=<?php echo $result["period"] ?>"
                        >Update</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>


<div class="container col-md-6">
<div style="text-align: center;"><h4>F - 999</h4></div>
<table class="table table-striped">
    <thead class="text-center">
        <tr>
            <th>Period</th>
            <th>Result</th>
            <th>Prize</th>
            <th><a class="btn btn-outline-success" href="C_Result.php?action=insert&game=F999">Create</a></th>
        </tr>
    </thead>
<tbody class="text-center">
        <?php foreach ($F999 as $result) { ?>
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
                <td><a class="btn btn-outline-warning" href="C_Result.php?action=update&game=F999&period=<?php echo $result["period"] ?>" >Update</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>

</div>
