
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curabitur - Fórum</title>
    <link rel="icon" type="image/x-icon" href="images/logosite.png">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include_once('header.php');
    ?>
    <main>
        <h4 class="mt-4">Aqui é o fórum, onde você pode encontrar perguntas, sugestões ou avisos de outros usuários.</h4>
        <form name="basico" action="" method="post">
            <div class="mt-4 p-3 border border-warning">
                <p>Como deseja filtrar?</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="filtros" value="Mosquito">
                    <label for="sim" class="form-check-label">Mosquito</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="filtros" value="Doença">
                    <label for="nao" class="form-check-label">Doença</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="filtros" value="Tratamento">
                    <label for="nao" class="form-check-label">Tratamento</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="filtros" value="Preciso de Ajuda">
                    <label for="nao" class="form-check-label">Preciso de Ajuda</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="filtros" value="Todos" checked>
                    <label for="nao" class="form-check-label">Todos</label>
                </div>
                <div class="mt-4">
                    <button id="mostra" name="mostra" type="submit" class="btn btn-primary">Mostrar</button>
                </div>
            </div>       
        </form>
        <div class="mt-4">
            <h6>Resultados: </h6>
            <?php
            if(isset($_POST['mostra'])){
                require 'conexao.php';
                $pdo = mysqlConnect();
                $escolha = $_POST['filtros'];
                $opcoes = array(
                    "Mosquito" => 2,
                    "Doença" => 3,
                    "Preciso de Ajuda" => 7,
                    "Tratamento" => 5,
                    "Todos" => 1
                );
        
                try{
                    $sql = <<<SQL
                        SELECT Nome, Assunto, Texto
                        FROM Contato
                        WHERE MOD(Assunto, $opcoes[$escolha]) = 0;
                        SQL;
                    $stmt = $pdo->query($sql);
        
                }
                catch (Exception $e){
                    exit('Ocorreu uma falha '.$e->getMessage());
                }
                
                while($row = $stmt->fetch()){
                    $nome = htmlspecialchars($row['Nome']);
                    $assunto = $row['Assunto'];
                    $texto = htmlspecialchars($row['Texto']);
        
                    $key = "";
        
                    if($assunto%2 == 0)
                        $key .= array_search(2, $opcoes).", ";
                    if($assunto%3 == 0)
                        $key .= array_search(3, $opcoes).", ";
                    if($assunto%5 == 0)
                        $key .= array_search(5, $opcoes).", ";
                    if($assunto%7 == 0)
                        $key .= array_search(7, $opcoes).", ";

                    $key = rtrim($key, ', ');
        
                    echo $div = <<<DIV
                    <div class="forum">
                        <div>
                            <p>$nome</p>
                            <p>$key</p>
                        </div>
                        <p>$texto</p>
                    </div>
                    DIV;
                }
            }
            ?>
        </div>
    </main>   
    <?php
        include_once('footer.php');
    ?>
</body>
</html>

