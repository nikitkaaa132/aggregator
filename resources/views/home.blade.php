@extends('layouts.app')
@section('content')
<?php 
    $servername = "localhost";
    $database = "accesslogs";
    //session_start();
    //$username = $_SESSION['email'];
    $username = "root";
    $password = "root";
    // Создаем соединение с БД
    $conn = mysqli_connect($servername, $username, $password, $database);       

    //Загрузка логов из файла
    function upload_logs($connection){  
        // Открытие файла access.log
        $filename = 'C:\nginx-1.19.6\logs\access.log';
        $filelogs = fopen($filename, 'a+');  

        // Шаблон для разбора строки
        $pattern = "/(\S+) (\S+) (\S+) \[([^:]+):(\d+:\d+:\d+) ([^\]]+)\] \"(\S+) (.*?) (\S+)\" (\S+) (\S+) (\".*?\") (\".*?\")/";
        //$string =  fgets($filelogs,filesize($filename));
        //preg_match ($pattern, $string, $result);
         
        while (!feof($filelogs)) {
            // Чтение строки
            $logs =  fgets($filelogs,filesize($filename));

            // Разборка строки
            preg_match ($pattern, $logs, $result);

            // Перевод даты в формат MySQL
            $result[4] = date("Y-m-d", strtotime($result[4]));

            // Вставка данных в таблицу
            $mySql_Insert = $connection->query("INSERT INTO logs(`ip`, `identity`, `user`, `date`, `time`, `timezone`, `method`, `path`, `protocol`, `status`, `bytes`, `referer`, `agent`) VALUES('$result[1]','$result[2]','$result[3]','$result[4]','$result[5]','$result[6]','$result[7]','$result[8]','$result[9]','$result[10]','$result[11]','$result[12]','$result[13]')");
        }     
        //upload_logs();
        fclose($filelogs);
        mysqli_close($connection);
    }
    
    //upload_logs($conn);

    $get = $conn->query('SELECT * FROM `logs`');

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