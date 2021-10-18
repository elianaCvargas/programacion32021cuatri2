<?php
class File
{
    static function ReadFileCSV($root, $modo)
    {
        $file = fopen($root, $modo);
        $lineas = [];

        if(!$file)
        {
            echo "Error";
        }
        else
        {
            // while(!feof($file))
            // {
            //     $retorno = fgetcsv($file);
            //     // var_dump($retorno);
            //     array_push($lineas, $retorno);
            //     return $lineas;
            // }
            // read each line in CSV file at a time
            while (($row = fgetcsv($file)) !== false) {
                $lineas[] = $row;
            }
        }

        fclose($file);
        return $lineas;
    }

    static function ReadFileTXT($root, $modo)
    {
        // echo $root;
        $file = fopen($root, $modo);

         $lineas = [];

        if(!$file)
        {
            echo "Error, no se encuentra el archivo";
        }
        else
        {
            while(!feof($file))
            {
                $retorno = fgets($file);

                $lineas = json_decode($retorno);
            }
          
        }

        fclose($file);
        return $lineas;
    }

    static function ArchivarSVC($data, $root, $modo)
    {
        $arraydata = [[$data->_color, $data->_marca, $data->_precio, $data->_fecha]];
        $file = fopen($root, $modo);

        if(!$file)
        {
            echo "error";
        }
        else
        {
            foreach($arraydata as $row)
            {
                fputcsv($file,  $row, ";");
            }

            echo "se guardo el elemento: con formato CSV<br/>";
        }

        fclose($file);
    }


    static function ArchivarTXT($arrayObj, $obj, $root, $modo)
    {
        // $arrayObj = [$obj];
         $file = fopen($root, $modo);

        if(!$file)
        {
            echo "error";
        }
        else
        {
            file_put_contents($root, json_encode($arrayObj));
           // echo "se guardo el elemento: <br/>". $obj->ToJson($obj);
           echo "modificar esto al  guardar";
           return true;
        }

        fclose($file);
    }


}


?>