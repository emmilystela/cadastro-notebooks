<?php
include 'conexao.php';
$modelo = '';
$marca = '';
$valor = '';
$id =0;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = mysqli_query($conn, "SELECT * FROM cadastro WHERE ID='$id'");
    if ($row = $result->fetch_assoc()) {
        $modelo = $row['modelo'];
        $marca  = $row['marca'];
        $valor  = $row['valor'];
    }
}
//update - faz o isset no banco 
if (isset($_POST['editar'])) {
    $id = $_POST['ID'];
    $modelo = $_POST['modelo'];
    $marca  = $_POST['marca'];
    $valor  = $_POST['valor'];
    $editarsql = mysqli_query($conn, "UPDATE cadastro SET modelo ='$modelo', marca = '$marca', valor = '$valor' WHERE ID ='$id'");
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Editar</title>
</head>

<body>
    <form method="post">
            <h1 class="text-center mt-4">Editar</h1>
        <div class="row g-2 px-5 mt-3">
            <div class="mb-3 col-6">
                <!-- <label>Modelo:</label> -->
                <input class="form-control" type="text" name="modelo" placeholder="Modelo" value="<?= $row['modelo']; ?>">
            </div>
            <div class="mb-3 col-3">
                <!-- <label>Marca</label> -->
                <input class="form-control" type="text" name="marca" placeholder="Marca" value="<?= $row['marca']; ?>">
            </div>
            <div class="mb-3 col-3">
                <!-- <label>Valor</label> -->
                <input class="form-control" type="text" name="valor" placeholder="Valor" value="<?= $row['valor']; ?>">
            </div>
            <div class="d-grid gap-2 col-4 mx-auto">
                <button class="btn btn-dark" type="submit" name="editar">Editar</button>
                <input type="hidden" name="ID" value="<?= $row['ID']; ?>">
                </div>
                <nav class="d-grid gap-2 col-4 mx-auto">
                    <a href="index.php?" class="btn btn-secondary">Voltar</a>
                </nav>
            </div>
        </div>
    </form>
</body>