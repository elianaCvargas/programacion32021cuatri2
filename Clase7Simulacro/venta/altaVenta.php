<?php
include_once "venta.php";
include_once "ventaService.php";

if(isset($_POST["sabor"])
    && isset($_POST["email"])
    && isset($_POST["tipo"])
    && isset($_POST["cantidad"])
    && isset($_FILES["imagen"])
    )
{
    $venta = new Venta();
    $venta->ToventaFromRequest($_POST["sabor"],$_POST["email"], $_POST["tipo"], $_POST["cantidad"]);
    $ventaService = new VentaService();
    $ventaService->Vender($venta, $_FILES["imagen"]);
   // $ventaService->GuardarImagen($_FILES["imagen"], $_POST["email"],$_POST["sabor"], $_POST["tipo"]);

}
else
{
    echo "Falta algun  parametro de entrada";
}


?>