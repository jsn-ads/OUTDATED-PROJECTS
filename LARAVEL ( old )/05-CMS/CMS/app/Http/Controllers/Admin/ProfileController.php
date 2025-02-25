<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedId = intval(Auth::id());
        $user = User::find($loggedId);

       return ($user)? view('admin.profile.index',['user'=>$user]) : redirect()->route('profile.index');

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
         //veridica se usuario existe no banco de dados

        $loggedId = intval(Auth::id());

        $user = User::find($loggedId);

        if($user){

            //recupera dos dados do formulario

            $dados = $request->only(['name','email','password','password_confirmation']);

            //valida dos dados

            $validator = Validator::make($dados,[
                'name'=>['required','string','max:100'],
                'email'=>['required','string','email','max:200']
            ]);

            $user->name = ucwords(strtolower($dados['name']));

            //verifica se o email foi alterado

            if($user->email != $dados['email']){

                //caso seja alterado , verifica se esse email ja esta em uso

                $hasEmail = User::where('email',$dados['email'])->get();

                if(count($hasEmail) > 0){
                    $validator->errors()->add('email','O email já esta sendo utilizado.');
                }

                $user->email = strtolower($dados['email']);

            }

            //verifica a senha foi alterada

            if(!empty($dados['password'])){

                // caso seja alterada , verifica se atende os requisitos

                if(strlen($dados['password']) < 4){
                    $validator->errors()->add('password','O password deve ser pelo menos 4 caracteres.');
                }

                if($dados['password'] != $dados['password_confirmation']){
                    $validator->errors()->add('password','O password a confirmação não corresponde.');
                }

                $user->password = Hash::make($dados['password']);
            }

            if(count($validator->errors()) > 0){
                return redirect()->route('profile.index',['user'=>$loggedId])->withErrors($validator);
            }

            $user->save();

            return redirect()->route('profile.index')->with('warning','Perfil alterado com sucesso');

         }

         return redirect()->route('profile.index');
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
