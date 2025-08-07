<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    /**
     * middleware('can:edit-users')-> para que somente adm tenha acesso ao controlle ->  basicamente vc ira criar tres passos
     *  1 criar um metodo dentro Providers/AuthServiceProvider/ function boot
     *  2 dentro de Config/Adminlte adiciona em Menu 'can'=>'autorizaçao'
     *  3 dentro de construct adiciona middleware('can:autorização')
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:edit-users');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $loggedId = intval(Auth::id());

        return view('admin.users.index',[
            'users' => $users,
            'loggedId'=> $loggedId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->only(['name','email','password','password_confirmation']);

        $validator = Validator::make($dados,[
            'name'=>['required','string','max:100'],
            'email'=>['required','string','email','max:200','unique:users'],
            'password'=>['required','string','min:4','confirmed']
        ]);

        if ($validator->fails()){
            return redirect()->route('users.create')->withErrors($validator)->withInput();
        }

        $user = new User();

        $user->name = ucwords(strtolower($dados['name']));
        $user->email = strtolower($dados['email']);
        $user->password = Hash::make($dados['password']);
        $user->save();

        return redirect()->route('users.index');

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

        $user = User::find($id);

        if($user){
            return view('admin.users.edit',['user'=>$user]);
        }

        return redirect()->route('users.index');

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
        //veridica se usuario existe no banco de dados
        $user = User::find($id);

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
                return redirect()->route('users.edit',['user'=>$id])->withErrors($validator);
            }

            $user->save();

        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loggedId = intval(Auth::id());

        if($loggedId != intval($id)){
            $user = User::find($id);
            $user->delete();
        }

        return redirect()->route('users.index');
    }
}
