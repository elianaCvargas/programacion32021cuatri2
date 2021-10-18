<?php
include_once "cross/fileHelper.php";
include_once "pizza/pizza.php";
include_once "ventaRepository.php";

class VentaService {
    public $rootPizza = "cross/pizza.json";

  function Vender($ventaPizza, $imagen)
  {
      $pizzasFromFile = File::ReadFileTXT($this->rootPizza, "r");

      if($pizzasFromFile && count($pizzasFromFile) >  0)
      {
          $quedanPizzas = 0;
          foreach($pizzasFromFile as $pizzaFromFile)
          {
            if($ventaPizza->Equals($ventaPizza, $pizzaFromFile))
            {
                $quedanPizzas = $pizzaFromFile->cantidad - $ventaPizza->cantidad;
                if($quedanPizzas >= 0)
                {
                    $pizzaFromFile->cantidad = $quedanPizzas;
                }
            }
          }

        if($quedanPizzas >=  0)
        {
            // File::ArchivarTXT($pizzasFromFile, $ventaPizza, $this->rootPizza, "w");
            $ventaRepository = new VentaRepository();
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $ventaPizza->fecha = date("Y-m-d H:i:s");
            $ventaRepository->AltaVenta($ventaPizza);
            $this->GuardarImagen($imagen, $ventaPizza->email,  $ventaPizza->sabor,  $ventaPizza->tipo,  $ventaPizza->fecha);
            //guardar img
            if(File::ArchivarTXT($pizzasFromFile, $ventaPizza, $this->rootPizza, "w"))
                echo "Se pudo registrar la venta";
        }
        
        else { echo "No se puede reallizar la venta, solo quedan ". $pizzaFromFile->cantidad." en stock.";}
      }
  }

  function BuscarPorSaBorTipo($pizza)
  {
      $pizzasFromFile = File::ReadFileTXT("cross/pizza.txt", "r");
      if($pizzasFromFile && count($pizzasFromFile) >  0)
      {
          foreach($pizzasFromFile as $pizzaFromFile)
          {
              return $pizza->Equals($pizza, $pizzaFromFile);
          }
      }
  }

    public function GuardarImagen($imagen, $email, $sabor, $tipo, $fecha)
    {
        $userName = explode("@", $email);
       
        if(strlen($imagen["name"] > 0))
        {
            $extension = pathinfo($imagen["name"], PATHINFO_EXTENSION);

            if($this->VerificarExtension($extension))
            {
                $fechaStr = explode(" ", $fecha);

                $imagen["name"] = $userName[0]."-".$sabor."-".$tipo."-".strval($fechaStr[0]).".".$extension;
                $moveTo = $_SERVER['DOCUMENT_ROOT']."/UTN/Clase7Simulacro/cross/imagenesDeLaVenta/";
                move_uploaded_file($imagen["tmp_name"], $moveTo.$imagen["name"]);
                // rename($imagen["tmp_name"], $moveTo);
            }
            else { echo "No es un una imagen"; }
        }  
        else { echo "No se ingresó una imagen"; }           
    }


    private function VerificarExtension($name)
    {
        switch($name)
        {
            case "jfif":
            case "jpg":
            case "gif":
                return true;
                break;
            default:
                return false;
            break;
        }
    }



}







?>