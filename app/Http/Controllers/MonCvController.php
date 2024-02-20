<?php

namespace App\Http\Controllers;

use App\Models\Createcv;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonCvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cv= Createcv::select('*')->where('creator_id',Auth::user()->id)->latest('id')->first();

        return view('moncv', compact('cv'));
    }

    public function pdfview(Request $request)
    {

        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPDF()
    {
        $cv = Createcv::select('*')->where('creator_id',Auth::user()->id)->latest('id')->first();
        view()->share('cv',$cv);

        $pdf = PDF::loadView('pdf',$cv);

        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
    
        return $pdf->download('moncv.pdf');
    }

    public function create()
    {
            return view('pdf');
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
