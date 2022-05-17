<?php

namespace App\Http\Controllers;
use App\Reparacion;
use App\Vehiculo;
use App\Mecanicos;
use App\Clientes;
use Auth;
use DB;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $vehiculo=Vehiculo::find($id);
        $clientes=Clientes::find($id);
        
        ///dd($clientes->cli_id);
       // $vehiculo=Vehiculo::all();
        $reparacion=DB::select("SELECT * FROM reparacion JOIN vehiculo on reparacion.veh_id=vehiculo.veh_id JOIN mecanicos ON reparacion.mec_id=mecanicos.mec_id JOIN clientes ON vehiculo.cli_id=clientes.cli_id WHERE reparacion.veh_id=$id"); 
        
        
        
        // $reparacion=Reparacion::all();
        return view('reparacion.index')->with('vehiculo',$vehiculo)->with('reparacion',$reparacion)->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $vehiculo=Vehiculo::find($id);
        $mecanicos=Mecanicos::all();
        return view('reparacion.create')->with('mecanicos',$mecanicos)->with('vehiculo',$vehiculo);
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
        $veh_id=$data['veh_id'];

        reparacion::create($data);
        return redirect(route('reparacion',$veh_id));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reparacion=Reparacion::find($id);
        $mecanicos=Mecanicos::all();
        $vehiculo=Vehiculo::all();
        return view('reparacion.edit')->with('reparacion',$reparacion)->with('vehiculo',$vehiculo)->with('mecanicos',$mecanicos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $reparacion=reparacion::find($id);   
       $reparacion->update($request->all());
       
       $vehiculo=$reparacion['veh_id'];
       return redirect(route('reparacion',$vehiculo));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mecanicos=Mecanicos::find($id);
    //$data=Clientes::find($id);
        $reparacion=Reparacion::find($id);
        $rep_id=$reparacion['rep_id'];
        $vehiculo=$reparacion['veh_id'];
    //dd($data);
        Reparacion::destroy($id);
        return redirect(route('reparacion',$vehiculo));
        //return redirect(view('reparacion.index',$rep_id,$vehiculo));
      ///  return $this->index($rep_id,$vehiculo);
    }
}
