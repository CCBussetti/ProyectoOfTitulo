<?php
    $conexion=mysqli_connect('localhost','root','','bd_excel');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div>
    
    <ul>
           <li> <a class="boton3" href="index.php">Principal</a></li>
           <li> <a class="boton3" href="upload.php">Subir Excel</a></li>
          <li>  <a class="boton3" href="tablas.php">Tickets Atrasados</a></li>
           <li> <a class="boton3" href="sede.php">Reportes Por Sede</a></li>
        </ul>


        
    

<table class="tabla3">
    <br>
    <tr class="borde3">
        <th>Propietario</th>
        <th>Cantidad de Ticket</th>
        
    </tr>
    <?php
    $SQL3="SELECT propietario, count(nro_ticket) from tbl_excel where propietario = 'asoto' or propietario='ajaque' or propietario='bcontreras' GROUP BY propietario";
    $result3=mysqli_query($conexion,$SQL3);
    while($mostrar3=mysqli_fetch_array($result3)){
    ?>
    <tr class="contenido3">
        <td><?php echo $mostrar3['propietario'] ?></td>
        <td><?php echo $mostrar3['count(nro_ticket)'] ?></td>        
    </tr>
    <?php
    }
    ?>
</table>

<div class="total3"> 
 <?php
    $SQL3="SELECT count(nro_ticket) from tbl_excel where propietario = 'asoto' or propietario='ajaque' or propietario='bcontreras'";
    $result3 =mysqli_query($conexion,$SQL3);
    $total3=mysqli_fetch_assoc($result3);
    echo "Total:". " " .$total3['count(nro_ticket)'];
?> </div>

<iframe class="grafico2" src="<?php print ('barra.php'); ?>" ></iframe> 
</div>
</body>
</html>