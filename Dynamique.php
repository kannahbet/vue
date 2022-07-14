<?php 
if(isset($_POST['save'])){
    $Console=$_POST['Console'];
    $Category=$_POST['Category'];
    $Rating=$_POST['Rating'];
    $User=$_POST['User'];
    $Publisher=$_POST['Publisher'];
    $critic=$_POST['critic'];
    $dater= [2000,2002,2004,2006,2008,2010,2012,2014,2016,2018];
   $formdata=array( 'CONSOLE'=>$Console,
                    'RATING'=>$Rating,
                    'CRITICS_POINTS'=> $critic,
                    'CATEGORY'=>$Category,
                    'dater'=>$dater,
                    'PUBLISHER'=>$Publisher,
                    'USER_POINTS'=> $User
);
// echo '<pre>';
// print_r($formdata);
// 
$json=json_encode($formdata);
$curl=curl_init("http://127.0.0.1:5000/get_prediction");
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_POSTFIELDS,$json);
curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$data=curl_exec($curl);
curl_close($curl);
$var=json_decode($data);
$shift=(array)$var;

}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.css"/>
  </head>
  <body class="container">
  <div class="row">
      <div class="col"><canvas id="myChart" width="400" height="400"></canvas></div>
      <div class="col"></div>
      <div class="col"></div>
  </div>
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
  <script>
 var variableRecuperee = <?php echo json_encode($dater); ?>;
 var des = <?php echo json_encode($shift['result']); ?>;
 console.log(des );
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:variableRecuperee,
        datasets: [{
            label: '# of Votes',
            data:des,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</body>
</html>