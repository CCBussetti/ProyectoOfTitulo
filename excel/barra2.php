<?php

$conexion=mysqli_connect('localhost','root','','bd_excel');

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Graficos Estadisticos de Tickets'
        },
        xAxis: {
            categories: [

<?php
$consulta="SELECT sede_usuario,count(nro_ticket) from tbl_excel group by sede_usuario";
$sql=mysqli_query($conexion,$consulta);
while($res=mysqli_fetch_array($sql)){

?>

                ['<?php echo $res['sede_usuario']; ?>'],

<?php
}
?>


            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad Tickets',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' tickets'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
       /*legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },*/
        credits: {
            enabled: false
        },
        series: [{
            name: 'Cantidad ticket',
            
            data: [
<?php
$consulta="SELECT sede_usuario,count(nro_ticket) from tbl_excel group by sede_usuario";
$sql=mysqli_query($conexion,$consulta);
while($res=mysqli_fetch_array($sql)){
?>
        [<?php echo $res['count(nro_ticket)']; ?>],
<?php
}
?>
            ]

        }]
    });
});
		</script>
	</head>
	<body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

	</body>
</html>