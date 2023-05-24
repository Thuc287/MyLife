<div style="text-align: center;">
    <h3>Ticket Management</h3>
</div>
<div class="row grid-demo">
    <div class="container col-md-5">
        <form method="GET">
            <nav class="d-flex flex-wrap">
                <label for="game">
                    <h5 style="margin-top: 3px;" class="">Game&ensp;</h5>
                </label>
                <select class="form-select" style="width: 150px;" name="game">
                    <option value="all">All</option>
                    <option value="F99">F99</option>
                    <option value="F999">F999</option>
                </select>
                <button class="btn btn-outline-primary" name='action' type="submit" value="indexByGame">Search</button>
            </nav>
        </form>
        <br>
        <?php if ($action == 'indexByGame' || $actionB == 'return') { ?>
            <form method="GET">
                <nav class="d-flex flex-wrap">
                    <label for="period">
                        <h5 style="margin-top: 3px;" class="">&emsp;&ensp;Period&ensp;</h5>
                    </label>
                    <?php if ($action == 'indexByGame' || $actionB == 'return') { ?>
                        <input type="text" class="collapse" name="game" value="<?php echo $_GET['game'] ?>">
                        <select class="form-select" style="width: 150px;" name="period">
                            <option value="all">All</option>
                            <?php foreach ($Period as $period) { ?>
                                <option value="<?php echo $period['period'] ?>"><?php echo $period['period'] ?></option>
                            <?php } ?>
                            <option value="<?php echo $period['period'] + 1 ?>"><?php echo $period['period'] + 1 ?></option>
                        </select>
                        <input type="text" class="collapse" name="actionB" value="return">
                    <?php } ?>
                    <button class="btn btn-outline-primary" name='action' type="submit" value="indexByGameAndPeriod">Search</button>
                </nav>
            </form>
        <?php } ?>
    </div>
    <div style="margin-top: 10px;" class=" col-md-6">

        <?php if ($action == 'indexByGame' || $actionB == 'return') { ?>
            <div>
                <h5>Game : &ensp;
                    <?php echo $_GET['game']; ?>
                </h5>
            </div>
        <?php } else { ?>
            <div>
                <h5>Game : &ensp;All</h5>
            </div>
        <?php } ?>
        <div>
            <?php if (isset($_GET['period'])) { ?>
                <h5>Period : &ensp;
                    <?php echo $_GET['period']; ?>
                </h5>
            <?php } ?>
            <h6>Quantity&ensp; : &ensp;
                <?php echo $total_records; ?>
            </h6>
        </div>
    </div>
</div>

<table class="table table-striped">
    <thead class="text-center">
        <tr>
            <th>Id</th>
            <th>Number</th>
            <th>Game</th>
            <th>Period</th>

        </tr>
    </thead>
    <tbody class="text-center">
        <?php foreach ($Ticket as $ticket) { ?>
            <tr>
                <td>
                    <?php echo $ticket["id"] ?>
                </td>
                <td>
                    <?php echo $ticket["number"] ?>
                </td>
                <td>
                    <?php echo $ticket["game"] ?>
                </td>
                <td>
                    <?php echo $ticket["period"] ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div style="text-align: center;">
    <?php
    // PHẦN HIỂN THỊ PHÂN TRANG
    // BƯỚC 7: HIỂN THỊ PHÂN TRANG

    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
    if ($current_page > 1 && $total_page > 1) {
        if ($action == 'indexByGame' || $actionB == 'return') {
            echo '<a href="C_Ticket.php?action=indexByGame&actionB=return&game=' . $ticket["game"] . '&page=' . ($current_page - 1) . '">Prev</a> - ';
        } else {
            echo '<a href="C_Ticket.php?page=' . ($current_page - 1) . '">Prev</a> - ';
        }
    }

    // Lặp khoảng giữa
    for ($i = 1; $i <= $total_page; $i++) {
        // Nếu là trang hiện tại thì hiển thị thẻ span
        // ngược lại hiển thị thẻ a
        if ($i == $current_page) {
            echo '<span>' . $i . '</span> - ';
        } else {
            if ($action == 'indexByGame' || $actionB == 'return') {
                echo '<a href="C_Ticket.php?action=indexByGame&actionB=return&game=' . $ticket["game"] . '&page=' . $i . '">' . $i . '</a> - ';
            } else {
                echo '<a href="C_Ticket.php?page=' . $i . '">' . $i . '</a> - ';
            }
        }
    }

    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
    if ($current_page < $total_page && $total_page > 1) {
        if ($action == 'indexByGame' || $actionB == 'return') {
            echo '<a href="C_Ticket.php?action=indexByGame&actionB=return&game=' . $ticket["game"] . '&page=' . ($current_page + 1) . '">Next</a>  ';
        } else {
            echo '<a href="C_Ticket.php?page=' . ($current_page + 1) . '">Next</a>  ';
        }
    }
    ?>
</div>
<?php if ($action == 'indexByGame' || $actionB == 'return') { ?>
    <a class="btn btn-outline-success" href="C_Ticket.php?action=indexTicket">Return</a>
<?php } ?>
