<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProductionExe;
use App\Http\Resources\ProductionExeResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProductionExeController extends Controller
{

     /**
     * Create a new AuthController instance.
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Respo
     * nse
     */
    public function index()
    {
        return ProductionExeResource::collection(ProductionExe::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lineMaster = new ProductionExe();
        $lineMaster->orderCode     = $request->orderCode;
        $lineMaster->lineCode      = $request->lineCode;
        $lineMaster->ratio         = $request->ratio;
        $lineMaster->priorityFlag  = $request->priorityFlag;

        $lineMaster->save();
      
        return response($request, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $comentNum
     * @return \Illuminate\Http\Response
     */
    public function show($comentNum)
    {
        return  ProductionExe::find($comentNum);
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $comentNum
     * @return \Illuminate\Http\Response
     */
    public function tag($request)
    {
        return  ProductionExe::find($request);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ProcessMaster  $dashBordUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DashBoardUser $dashBordUser)
    {
        
        DB::beginTransaction();
        //broadcast(new dashBordEvent($request->all()))->toOthers();
        ProductionExe::where('id', $request->id)->update([
            'displayId'      =>$request->displayId,
            'displayName'    =>$request->displayName,
            'status'         =>$request->status,
            'firstName'      =>$request->firstName,
            'lastName'       =>$request->lastName,
            'rankNo'         =>$request->rankNo,
            'rankName'       =>$request->rankName,
            'phoneNo'        =>$request->phoneNo,
            'belongsId'      =>$request->belongsId,
            'belongsName'    =>$request->belongsName,
            'mail'           =>$request->mail,
            'locationId'     =>$request->locationId,
            'location'       =>$request->location,
            'locationPhon'   =>$request->locationPhon,
            'comment'        =>$request->comment,
            'comentNum'      =>$request->comentNum,
            'gomiFlag'       =>$request->gomiFlag,
            'souziFlag'      =>$request->souziFlag,
            'seisouFlag'     =>$request->seisouFlag,
            'hinomotoFlag'   =>$request->hinomotoFlag,
            'serverFlag'     =>$request->serverFlag,
            ]);
        event(new dashBordEvent($request->all()));
        DB::commit();
        return response($request, Response::HTTP_ACCEPTED);
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

    public function convert_to_utf8_recursively($dat){
        if( is_string($dat) ){
           return mb_convert_encoding($dat, 'UTF-8', 'UTF-8');
        }
        elseif( is_array($dat) ){
           $ret = [];
           foreach($dat as $i => $d){
             $ret[$i] = convert_to_utf8_recursively($d);
           }
           return $ret;
        }
        else{
           return $dat;
        }
  }
}
