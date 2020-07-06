<?php

namespace App\Http\Controllers;

use App\Complex;
use Illuminate\Http\Request;
use App\Http\Requests\ComplexCreate;
use App\Services\ValidateDataHeadQuarterService;
use App\Services\ValidateDataComplexServices;
class ComplexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * Se devuelve todos los complejos activos
         * */
        return response()->json([
            'success'=> true,
            'data'=>Complex::all()
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
    public function store(ComplexCreate $complexCreate)
    {
        /*
         * Se registra un nuevo Complejo, con toda la data obtenida del form, una vez antes haya sido validada
         * por el form request - App\Https\Request\ComplexCreate
         * */
        $headquarter_validation = (new ValidateDataHeadQuarterService())->validateHeadQuarters($complexCreate->head_quarter_id);
        if(!$headquarter_validation['success']){
            return response()->json([
                $headquarter_validation
            ], 200);
        }
        /*
         * Una vez que haya sido validad la sede y esta exista, se procede a crear el complejo.
         * */
        Complex::create($complexCreate->all());
        return response()->json([
            'success' => true
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function show(Complex $complex, $id)
    {
        /*
         * Se valida con el servicio si el complejo existe y regresa mensaje correspondiente
         * */
        $response_validation = (new ValidateDataComplexServices())->validateComplex($id);
        return response()->json([
            $response_validation
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function edit(Complex $complex, $id)
    {
        /*Servicio para validar la data de la sede, App\Services\ValidateDataHeadQuarterService
         * */
        $response_validation = (new ValidateDataComplexServices())->validaComplex($id);
        return response()->json([
            $response_validation
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function update(ComplexCreate $complexCreate, Complex $complex, $id)
    {
        /*
         * Se actualiza el complejo con toda la data obtenida desde el form
         * */
        $complex_update = Complex::find($id);
        $complex_update->update($complexCreate->all());
        return response()->json([
            "success" => true,
            "data" => $complex_update
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complex $complex, $id)
    {
        /*
         * Se valida y se elimina el complejo
         * */
        $complex_delete = Complex::find($id);
        if(!$complex_delete){
            return response()->json([
                "success" => false,
                "message" => "No se pudo eliminar, no existe o ya ha sido eliminado."
            ], 200);
        }
        $complex_delete->delete();
        return response()->json([
            "success" => true,
        ], 200);
    }
}
