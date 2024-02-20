<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Role;
use App\Models\User;
use App\Notifications\AnnonceNotification;
use App\Notifications\DestroyAnnonceNotification;
use App\Notifications\EditAnnonceNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('annonce');
    }

    public function emploie()
    {
        $roles = Role::All();
        $users = User::All();
        $recent = Annonce::select('*')->latest('id')->first();
        $annonces = Annonce::select('*')->orderBy('id','desc')->paginate(3);
        return view('emploie', compact('annonces','users','recent','roles'));
    }

    public function stage()
    {
        $roles = Role::All();
        $users = User::All();
        $recent = Annonce::select('*')->latest('id')->first();
        $annonces = Annonce::where('type','stage')->paginate(3);
        return view('emploie',compact('annonces','users','recent','roles'));
    }

    public function embauche()
    {
        $roles = Role::All();
        $users = User::All();
        $recent = Annonce::select('*')->latest('id')->first();
        $annonces = Annonce::where('type','Embauche')->paginate(3);
        return view('emploie',compact('annonces','users','recent','roles'));
    }

    public function mesannonces()
    {
        $roles = Role::All();
        $users = User::All();
        $recent = Annonce::select('*')->latest('id')->first();
        $annonces = Annonce::where('creator_id',Auth::user()->id)->paginate(3);
        return view('emploie',compact('annonces','users','recent','roles'));
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
        $annonce = new Annonce();
        $annonce->creator_id = Auth::user()->id;
        $annonce->email_creator = Auth::user()->email;
        $annonce->name_creator = Auth::user()->name;
        $annonce->prenom_creator = Auth::user()->prenom;
        $annonce -> titre=$request->titre;
        $annonce -> ville=$request->ville;
        $annonce -> type=$request->type;
        $annonce -> datelimit=$request->datelimit;
        $annonce -> categorie=$request->categorie;
        $annonce -> description=$request->description;

        $annonce->save();

        $entreprise = Auth::user()->name;
        $users = User::select('users.*','users.id','users.name')->where('roles.id', 2)
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->get();
            
        foreach($users as $user){
           $user->notify(new AnnonceNotification($user, $annonce, $entreprise));
        }

        return redirect()->route('emploie');
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
    public function edit(Annonce $annonce)
    {
        if(Auth::user()->id==$annonce->creator_id)
        {
            return view('editerannonce',compact('annonce'));
        }
        else
        {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        
        $annonce->update($request->all());

        $user = User::select('*')->where('id', $annonce->creator_id)->first(); 

        $user->notify(new EditAnnonceNotification($annonce));
        return redirect()->route('emploie');
    }

    /**
     * Remove the specified resource fro m storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        if(Auth::user()->id==$annonce->creator_id)
        {
            $annonce->delete();

            $user = User::select('*')->where('id', $annonce->creator_id)->first(); 

            $user->notify(new DestroyAnnonceNotification());
            return back();
        }
        else
        {
            return back();
        }
    }
}
