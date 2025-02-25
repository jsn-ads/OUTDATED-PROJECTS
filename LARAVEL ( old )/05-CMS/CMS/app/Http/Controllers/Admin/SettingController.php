<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $settings=[];

        $dbsettings = Setting::get();


        foreach($dbsettings as $dbsetting){
            $settings[$dbsetting['name']] = $dbsetting['content'];
        }

        return view('admin.settings.index',[
            'settings'=>$settings
        ]);
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

    public function save(Request $request){

        $request = $request->only(['title', 'subtitle','email','bgcolor','textcolor']);

        $dados = [
            'title'     =>  ucwords(strtolower($request['title'])),
            'subtitle'  =>  ucwords(strtolower($request['subtitle'])),
            'email'     =>  strtolower($request['email']),
            'bgcolor'   =>  $request['bgcolor'],
            'textcolor' =>  $request['textcolor']
        ];

        $validador = $this->validador($dados);

        if($validador->fails()){
            return redirect()->route('settings.index')->withErrors($validador);
        }

        foreach($dados as $item => $value){
            Setting::where('name',$item)->update(['content'=>$value]);
        }

        return redirect()->route('settings.index')->with('warning','Configurações salva com sucesso');

    }

    protected function validador($dados){
        return Validator::make($dados,[
            'title'=>['required','string','max:100'],
            'subtitle'=>['required','string','max:100'],
            'email'=>['required','email','string'],
            'bgcolor'=>['string','regex:/#[A-Z0-9]{6}/i'],
            'textcolor'=>['string','regex:/#[A-Z0-9]{6}/i']
        ]);
    }
}


