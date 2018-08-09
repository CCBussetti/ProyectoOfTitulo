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


    <title>Detalle por sede</title>
</head>
<body>
<div>
    <ul>
        <li> <a class="boton3" href="index.php">Principal</a></li>
        <li> <a class="boton3" href="upload.php">Subir Excel</a></li>
        <li>  <a class="boton3" href="tablas.php">Tickets Atrasados</a></li>
        <li> <a class="boton3" href="usuario.php">Reportes Por Usuario</a></li>
    </ul>
    <br>
    <table class="tabla2">
    <tr class="borde2">
    <th>Sede</th>
    <th>Cantidad Tickets</th>
    </tr>
    <?php
    $SQL2="SELECT sede_usuario,count(nro_ticket)from tbl_excel group by sede_usuario";
    $result2 =mysqli_query($conexion,$SQL2);
    while($mostrar2=mysqli_fetch_array($result2)){
    ?>
    <tr class="contenido2">
    <td><?php echo $mostrar2['sede_usuario'] ?></td>
    <td><?php echo $mostrar2['count(nro_ticket)'] ?></td>
    </tr>
    <?php
    }
    ?>
    </table>
 <div class="total2"> 
 <?php
    $SQL2="SELECT count(nro_ticket)from tbl_excel";
    $result2 =mysqli_query($conexion,$SQL2);
    $total2=mysqli_fetch_assoc($result2);
    echo "Total:". " " .$total2['count(nro_ticket)'];
?> </div>
    <iframe class="grafico1" src="<?php print ('barra2.php'); ?>" ></iframe> 
    </div>
</body>
</html>