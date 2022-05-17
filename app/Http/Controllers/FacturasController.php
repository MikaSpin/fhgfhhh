<?php

namespace App\Http\Controllers;
use App\Facturas;
use App\Clientes;
use App\Detalle;
use DB;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $facturas=Facturas::all();
        return view('facturas.index')
        ->with('facturas',$facturas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes=DB::select("SELECT *FROM clientes");
        $productos=DB::select("SELECT *FROM producto");
        return view('facturas.create')
        ->with('clientes',$clientes)
        ->with('productos',$productos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();

        $facturas=Facturas::create($data);
        return redirect(route('facturas.edit',$facturas->fac_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facturas=Facturas::find($id);
        $clientes=DB::select("SELECT *FROM clientes");
        $productos=DB::select("SELECT *FROM producto");
        $detalle=DB::select("SELECT *FROM factura_detalle fd 
                           JOIN producto p ON fd.pro_id=p.pro_id
                           WHERE fd.fac_id=$id");
        return view('facturas.edit')
        ->with('facturas',$facturas)
        ->with('clientes',$clientes)
        ->with('productos',$productos)
        ->with('detalle',$detalle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Fac=Facturas::find($id);
        $Fac->update($request->all());
        return redirect(route('facturas.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Facturas::destroy($id);
        return redirect(route('facturas.destroy'));
    }

    public function detalle(Request $req)
    {
        $datos=$req->all();
         $fac_id=$datos['fac_id'];
        if(isset($datos['btn_detalle'])=='btn_detalle'){
            ///Guardar el detalle
        $datos['fad_vt']=0;
        Detalle::create($datos);
        }
        if(isset($datos['btn_eliminar'])>0){
            ///Eliminar el detalle
            //dd($datos);
            $fad_id=$datos['btn_eliminar'];
            Detalle::destroy($fad_id);

        }
        return redirect(route('facturas.edit',$fac_id));
    }
}
