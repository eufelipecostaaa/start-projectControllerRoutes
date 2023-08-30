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
})->where('total', '[0-9]+');

//4
Route::get('/aluno/nome/{nome}', function ($nome) {
    $dados = array(
        1 => "Carlos Eduardo",
        2 => "maria Claudia",
        3 => "Joao Pedro"
    );

    $nome = strtolower($nome);
    foreach ($dados as $id => $aluno) {
        if (strtolower($aluno) === $nome) {
            return "<li>$id - $aluno</li>";
        }
    }

    return "<li>Não encontrado</li>";
})->where('nome', '[A-Za-z]+');

//5
Route::get('/nota', function () {
    $dados = array(
        1 => array("nome" => "Carlos Eduardo", "nota" => 8.5),
        2 => array("nome" => "Maria Claudia", "nota" => 9.0),
        3 => array("nome" => "Joao Pedro", "nota" => 7.2)
    );

    $notas = "<ul>";
    foreach ($dados as $matricula => $aluno) {
        $notas .= "<li> $matricula {$aluno['nome']} {$aluno['nota']}</li>";
    }
    $notas .= "</ul>";

    return "<h1>Matricula Nome Nota</h1>$notas";
});

//6
Route::get('/nota/limite/{quantidade}', function ($quantidade) {
    $dados = array(
        1 => array("nome" => "Carlos Eduardo", "nota" => 8.5),
        2 => array("nome" => "Maria Claudia", "nota" => 9.0),
        3 => array("nome" => "Joao Pedro", "nota" => 7.2)
    );

    $notas = "<ul>";
    $cont = 0;
    foreach ($dados as $matricula => $aluno) {
        $notas .= "<li> $matricula {$aluno['nome']} {$aluno['nota']}</li>";
        $cont++;
        if ($cont == $quantidade) {
            break;
        }
    }
    $notas .= "</ul>";

    return "<h1>Matricula Aluno Nota</h1>$notas";
})->where('quantidade', '[0-9]+')->where('nome', '[A-Za-z]+');

//7
Route::get('/nota/lancar/{matricula}/{nota}/{nome?}', function ($matricula, $nota, $nome = null) {
    $dados = array(
        1 => array("nome" => "Carlos Eduardo", "nota" => 8.5),
        2 => array("nome" => "Maria Claudia", "nota" => 9.0),
        3 => array("nome" => "Joao Pedro", "nota" => 7.2)
    );

    if (!is_numeric($nota)) {
        return abort(404);
    }

    if ($nome !== null) {
        $alunoEncontrado = false;
        foreach ($dados as $matriculaAluno => $aluno) {
            if (strtolower($aluno['nome']) === strtolower($nome)) {
                $dados[$matriculaAluno]['nota'] = $nota;
                $alunoEncontrado = true;
                break;
            }
        }
        if (!$alunoEncontrado) {
            return "Aluno não encontrado.";
        }
    } elseif (is_numeric($matricula) && array_key_exists($matricula, $dados)) {
        $dados[$matricula]['nota'] = $nota;
    } else {
        return "Aluno não encontrado.";
    }

    $notas = "<ul>";
    foreach ($dados as $matriculaAluno => $aluno) {
        $notas .= "<li>Matrícula: $matriculaAluno, Nome: {$aluno['nome']}, Nota: {$aluno['nota']}</li>";
    }
    $notas .= "</ul>";

    return "<h1>Lançar Nota</h1><h2>Notas dos Alunos (Atualizada)</h2>$notas";
});

//8get
Route::get('/nota/conceito/{a}/{b}/{c}', function ($a, $b, $c) {
    $dados = array(
        1 => array("nome" => "Carlos Eduardo", "nota" => 8.5),
        2 => array("nome" => "Maria Claudia", "nota" => 9.0),
        3 => array("nome" => "Joao Pedro", "nota" => 7.2)
    );

    if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
        return abort(404);
    }

    $conceitos = array();
    foreach ($dados as $matricula => $aluno) {
        $nota = $aluno['nota'];
        if ($nota >= $a) {
            $conceitos[$matricula] = "A";
        } elseif ($nota >= $b) {
            $conceitos[$matricula] = "B";
        } elseif ($nota >= $c) {
            $conceitos[$matricula] = "C";
        } else {
            $conceitos[$matricula] = "D";
        }
    }

    $conceitoList = "<ul>";
    foreach ($conceitos as $matricula => $conceito) {
        $aluno = $dados[$matricula];
        $conceitoList .= "<li>Matrícula: $matricula, Nome: {$aluno['nome']}, Conceito: $conceito</li>";
    }
    $conceitoList .= "</ul>";

    return "<h1>Conceitos dos Alunos</h1>$conceitoList";
});

Route::post('nota/conceito', function(Request $request) {

        return $request->A;
});







