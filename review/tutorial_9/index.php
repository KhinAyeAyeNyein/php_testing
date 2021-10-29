<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph</title>
</head>

<body> 
    <center>
        <div style="width:60%;height:20%;text-align:center">
            <h2 class="page-header">Analytics Reports </h2>
            <div>Product </div>
            <canvas id="chartjs_bar"></canvas>
        </div>
    </center>
    <?php
        $con  = mysqli_connect("localhost","root","root","newdb");
            //Testing connection with php and database
            if (!$con) {    
                echo "Problem in database connection! Contact administrator!" . mysqli_error();
            } else{
                $sql ="SELECT * FROM data1";    //take all data from database table
                $result = mysqli_query($con,$sql);
                $chart_data="";
                //to fetch needed data from tabel
                while ($row = mysqli_fetch_array($result)) {  
                    $mail[]  = $row['email'];
                    $login_time[] = $row['login_time'];
                }
            }
    ?>
</body>
<script src="js/jquery-1.9.1.js"></script> <!--Js libs to create graph-->
<script src="js/Chart.min.js"></script>
<script type="text/javascript">
// Creating a chartJS graph
var ctx = document.getElementById("chartjs_bar").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($mail); ?>, //Taking email from database for graph
        datasets: [{
            label: 'Login times',
            backgroundColor: [
                "#5969ff",
                "#ff407b",
                "#25d5f2",
                "#ffc750",
                "#2ec551",
                "#7040fa",
                "#ff004e"
            ],
            data: <?php echo json_encode($login_time); ?>, //Taking login_time from database for graph
        }]
    },
    //Style for text in graph
    options: {
        legend: {
            display: true,
            position: 'bottom',

            labels: {
                fontColor: '#71748d',
                fontFamily: 'Circular Std Book',
                fontSize: 14,
            }
        },
    }
});
</script>

</html>