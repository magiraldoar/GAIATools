<?php
    require_once("configuracion/clsBD.php");
    $result;
 
    $objDatos = new clsDatos();
    // Create the query
    $sql = 'SELECT * FROM pregunta';
    // Create the query and asign the result to a variable call $result
    $result = $objDatos->hacerConsulta($sql);
    // Extract the values from $result
    $rows = pg_fetch_all($result);
    // Since the values are an associative array we use foreach to extract the values from $rows

    $sqls = 'SELECT * FROM opcion';
    // Create the query and asign the result to a variable call $result
    $resultado = $objDatos->hacerConsulta($sqls);
    // Extract the values from $result
    $raws = pg_fetch_all($resultado);
    // Since the values are an associative array we use foreach to extract the values from $rows


    


 ?>
 <!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Query data sending an ID</title>
        <meta http-equiv="X-UA-Compatible" content="IE=9,crome" />
        <meta name="copyright" content="Datasoft Engineering 2013"/>
        <meta name="author" content="Reedyseth"/>
        <meta name="email" content="ibarragan@behstant.com"/>
        <meta name="description" content="Query data sending an ID" />
        <link rel=stylesheet href="../css/style01.css">
                   
    </head>
    <body>
        <table border="1">
        <thead>
            <tr>
               
                <th>pregunta</th>
                <th>opcion</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?php echo $row['pregunta']; ?></td>
            </tr>
        <?php
            foreach ($raws as $raw) {
                    
        ?>
            <tr>
                <td><?php echo $raw['opcion']; ?></td>
            </tr>
        <?php
                } 
            } 
        ?>
        </tbody>
    </table>
</html>