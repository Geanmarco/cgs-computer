<?php 
class Template{
	public $path;
	public $nombre;
	function __construct($path, $nom)	{
		$this->path=$path;
		$this->nombre=$nom;
	}

	private function dinamicContent($html, $data){
		foreach ($data as $clave=>$valor) {
			$html = str_replace('{'.$clave.'}', $valor, $html);
		}
		return $html;
	}

	public function getValue($valores){
		if (file_exists($this->path.$this->nombre)) {			
			$texto = file_get_contents($this->path.$this->nombre);
			if(is_null($valores))
				return $texto;
			else
				return $this->dinamicContent($texto, $valores);
		}else{
			return false;
		}		
	}
}

?>