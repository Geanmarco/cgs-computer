<?php 
require_once('conectar.php');
class Tipo {
 	public $codigo;
 	public $descrip;
 	function __construct($rs)	{
 		$this->codigo= $rs['COD'];
 		$this->descrip= $rs['DESCRIPCION'];
 	}
 	public static function lookup($campo, $valor, $lim=0){
 		$con = Conector::getConexion();
 		$limiter=($lim==0) ? '': "LIMIT $lim";
		$query="SELECT `COD`, `DESCRIPCION`
		FROM tipodoc 
		WHERE {$campo}='$valor' {$limiter};";
		$rs=mysqli_query($con, $query);		
		if (mysqli_num_rows($rs)>0) {
			if(mysqli_num_rows($rs)==1){
				$row= mysqli_fetch_array($rs);
				return new Tipo($row);
			}else{
				$list = array();
				while ($row = mysqli_fetch_array($rs)) {
					array_push($list, new Tipo($row));
				}
				return $list;
			}			
		}			
		else{
			return false;
		}
 	}
 	
 }
 ?>