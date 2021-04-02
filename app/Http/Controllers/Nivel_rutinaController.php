<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateeNivelrutinaRequest;
use App\Models\Nivel_rutina;
use Illuminate\Http\Request;

class Nivel_rutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('txtbuscar')) {
            return Nivel_rutina::where('id', 'like', '%' . $request->txtbuscar . '%')
                ->orWhere('telefono', $request->txtBuscar)
                ->get();
        } else {
            return Nivel_rutina::all();
        }

        return response()->json([
            'res' => true,
            'message' =>  'Se consulto con exito'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Nivel_rutina::create($input);
        return response()->json([
            'res' => true,
            'message' =>  'Se nivel rutina con exito'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Nivel_rutina $nivel)
    {
        return $nivel;
    }

   
    public function update(Request $request, $id)

    {
       
        Nivel_rutina::where('id', $id)->update($request->all());
        return response()->json([
            'res' => true,
            'message' => 'Se actualizo con exito!!',
           
        ], 200);
    }

   
    public function destroy($id)
    {
        Nivel_rutina::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Se elimino con exito!!'
        ], 200);
    }
}
