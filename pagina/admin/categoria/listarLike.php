<h3>Lista de Categorias</h3>
<a class="btn btn-outline float-right text-white" role="button" style="background-color: #1C1C1C;"
    href="?p=categoria/salvar">Adicionar</a>
<br><br>


<div class="col-sm-12">
    <nav aria-label="..." class="mb-3">
        <ul class="pagination justify-content-center">
            <?php
            foreach (range('A', 'Z') as $mostrar) {
                ?>


                <li class="page-item">
                    <a href="?p=categoria/listarLike&letra=<?= $mostrar ?>" class="page-link">
                        <?= $mostrar ?>
                    </a>
                </li>
                <?php

            }
            ?>
        </ul>
    </nav>
</div>

<table class="table shadow p-3 mb-5 bg-body-tertiary rounded">
    <thead class="thead" style="background-color: #B0C4DE;">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descrição</th>
            <th scope="col">Ramal</th>
            <th>Opções</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $letra = filter_input(INPUT_GET, 'letra');
        include_once '../class/Categoria.php';
        $cat = new Categoria();
        $dados = $cat->consultarLike($letra);

        if (!empty($dados)) {
            foreach ($dados as $mostrar) {
                ?>
                <tr>
                    <th scope="row">
                        <?= $mostrar['id'] ?>
                    </th>
                    <td>
                        <?= $mostrar['descricao'] ?>
                    </td>
                    <td>
                        <?= $mostrar['ramal'] ?>
                    </td>
                    <td>
                        <a href="?p=categoria/salvar&id=<?= $mostrar['id'] ?>" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="?p=categoria/excluir&id=<?= $mostrar['id'] ?>" class="btn btn-danger"
                            data-confirm="Excluir registro?">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="4">
                    <div class="text-align center alert alert-dark" role="alert">
                        Nenhum registro encontrado
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>



    </tbody>
</table>

<div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0"
    aria-valuemax="100">
    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%; background-color:	#6495ED;">
    </div>
</div>