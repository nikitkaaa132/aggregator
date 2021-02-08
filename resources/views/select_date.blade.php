@extends('layouts.app')
@section('content')
<?php 
    $servername = "localhost";
    $database = "accesslogs";
    $username = "root";
    $password = "root";
    // Создаем соединение с БД
    $conn = mysqli_connect($servername, $username, $password, $database);       
    $date1 = date("Y-m-d", strtotime($_POST['date1']));
    $date2 = date("Y-m-d", strtotime($_POST['date2']));

    $get = $conn->query("SELECT * FROM logs WHERE date BETWEEN '$date1' AND '$date2'");

    $rows = mysqli_num_rows($get);                   
    for ($i = 0 ; $i < $rows ; ++$i){
        $row = mysqli_fetch_row($get);
        echo "<tr>";
        echo '<th scope="row">'.$row[0].'</th>';
        for ($j=1; $j < 14; $j++) {                    
        echo "<td>".$row[$j]."</td>";
        }               
    echo "</tr>";
    }        
    mysqli_close($conn);
?>      
@endsection