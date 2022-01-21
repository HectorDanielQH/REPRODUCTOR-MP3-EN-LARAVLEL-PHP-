<?php

namespace App\Http\Controllers;

use App\Models\Interprete;
use Illuminate\Http\Request;

class InterpreteController extends Controller
{
    public function __construct(){ 
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interprete=true;

        $interpretes= Interprete::where("user_id",auth()->id())->get();
        
        return view("interpretes.index",compact("interpretes","interprete"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$interprete=new Interprete;
        $titulo=__("CREAR INTERPRETE");
        $title=__("NOMBRE DE INTERPRETE");
        $boton=__("CREAR");
        $ruta=route("interprete.store");
        return view("interpretes.crear",compact("titulo","boton","title","ruta"));//,"interprete"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "nombre" => "required|min:2|max:300|unique:interprete"
        ]);
        Interprete::create($request->only("nombre"));
        return redirect(route('interprete.create'))->with("success",__("SE AGREGO CORRECTAMENTE!!!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interprete  $interprete
     * @return \Illuminate\Http\Response
     */
    public function show(Interprete $interprete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interprete  $interprete
     * @return \Illuminate\Http\Response
     */
    public function edit(Interprete $interprete)
    {
        $update=true;
        $titulo=__("EDITAR INTERPRETE");
        $title=__("MODIFICAR DE  ".strtoupper($interprete->nombre)."  A:");
        $boton=__("EDITAR");
        $ruta=route("interprete.update",['interprete'=>$interprete]);
        return view("interpretes.editar",compact("titulo","boton","title","ruta","interprete","update"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interprete  $interprete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interprete $interprete)
    {
        $this->validate($request,[
            "nombre" => "required|min:2|max:300|unique:interprete,nombre,".$interprete->id
        ]);
        $interprete->fill($request->only("nombre"))->save();
        return back()->with("success",__("SE ACTUALIZO CORRECTAMENTE!!!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interprete  $interprete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interprete $interprete)
    {
        $interprete->delete();
        return back()->with("success",__("INTERPRETE ELIMINADO!!!"));
    }
}
