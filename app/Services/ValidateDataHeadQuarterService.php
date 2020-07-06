<?php


namespace App\Services;
use App\HeadQuarter;
/**
 * Class ValidateDataHeadQuarterService
 * @package App\Services
 */
class ValidateDataHeadQuarterService
{
    /*
     * Se valida si la sede existe, en caso de que exista devuelve toda la data, en caso contrario
     * mensaje correspondiente.
     * */
        public function validateHeadQuarters($id){

            $data = HeadQuarter::find($id);
            if(!$data){
             return $response = [
                  "success" => false,
                  "message" => "La sede no existe"
              ];
            }
            return $reponse = [
                "success" => true,
                "data" => $data
            ];
        }
}
