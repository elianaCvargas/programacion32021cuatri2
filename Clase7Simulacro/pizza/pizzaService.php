<?php
include_once "cross/fileHelper.php";

class PizzaService {

public $rootPizza = "cross/pizza.json";

  function SaveFile($pizza)
  {
      $pizzasFromFile = File::ReadFileTXT($this->rootPizza, "r");
      if($pizzasFromFile && count($pizzasFromFile) >  0)
      {
        $existePizza = false;
        foreach($pizzasFromFile as $pizzaFromFile)
        {
           if( $pizza->Equals($pizza, $pizzaFromFile))
           {
            //    echo "asd";
              $pizzaFromFile->cantidad = $pizzaFromFile->cantidad + $pizza->cantidad;
              $pizza->cantidad = $pizzaFromFile->cantidad;
              $pizza->id = $pizzaFromFile->id;
              $existePizza = true;
           }
        }

        if(!$existePizza)
        {
            $ultimoItem = end($pizzasFromFile);
            $pizza->SetId(intval($ultimoItem->id));
            array_push($pizzasFromFile, $pizza);
        }

        File::ArchivarTXT($pizzasFromFile, $pizza, $this->rootPizza, "w");
      }
      else{
          $pizza->SetId(0);
          $pizzasFromFile = [];
          array_push($pizzasFromFile, $pizza);
          File::ArchivarTXT($pizzasFromFile, $pizza, $this->rootPizza, "w");
      }

  }

  function GenerarArchivoVacio($pizza)
  {
    File::ArchivarTXT([], $pizza, $this->rootPizza, "w");
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

//   function Login($mail, $clave)
//   {
//         $error = $this->ValidateLoginParameters($mail, $clave);
//         if($error->error)
//         {
//             echo $error->message;
//         }
//         else{
//             $usuarioFromDb = $this->GetUserByEmail($mail);

//             if($usuarioFromDb != NULL)
//             {
//                 // echo $usuarioFromDb->clave."-".$clave;
//                 if(!strcmp($usuarioFromDb->clave,$clave ))
//                 {
//                     echo "Error en los datos";
//                 }
//                 else{
//                     echo "Verificado";
//                 }
//             }
//             else{
//                     echo "Email no registrado.";
//             }

//         }

//   }

//   static function  GetAll()
//   {
//     $usuarioRepository = new UsuarioRepository();
//     $usuarios = $usuarioRepository->GetAll();
//    // $usuarios = json_encode($usuarios);

//     // var_dump($usuarios);
//     if($usuarios)
//     {
//         foreach($usuarios as $usuarioFromDb)
//         {
//             $usuario =  new Usuario($usuarioFromDb["Nombre"], $usuarioFromDb["Apellido"], $usuarioFromDb["Mail"]
//             , $usuarioFromDb["Clave"], $usuarioFromDb["Localidad"]);
//             echo $usuario->MostrarUsuario($usuario);
//         }
//     }
//     else
//     {
//         echo "No se encuentran  datos";
//     }

//   }


//   private function ValidateParameters(Usuario $usuario): MiError
//   {
//     $mensaje = "Se debe ingresar los siguientes campos, por favor: \n";
//     $error = new MiError($mensaje);
//     if(empty($usuario->nombre))
//     {
//         $error->isError = true;
//         $mensaje = $mensaje. "Nombre\n";
//     }

//     if(empty($usuario->apellido))
//     {
//         $error->isError = true;
//         $mensaje = $mensaje."Apellido\n";
//     }

//     if(empty($usuario->mail))
//     {
//         $error->isError = true;
//         $mensaje = $mensaje."Mail\n";
//     }

//     if(empty($usuario->localidad))
//     {
//         $error->isError = true;
//         $mensaje."Localidad\n";
//     }

//     if(empty($usuario->clave))
//     {
//         $error->isError = true;
//         $mensaje = $mensaje."Clave\n";
//     }

//      return $error;
//   }

//   private function ValidateLoginParameters($mail, $clave): MiError
//   {
//     $mensaje = "Se debe ingresar los siguientes campos, por favor: \n";
//     $error = new MiError($mensaje);

//     if(empty($mail))
//     {
//         $error->isError = true;
//         $mensaje = $mensaje."Mail\n";

//     }

//     if(empty($clave))
//     {
//         $error->isError = true;
//         $mensaje = $mensaje."Clave\n";
//     }
//      return $error;
//   }

}







?>