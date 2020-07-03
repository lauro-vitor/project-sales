<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aliquot;
class AliquotController extends Controller
{   

    protected $aliquot;
    public function __construct(){
        $this->aliquot = new Aliquot();
    }
    public function viewIndex() {
        return view('aliquots.aliquots');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //
        $aliquot = new Aliquot();
        $aliquots = $aliquot->getAll();
        if($aliquots['httpCode'] == 201){
            return response()->json($aliquots, 200);
        }
        return $aliquots[0];
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
        $aliquot = $request->only($this->aliquot->getFillable());
        $newAliquot = $this->aliquot->createAliquot($aliquot);
        return response()->json($newAliquot, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   //ok
        return response()->json($this->aliquot->getById($id), 200);
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
        return response()->json(
            $this->aliquot->updateAliquot(
                $request->only($this->aliquot->getFillable()),
                $id
            ), 
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($this->aliquot->destroyAliquot($id),  200);
    }
}
