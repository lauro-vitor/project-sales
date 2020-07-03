<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ncm;
class NcmController extends Controller
{   
    private $ncm;

    public function __construct()
    {
        $this->ncm = new Ncm();
    }
    public function viewIndex()
    {
        return view('ncms.ncms');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ncm = new Ncm();
        $ncms =$ncm->getAll();
        if($ncms['httpCode'] == 201){
            return response()->json($ncms[0], 200);
        }
        return $ncms[0];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
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
        $newNcm = $request->only($this->ncm->getFillable());
        $response = $this->ncm->createNcm($newNcm);
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $ncm = $this->ncm->getById($id);
        return response()->json($ncm, 200);
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
        $auxNcm = $request->only($this->ncm->getFillable());
        $res = $this->ncm->updateNcm($auxNcm, $id);
        return response()->json($res, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($this->ncm->destroyNcm($id), 200);
    }
}
