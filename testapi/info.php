
<?php

//$productos ={"productos":[{"id_producto":"36748","totalpro":"8.00","prod_cod":"0326"}],"opc":"test"};
//$data = array("id_producto"=>"36748","totalpro"=>"8.00","prod_cod"=>"0326");

//$personas = json([{"id_producto":"36748","totalpro":"8.00","prod_cod":"0326"}]); 
//var_dump($data);

/*$fields = array('productos' =>  $data,
'opc' =>  'test');
$fields = $_POST['fields'];
    $data[] = $fields;   


$json =json_decode($_POST['json_string']); 
$json2 =json_encode($fields); 
//var_dump($fields['productos']);

  print json_encode($json);


 $array =$_POST['field_name_1'][0];
 foreach ($array as $valor) {
    echo $valor . " ";
}
 
$vari = 'CADENA DE TEXTO'.$_POST['field_name_1'];
echo "HOLA MUNDO".date("Y-m-d H:i:s");

*/
if ($_POST['opc'] == 'test') {
    foreach ($_POST['field_name_1'] as $key => $value) {
        echo $key . ' => ' . $value . '<br>';
    }
}
//echo '<hr>'.$vari;


?>
