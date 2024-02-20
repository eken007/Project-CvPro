<?php

namespace App\Http\Controllers;

use App\Models\Createcv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormCreateCvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('createcv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $newImageName = time().'-'.$request->name.'.'.
        $request->avatar->extension();

        $request->avatar->move(public_path('images'), $newImageName);


       $createcv = new Createcv();
       $createcv->creator_id = Auth::user()->id;
       $createcv -> name=$request->name;
       $createcv -> avatar=$newImageName;
       $createcv -> prenom=$request->prenom;
       $createcv -> email=$request->email;
       $createcv -> numero=$request->numero;
       $createcv -> villepersonne=$request->villepersonne;
       $createcv -> quartierpersonne=$request->quartierpersonne;
       $createcv -> objectif=$request->objectif;
       $createcv -> poste=$request->poste;
       $createcv -> employeur=$request->employeur;
       $createcv -> villetravail=$request->villetravail;
       $createcv -> datedebuttravail=$request->datedebuttravail;
       $createcv -> datefintravail=$request->datefintravail;
       $createcv -> descriptiontravail=$request->descriptiontravail;
       $createcv -> formation=$request->formation;
       $createcv -> villeformation=$request->villeformation;
       $createcv -> etablissement=$request->etablissement;
       $createcv -> datedebutformation=$request->datedebutformation;
       $createcv -> datefinformation=$request->datefinformation;
       $createcv -> descriptionformation=$request->descriptionformation;

       $createcv->save();

       return redirect()->route('moncv');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
