<?php

require_once("./connect/connection.php");

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";


if( $_SERVER['REQUEST_METHOD'] === 'GET') {

    if( ! isset($_GET['id']) ) {
        header("location: /crud-php/index.php");
        exit;        
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM clients WHERE id={$id}";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row) {
        header("location: /crud-php/index.php");
        exit;
    }

    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];

} else {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    do {
        if( empty($id) || empty($name) || empty($email) || empty($phone) || empty($address) ) {
            $errorMessage = "Todos os campos são obrigatórios";
            break;
        }

        $sql = "UPDATE clients SET name='{$name}', email='{$email}', phone='{$phone}', address='{$address}' WHERE id={$id}";
        $result = $connection->query($sql);

        if(!$result) {
            $errorMessage = "Consulta inválida: " . $connection->error;
            break;
        }

        $successMessage = "Cliente atualizado.";

        header("location: /crud-php/index.php");
        exit;

    } while (false);

}
?>

<?php
    require_once("./public/partials/head.php")
?>
<body>
    <div class="container my-5">
        <h2>Atualizar Cliente</h2>

        <?php if( ! empty( $errorMessage ) ): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $errorMessage ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" value="<?php echo $id ?>" name="id">

            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $name ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                <div class="col-sm-6">
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-3 col-form-label">Telefone</label>
                <div class="col-sm-6">
                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $phone ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-3 col-form-label">Endereço</label>
                <div class="col-sm-6">
                    <input type="text" name="address" id="address" class="form-control" value="<?php echo $address ?>">
                </div>
            </div>

            <?php if( ! empty( $successMessage ) ): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $successMessage ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/myshop/index.php" class="btn btn-outline-primary" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./public/js/script.js"></script>
</body>
</html>