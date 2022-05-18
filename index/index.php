<?php
include 'conexao.php';

$modelo = '';
$marca = '';
$valor = '';

// cadastro
if (isset($_POST['salvar'])) {
    $modelo = $_POST['modelo'];
    $marca  = $_POST['marca'];
    $valor  = $_POST['valor'];

    $sql = mysqli_query($conn, "INSERT INTO notebooks.cadastro(modelo,marca,valor) VALUE ('$modelo','$marca','$valor')");
    header('Location:index.php');
}
//exibir na tabela
$result = mysqli_query($conn, "SELECT * FROM cadastro");

//deletar
if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $sql = mysqli_query($conn, "DELETE FROM cadastro WHERE ID = '$id'");
    if ($sql) {
        header('Location:index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"> -->
    <title>Cadastro Notebooks</title>
</head>

<body>
    <form method="post">
        <input type="hidden" name="ID" value="<?= $row['ID']; ?>">
        <h1 class="p-3 mb-2 bg-dark text-white text-end">Cadastro de notebooks</h1>
        <div class="row g-2 px-5 mt-4">
        <h4 class="mt-3">Cadastrar:</h4>
            <div id="modelo" class="mb-3 col-6">
                <!-- <label>Modelo:</label> -->
                <input class="form-control" type="text" name="modelo" placeholder="Modelo" value="<?= $modelo; ?>" required>
            </div>
            <div id="marca" class="mb-3 col-3">
                <!-- <label>Marca</label> -->
                <input class="form-control" type="text" name="marca" placeholder="Marca" value="<?= $marca; ?>" required>
            </div>
            <div id="valor" class="mb-3 col-3">
                <!-- <label>Valor</label> -->
                <input class="form-control" type="text" name="valor" placeholder="Valor" value="<?= $valor; ?>"  required>
            </div>
            <div id="salvar" class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-dark" type="submit" name="salvar">Salvar</button>
            </div>
        </div>
    </form>
    </div>
    <div class="container">
        <table id="tabela" class="table mt-6">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>MODELO</th>
                    <th>MARCA</th>
                    <th>VALOR</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $row['ID'];     ?></td>
                    <td><?= $row['modelo']; ?></td>
                    <td><?= $row['marca'];  ?></td>
                    <td><?= $row['valor'];  ?></td>
                    <td>
                        <a class="btn btn-info" href="editar.php?edit=<?= $row['ID']; ?>">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="index.php?deletar=<?= $row['ID']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script>
$(document).ready(function() {
    $('#tabela').DataTable( {
        dom: 'Bfrtip',
        buttons: [
         'pdf'
        ]
    } );
} ); -->
</script>
</html>
