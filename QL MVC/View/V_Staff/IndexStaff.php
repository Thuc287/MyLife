
<div style="text-align: center;"><h3>Staff Management</h3></div>
<div class="row grid-demo">
<div class="container col-md-5">
<form method="GET">
<nav class="d-flex flex-wrap">
<label for="id"><h5 style="margin-top: 3px;" class="">&emsp;&ensp;Id&ensp;</h5></label>
<input type="number" style="width: 150px;" class="form-control" name="id" placeholder="Id..." required min="1000">
 <button class="btn btn-outline-primary" name='action' type="submit" value="search">Search</button>
 </nav>
</form>
</div>
     <div style="margin-top: 10px;" class=" col-md-6"><h5>Quantity : &ensp;<?php if($action!='search'){echo $total_records;}?> </h5></div>
</div>
<table class="table table-striped">
    <thead class="text-center">
        <tr>
            <th>Id</th>
            <th>Staff Name</th>
            <th>Password</th>
            <th>Limit</th>
            <th>Rose</th>
            <th>CCCD</th>
            <th></th>
            <th><a class="btn btn-outline-success" href="C_Staff.php?action=insert">Create</a></th>
            <th></th>
        </tr>
    </thead>

    <tbody class="text-center">
        <?php foreach ($Staff as $staff) { ?>
            <tr>
                <td>
                    <?php echo $staff["id"] ?>
                </td>
                <td>
                    <?php echo $staff["name"] ?>
                </td>
                <td>
                    <?php echo $staff["password"] ?>
                </td>
                <td>
                    <?php echo $staff["limitt"] ?>
                </td>
                <td>
                    <?php echo $staff["rose"] ?>
                </td>
                <td>
                    <?php echo $staff["cccd"] ?>
                </td>
                <td><a class="btn btn-outline-primary" href="C_Staff.php?action=pay&rose=<?php echo $staff["rose"] ?>&id=<?php echo $staff["id"] ?>">Pay</a></td>
                <td><a class="btn btn-outline-warning"
                        href="C_Staff.php?action=update&id=<?php echo $staff["id"] ?>">Update</a></td>
                <td><a onclick="return confirm('Bạn có chắc muốn xoá không?');" class="btn btn-outline-danger"
                        href="C_Staff.php?action=delete&id=<?php echo $staff["id"] ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div style="text-align: center;">
           <?php
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG

            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="C_Staff.php?page='.($current_page-1).'">Prev</a> - ';
            }

            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> - ';
                }
                else{
                    echo '<a href="C_Staff.php?page='.$i.'">'.$i.'</a> - ';
                }
            }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="C_Staff.php?page='.($current_page+1).'">Next</a>  ';
            }
           ?>
        </div>
        <?php if ($action != 'indexStaff') {?>
            <a class="btn btn-outline-success" href="C_Staff.php?action=indexStaff">Return</a>
       <?php }?>
