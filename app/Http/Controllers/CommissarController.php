<?php

namespace App\Http\Controllers;

use App\Commissar;
use Illuminate\Http\Request;
use App\Http\Requests\CommissarCreate;
use App\Services\ValidateCommisarServices;
class CommissarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * Se devuelven todos los comisarios activos.
         * */
        return response()->json([
            'success'=> true,
            'data'=>Commissar::all()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommissarCreate $commissarCreate)
    {
        /*
         * Se registra un nuevo comisario, con toda la data obtenida del form, una vez antes haya sido validada
         * por el form request - App\Https\Request\CommissarCreate
         * */
        Commissar::create($commissarCreate->all());
        return response()->json([
            'success' => true
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commissar  $commissar
     * @return \Illuminate\Http\Response
     */
    public function show(Commissar $commissar, $id)
    {
        /*Se valida con el servicio si el comisario realmente existe.
            La ruta del servico es App\Services\ValidateCommisarServices
         * */
        $validate_comissar = (new ValidateCommisarServices())->validateCommissar($id);
        return response()->json([
            $validate_comissar
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commissar  $commissar
     * @return \Illuminate\Http\Response
     */
    public function edit(Commissar $commissar, $id)
    {
        /*Se valida con el servicio si el comisario realmente existe.
            La ruta del servico es App\Services\ValidateCommisarServices
         * */
        $validate_comissar = (new ValidateCommisarServices())->validateCommissar($id);
        return response()->json([
            $validate_comissar
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commissar  $commissar
     * @return \Illuminate\Http\Response
     */
    public function update(CommissarCreate $commissarCreate, Commissar $commissar, $id)
    {
        /*
         * Se actualiza el comisario con toda la data obtenida del formulario
         * */
        $commisar_update = Commissar::find($id);
        $commisar_update->update($commissarCreate->all());
        return response()->json([
            "success" => true,
            "data" => $commisar_update
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commissar  $commissar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commissar $commissar, $id)
    {
        /*
         * Se elimina el comisario
         * */
        $commissar_delete = Commissar::find($id);
        if(!$commissar_delete){
            return response()->json([
                "success" => false,
                "message" => "No se pudo eliminar, no existe o ya ha sido eliminado."
            ], 200);
        }
        $commissar_delete->delete();
        return response()->json([
            "success" => true,
        ], 200);
    }
}
