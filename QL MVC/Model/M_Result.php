<?php
class Model_Result
{
    private $period;
    private $game;
    private $result;
    private $prize;

    public function _construct($period, $game, $result, $prize)
    {
        $this->period = $period;
        $this->game = $game;
        $this->result = $result;
        $this->prize = $prize;
    }
    public function indexResult($conn, $sql)
    {
        $Result = $conn->query($sql);
        return $Result;
    }
    public function searchResult($conn, $action, $game, $period)
    {
        $Result = array();
        if ($action != 'insert') {
            $sql = "Select * From $game where period= " . $period;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($action == "update") {
                        $Result = $row;
                    } else {
                        array_push($Result, $row);
                    }
                }
            }
        } else {
            $Result = array(
                "period" => "",
                "result" => "",
                "prize" => "",
            );
        }
        return $Result;
    }
    public function insertResult($conn, $game)
    {
        $result = $_POST['result'];
        $prize = $_POST['prize'];
        $sql = "INSERT INTO $game (result,prize) VALUES ($result ,$prize)";
        $conn->query($sql);
    }
    public function updateResult($conn, $game)
    {
        $period = $_GET['period'];
        $result = $_POST['result'];
        $prize = $_POST['prize'];
        $sql = "UPDATE $game SET  result = $result, prize= $prize WHERE period = '$period'";
        $conn->query($sql);
    }
    public function delete($conn)
    {
        $result = $conn->query("SELECT * From F99");
        $total_period = $result->num_rows;
        $result1 = $conn->query("SELECT * From F999");
        $total_period1 = $result1->num_rows;

        if ($total_period == 8) {
            $sql = "DELETE FROM F99
            WHERE period = (SELECT MIN(period) FROM F99); ";
            $conn->query($sql);
            $sql1 = "DELETE FROM Ticket
            WHERE period = (SELECT MIN(period) FROM F99); ";
            $conn->query($sql1);
        }
        if ($total_period1 == 8) {
            $sql3 = "DELETE FROM F999
            WHERE period = (SELECT MIN(period) FROM F999);";
            $conn->query($sql3);
            $sql4 = "DELETE FROM Ticket
            WHERE period = (SELECT MIN(period) FROM F999);";
            $conn->query($sql4);
        }
    }
}
?>
