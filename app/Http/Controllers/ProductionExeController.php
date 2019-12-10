<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProductionExe;
use App\Http\Resources\ProductionExeResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Events\DashBordEvent;
use PDF;
use setasign\Fpdi\TcpdfFpdi;
//use TCPDF;

class ProductionExeController extends Controller
{

    private $pdf; // インスタンス変数を宣言
    public function __construct(TCPDF $pdf)
    {
         // コンストラクタインジェクションでTCPDFクラスをインスタンス化
        $this->pdf = $pdf;
    }

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

    public function listPdf() {
        //$pdf = new TcpdfFpdi();
        // フォント、スタイル、サイズ をセット
        $this->pdf->setFont('kozminproregular','',10);
        // ページを追加
        $this->pdf->addPage();
        // HTMLを描画、viewの指定と変数代入
        $this->pdf->writeHTML(view("pdf.sample", ['name' => 'PDFさん'])->render());
        // 出力の指定です、ファイル名、拡張子、Dはダウンロードを意味します。
        $this->pdf->output('test' . '.pdf', 'D');
        return;
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
    public function update(Request $request, ProductionExe $productionExe)
    {
        
        DB::beginTransaction();
        //broadcast(new dashBordEvent($request->all()))->toOthers();
        if ($request->status == 2) {
            ProductionExe::where('id', $request->id)->update([
                'ID'      =>$request->id,
                'status'  =>$request->status,
                'startDate' =>date("Y/m/d H:i:s")
            ]);
        } 

        if ($request->status == 3) {
            ProductionExe::where('id', $request->id)->update([
                'ID'        =>$request->id,
                'status'    =>$request->status,
                'endDate' =>date("Y/m/d H:i:s")
            ]);
        } 

        if ($request->status != 2 || $request->status != 3) {
            ProductionExe::where('id', $request->id)->update([
                'ID'      =>$request->id,
                'status'  =>$request->status,
                
            ]);
        } 
      
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
