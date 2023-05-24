<?php
class Model_Ticket
{
  private $id;
  private $number;
  private $period;
  private $game;
  public function _construct($id, $number, $period, $game)
  {
    $this->id = $id;
    $this->number = $number;
    $this->period = $period;
    $this->game = $game;
  }

  public function indexTicket($conn, $sql)
  {
    $result = $conn->query($sql);
    $total_records = $result->num_rows;
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
      $current_page = $total_page;
    } elseif ($current_page < 1) {
      $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;
    if (($result->num_rows) != null) {
      $Ticket = $conn->query($sql . " LIMIT " . $start . ",$limit");
      return $Ticket;
    } else {
      return $result;
    }
  }
  public function period($conn,$game)
  {
    $period =array();
    $sql="Select * From $game ";
      $result=$conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                array_push($period, $row);
            }
    }
    return $period;
  }
}

?>
