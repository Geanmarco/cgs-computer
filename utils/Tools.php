<?php

class Tools{
    function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[rand(0, $max-1)];
        }

        return $token;
    }
   public  function formatoFechaVisual($fecha){
        $fecha = new DateTime($fecha);
        return self::nombreMes(intval($fecha->format('m'))-1). " " .$fecha->format('d')." del, ".$fecha->format('Y');
    }
function estados_pedido($est){
        switch ($est) {
            case "1":
                return 'En espera';
            case "2":
                return 'Aprobado';
            case "3":
                return 'Rechazado';
            case "4":
                return 'Vendido';
        }
    }
    function secure_rand($min, $max)
    {
        return (unpack("N", openssl_random_pseudo_bytes(4)) % ($max - $min)) + $min;
    }
    function abreviaturaMes($mes){
        $meses = array("en","febr","mzo","abr","my","jun","jul","agto","sept","oct","nov","dic");

        return $meses[$mes];

    }
    function nombreMes($mes){
        $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

        return $meses[$mes];

    }
    function getConfiguracion(){
        return json_decode(file_get_contents("../utils/tsconfig.json"), true);
    }
    function guardarConfiguarion($cnf){
        $file = fopen("../utils/tsconfig.json", "w");
        fwrite($file, json_encode($cnf) . PHP_EOL);
        fclose($file);
    }
}