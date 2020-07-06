<?php

namespace App\Http\Controllers;

use App\HeadQuarter;
use Illuminate\Http\Request;
use App\Http\Requests\HeadquarterCreate;
use App\Services\ValidateDataHeadQuarterService;

class HeadQuarterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * Se obtienen todas las sedes activas
         * */
        
        return response()->json([
            'success'=> true,
            'data'=>    HeadQuarter::all()
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
    /**
     * Se utiliza Form request para manejo de todos los request, HeadQuiarterCreate.
     * */
    public function store(HeadquarterCreate $headquarterCreate)
    {
        /*
         * Se registra una nueva sede, con toda la data obtenida del form, una vez antes haya sido validada
         * por el form request - App\Https\Request\HeadquarterCreate
         * */
            HeadQuarter::create($headquarterCreate->all());
            return response()->json([
                'success' => true
            ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HeadQuarter  $headQuarter
     * @return \Illuminate\Http\Response
     */
    public function show(HeadQuarter $headQuarter, $id)
    {
        /*Servicio para validar la data de la sede, App\Services\ValidateDataHeadQuarterService
         * */
        $response_validation = (new ValidateDataHeadQuarterService())->validateHeadQuarters($id);
        return response()->json([
            $response_validation
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HeadQuarter  $headQuarter
     * @return \Illuminate\Http\Response
     */
    public function edit(HeadQuarter $headQuarter, $id)
    {
        /*Servicio para validar la data de la sede, App\Services\ValidateDataHeadQuarterService
         * */
        $response_validation = (new ValidateDataHeadQuarterService())->validateHeadQuarters($id);
        return response()->json([
            $response_validation
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HeadQuarter  $headQuarter
     * @return \Illuminate\Http\Response
     */
    public function update(HeadquarterCreate $headquarterCreate, HeadQuarter $headQuarter, $id)
    {
        /*
         * Se actualiza la sede con toda la data obtenida desde el form
         * */
        $headquarter_update = HeadQuarter::find($id);
        $headquarter_update->update($headquarterCreate->all());
        return response()->json([
            "success" => true,
            "data" => $headquarter_update
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HeadQuarter  $headQuarter
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeadQuarter $headQuarter, $id)
    {
        /*
         * Se valida y se elimina la sede.
         * */
        $headquarter_delete = HeadQuarter::find($id);
        if(!$headquarter_delete){
            return response()->json([
                "success" => false,
                "message" => "No se pudo eliminar, no existe o ya ha sido eliminada."
            ], 200);
        }
        $headquarter_delete->delete();
        return response()->json([
            "success" => true,
        ], 200);
    }
}
