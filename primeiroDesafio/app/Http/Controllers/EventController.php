<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Empresas;
use App\Models\Empresas_categorias;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class EventController extends Controller
{

    public function urlPesquisa()
    {
        $q = request('q');
        if ($q !== null)
            return view('listaEmpresas', ['busca' => $q]);
        else return redirect('/');
    }


    public function getParametersBusiness()
    {

        $q = request('q');

        if ($q) {
          
            $business= Empresas_categorias::join('empresas', 'empresas_categorias.id_empresa', '=', 'empresas.id')
            ->join('categorias', 'empresas_categorias.id_categoria', '=', 'categorias.id')
            ->where('empresas.titulo', 'like', '%' . $q . '%')
            ->orWhere('empresas.endereco', 'like', '%' . $q . '%')
            ->orWhere('empresas.cep', 'like', '%' . $q . '%')  
            ->orWhere('empresas.cidade', 'like', '%' . $q . '%')
            ->orWhere('categorias.categoria', 'like', '%' . $q . '%')
            ->orderBy('empresas.id','asc')
            ->distinct('empresas_categorias.id_empresa')
            ->select('empresas.id as id','empresas.titulo as titulo')
            ->paginate(1);     
               
            
         $business->withPath('/business?q='.$q);

            $array = $this->getCategoriesSearch($business);
            return view('businessList', ['business' => $business, 'search' => $q, 'index' => 1, 'categorias' => $array]);
        } else return redirect('/')->with('msg', 'Empty search!');
    }

    public function getCategoriesSearch($businessSearch)
    {

        $arrayCategories = [];

        foreach ($businessSearch as $b) {



            $empresas_categorias = DB::table('empresas_categorias')
                ->join('empresas', 'empresas_categorias.id_empresa', '=', 'empresas.id')
                ->join('categorias', 'empresas_categorias.id_categoria', '=', 'categorias.id')
                ->where('empresas_categorias.id_empresa', $b->id)
                ->select('categorias.categoria as categoria')
                ->get();

            foreach ($empresas_categorias as $e) {


                array_push($arrayCategories, [
                    $b->id,
                    $e->categoria
                ]);
            }
        }

        return $arrayCategories;
    }

    public function getCategories()
    {

        $categorias = Categorias::all();

        return view('register',['categorias'=>$categorias]);
    }

    //cadastrar empresas
    public function setEmpresas(Request $request)
    {

        $empresas = new Empresas;


        $empresas->titulo = $request->titulo;
        $empresas->telefone = $request->telefone;
        $empresas->endereco = $request->endereco;
        $empresas->cep = $request->cep;
        $empresas->cidade = $request->cidade;
        $empresas->estado = $request->estado;
        $empresas->descricao = $request->descricao;

        $empresas->save();

        //pegar o último id salvo no banco
        //$empresas->id;

        $id_categorias = $request->categoria;

        foreach ($id_categorias as $categoria) {
            $empresas_categorias = new Empresas_categorias;
            $empresas_categorias->id_empresa = $empresas->id;
            $empresas_categorias->id_categoria = $categoria;

            $empresas_categorias->save();
        }
        return back()->with('msg','Registered!');
    }

    public function showBussiness($titulo){
       
        $q=request('q');
        $empresa=DB::table('empresas')
        ->where('id','=',$q)
        ->get();

        $categorias= DB::table('empresas_categorias')
        ->join('empresas', 'empresas_categorias.id_empresa', '=', 'empresas.id')
        ->join('categorias', 'empresas_categorias.id_categoria', '=', 'categorias.id')
        ->where('empresas.id','=',$q)
        ->select('categorias.categoria as categoria')
        ->get();
 



        return view('showBusiness',['business'=>$empresa[0],'categorias'=>$categorias]);

    }

    public function getData(Request $request){

        $email=$request->cookie('email');
        $password=$request->cookie('password');

        if($email && $password){
            $empresas=Empresas::paginate(1);
            
            return view('adm',['empresas'=>$empresas]);
        }else{
            return view('authAdm');
        }
    }

    public function getAdm(Request $request){
      
        $email=$request->email;
        $password=$request->password;

        $user=DB::table('users')
        ->where('email','=',$email)
        ->where('password','=',$password)
        ->first();
        
        if($user){
            /*$response=new Response('hello world!');
            $response->withCookie(cookie()->forever('email',$email));
            $response->withCookie(cookie()->forever('password',$password));
            */
            Cookie::queue('email', $email, 2628000);
            Cookie::queue('password', $password, 2628000);
            return redirect('admin');

        }else{
            return back()->with('msg','Email or password incorrects');
        }

    }

    public function getAdmRegister(Request $request){
        
        $email=$request->cookie('email');
        $password=$request->cookie('password');

        if($email && $password){
          $this->getCategories();
            
        }else{
            return view('authAdm');
        }
    }
    public function logOut(Request $request){

        $email=$request->cookie('email');
        $password=$request->cookie('password');

        if($email && $password){

            $cookie1 = Cookie::forget('email');
            $cookie2 = Cookie::forget('password');
            return redirect('/')->withCookie($cookie1)->withCookie($cookie2);
        }else{
            return redirect('/');
        }
    }
}
