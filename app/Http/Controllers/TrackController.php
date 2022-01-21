<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\Interprete;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){ 
        $this->middleware("auth");
    }
    
    public function index()
    {
        $trackactivate=true;

        $track=Track::where('id_user',"=",auth()->id())->get();
        //$tracks = Track::join('Interprete','id_int', '=', 'interprete.id')->select('track.id','track.titulo','track.path','interprete.nombre')->get();
        return view("canciones.index",compact("track","trackactivate"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trackactivate=true;
        $titulo=__("NOMBRE MUSICA");
        $title=__("NOMBRE DE MUSICA");
        $boton=__("CREAR");
        $ruta=route("track.store");
        $interpretes=Interprete::where('user_id',"=",auth()->id())->get();
        return view("canciones.crear",compact("titulo","boton","title","ruta","interpretes","trackactivate"));
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
            "titulo" => "required|min:5|max:300|unique:track",
            "musica" => "required" 
        ]);

        if($request->hasFile('music'))
        {
            $path=$request->music->store('public');
            Track::create([
                "titulo"=>$request->titulo,
                "path"=>$path,
                "id_int"=>$request->interprete
            ]);
        }
        return redirect(route('track.index'));
        /*
        Interprete::create($request->only("nombre"));
        return redirect(route('interprete.create'))->with("success",__("SE AGREGO CORRECTAMENTE!!!"));*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        $titulo=__("NOMBRE MUSICA");
        $title=__("NOMBRE DE MUSICA");
        $boton=__("ACTUALIZAR");
        $ruta=route("track.update",['track'=>$track]);
        $interpretes=Interprete::where("user_id",auth()->id())->get();
        return view("canciones.editar",compact("titulo","boton","title","ruta","interpretes","track"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $this->validate($request,[
            "titulo" => "required|min:2|max:300",
            "interprete" => "required" ,
            "music" => "required"
        ]);
        //eliminar archivo anterior
        unlink('.'.Storage::url($track->path));
        //almacenar y actualizar
        if($request->hasFile('music'))
        {
            $path=$request->music->store('public');
            $tracks = Track::find($track->id);
            $tracks->titulo=$request->titulo;
            $tracks->path=$path;
            $tracks->id_int=$request->interprete;
            $tracks->save();
        }
        return redirect(route('track.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        unlink('.'.Storage::url($track->path));
        $tracks = Track::find($track->id);
        $tracks->delete();
        return redirect()->back();
    }
}
