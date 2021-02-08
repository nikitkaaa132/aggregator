
<?php $__env->startSection('content'); ?>
<?php 
    $servername = "localhost";
    $database = "accesslogs";
    $username = "root";
    $password = "root";
    // Создаем соединение с БД
    $conn = mysqli_connect($servername, $username, $password, $database);       

    $get = $conn->query('SELECT * FROM logs GROUP BY ip');

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nginx-1.19.6\html\laravel\resources\views/group_by_ip.blade.php ENDPATH**/ ?>