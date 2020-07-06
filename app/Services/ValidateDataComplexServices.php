<?php


namespace App\Services;
use App\Complex;

class ValidateDataComplexServices
{
    public function validateComplex($id){
        /*
         * Se obtiene el complejo en caso de que el complejo no exista, se enviara el mensaje correspondiente,
         * caso contrario regresara toda la data del mismo.
         * */
        $complex = Complex::find($id);
        if(!$complex){
            return $response = [
                "success" => false,
                "message" => "El complejo no existe."
            ];
        }
        return $response = [
            "success" => true,
            "data" => $complex
        ];
    }
}
