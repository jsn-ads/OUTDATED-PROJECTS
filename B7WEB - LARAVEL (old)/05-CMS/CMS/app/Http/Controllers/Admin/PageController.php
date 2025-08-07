<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
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
        $pages = Page::paginate(10);

        return view('admin.pages.index',[
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->only(['title','body']);

        $dados['slug'] = Str::slug($dados['title'], '-');

        $validator = Validator::make($dados,[
            'title'=>['required','string','max:100'],
            'slug'=> ['string','max:100','unique:pages'],
            'body'=> ['required','string']
        ]);

        if ($validator->fails()){
            return redirect()->route('pages.create')->withErrors($validator)->withInput();
        }

        $page = new Page();

        $page->title = ucwords(strtolower($dados['title']));
        $page->slug = $dados['slug'];
        $page->body = $dados['body'];
        $page->save();

        return redirect()->route('pages.index');
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
        $page = Page::find($id);

        if($page){
            return view('admin.pages.edit',['page'=>$page]);
        }

        return redirect()->route('pages.index');
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
       //veridica se a pagina existe no banco de dados
       $page = Page::find($id);

       if($page){

           //recupera dos dados do formulario

           $dados = $request->only(['title','slug','body']);

            //valida dos dados

           if(strtolower($dados['title']) != strtolower($page['title'])){

                $dados['slug'] = Str::slug($dados['title'], '-');

                $validator = Validator::make($dados,[
                    'title'=>['required','string','max:100'],
                    'slug' =>['string','max:100','unique:pages'],
                    'body' =>['required','string']
                ]);

           }else{

                $validator = Validator::make($dados,[
                    'title'=>['required','string','max:100'],
                    'body' =>['required','string']
                ]);
           }

           if ($validator->fails()){
                return redirect()->route('pages.edit',['page'=>$id])->withErrors($validator)->withInput();
           }

           if(!empty($dados['slug'])){
               $page->slug = $dados['slug'];
           }
           $page->title = $dados['title'];
           $page->body =  $dados['body'];
           $page->save();

       }

       return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect()->route('pages.index');
    }
}
