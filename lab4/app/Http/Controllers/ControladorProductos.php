<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ControladorProductos extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function mostrar_productos()
    {
        $productos = DB::table('tbl_productos')->get();
        return view('formulario', ['productos' => $productos]);
    }

    public function insertar_producto(Request $request)
    {
        $codigo = $request->input('txt_cod');
        $nombre = $request->input('txt_nom');
        $precio = $request->input('txt_prec');
        $cantidad = $request->input('txt_cant');

        DB::table('tbl_productos')
            ->insert([
                'codigo' => $codigo,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => $cantidad,
            ]);

        return redirect()->action('App\Http\Controllers\ControladorProductos@mostrar_productos');
    }

    public function mostrar_productos_ajax(Request $request)
    {
        
        $codigo = $request->input('datobusqueda');
        
        echo $users = DB::table('tbl_productos')
            ->where('codigo', '=', $codigo)
            ->orWhere('nombre','=', $codigo)
            ->get();

    }
}
