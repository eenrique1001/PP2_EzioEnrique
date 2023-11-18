<?php
    require('conexao.php');
    $pdo = mysqlConnect();

    if (isset($_POST['Result'])){
        $nome = $_POST['nome'] ?? "";
        $email = $_POST['email'] ?? "";
        $funcionario = $_POST['opcoes'];
        $texto = $_POST['texto'] ?? "";

        $numero = 1;
        foreach($_POST['checks'] as $valor){
            /* echo "value : ".$valor.'<br/>'; */
            if($valor == 'Mosquito')
                $numero*=2;
            else if($valor == 'Doença')
                $numero*=3;
            else if($valor == 'Tratamento')
                $numero*=5;
            else if($valor == 'Preciso de Ajuda')
                $numero*=7;
        }

        $bit = false;
        if($funcionario == 'sim')
            $bit = true;

        $sql = <<<SQL
            INSERT INTO contato (Nome, Email, Assunto, Trabalhou, Texto)
            VALUES (? , ?,  ?,  ?,  ?)
            SQL;
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome,$email,$numero,$bit,$texto]);
        }
        catch (Exception $e) {
            exit('Falha inesperada: ' . $e->getMessage());
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curabitur - Contato</title>
    <link rel="icon" type="image/x-icon" href="images/logosite.png">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="script.js"></script>
</head>
<body>
    <?php
        include_once('header.php');
    ?>
    <main>
        <h3>Caso haja quaisquer dúvidas, sugestões ou avisos, por favor entre em contato conosco!</h3>
        <p>Preencha os campos por favor:</p>
        <form name="contato" action="" method="post">
            <div class="row">
                <div class="col-sm">
                    <label for="nome" class="form-label"> Nome: </label>
                    <input type="text" class="form-control" id="nome" name="nome">
                    <span></span>
                </div>
                <div class="col-sm">
                    <label for="email" class="form-label"> Email: </label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="exemplo@email.com">
                    <span></span>
                </div>
            </div>
            <div class="mt-4">
                <p>Sobre qual(is) assunto(s) deseja tratar?</p>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="op1" name="checks[]" value="Mosquito">
                    <label for="op1" class="form-check-label">Mosquito</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="op2" name="checks[]" value="Doença">
                    <label for="op2" class="form-check-label">Doença</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="op3" name="checks[]" value="Tratamento">
                    <label for="op3" class="form-check-label">Tratamento</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="op4" name="checks[]" value="Preciso de Ajuda">
                    <label for="op4" class="form-check-label">Preciso de Ajuda</label>
                </div>
                <span></span>
            </div>
            <div class="mt-4">
                <p>Já trabalhou conosco antes?</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="opcoes" id="sim" value="sim">
                    <label for="sim" class="form-check-label">Sim</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="opcoes" id="nao" value="nao" checked>
                    <label for="nao" class="form-check-label">Não</label>
                </div>
            </div>
            <div class="form-group mt-4">
                <label class="mb-2" for="exampleFormControlTextarea1">Sua dúvida, sugestão ou aviso: </label>
                <textarea class="form-control" id="areaTexti" rows="3" name="texto" placeholder="Escreva Aqui"></textarea>
                <span></span>
            </div>
            <div class="mt-4">
                <button id="verifica" class="btn btn-primary">Verificar</button>
                <button id="limpa" name="limpa" type="reset" class="btn btn-secondary">Limpar</button>
            </div>
            <div class="modal" tabindex="-1" id="exampleModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Por favor, confira os dados:</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Nome: <span name="spans"></span></p>
                        <p>Email: <span name="spans"></span></p>
                        <p>Assunto(s): <span name="spans"></span></p>
                        <p>Já trabalhou conosco: <span name="spans"></span></p>
                        <p>Texto: <br><span name="spans"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Result">Enviar</button>
                        <button id="limpa2" type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Limpar</button>
                        <button id="edita" type="button" class="btn btn-warning" data-bs-dismiss="modal">Editar</button>
                    </div>
                  </div>
                </div>
              </div>
        </form>
    </main>
      
    <?php
        include_once('footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>