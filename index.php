<?php
    require_once("./public/partials/head.php")
?>
<body>
    <div class="container my-5">
        <h2>Clientes</h2>
        <a href="/crud-php/create.php" role="button" class="btn btn-primary">Novo Cliente</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Cadastrado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                require_once("./connect/connection.php");

                 $sql = "SELECT * FROM clients";
                 $result = $connection->query($sql);

                 if(!$result) {
                    die("Consulta inválida: " . $connection->error );
                 }

                 while($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                        <td>
                            <a href="/crud-php/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="/crud-php/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Deletar</a>
                        </td>
                    </tr>
                <?php endwhile; ?> 
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>