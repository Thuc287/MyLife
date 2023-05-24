

<div style="text-align: center;"><h3>Result Management</h3></div>
<form method="post" action="<?php if ($action === 'update') {
    echo "/Controller/C_Result.php?action=post_update&game=".$_GET['game']."&period=".$_GET['period'];
} elseif ($action === 'insert') {
    echo "/Controller/C_Result.php?action=post_insert&game=".$_GET['game'];
} ?>">
    <?php if ($action == 'update') {
        echo "<div class='container'><h5>Update Result</h5></div>";
    } elseif ($action == 'insert') {
        echo "<div class='container'><h5>Create Result</h5></div>";
    } ?>
    <div class="row">
        <div class="offset-3 col-6">
            <div class="form-group">
                <label for="result">Result</label>
                <input type="number" class="form-control" id="result" name="result" value="<?php echo $Result["result"] ?>"
                    required <?php if ($game=='F99') { ?>
                        placeholder="10 - 99"
                        min="10" max="99"
                   <?php } else { ?>
                    placeholder="100 - 999"
                    min="100" max="999"
                   <?php }?> >

            </div>
            <div class="form-group">
                <label for="prize">Prize</label>
                <input type="number" class="form-control" id="prize" name="prize" value="<?php echo $Result["prize"] ?>"
                    placeholder="10000 - 100000" required min="10000" max="100000">
            </div>


        </div>
    </div>
    <div class="row">
        <div class="offset-3 col-6">
            <?php if ($action == "insert") { ?>
                <button class="btn btn-outline-primary">Create</button>
            <?php } else { ?>
                <button class="btn btn-outline-primary">Update</button>
            <?php } ?>
        </div>
    </div>
    <input type="hidden" name="period" value="<?php echo $Result["period"] ?>">
</form>

<a class="btn btn-outline-success"  href="C_Result.php">Return</a>
