<?php
    // Conexion base de datos
    //$conexion = mysql_connect('localhost', 'maguar5_mgf2prod','L57Z(iYtu9{{@');
    //mysql_select_db('maguar5_maguare_production@f2', $conexion);

    $servername   = "localhost";
    $database = "maguare7_maguare_production@f2";
    $username = "maguare7_mgf2prod";
    $password = "AgD{YGib4J&@2018";

    // Create connection
    //$conn = new mysqli($servername, $username, $password);



   $conn = mysqli_connect($servername, $username, $password, $database);

    /* verificar la conexión */
    if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        exit();
    }

    include_once('xlsxwriter.class.php');
    $filename = "Reporte_Maguare_".date('d-m-Y').".xlsx";
    header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');   
    
    $query.= mysqli_query($conn ,"SET NAMES 'utf8'");
    $query="SELECT DISTINCT 
    p.ID as 'ID Contenido'
    , p.post_title as 'Titulo de Contenido'
    , p.post_status as 'Estado Contenido'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'tipo_de_contenido' AND mgf2_postmeta.post_id = p.ID) as 'Tipo de Contenido'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'interprete_autor' AND mgf2_postmeta.post_id = p.ID) as 'Interprete - Autor'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'descripcion' AND mgf2_postmeta.post_id = p.ID) as 'Descripcion'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'duracion' AND mgf2_postmeta.post_id = p.ID) as 'Duracion'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'vigencia_indefinida' AND mgf2_postmeta.post_id = p.ID) as 'Vigencia indefinida'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'vigencia' AND mgf2_postmeta.post_id = p.ID) as 'Fecha de vencimiento'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'forma_de_adquisicion' AND mgf2_postmeta.post_id = p.ID) as 'Forma de adquisicion'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'licencia' AND mgf2_postmeta.post_id = p.ID) as 'Estado licencia'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'documento' AND mgf2_postmeta.post_id = p.ID) as 'Documento'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'guia_de_uso' AND mgf2_postmeta.post_id = p.ID) as 'Actividades sugeridas'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'movil' AND mgf2_postmeta.post_id = p.ID) as 'Movil'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'estado_activo' AND mgf2_postmeta.post_id = p.ID) as 'Offline'
    ,(SELECT meta_value FROM mgf2_postmeta WHERE mgf2_postmeta.meta_key = 'observaciones' AND mgf2_postmeta.post_id = p.ID) as 'Observaciones'
    FROM mgf2_users u 
    JOIN mgf2_posts p ON p.post_author = u.ID 
    JOIN mgf2_usermeta um ON p.post_author = um.user_id 
    WHERE post_type = 'post'
    ORDER BY
    p.ID ";
    $result = mysqli_query($conn , $query); 
    $rows = mysqli_fetch_assoc($result); 
    $header = array(
        'ID Contenido'=>'integer',
        'Titulo de Contenido'=>'string',
        'Estado Contenido'=>'string',
        'Tipo de Contenido'=>'string',
        'Interprete - Autor'=>'string',
        'Descripcion'=>'string',
        'Duracion'=>'string',  
        'Vigencia indefinida'=>'string',   
        'Fecha de vencimiento'=>'string', 
        'Forma de adquisicion'=>'string', 
        'Estado licencia'=>'string', 
        'Documento'=>'string', 
        'Actividades sugeridas'=>'string', 
        'Movil'=>'string', 
        'Offline'=>'string', 
        'Observaciones'=>'string', 
    );
    $writer = new XLSXWriter();
    $col_options=array('widths'=> array(20,60,20,20,50,60,20,20,20,30,40,40,40,20,10,40), 'font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'center', 'border'=>'left,right,top,bottom');
    $writer->writeSheetHeader('Sheet1', $header , $col_options );

    $array = array();
    while ($row=mysqli_fetch_row($result))
    {
        for ($i=0; $i<mysqli_num_fields($result); $i++ )
        {
        $array[$i] = $row[$i];
        //$array[$i] = strip_tag($row[$i],"<p> <b> <br> <a> <img>");
        }
        $writer->writeSheetRow('Sheet1', $array );
    };

    //$writer->writeSheet($array,'Sheet1', $header);//or write the whole sheet in 1 call    

    $writer->writeToStdOut();
    //$writer->writeToFile('example.xlsx');
    //echo $writer->writeToString();
    exit(0); 
    mysqli_close($conn);
?>