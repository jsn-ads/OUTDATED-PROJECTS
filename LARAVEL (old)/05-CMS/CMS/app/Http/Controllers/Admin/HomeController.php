<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use App\Models\Visitor;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // inicia construtor com função de login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $interval = intval($request->input('interval',30));
        if($interval > 120){
            $interval = 120;
        }



        //Contagem de Visitantes
        $dateInterval = date('Y-m-d H:i:s', strtotime('-'.$interval.'days'));
        $visitorsCount = Visitor::where('date_access','>=',$dateInterval)->count();

        //Contagem de Visitantes Online
        $datalimite = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $userOnlineCount = count(Visitor::select('ip')->where('date_access','>=',$datalimite)->groupBy('ip')->get());

        //Contagem de Paginas
        $paginasCount = Page::count();

        //Contagem de Usuários
        $userCount = User::count();

        //quantidade total de visitantes
        $visitsAll = Visitor::selectRaw('page, count(page) as c')->where('date_access','>=',$dateInterval)->groupBy('page')->get();

        //Dados do grafico de Pizza
        $pageGrafico = [];

        foreach($visitsAll as $item){
            $pageGrafico[$item['page']] = intval($item['c']);
        }

        $values = json_encode(array_values($pageGrafico));
        $labels = json_encode(array_keys($pageGrafico));

        return view('admin.home',[
            'visitorsCount'  =>$visitorsCount,
            'userOnlineCount' =>$userOnlineCount,
            'paginasCount'   =>$paginasCount,
            'userCount'     =>$userCount,
            'values' => $values,
            'labels' => $labels,
            'datainterval' => $interval

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
}
