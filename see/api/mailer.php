<?php
include '../config.php';
include_once '../lib/swift_required.php';
class Mailer {

	public $subject;
	public $body;
	public $atachments;
	public $recipients;
	private $user;
	private $password;
	private $host;
	private $port;
	private $protocol;
	public $errorMsgs;
 	public $cpto;

	function __construct($sub, $bod, $rec){
		$this->subject = $sub;
		$this->body =$bod;
		$this->recipients= $rec;
		$this->atachments = array();
	}

	private function conexInit(){
		$this->user=USERNAME;
		$this->password = PASSWORD;
		$this->host = HOST;
		$this->port = PORT;
		$this->protocol = PROT;
	}

	public function send($from=null){
		$chanel = $this->getTansport();
		$msg= $this->getMessage();

		if (isset($from))
			$msg->setFrom($from['email'], $from['name']);
		else
			$msg->setFrom(FROM, EMPRESA);

		if ($this->cpto)
			$msg->setCc($this->getCopyTo());

		$msg->setTo($this->recipients);

		if (!empty($this->atachments)) {
			foreach ($this->atachments as $atach) {
				$msg->attach($atach);
			}
		}


		$mailer = Swift_Mailer::newInstance($chanel);
		$logger = new Swift_Plugins_Loggers_ArrayLogger();
		$mailer->registerPlugin(new Swift_Plugins_LoggerPlugin($logger));
		if ($mailer->send($msg, $failedRecipients)) {
			$this->errors($failedRecipients);
			if($this->cpto)
				return !$this->checkExsistence($this->cpto, $failedRecipients);
			else
				return true;
		}else{
			$this->errors($failedRecipients);
			return false;
		}
	}

	private function checkExsistence($cad, $arreglo){
		foreach ($arreglo as $valores) {
			if ($cad==$cad)
				return true;
		}
		return false;
	}

	private function errors($failures){
		if (sizeof($failures)>0) {
			$ms= 'Informe: Ha ocurrido un error con las siguientes direcciones:\n';
			foreach ($failures as $dir) {
				$ms.=$dir.'\n';
			}
			$ms.= 'Por favor verifique que la dirección sea correcta';
			$this->addError($ms);
		}
	}

	public function getMessage(){
		$message = Swift_Message::newInstance();
		$message->setSubject($this->subject);
		$message->setBody($this->body, 'text/html');
		return $message;
	}

	public function getTansport(){
		$this->conexInit();
		$transport = Swift_SmtpTransport::newInstance($this->host,$this->port ,$this->protocol);
		$transport->setUsername($this->user);
		$transport->setPassword($this->password);
		return $transport;
	}

	public function addAtachment($path, $type)	{
		$attachment = Swift_Attachment::fromPath($path, $type);
		//var_dump($this->atachments);
		array_push($this->atachments, $attachment);
	}

	public function addRecipient($rec)	{
		array_push($this->recipients, $rec);
	}

	public function getCopyTo(){
		$correos=preg_split("[;]", $this->cpto);
		return $correos;
	}

	public function addError($mensaje){
 		$this->errorMsgs=$mensaje;
 	}

 	public function setCpTo($cpto){
 		$this->cpto= $cpto;
 	}
}
 ?>
