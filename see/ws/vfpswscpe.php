<?php
// Pull in the NuSOAP code
include('lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('VFPs_Service', 'urn:VFPs_Service');
                // Character encoding
                $server->soap_defencoding = 'UTF-8';
                //-------------------------------------------------
                //Register InsertData function
                $server->register('VFPs_SQLExec',
                        array('lcSQLCommand' => 'xsd:string', 'lcBD' => 'xsd:string'),
                        array('return' =>'xsd:boolean', 'xmlsql' =>'xsd:string'),
                        'urn:VFPs_Servicewsdl',
                        'urn:VFPs_Servicewsdl#VFPs_SQLExec',
                        'rpc',
                        'literal',
                        'Ejecutar una sentencia SQL en el servidor de datos'
                    );
                 //Registrar Subir File
                 $server->register('VFPs_UploadFile',
                         array('typeFile' => 'xsd:string', 'fileName' => 'xsd:string',	'contentFile' => 'xsd:string'),
                         array('return' =>'xsd:boolean', 'filerpta' =>'xsd:string'),
                         'urn:VFPs_Servicewsdl',
                         'urn:VFPs_Servicewsdl#VFPs_UploadFile',
                         'rpc',
                         'encoded',
                         'Subir archivos a la p�gina de custodia'
                    );                 
                 //Funci�n para subir archivos
                function VFPs_UploadFile($typeFile, $fileName, $contentFile) {

                    if (empty($typeFile)) {
                       return array('false', 'No se ha ingresado tipo de archivo.');
	                     exit();
                    }

                    if (empty($fileName)) {
                       return array('false', 'No se ha ingresado nombre del archivo.');
	                     exit();
                    }

                    if (empty($contentFile)) {
                       return array('false', 'No se ha ingresado contenido del archivo.');
	                     exit();
                    }

                    switch ($typeFile) {
                       case 'pdf':
                          $rutax  = '../pdf/';
                          $data   = base64_decode($contentFile);
                          $nombre = $fileName;
                          $file   = $rutax.$nombre;
                          $numbytes = file_put_contents($file, $data);
                          
                          if ($numbytes == 0) {
                             return array('false', 'Error al escribir el archivo en la carpeta PDF.');
	                           exit();
                          }
                          
                          return array('true', 'El archivo se guardo con EXITO.');                       
                       break;
     	                 case 'xml':
			  if (substr($fileName, 0, 1)=='R'){
                          	$rutax  = '../cdr/';
			  } else {
                          	$rutax  = '../xml/';
			  }
                          $data   = base64_decode($contentFile);
                          $nombre = $fileName;
                          $file   = $rutax.$nombre;
                          $numbytes = file_put_contents($file, $data);
                          
                          if ($numbytes == 0) {
                             return array('false', 'Error al escribir el archivo en la carpeta XML.');
	                           exit();
                          }
                          
                          return array('true', 'El archivo se guardo con EXITO.');
                       break;                       
                       default:
    			                return array('false', 'El tipo de archivo ingresado no es valido.');
    		           	   break;
    	              }
                }
 
                  //Body InsterData function
                function VFPs_SQLExec($lcSQLCommand, $lcBD) {
                    
                    if (empty($lcSQLCommand)) {
                       return array('false', 'No se ha ingresado un comando valido para procesar');
	                     exit();
                    }

                    if (empty($lcBD)) {
                       return array('false', 'No se ha ingresado base de datos');
	                     exit();
                    }
                                        
                    $connect = mysqli_connect("localhost","root","c4p1cu4$$");
                    if ($connect) {
                        if(mysqli_select_db($connect, $lcBD)) {
                           $resultado = mysqli_query($connect,$lcSQLCommand);
                           if ($resultado) {
                              return array('true',mysql_XML($resultado,$connect));
                           }
                           return array('false',"MySQL Error: (" .mysqli_errno($connect). ") : " .mysqli_error($connect). "");
                        }
                        return array('false', "MySQL DB Error: (" .mysqli_errno($connect). ") : " .mysqli_error($connect). "");
                    }
                    return array('false', 'Fallo al conectar con la base de datos. Verificar!!!');
                }
 
                // Generar XML
                function mysql_XML($resultado, $connect, $nombreDoc='resultados', $nombreItem='registro') {
		   error_reporting(E_ERROR);
                   $campo = array();
                   
                   // llenamos el array de nombres de campos
                   for ($i=0; $i<mysqli_num_fields($resultado); $i++)
                      $campo[$i] = mysqli_fetch_field_direct($resultado, $i)->name;
                   
                   // creamos el documento XML   
                   $dom = new DOMDocument('1.0', 'UTF-8');
                   $doc = $dom->appendChild($dom->createElement($nombreDoc));
                   
                   // recorremos el resultado
                   $cant_me = mysqli_num_rows($resultado);
                   if ($cant_me == 0) {
                      for ($i=0; $i<=mysqli_num_rows($resultado); $i++) {
                      
                         // creamos el item
                         $nodo = $doc->appendChild($dom->createElement($nombreItem));
                      
                         // agregamos los campos que corresponden
                         for ($b=0; $b<count($campo); $b++) {
                             $campoTexto = $nodo->appendChild($dom->createElement($campo[$b]));
                             $campoTexto->appendChild($dom->createTextNode(mysqli_result($resultado, $i, $b)));
                         }
                      }
                    } else {
                      for ($i=0; $i<mysqli_num_rows($resultado); $i++) {
                      
                         // creamos el item
                         $nodo = $doc->appendChild($dom->createElement($nombreItem));
                      
                         // agregamos los campos que corresponden
                         for ($b=0; $b<count($campo); $b++) {
                             $campoTexto = $nodo->appendChild($dom->createElement($campo[$b]));
                             $campoTexto->appendChild($dom->createTextNode(mysqli_result($resultado, $i, $b)));
                         }
                      }
                    }  
                   // retornamos el archivo XML como cadena de texto
                   //$dom->formatOutput = true;
                   //$dom->save('nombre_doc.xml');
                   mysqli_free_result($resultado); 
                   mysqli_close($connect);
                   
                   return $dom->saveXML();    
                }

                function mysqli_result($res, $row, $field=0) {
                   $res->data_seek($row);
                   $datarow = $res->fetch_array();
                   return $datarow[$field];
                } 
                
                //
                $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
                $server->service($HTTP_RAW_POST_DATA);
                //$server->service(file_get_contents("php://input"));
?>
