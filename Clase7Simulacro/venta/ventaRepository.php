<?php
include "cross/accesoDatos.php";
class VentaRepository
{
    public function AltaVenta(Venta $venta)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
         $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into venta (email,sabor,tipo, cantidad, fecha) 
		values('$venta->email', '$venta->sabor', '$venta->tipo', '$venta->cantidad', '$venta->fecha')");
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
      
	public function GetUserByEmail($mail): ?Usuario
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select  *  from usuario  where Mail=:mail");
		$consulta->bindValue(':mail', $mail, PDO::PARAM_STR);	
		$consulta->execute();
		$usuarioFromDb = $consulta->fetchObject("Usuario");
		if(!$usuarioFromDb)
		{
			return null;
		}
		else{
			return $usuarioFromDb;
		}
	}

	public static function GetAll()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Usuario");
			$consulta->execute();
			$usuarios = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
			return 	$usuarios;	
	}



		// public static function TraerUnCd($id) 
	// {
	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("select id, titel as titulo, interpret as cantante,jahr as año from cds where id = $id");
	// 		$consulta->execute();
	// 		$cdBuscado= $consulta->fetchObject('cd');
	// 		return $cdBuscado;				

			
	// }
	

  	// public function BorrarCd()
	//  {

	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("
	// 			delete 
	// 			from cds 				
	// 			WHERE id=:id");	
	// 			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
	// 			$consulta->execute();
	// 			return $consulta->rowCount();

	//  }

	//  	public static function BorrarCdPorAnio($año)
	//  {

	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("
	// 			delete 
	// 			from cds 				
	// 			WHERE jahr=:anio");	
	// 			$consulta->bindValue(':anio',$año, PDO::PARAM_INT);		
	// 			$consulta->execute();
	// 			return $consulta->rowCount();

	//  }

	// public function ModificarCd()
	//  {

	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("
	// 			update cds 
	// 			set titel='$this->titulo',
	// 			interpret='$this->cantante',
	// 			jahr='$this->año'
	// 			WHERE id='$this->id'");
	// 		return $consulta->execute();

	//  }
	//  public function ModificarCdParametros()
	//  {
	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("
	// 			update cds 
	// 			set titel=:titulo,
	// 			interpret=:cantante,
	// 			jahr=:anio
	// 			WHERE id=:id");
	// 		$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
	// 		$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
	// 		$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
	// 		$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
	// 		return $consulta->execute();
	//  }

  	// public function mostrarDatos()
	// {
	//   	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	// }

	//  public function InsertarElCdParametros()
	//  {
	// 			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values(:titulo,:cantante,:anio)");
	// 			$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
	// 			$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
	// 			$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
	// 			$consulta->execute();		
	// 			return $objetoAccesoDato->RetornarUltimoIdInsertado();
	//  }
	 




	// public static function TraerUnCd($id) 
	// {
	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("select id, titel as titulo, interpret as cantante,jahr as año from cds where id = $id");
	// 		$consulta->execute();
	// 		$cdBuscado= $consulta->fetchObject('cd');
	// 		return $cdBuscado;				

			
	// }

	// public static function TraerUnCdAnio($id,$anio) 
	// {
	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=? AND jahr=?");
	// 		$consulta->execute(array($id, $anio));
	// 		$cdBuscado= $consulta->fetchObject('cd');
    //   		return $cdBuscado;				

			
	// }

	// public static function TraerUnCdAnioParamNombre($id,$anio) 
	// {
	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta(
		//"select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
	// 		$consulta->bindValue(':id', $id, PDO::PARAM_INT);
	// 		$consulta->bindValue(':anio', $anio, PDO::PARAM_STR);
	// 		$consulta->execute();
	// 		$cdBuscado= $consulta->fetchObject('cd');
    //   		return $cdBuscado;				

			
	// }
	
	// public static function TraerUnCdAnioParamNombreArray($id,$anio) 
	// {
	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
	// 		$consulta->execute(array(':id'=> $id,':anio'=> $anio));
	// 		$consulta->execute();
	// 		$cdBuscado= $consulta->fetchObject('cd');
    //   		return $cdBuscado;				

			
	// }



}
