<?php

namespace App\Http\Controllers;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaisController extends Controller
{
    //
    function index(){
        $paises = Pais::all();
        return response()->json(['paises' => $paises]);
    } 
    
    function store(Request $request) {
            //validar
            $validator = Validator::make($request->all(), [
                'code' => 'required|max:3|min:3|unique:pais,code',
                'name' => 'required|max:100|unique:pais,name',
            ]);
            /*if($validator->passes()) {
                
            }*/
            if($validator->fails()) {
                $respuesta = ['result' => -1, 'message' => $validator->getMessageBag()];
            } else {
                try {
                    $pais = new Pais($request->all());
                    $pais->save();
                    $respuesta = [
                                    'result' => 1, 
                                    'message' => 'Pais insertado correctamente.',
                                    'paises' => Pais::all()
                                ];
                } catch(\Exception $e) {
                    $respuesta = ['result' => -2, 'message' => $e];
                }
            }
            //intentar insertar
            return response()->json($respuesta);
        }
        
    function update(Request $request, $code ){
        $pais = Pais::find($code);
        //$rules['nombre'] = 'required|string|min:3|max:60|unique:producto,nombre'. $this->producto->id;
        $validator = Validator::make($request->all(), [
            'code' => 'required|max:3|min:3',
            'name' => 'required|max:100',
            ]);
            if($validator->fails()) {
                $respuesta = ['result' => -1, 'message' => $validator->getMessageBag()];
            } else {
                try {
                    $pais->update($request->all());
                    $respuesta = [
                                    'result' => 1, 
                                    'message' => 'Pais editado correctamente.',
                                    'paises' => Pais::all()
                                ];
                } catch(\Exception $e) {
                    $respuesta = ['result' => -2, 'message' => $e];
                }
             return response()->json($respuesta);
            }
    }
    
    function show(Request $request, $code){
        sleep(1);
        $pais = Pais::find($code);
        return response()->json(['pais' => $pais]);

    }
    
    public function destroy($code) {
        try {
            $pais = Pais::find($code);
    
            if ($pais) {
                $pais->delete();
                $respuesta = ['result' => 1, 'message' => 'País eliminado correctamente.' ,'paises' => Pais::all()];
            } else {
                $respuesta = ['result' => -1, 'message' => 'País no encontrado.'];
            }
        } catch (\Exception $e) {
            $respuesta = ['result' => -2, 'message' => $e->getMessage()];
        }
    return response()->json($respuesta);
}

}
