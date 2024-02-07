<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return view('hello');
});


Route::get('/user/{id}', function($id){
    return 'User id '.$id;
});


//produtos

/*Route::get('/produtos/{id?}', function($id = null){
    $produtos = [
        "Cerveja",
        "Amendoin",
        "Torresmo"
    ];
    if($id){
        echo $produtos[$id];
    }else{
        print_r($produtos);
    }
});*/

//views organizadas em pasta

Route::get('/empresa', function(){
    return view('site/empresa');
});

Route::get('/minhaempresa', function(){
    return view('blog/empresa');
});

//crud usuários

Route::get('/usuarios', function(){
    return view('usuarios/lista');
});

Route::get('/usuarios/add', function(){
    return view('usuarios/adiciona');
});

Route::get('/usuarios/edit', function(){
    return view('usuarios/edita');
});

//usar rotas de qualquer metodo de verbose
//não é recomendado usar isso
Route::any('/any', function(){
    return "aceita qualquer tipo de verbose. Usando: " .$_SERVER['REQUEST_METHOD'];
});

//rota para definir mais de uma verbose

Route::match(['POST', 'PATCH'], '/contato', function(){
    return view('site/contato');
});

//rediricionamentos

Route::redirect('/users', '/usuarios');

//chamar uma view direto sem usar verboses

Route::view('politica-de-privacidade', 'site/politica');

//rotas nomeadas

Route::get('/news', function(){
    return view('site/news');
})->name('noticias');

//rota de redirecionamento

Route::get('/novidades', function(){
    return redirect()->route('noticias');
});

//grupos de rotas
//serve para definir um padrão repetitivo de rotas

/*Route::get('/admin/dashboard', function(){
    return view('admin/dashboard');
});

Route::get('/admin/produtos', function(){
    return view('admin/produtos');
});

Route::get('/admin/usuarios', function(){
    return view('admin/usuarios');
});*/

//o jeito acima repete muito codigo
//forma 1 de usar grupos de rotas
/*CONST ADM_PREFIXO = 'admin';
Route::prefix(ADM_PREFIXO)->group(function(){
    //definir as rotas
    Route::get('dashboard', function(){
        return view(ADM_PREFIXO.'/dashboard');
    });
    Route::get('produtos', function(){
        return view(ADM_PREFIXO.'/produtos');
    });
    Route::get('usuarios', function(){
        return view(ADM_PREFIXO.'/usuarios');
    });
});*/

//AGRUPAMENTO POR NAME
/*Route::name('admin.')->group(function(){
    Route::get('admin/dashboard', function(){
        return view('admin/dashboard');
    })->name('dashboard');

    Route::get('admin/produtos', function(){
        return view('admin/produtos');
    })->name('produtos');
});*/

//agrupamento por group
Route::group([
    "prefix" => "admin",
    "as" => "admin."
], function(){
        Route::get('dashboard', function(){
        return view('admin/dashboard');
        })->name('dashboard');
    
        Route::get('produtos', function(){
            return view('admin/produtos');
        })->name('produtos');
}); 

//rotas com controllers
//sistaxe -> Route::get('rota), [NomeClasse::class, 'metodo']
//comando para criar controller
//php artisan make:controller NomeController (no cmd)

Route::get('/produtos',[ProdutosController::class, 'index']);
Route::get('/produto/{id}', [ProdutosController::class, 'detail']);

//resources
// comando para resouce
//php artisan make:controller NomeController --resource

Route::resource('/cadastro', CadastroController::class);

//rotas para estudo do blade

Route::get('/blade/expressoes', function(){
    $nome = "Jeff";
    return view('blade/expressoes', ['nome'=> $nome]);
});

Route::get('/blade/controle-decisao/{numero?}', function($numero = 0){
    return view('blade/controleDecisao', ["n" => $numero, "idade" => 47]);
});

Route::get('/blade/switch/{numero?}', function($n = 0){
    return view('blade/switch', ["numero" => $n]);
});

Route::get('/blog', function(){
    return view('blog/home');
});

Route::get('/blog/artigos', function(){
    return view('blog/artigos');
});
