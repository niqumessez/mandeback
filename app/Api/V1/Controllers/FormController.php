<?php

namespace App\Api\V1\Controllers;

use App\Models\Form;
use App\Models\FormsColumn;
use App\Models\FormsData;
use App\Models\GeneratedForm;
use App\Models\IndicatorForm;
use Dingo\Api\Http\Request;
use http\Env\Response;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $forms= Form::with('columns')->with('formData')->get();
        if(count($forms)>0){
            return response()->json(['status'=>'ok','data'=>$forms]);
        }else{
            return response()->json(['status'=>'false','message'=>'form is not created yet ):']);
        }
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
        $forms= new Form();
        $forms->title=$request->title;
        $forms->description=$request->description;
        if($forms->save()){
            return response()->json(['status'=>'ok','message'=>'form created successfully','data'=>$forms]);
        }else{
            return response()->json(['status'=>'false','message'=>'form is not created']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form= Form::where('id',$id)->with('columns')->with('formData')->get();
        if($form){
            return response()->json(['success'=>'ok','message'=>'data fetched successfully','data'=>$form],200);
        }else{
            return response()->json(['success'=>'false','message'=>"data is not found"],404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form=Form::find($id);
        $formcolumns=FormsColumn::where('form_id',$id)->get();
        $formData=FormsData::where('form_id',$id)->get();
        $generatedForm=GeneratedForm::where('form_id',$id)->get();
        $indicatorForm=IndicatorForm::where('form_id',$id)->get();
        if($form){
            if(count($formcolumns)>0){
                $formCol=FormsColumn::find($formcolumns[0]['id']);
                $formCol->delete();
            }
            if(count($formData)>0){
                $formDat=FormsData::find($formData[0]['id']);
                $formDat->delete();
            }
            if(count($generatedForm)>0){
                $generateForms=GeneratedForm::find($generatedForm[0]['id']);
                $generateForms->delete();
            }
            if(count($indicatorForm)>0){
                $indicators=IndicatorForm::find($indicatorForm[0]['id']);
                $indicators->delete();
            }
            $form->delete();
            return response()->json(['status'=>true,'message'=>'deleted successfully'],200);
        }else{
            return response()->json(['status'=>false,'message'=>'Data is not found ):'],404);
        }



    }
}
