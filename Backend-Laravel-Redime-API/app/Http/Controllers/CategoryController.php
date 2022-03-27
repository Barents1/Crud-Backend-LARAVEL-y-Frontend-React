<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoryController extends Controller
{
    // metodo para listar toda las categias existentes
    public function index()
    {
        return Categoria::all();
    }

    //método para crear una nueva categoria
    public function register(Request $request)
    {

        try {
            error_log($request->nombre);
            $category = $request->nombre;
            $resulcategory = Categoria::where('nombre', '=', $category)->get();
            // $resulcategory = Category::select('category')->orWhere('category', '=', $request->category)->get();
            //validación si existe un dato
            if (count($resulcategory) > 0) {

                return response()->json([`La categoria` . $request->nombre . ` ya existe`]);
            } else {
                Categoria::create($request->all());
            }
        } catch (Exception $e) {
            return response()->json(['Error' => 'NO se inserto ningun dato'], $e->getStatusCode());
        }
        return response()->json(['Dato registrado con éxito'], 201);
    }


    public function show($id)
    {
        return Categoria::find($id);
    }

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
            //verificar si se le puede colocar como una constante a $category
            // $category = Category::findOrFail($id);
            error_log($id);             
            $category =  $this->show($id);
            if ($category != null) {

                $category->update($request->all());
            } else {
                return response()->json(['Error' => 'No se logro actualizar con exito'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['Error inesperado al intentar actualizar'], $e->getStatusCode());
        }
        return 205;
    }
}
