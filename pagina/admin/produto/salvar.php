<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
include_once '../class/Categoria.php';
include_once '../class/Produto.php';
$prod = new Produto();
$cat = new Categoria();
$dadosCat = $cat->consultar();

$nome = '';
$id_categoria = '';
$qtd = '';

if ($id !== null) {
    $prod->setId($id);
    $dadosProduto = $prod->consultarPorID();
    foreach ($dadosProduto as $mostrarProduto) {
        $id = $mostrarProduto['id'];
        $nome = $mostrarProduto['nome'];
        $id_categoria = $mostrarProduto['id_categoria'];
        $qtd = $mostrarProduto['qtd'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnsalvar'])) {
        $nome = filter_input(INPUT_POST, 'txtnome', FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_POST, 'selcategoria', FILTER_VALIDATE_INT);
        $qtd = filter_input(INPUT_POST, 'txtqtd', FILTER_VALIDATE_INT);

        if ($nome && $categoria !== null && $qtd !== null) {
            $prod->setNome(mb_strtoupper($nome));
            $prod->setId_categoria($categoria);
            $prod->setQtd($qtd);

            if ($prod->salvar()) {
                echo '<div class="alert alert-primary mt-3" role="alert">';
                echo 'Cadastro efetuado com sucesso';
                echo '</div>';
                echo '<meta http-equiv="refresh" content="1.0;URL=?p=produto/listarLike">';
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">';
                echo 'Erro ao salvar';
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">';
            echo 'Dados inválidos para cadastro';
            echo '</div>';
        }
    } elseif (isset($_POST['btneditar'])) {
        $id_produto = filter_input(INPUT_POST, 'id_produto', FILTER_VALIDATE_INT);
        $nome = filter_input(INPUT_POST, 'txtnome', FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_POST, 'selcategoria', FILTER_VALIDATE_INT);
        $qtd = filter_input(INPUT_POST, 'txtqtd', FILTER_VALIDATE_INT);

        if ($id_produto && $nome && $categoria !== null && $qtd !== null) {
            $prod->setId($id_produto);
            $prod->setNome(mb_strtoupper($nome));
            $prod->setId_categoria($categoria);
            $prod->setQtd($qtd);

            if ($prod->editar()) {
                echo '<div class="alert alert-primary mt-3" role="alert">';
                echo 'Edição efetuada com sucesso';
                echo '</div>';
                echo '<meta http-equiv="refresh" content="1.0;URL=?p=produto/listarLike">';
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">';
                echo 'Erro ao editar';
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">';
            echo 'Dados inválidos para edição';
            echo '</div>';
        }
    }
}
?>

<h3>
    <?= isset($id) ? 'Edição' : 'Cadastro' ?> de Produto
</h3>
<a class="btn btn-outline-danger float-right" href="?p=produto/listarLike">Voltar</a>

<br><br>

<form method="post" enctype="multipart/form-data" name="frmCadastro" id="frmCadastro">

    <?php if (isset($id)): ?>
        <input type="hidden" name="id_produto" value="<?= $id ?>">
    <?php endif; ?>

    <div class="form-group">
        <label for="exampleInputText">Nome</label>
        <input type="text" class="form-control" id="exampleInputText" placeholder="Informe o nome do produto"
            name="txtnome" value="<?= $nome ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputText">Categoria</label>
        <select class="form-control" id="selcategoria" name="selcategoria" required>
            <?php
            foreach ($dadosCat as $mostrarCategoria) {
                $categoriaId = $mostrarCategoria['id'];
                $categoriaDescricao = $mostrarCategoria['descricao'];
                echo '<option value="' . $categoriaId . '"';
                if ($id_categoria == $categoriaId) {
                    echo ' selected';
                }
                echo '>' . $categoriaDescricao . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputText">Quantidade</label>
        <input type="text" class="form-control" id="exampleInputText" placeholder="Informe a quantidade do produto"
            name="txtqtd" value="<?= $qtd ?>">
    </div>
    <input type="submit" class="btn btn-secondary" name="<?= isset($id) ? 'btneditar' : 'btnsalvar' ?>"
        value="<?= isset($id) ? 'Editar' : 'Cadastrar' ?>" />

</form>