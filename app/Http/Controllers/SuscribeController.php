<?php

namespace App\Http\Controllers;

use App\Models\Suscribe;
use Illuminate\Http\Request;
use DB;
class SuscribeController extends Controller
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
        
        $validate = $this->Validate($request,[
            'user_email' => 'required|email|unique:suscribes,email'

        ]);

        try{
            DB::beginTransaction();

            $data = [
                'email' => $request->user_email,
            ];

            $insert = Suscribe::Create($data);

            if($insert){
                DB::commit();
                $request->session()->flash('success','Thank you for suscribing K Kham');
                return redirect('/index');
            }


        }catch(Exception $e){
            DB::rollback();
             $request->session()->flash('error',$e->getMessage());
                return redirect('/index');



        }





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function show(Suscribe $suscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscribe $suscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscribe $suscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscribe $suscribe)
    {
        //
    }
}
