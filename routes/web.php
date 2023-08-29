<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('/aluno', function () {

    $alunos = "
    <ul>
        <li>Gil Eduardo</li>
        <li>Maria Claudia</li>
        <li>Joao Pedro</li>
        </ul>";

    echo $alunos;
});

    Route::get('/aluno/{total}', function($total){
        $dados = array (
            "Carlos Eduardo",
            "maria Claudia",
            "Joao Pedro"
        );

        $cont = 0;
        $alunos = "<ul>";
        foreach($dados as $nome){
            $alunos = $alunos."<li>$nome</li>";
            $cont++;
            if($cont==$total) { break; }
        }
        $alunos = $alunos."</ul>";

        echo "<h1>$total</h1>";
    });

    Route::post("aluno/add", function(Request $request) {
        echo $request->turma;
    })->name('alunos.add');*/

//1
Route::get('/aluno', function () {
    $alunos = "
        <ul>
            <li>Gil Eduardo</li>
            <li>Maria Claudia</li>
            <li>Joao Pedro</li>
        </ul>";

    echo $alunos;
})->name('');

//2
Route::get('/aluno/limite/{total}', function ($total) {
    $dados = array(
        "Carlos Eduardo",
        "maria Claudia",
        "Joao Pedro"
    );

    $cont = 0;
    $alunos = "<ul>";
    foreach ($dados as $nome) {
        $alunos = $alunos . "<li>$nome</li>";
        $cont++;
        if ($cont == $total) {
            break;
        } 
    }
    $alunos = $alunos . "</ul>";

    echo "<h1>$alunos</h1>";
})->where('total', '[0-9]+');

//3
Route::get('/aluno/matricula/{id}', function ($id){
    
    $dados = array(
        1 => "Carlos Eduardo",
        2 => "maria Claudia",
        3 => "Joao Pedro"
    );

    if(count($dados) < $id) {
        echo "Não encontrado";
    }
    else {
        echo $dados[$id];
    }

    

    /*$cont = 0;
    $alunos = "<ul>";
    foreach($dados as $nome){
        $cont++;
        if($cont == $id){
            $alunos = $alunos . "<li>$nome</li>";
            break;
        }elseif($cont > $alunos){
            echo "<h3>Não encontrado!</h3>";
        }
    }*/

})->where('total', '[0-9]+');
