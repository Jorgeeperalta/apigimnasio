<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDirectorioRequest;
use App\Models\Directorio;
use Illuminate\Http\Request;

class DirertorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       
        if($request->has( 'txtbuscar')){
             return Directorio::where('nombreCompleto','like','%' .$request->txtbuscar. '%')
             ->orWhere('telefono', $request->txtBuscar)
             ->get();
        }else{
            return Directorio::all();
        }
        //get http
       
       
    }

    private function cargarArchivo($file){
        $nombreDelArchivo =time() . ".".$file->getClientOriginalExtension();
        $file->move(public_path('fotografias'),$nombreDelArchivo);
        return $nombreDelArchivo;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input=$request->all();
       if($request->has('foto')){
             $input ['foto']= $this->cargarArchivo($request->foto);
       }
        Directorio::create($input);
        return response()->json([
            'res' => true,
            'message' => $input
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Directorio $directorio)
    {
        return $directorio;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //PUT para modificar datos
    public function update(UpdateDirectorioRequest $request, Directorio $directorio)
    {
        $input = $request->all();
        if ($request->has('foto')) {
            $input['foto'] = $this->cargarArchivo($request->foto);
        }

        $directorio->update($input);
        return response()->json([
            'res' => true,
            'message' => 'Actualizado correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Directorio::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Se elimino con exito!!'
        ], 200);

    }
}
