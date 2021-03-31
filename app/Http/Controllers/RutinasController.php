<?php

namespace App\Http\Controllers;

use App\Models\Rutina;
use Illuminate\Http\Request;


class RutinasController extends Controller
{
   
    public function index(Request $request)
    {
        if ($request->has('txtbuscar')) {
            return Rutina::where('id', 'like', '%' . $request->txtbuscar . '%')
                ->orWhere('telefono', $request->txtBuscar)
                ->get();
        } else {
            return Rutina::all();
        }

    }

   
    public function store(Request $request)
    {
        $input = $request->all();
        Rutina::create($input);
        return response()->json([
            'res' => true,
            'message' =>  'Se creo rutina con exito'
        ], 200);
    }

   
    public function show(Rutina $rutina)
    {
        return $rutina;
    }

   
    public function update(Request $request, $id)

    {

        Rutina::where('id', $id)->update($request->all());
        return response()->json([
            'res' => true,
            'message' => 'Se actualizo con exito!!',

        ], 200);
    }


    public function destroy($id)
    {
        Rutina::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Se elimino con exito!!'
        ], 200);
    }
}
