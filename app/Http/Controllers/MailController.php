<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Annonce;
use App\Models\DeposerCv;
use App\Models\User;
use App\Notifications\SendMailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function sendEmail(Annonce $annonce)
    {

        
        $details = [
            'title'=> 'Bonjours'.' '.'l\'entreprise'.' '.$annonce->name_creator.' '.$annonce->prenom_creator.' , '.'l\'employee'.' '.Auth::user()->name.' '.Auth::user()->prenom.' '.'est intéressé par votre annonce'.' '.$annonce->titre,
            'body' => $annonce->description
        ];

        Mail::to($annonce->email_creator)->send(new TestMail($details));

        $employee = Auth::user()->name;
        $employee_prenom = Auth::user()->prenom;
        $user = User::select('*')->where('id', $annonce->creator_id)->first(); 

        $user->notify(new SendMailNotification($employee, $employee_prenom));

        return back();
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
        //
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
