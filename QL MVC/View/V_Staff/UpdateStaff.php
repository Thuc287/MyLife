

<div style="text-align: center;"><h3>Staff Management</h3></div>
<form method="post" action="<?php if ($action === 'update') {
    echo "/Controller/C_Staff.php?action=post_update&id=".$id;
} elseif ($action === 'insert') {
    echo "/Controller/C_Staff.php?action=post_insert";
} ?>">
    <?php if ($action == 'update') {
        echo "<div class='container'><h5>Update Staff</h5></div>";
    } elseif ($action == 'insert') {
        echo "<div class='container'><h5>Create Staff</h5></div>";
    } ?>
    <div class="row">
        <div class="offset-3 col-6">
            <div class="form-group">
                <label for="name">Staff Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $Staff["name"] ?>"
                    placeholder="name..." required pattern="[A-Za-z ]+" minlength="2" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="age">PassWord</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $Staff["password"] ?>"
                    placeholder="password..." required pattern="[A-Za-z-0-9]+" minlength="6" maxlength="6">
            </div>
            <?php if ($action == 'insert') { ?>
            <div class="form-group">
                <label for="cccd">CCCD</label>
                <input type="text" class="form-control" id="cccd" name="cccd" value="<?php echo $Staff["cccd"] ?>"
                    placeholder="cccd..." required pattern="[0-9]+" minlength="12" maxlength="12">
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="limitt">Limit</label>
                <input type="number" class="form-control" id="limitt" name="limitt"
                    value="<?php echo $Staff["limitt"] ?>" placeholder="100-100000 $" required min="10" max="100000">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="offset-3 col-6">
            <?php if ($action == "insert") { ?>
                <button class="btn btn-primary">Create</button>
            <?php } else { ?>
                <button class="btn btn-primary">Update</button>
            <?php } ?>
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $Staff["id"] ?>">
</form>

<a class="btn btn-outline-success" href="C_Staff.php?action=indexStaff">Return</a>
