<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(E_ALL);
require_once "serverside.php";
require_once "../extra/ProductosApi.php";


$table_data->get(
    "view_lista_productos",
    "prod_id",
    [
        "nombre",
        "nombre_cate",
        "etiqueta",
        "estado",
        "prod_cod",
        "prod_cod",
        "prod_id",
        "prod_id",
    ],true,
    function($data, $inf){

        $productosApi = new ProductosApi();

        $codConsulta = substr($inf, 0, -1);
        //var_dump($codConsulta);
        $tempListData = $productosApi->getinfoData($codConsulta);
        $reslFinalR = [];
        foreach ($data['aaData'] as $rowP) {
            $key = array_search($rowP[4], array_column($tempListData, 'cod_prod'));
            $tempD = $tempListData[$key];
            $rowP[5] = $tempD['precio_venta'];
            $rowP[4] = $tempD['stock'];
            $reslFinalR[] = $rowP;
        }
        $data['aaData']=$reslFinalR;
        return $data;
    }
    
);
