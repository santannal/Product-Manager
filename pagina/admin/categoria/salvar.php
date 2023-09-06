<?php

//capturar id da url
$id = filter_input(INPUT_GET, 'id');
//comunicação com class Categoria
include_once '../class/Categoria.php';
$cat = new Categoria();
/*
ISSET SERVE para verificar se a variável ID foi utilizada 
*/
if (isset($id)) {

    $cat->setId($id);
    $dados = $cat->consultarPorID();
    foreach ($dados as $mostrar) {
        $id = $mostrar['id'];
        $descricao = $mostrar['descricao'];
        $ramal = $mostrar['ramal'];
    }
}
?>
<h3>
    <?= isset($id) ? 'Edição' : 'Cadastro' ?> de Categoria
</h3>
<a class="btn btn-outline-danger float-right" href="?p=categoria/listar">Voltar</a>
<br><br>

<form method="post" enctype="multipart/form-data" name="frmCadastro" id="frmCadastro">

    <div class="form-group">
        <label for="exampleInputText">Descrição</label>
        <input type="text" class="form-control" id="exampleInputText" placeholder="Informe a descrição da categoria"
            name="txtdescricao" value="<?= isset($id) ? $descricao : '' ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputText">Ramal</label>
        <input type="number" class="form-control" placeholder="Informe o ramal da categoria" id="exampleInputText"
            name="txtramal" value="<?= isset($id) ? $ramal : '' ?>">
    </div>

    <input type="submit" class="btn btn-<?= isset($id) ? 'sucess' : 'primary' ?>"
        name="<?= isset($id) ? 'btneditar' : 'btnsalvar' ?>" value="<?= isset($id) ? 'Editar' : 'Cadastrar' ?>">
</form>

<?php
//se eu clicar no botão salvar
if (filter_input(INPUT_POST, 'btnsalvar')) {
    //capturei dados do form HTML para variáveis
    $descricao = filter_input(INPUT_POST, 'txtdescricao');
    $ramal = filter_input(INPUT_POST, 'txtramal');

    $cat->setDescricao($descricao);
    $cat->setRamal($ramal);
    $cat->salvar();

    echo '<div class="alert alert-primary mt-3" role="alert">';
    echo 'Cadastro efetuado com sucesso';
    echo '</div>';
    echo '<meta http-equiv="refresh" content="0.5;URL=?p=categoria/listarLike">';


}


/*efetivar o cadastro
if($cat->salvar()){

    
    echo '<div class="alert alert-primary mt-3" role="alert">';
    echo 'Cadastro efetuado com sucesso';
    echo '</div>';
    echo '<meta http-equiv="refresh" content="0.5;URL=?p=categoria/listar">';
}*/


if (filter_input(INPUT_POST, 'btneditar')) {
    //capturei dados do form HTML para variáveis
    $descricao = filter_input(INPUT_POST, 'txtdescricao');
    $ramal = filter_input(INPUT_POST, 'txtramal');


    //enviar dados que capturei do form para class Categoria
    $cat->setDescricao($descricao);
    $cat->setRamal($ramal);

    //efetivar o cadastro
    if ($cat->editar()) {
        echo '<div class="alert alert-primary mt-3" role="alert">';
        echo 'Atualização efetuada com sucesso';
        echo '</div>';
        echo '<meta http-equiv="refresh" content="0.5;URL=?p=categoria/listarLike">';
    }
}