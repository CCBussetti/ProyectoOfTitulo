<?php
    $conexion=mysqli_connect('localhost','root','','bd_excel');
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="style.css">



</head>
<body>

<ul class="nav">
    <li> <a style="text-decoration: none;"  href="index.php">Principal</a></li>
    <li> <a style="text-decoration: none;"  href="upload.php">Subir Excel</a></li>
    <li> <a style="text-decoration: none;"  href="sede.php">Reportes Por Sede</a></li>
    <li> <a style="text-decoration: none;"  href="usuario.php">Reportes Por Usuarios</a></li>
</ul>
<div class="tab">
  <button style="background-color:red;" class="tablinks" onclick="openTabs(event, 'Atrasados')">Atrasados</button>
  <button style="background-color:yellow;" class="tablinks" onclick="openTabs(event, 'Abiertos_En_Plazo')">Abierto en Plazo</button>
  <button style="background-color:green;" class="tablinks" onclick="openTabs(event, 'Cerrados')">Cerrados</button>
</div>

<div id="Atrasados" class="tabcontent">
<div class="tabla">
    <br>
   <center> <table class="table"></center>
    <tr class  ="borde">
       <th> <p class="espacio"> Numero de Ticket</p></th>
        <th><p class="espacio">Antiguedad</p></th>
        <th><p class="espacio">Creado</p></th>
        <th><p class="espacio">Sede</p></th>
        <th><p class="espacio">Propietario Ticket</p></th>
        <th><p class="espacio">Asunto</p></th>
        
    </tr>
<?php 
$SQL="select
nro_ticket,
antiguedad,
creado,
sede_usuario,
upper(propietario),
asunto
from
tbl_excel
where
(
    SELECT
        5 * (DATEDIFF(sysdate(), creado) DIV 7) + MID(
            '0123444401233334012222340111123400012345001234550',
            7 * WEEKDAY(creado) + WEEKDAY(sysdate()) + 1,
            1
        ) - (
            SELECT
                COUNT(*)
            FROM
                diasnohabiles
            WHERE
                DAYOFWEEK(fechas) < 6
        )
) > substr(sla, 1, 2)";
$result = mysqli_query($conexion,$SQL);
while($mostrar = mysqli_fetch_array($result) ){
    ?>
    <tr class = "contenido">
        <td>
        <?php echo $mostrar['nro_ticket'] ?>
        </td>
        <td>
        <?php echo $mostrar['antiguedad'] ?>
        </td>
        <td>
        <?php echo $mostrar['creado'] ?>
        </td>
        <td>
        <?php echo $mostrar['sede_usuario'] ?>
        </td>
        <td>
        <?php echo $mostrar['upper(propietario)'] ?>
        </td>
        <td>
        <?php echo $mostrar['asunto'] ?>
        </td>
    </tr>
    <?php
}
    ?>
    </table>
    </div>
</div>

<div id="Abiertos_En_Plazo" class="tabcontent">
<div class="tabla">
    <br>
   <center> <table class="table " ></center>
   <thead>
    <tr class  ="borde">
       <th> <p class="espacio"> Numero de Ticket</p></thh
        <th><p class="espacio">Antiguedad</p></th>
        <th><p class="espacio">Creado</p></th>
        <th><p class="espacio">Sede</p></th>
        <th><p class="espacio">Propietario Ticket</p></th>
        <th><p class="espacio">Asunto</p></th>
        
    </tr>
</thead>
<tbody>
<?php 
$SQL="select
nro_ticket,
antiguedad,
creado,
sede_usuario,
upper(propietario),
asunto
from
tbl_excel
where
(
    SELECT
        5 * (DATEDIFF(sysdate(), creado) DIV 7) + MID(
            '0123444401233334012222340111123400012345001234550',
            7 * WEEKDAY(creado) + WEEKDAY(sysdate()) + 1,
            1
        ) - (
            SELECT
                COUNT(*)
            FROM
                diasnohabiles
            WHERE
                DAYOFWEEK(fechas) < 6
        )
) < substr(sla, 1, 2) ";
$result = mysqli_query($conexion,$SQL);
while($mostrar = mysqli_fetch_array($result) ){
    ?>
    <tr class = "contenido">
        <td>
        <?php echo $mostrar['nro_ticket'] ?>
        </td>
        <td>
        <?php echo $mostrar['antiguedad'] ?>
        </td>
        <td>
        <?php echo $mostrar['creado'] ?>
        </td>
        <td>
        <?php echo $mostrar['sede_usuario'] ?>
        </td>
        <td>
        <?php echo $mostrar['upper(propietario)'] ?>
        </td>
        <td>
        <?php echo $mostrar['asunto'] ?>
        </td>
    </tr>
    <?php
}
    ?>
    </tbody>
    </table >
    </div>
</div>

<div id="Cerrados" class="tabcontent">
<div class="tabla">
    <br>
   <center> <table class="table " ></center>
    <tr class  ="borde">
       <th> <p class="espacio"> Numero de Ticket</p></th>
        <th><p class="espacio">Antiguedad</p></th>
        <th><p class="espacio">Creado</p></th>
        <th><p class="espacio">Sede</p></th>
        <th><p class="espacio">Propietario Ticket</p></th>
        <th><p class="espacio">Asunto</p></th>
        
    </tr>
<?php 
$SQL="select nro_ticket, antiguedad, creado, sede_usuario, upper(propietario), asunto from tbl_excel
where cerrado is not null";
$result = mysqli_query($conexion,$SQL);
while($mostrar = mysqli_fetch_array($result) ){
    ?>
    <tr class = "contenido">
        <td>
        <?php echo $mostrar['nro_ticket'] ?>
        </td>
        <td>
        <?php echo $mostrar['antiguedad'] ?>
        </td>
        <td>
        <?php echo $mostrar['creado'] ?>
        </td>
        <td>
        <?php echo $mostrar['sede_usuario'] ?>
        </td>
        <td>
        <?php echo $mostrar['upper(propietario)'] ?>
        </td>
        <td>
        <?php echo $mostrar['asunto'] ?>
        </td>
    </tr>
    <?php
}
    ?>
    </table>
    </div>
</div>

<script>
function openTabs(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
     
</body>
</html> 