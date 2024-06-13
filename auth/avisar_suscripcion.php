<?php

require "../model/EnvioEmail.php";
require "../utils/Tools.php";
require "../utils/Conexion.php";

$tools = new Tools();
$email = new EnvioEmail();
$conexion = (new Conexion())->getConexion();


$correoSus = $_POST['email'];


function suscripcion($basehost, $correoSus)
{
    return '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>email</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style type="">
    .btn.btn-green {
      background: #ff324d;
      border-color: #c12336;
      color: #ffffff;
      margin: 0 28px;
      border-radius: 50px;
      font-size: 16px;
      padding: 8px 35px;
      line-height: 1.8em;
      cursor: pointer;
    }
    .btn.btn-green {
      background: #ff324d;
      border-color: #c12336;
      color: #ffffff;
      margin: 0 28px;
    }
    .btn.btn-rounded {
      border-radius: 50px;
    }
    .btn.btn-large {
      font-size: 16px;
      padding: 8px 35px;
      line-height: 1.8em;
    }
    .btn {
      -webkit-appearance: initial;
      overflow: hidden;
      position: -webkit-sticky;
      position: sticky;
      z-index: 2;
      display: inline-block;
      font-size: 16px;
      border: 2px solid transparent;
      letter-spacing: .5px;
      line-height: inherit;
      border-radius: 0;
      text-transform: capitalize;
      width: auto;
      font-family: "Roboto", sans-serif;
      font-weight: bold;
      -webkit-transition: all .5s ease;
      -o-transition: all .5s ease !important;
      transition: all .5s ease !important;
    }
    .btn {
      display: inline-block;
      font-weight: 400;
      color: #212529;
      text-align: center;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-color: transparent;
      border: 1px solid transparent;
      padding: .375rem .75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: .25rem;
      transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
  </style>
</head>
<body>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
  <tr>
    <td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td>
  </tr>
  <td align="center" bgcolor="#000000" style="padding: 40px 0 30px 0;">
    <img src="https://cgs-computer.pe/public_html/public/cymw.png"
         alt="Creating Email Magic" width="300" style="display: block;"/>
  </td>
  <tr>
    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td style="text-align: center; color: black">
            <h2><strong>Te saluda CGS-COMPUTER</strong></h2>
          </td>
        </tr>
        <tr>
          <td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td>
        </tr>
        <tr>
          <td style=" color: black">
        
          </td>
        </tr>
        <tr>
          <td style="padding: 20px 0 30px 0; color: black">
         Se ha suscrito el usuario ' . $correoSus . ' para estar al dia con las promociones<br><br>
          </td>
        </tr>
        <tr>
         
        </tr>
        <tr>
          <td style="padding: 20px 0 30px 0; color: black">
            <br><br><br>
          </td>
        </tr>
      
      </table> 
    </td>
  </tr>
  <tr>
    <td bgcolor="#ff324d" style="padding: 30px 30px 30px 30px;">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td style="color: white" width="75%">
            &reg; CGS-COMPUTER. <br/>
            Compra en nuestra tienda.
          </td>
          <td align="right">
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
    ';
}


if (isset($_POST['email'])) {
    ob_start();
    $ressss = $email->de("envios@magustechnologies.com", "CGS-COMPUTER")
        ->addEmail("envios@magustechnologies.com", "CGS-COMPUTER")
        ->setasunto("Aviso suscripcion por promociones")
        ->cuerpo(suscripcion("https://cgs-computer.pe/public_html/CYM", $_POST['email']))
        ->enviar();
    ob_end_clean();
}
echo 'false';
