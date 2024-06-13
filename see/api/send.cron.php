<?php 
include 'template.php';
include 'mailer.php';
include '../document.php';
include_once '../config.php';
if (file_exists('../envioconf.json')) {
    $myJson=file_get_contents('../envioconf.json'); 
    $objJson= json_decode($myJson);
    if ($objJson->numenvios!='' && $objJson->numintentos!='')
    	$docs= Document::lookup("ENVIADO=0 AND TRIES<{$objJson->numintentos}", 'ORDER BY FECHA ASC', $objJson->numenvios);
    else
    	echo "Bad configuration error";

}else{
	echo "Has a problem with conf file";
}

//$docs= Document::lookup('ENVIADO', '0');
if ($docs) {
	if (is_array($docs)){
		foreach ($docs as $doc) {			
			if (enviar($doc, (isset($objJson->copyto))? $objJson->copyto:'' ))
				$doc->setEnviado();
			else
				$doc->increaseTries();
		}
	}else{
		$doc=$docs;	
		if(enviar($doc, (isset($objJson->copyto))? $objJson->copyto:''))
			$doc->setEnviado();
		else
			$doc->increaseTries();
	}
}else{
	echo "Nothing to do";
}

function enviar($doc, $cpto=''){
	$templ= new Template('../', 'mail.tpl');	
	$u = $doc->getUser();	
	$rec=$u->mailAsRecipient();
	$tipo= $doc->getTipo();
	$asunto = '[ '.EMPRESA.' ] '.$tipo->descrip.': '.$doc->estab.'-'.$doc->ptoemi.'-'.$doc->secuencial;	

	$varsd= (array) $doc;
	$varsu= (array) $u;
	$varst= (array) $tipo;
	$masvars= array('rsocial'=>EMPRESA, 'myruc'=>RUC, 'ambiente'=>AMBIENTE);
	$var=array_merge($varsd, $varsu, $varst, $masvars);	

	$email = new Mailer($asunto, $templ->getValue($var), $rec);

	$pdfName='../pdf/'.$doc->claveac.'.PDF';
	if (!file_exists($pdfName)) {
		$pdfName='../pdf/'.$tipo->descrip.'-'.$doc->estab.$doc->ptoemi.'-'.$doc->secuencial.'.PDF';
	}
	$xmlName= '../xml/'.$doc->claveac.'_AUTORIZADO.XML';

	if (file_exists($pdfName) && file_exists($xmlName)) {
		$email->addAtachment($pdfName, 'application/pdf');
		$email->addAtachment($xmlName, 'text/xml');
		echo "\nSending ".$u->nombre.' '. $doc->ruc.' '.$u->email;		
		if ($cpto!='' && $doc->tries==0)
			$email->setCpTo($cpto);		

		if ($rec){
			$result= $email->send();
			if ($email->errorMsgs)				
				$doc->putLogEnvio($email->errorMsgs);			
			return $result==1;
		}			
		else{
			$doc->putLogEnvio('Aviso: El email==> no es correcto');
			return false;
		}
		
	}else{
		$doc->putLogEnvio('Aviso: No se envio por que no se encontro los archivos a adjuntar');		
		//echo "Can't send email". $doc->ruc;
		return false;
	}
}
?>