<?php


require_once 'controller/Database_dao.php';
$dao = new Database_dao();
$resultados = $dao->buscar();


?>

<div class="container">
    <h1>BOSS FITNESS</h1>
    <div>
        <div class="sub-container">
            <h2>Seus produtos</h2>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Deletar</th>
                    <th>Alterar</th>

                </tr>


                <?php
                foreach ($resultados as $resultado) {

                ?>
                    <tr>
                        <td><?= $resultado['nome'] ?></td>
                        <td><?= $resultado['preco'] ?></td>
                        <td>
                            <a href="controller/Database_dao.php?deletar=<?= $resultado['id'] ?>">
                                ❌
                            </a>
                        </td>
                        <td>
                            <a href="controller/Database_dao.php?alterar=<?= $resultado['id'] ?>">
                                ✏️
                            </a>
                        </td>

                    </tr>
                    <input type="hidden" name="id_produto" value="<?= $resultado['id'] ?>">

                <?php
                }
                ?>
            </table>
        </div>
        <div class="sub-container">
            <h2>Busque e Altere um Produto</h2>
            <div>
                <form action="controller/Database_dao.php" method="POST">
                    <div>

                        <label for="buscarId">Id:</label>
                        <input type="text" name="buscarPorId">
                        <input type="submit" value="Buscar">
                    </div>
                </form>



            </div>
            <form method="POST">
                
                <div>

                    <label for="nome">Nome:</label>
                    <input name="nome" type="text" value ="<?= $_GET['nome']??''?>">
                </div>
                <div>

                    <label for="preco">Preço:</label>
                    <input name="preco" type="text" value ="<?= $_GET['preco']??''?>">
                    <input type="hidden" name="alterar" value="<?= $_GET['id'] ?? ''?>">
                </div>

                <input type="submit" value="Alterar">


            </form>
        </div>
        <div class="sub-container">
            <h2>Crie um novo Produto</h2>
            <div>

                <form action="controller/Database_dao.php" method="POST">
                    <div>

                        <label for="nome">Nome:</label>
                        <input name="nome" type="text">
                    </div>
                    <div>

                        <label for="preco">Preço:</label>
                        <input name="preco" type="text">
                        <input type="hidden" name="inserir" >
                    </div>

                    <input type="submit" value="Inserir">


                </form>
            </div>
        </div>
    </div>
</div>





<style>
    * {
        padding: 0;
        margin: 0;
    }

    /* ############################# */
    /* estilos Gerais */
    /* ############################# */
    .container {
        height: 40vw;
        display: flex;
        flex-direction: column;
        gap: 3vw;
        justify-content: center;
        align-items: center;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;


    }

    .container>div {
        position: relative;
        gap: 1vw;
        display: flex;

    }

    .sub-container {
        text-align: center;
        padding: 2vw;
        border: 1px solid #c3c3c3;
        border-radius: 3px;
    }

    input {
        width: 8vw;
        height: 2vw;
        border: 1px solid #c3c3c3;
        border-radius: 2px;

    }

    input[type="submit"] {
        width: 4vw;
        padding: 0.5vw;
        cursor: pointer;
    }

    /* ############################# */
    /* sub container 1 */
    /* ############################# */
    table {
        border-collapse: collapse;
        text-align: center;

    }



    /* seleciona botao DELETE */
    tr td:nth-child(3) {

        cursor: pointer;
    }

    /* seleciona botao Alterar */
    tr td:nth-child(4) {

        cursor: pointer;
    }

    td {

        height: 2vw;
    }

    th {
        height: 2vw;
        width: 7vw;
        border-bottom: 1px solid #c3c3c3;
    }

    a {
        text-decoration: none;
    }

    h2 {
        margin-bottom: 1vw;
    }

    /* ############################# */
    /* sub container 2 */
    /* ############################# */
    /* seleciona Busque e Altere um Produto */
    .sub-container:nth-of-type(2) {

        display: flex;
        flex-direction: column;

        gap: 1vw;


    }

    .sub-container:nth-of-type(2) form {
        display: flex;
        flex-direction: column;
        gap: 1vw;
        align-items: center;
    }

    /* ############################# */
    /* sub container 3 */
    /* ############################# */
    .sub-container:nth-of-type(3) form {

        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1vw;


    }

    .sub-container:nth-of-type(3) {

        display: flex;
        flex-direction: column;
        gap: 1vw;


    }
</style>