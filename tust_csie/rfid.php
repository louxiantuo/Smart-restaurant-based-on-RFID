<?php
    $Array['code'] = 1;
    $conn = new mysqli('localhost','root','lou080406','rfid');
    if($conn->connect_error) die($conn->connect_error);
    $number = $_POST['number'];
    //$money = $_POST['money'];
    $select = "SELECT * from user WHERE number = '$number'";    
  
    $result = $conn->query($query);
    $rows = $result->num_rows;
    if(!$result) 
    {
        $Array['code'] = 0;
        die($conn->error);
    }
    for($j = 0;$j < $rows;++$j)
    {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_NUM);
        $Array['name'] = $row[0];
        $Array['number'] = $row[1];
        $Array['area'] = $row[2];
        $Array['national'] = $row[3];
        $Array['sex'] = $row[4];
	    $Array['money'] = $row[5];
        echo json_encode($Array);
    }

  
    echo json_encode($Array);
    
    
?>