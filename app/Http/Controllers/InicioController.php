<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;



class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    /**
     * Esto es una prueba.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inicio($id, $nombre)
    {
        return "Hola mundo  $id  $nombre";
    }

    /**
     * Esto es una prueba dos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inicio2($id, $nombre)
    {
        return "Hola mundo 2 $id  $nombre";
    }

    /**
     * Esto es una prueba dos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getProducto()
    {
        return Producto::all();
    }


    public function filtroProducto($nombre)
    {

        $return = ['status' => 200, 'message' => 'OK', 'data' => ''];
        try {
            $producto = new Producto();
            $result = $producto::where('nombre', $nombre)->get();
            $return['data'] = $result;
        } catch (Exception $th) {
            $return['message'] = $th->getMessage() . '|' . $th->getLine();
            $return['status'] = 400;
        }

        return  $return;
    }

    public function filtroProducto2($nombre, $id)
    {

        $return = ['status' => 200, 'message' => 'OK', 'data' => ''];

        try {

            $producto = new Producto();
            $result = $producto::where('nombre', $nombre)
                ->where('id', $id)
                ->get();

            $return['data'] = $result;
        } catch (Exception $th) {
            $return['message'] = $th->getMessage() . '|' . $th->getLine();
            $return['status'] = 400;
        }

        return  $return;
    }

    public function inner()
    {
        $return = ['status' => 200, 'message' => 'OK', 'data' => ''];
        try {
            $producto = new Producto();
            $result = $producto::select('categoria.nombre AS categoria', 'producto.*')
                ->join('categoria', 'producto.categoria_id', '=', 'categoria.id')
                ->get();

            $return = $result;
        } catch (Exception $th) {
            $return['message'] = $th->getMessage() . '|' . $th->getLine();
            $return['status'] = 400;
        }

        return  $return;
    }



    public function saveProduct(Request $request)
    {

        $return = ['status' => 200, 'message' => 'Registro guardado', 'data' => ''];

        try {

            $producto = new Producto();
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->presentacion = $request->presentacion;
            $producto->cantidad = $request->cantidad;

            $producto->save();
        } catch (Exception $th) {
            $return['message'] = $th->getMessage() . '|' . $th->getLine();
            $return['status'] = 400;
        }

        return $return;
    }
}
