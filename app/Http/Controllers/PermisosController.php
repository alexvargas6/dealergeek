<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Permiso;
use App\models\PermisoUsuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use Validator;

class PermisosController extends Controller
{
    public function obtenerPermisosUsuario($id)
    {
        // Lógica para obtener los permisos del usuario con el ID proporcionado
        $permisosUsuario = PermisoUsuario::where('user_id', $id)
            ->where('estatus', 'A')
            ->get();

        // Devolver los permisos del usuario en formato JSON
        return new JsonResponse($permisosUsuario, 200);
    }
    public function store(Request $request)
    {
        $rules = [
            'module_name' => 'required',
            'module_route' => 'required',
            'nombre_permiso' => 'required',
            'clave_permiso' => 'required|max:5', // Añadido max:5 para limitar a 5 caracteres
        ];

        $messages = [
            'module_name.required' => 'Se requiere el nombre del modulo',
            'module_route.required' => 'Se requiere el nombre de la ruta',
            'nombre_permiso.required' => 'Se requiere el nombre del permiso',
            'clave_permiso.required' => 'Se requiere la clave del permiso',
            'clave_permiso.max' =>
                'La clave del permiso debe tener máximo 5 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()
                ->back()
                ->with('ERROR', $errors);
        }

        try {
            /* if (!Route::has($$request->input('nombre_ruta'))) {
                    return redirect()
                        ->back()
                        ->with(
                            'ERROR',
                            'La ruta: ' .
                                $$request->input('nombre_ruta') .
                                ' no existe'
                        );
                }*/

            // Crear un nuevo permiso
            $permisoNuevo = new Permiso();
            $permisoNuevo->module_name = $request->input('module_name');
            $permisoNuevo->module_route = $request->input('module_route');
            $permisoNuevo->nombre_permiso = $request->input('nombre_permiso');
            $permisoNuevo->clave_permiso = $request->input('clave_permiso');
            $permisoNuevo->estatus = 'A'; // Por defecto, se establece como activo
            $permisoNuevo->save();

            return redirect()
                ->back()
                ->with('success', 'Permiso creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('ERROR', $e->getMessage());
        }
    }
}
