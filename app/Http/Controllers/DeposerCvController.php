<?php

namespace App\Http\Controllers;

use App\Models\DeposerCv;
use App\Models\User;
use App\Notifications\BoosterNotification;
use App\Notifications\CvNotification;
use App\Notifications\DestroyCvNotification;
use App\Notifications\EditCvNotification;
use App\Notifications\UnBoosterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeposerCvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('deposercv');
    }



    public function viewcv()
    {
        $users = User::all();
        $recent = DeposerCv::select('*')->latest('id')->first();
        $cvs = DeposerCv::select('*')->orderBy('id','desc')->paginate(4);
        return view('cv', compact('cvs','users','recent'));
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

    public function booster( DeposerCv $cv)
    { 
        
        $cv->booster = 0;
        $cv->booster_id = 0;
        $cv->update();

        $user = User::select('*')->where('id', $cv->creator_id)->first(); 

        $user->notify(new UnBoosterNotification());

        return back();
    }

    public function nonbooster( DeposerCv $cv)
    {
        $cv->booster = 1;
        $cv->booster_id = Auth::user()->id;
        $cv->update();

        $user = User::select('*')->where('id', $cv->creator_id)->first(); 

        $user->notify(new BoosterNotification());
        
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(DB::table('deposer_cvs')->where('creator_id', Auth::user()->id)->exists())
        {
            echo 'exist';
        }
        else{
        $cvs = new DeposerCv();
        $this->validator($request, $cvs);  

        return redirect()->route('Cv');
        }

        

    }

    public function validator(Request $request, DeposerCv $cvs){


        $newFileName = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('documents'),$newFileName);

        $cvs->file = $newFileName; 
        $cvs->creator_id = Auth::user()->id;
        $cvs->image = Auth::user()->avatar;
        $cvs->name = Auth::user()->name;
        $cvs->prenom = Auth::user()->prenom;
        $cvs -> nombre=0;
        $cvs -> numero=$request->numero;
        $cvs -> categorie=$request->categorie;
        $cvs -> description=$request->description;

                
        $cvs->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( DeposerCv $cv)
    {       
        $entreprise = Auth::user()->name;
        $user = User::select('*')->where('id', $cv->creator_id)->first(); 

        $user->notify(new CvNotification($entreprise));
       
        return response()->download(public_path('documents/'.$cv->file), $cv->name);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( DeposerCv $cv)
    {
        return view('editercv',compact('cv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cv)
    {
        $cvs = DeposerCv::find($cv);

        $cvs->description = $request->input('description');
        $cvs->numero = $request->input('numero');
        $cvs->categorie = $request->input('categorie');

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move(public_path('documents'),$filename);
            $cvs->file = $filename;
        }

        $cvs->save();
        

        $user = User::select('*')->where('id', $cvs->creator_id)->first(); 

        $user->notify(new EditCvNotification($cvs));
        
        return redirect()->route('Cv');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeposerCv $cv)
    {
        $cv->delete();

        $user = User::select('*')->where('id', $cv->creator_id)->first(); 

        $user->notify(new DestroyCvNotification());
        return back();
    }
}
