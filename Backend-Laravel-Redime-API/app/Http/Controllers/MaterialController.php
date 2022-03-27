<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiale;

class MaterialController extends Controller
{
    // método que retorna todos los materiales
    public function index()
    {
        return Materiale::all();
    }

    //método para crear un nuevo material
    public function register(Request $request)
    {

        try {
            $material = $request->nombre;
            $resulmaterial = Materiale::where('nombre', '=', $material)->get();
            
            //validación si existe un dato
            if (count($resulmaterial) > 0) {

                return response()->json([`El material ` . $request->nombre . ` ya existe`]);
            } else {
                Materiale::create($request->all());
            }
        } catch (Exception $e) {
            return response()->json(['Error' => 'NO se inserto ningun dato'], $e->getStatusCode());
        }
        return response()->json(['Dato registrado con éxito'], 201);
    }


    //método para buscar un material en especifico
    public function show($id)
    {
        return Materiale::find($id);
    }

    // metodo para eliminar materiales
    public function delete($id)
    {

        try {
            $result =  $this->show($id);
            if ($result == null) {
                return response()->json(['No se encontro ningun registro con ese Id para la eliminación'],404);
            } else {
                // $category = Category::findOrFail($id);
                //eliminación de la categoria
                $result->delete();
            }
        } catch (Exception $e) {
            return response()->json(['Error inesperado al intentar eliminar'], $e->getStatusCode());
        }
        return 200;
    }


    public function update(Request $request, $id)
    {
        try {
            //verificar si se le puede colocar como una constante a $meterial
            $material =  $this->show($id);
            if ($material != null) {

                $material->update($request->all());
            } else {
                return response()->json(['Error' => 'No se logro actualizar con exito'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['Error inesperado al intentar actualizar'], $e->getStatusCode());
        }
        return 205;
    }
}
