<?php


namespace App\Services;
use App\Commissar;

class ValidateCommisarServices
{
    public function validateCommissar($id){
        
        /*
         * Se obtiene el commisario, si el comisario no existe, o ha sido eliminado devuelve el mensaje
         * correspondiente, de lo contrario regresara toda la data.
         * */
        $commisar_data = Commissar::find($id);
        if(!$commisar_data){
            return $response = [
                "success" => false,
                "message" => "El Comisiario no existe."
            ];
        }
        return $response = [
            "success" => true,
            "data" => $commisar_data
        ];
    }
}
