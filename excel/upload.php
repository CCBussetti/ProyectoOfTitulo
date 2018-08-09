<?php
$connect = mysqli_connect("localhost", "root", "", "bd_excel");
$output = '';
if(isset($_POST["import"]))
{
 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
  $query2 = "TRUNCATE TABLE tbl_excel";
  mysqli_query($connect,$query2);
  $output .= "<label class='text-success'>Datos Insertados Correctamente</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
  #  $output .= "<tr>";
    $nro_ticket = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $antiguedad = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $creado = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $cerrado = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $firstresponse = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $estado = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $prioridad = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $inbox = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
    $bloquear = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
    $propietario = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
    $nom_usuario = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
    $ap_usuario = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
    $sede_usuario = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
    $n_r_cliente= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
    $de = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
    $asunto = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());
    $servicio = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16, $row)->getValue());
    $tipo = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17, $row)->getValue());
    $sla = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(18, $row)->getValue());
    $urgencia = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(19, $row)->getValue());
    $impacto = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(20, $row)->getValue());
    $cdg_cierre = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(21, $row)->getValue());
    $td_carrera = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(22, $row)->getValue());
    $c_titulacion = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(23, $row)->getValue());
    $c_egreso = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(24, $row)->getValue());
    $transcripcion = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(25, $row)->getValue());
   # $errorsigla = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(26, $row)->getValue());
    #$e_digitacion = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(27, $row)->getValue());
    #$reprobado = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(28, $row)->getValue());
    #$c_error_promedio = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(29, $row)->getValue());
   # $co_titulacion = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(30, $row)->getValue());
    #$n_pendientes = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(31, $row)->getValue());
    #$co_egreso = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(32, $row)->getValue());
    #$evidencia = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(33, $row)->getValue());
    #$carrera_alumno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(34, $row)->getValue());
    #$cv = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(35, $row)->getValue());
    #$categorizacion = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(36, $row)->getValue());
    #$jornada = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(37, $row)->getValue());
 
    $query = "INSERT INTO tbl_excel(nro_ticket, antiguedad, creado, cerrado, firstresponse, estado, prioridad, inbox , bloquear, propietario, nom_usuario, ap_usuario, sede_usuario, n_r_cliente, de , asunto , servicio, tipo, sla, urgencia, impacto, cdg_cierre, td_carrera, c_titulacion, c_egreso, transcripcion) VALUES ('".$nro_ticket."', '".$antiguedad."','".$creado."','".$cerrado."','".$firstresponse."','".$estado."','".$prioridad."','".$inbox."','".$bloquear."','".$propietario."','".$nom_usuario."','".$ap_usuario."','".$sede_usuario."','".$n_r_cliente."','".$de."','".$asunto."','".$servicio."','".$tipo."','".$sla."','".$urgencia."','".$impacto."','".$cdg_cierre."','".$td_carrera."','".$c_titulacion."','".$c_egreso."','".$transcripcion."')";
    mysqli_query($connect, $query);
   # $output .= $nro_ticket;
    #$output .= '<td>'.$antiguedad.'</td>';
    #$output .= '<td>'.$creado.'</td>';
    #$output .= '<td>'.$cerrado.'</td>';
    #$output .= '<td>'.$firstresponse.'</td>';
    #$output .= '<td>'.$estado.'</td>';
    #$output .= '<td>'.$prioridad.'</td>';
    #$output .= '<td>'.$inbox.'</td>';
    #$output .= '<td>'.$bloquear.'</td>';
    
   # $output .= '</tr>';
   }
  } 
  #$output .= '</table>';
  header('Location: index.php');
 }
 else
 {
  $output = '<label class="text-danger">Archivo Invalido</label>'; //if non excel file then
 }
}

?>

<html>
 <head>
  <title>Sistema Oficina de Tickets</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />-->
     <link href="https://fonts.googleapis.com/css?family=Rubik:300" rel="stylesheet">
     <link rel="stylesheet" href="style.css">
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
      text-decoration: none;
      font-family: 'Rubik', sans-serif;
  }
  .box
  {
   width:700px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
      text-decoration: none;
      font-family: 'Rubik', sans-serif;
  }


  ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
      font-family: 'Rubik', sans-serif;
      text-decoration: none;
  }

  li {
      float: left;
      font-family: 'Rubik', sans-serif;
  }

  li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-family: 'Rubik', sans-serif;
  }

  li a:hover:not(.active) {
      background-color: #111;
      font-family: 'Rubik', sans-serif;
  }


  .btn_subir {

      font-family: 'Rubik', sans-serif;
      color: white;
      background: #3b7aec;

      border: 0px;
      width: 80px;
      height: 25px;
      border-radius: 4px;
  }
  .btn_subir:hover{
      font-family: 'Rubik', sans-serif;
      color: white;
      background: #7cb5ec;
      border: 0px;
      width: 80px;
      height: 25px;
      border-radius: 4px;
  }


  </style>
 </head>
 <body class="upload">
 <ul>
     <li> <a class="boton3" href="index.php">Principal</a></li>
     <li> <a class="boton3" href="tablas.php">Tickets Atrasados</a></li>
     <li> <a class="boton3" href="sede.php">Reportes Por Sede</a></li>
     <li> <a class="boton3" href="usuario.php">Reportes Por Usuarios</a></li>
 </ul>
 <center>
  <div class="container box">
   <h3 align="center">Importar Excel Seleccionado</h3><br />
   <form method="post" enctype="multipart/form-data">
    <center><input type="file" name="excel" class="subir" /></center>
    <br />
    <center><input type="submit" name="import" class="btn_subir" value="Importar"/></center>
   </form>
   <br />
   <br />
   <?php
   echo $output;
   ?>
  </div>
 </center>
 </body>
</html>