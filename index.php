<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["consultar"])) {
    
    $cep = $_POST["cep"];


    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $conteudo = file_get_contents($url);

    
    $endereco = json_decode($conteudo, true);

    
    if ($endereco && !isset($endereco["erro"])) {
        
        $resultado = "Endereço: {$endereco['logradouro']}, {$endereco['bairro']}, {$endereco['localidade']}, {$endereco['uf']}";
    } else {
        $resultado = "CEP não encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ViaCEP</title>
</head>
<body>

<form action="" method="POST">

    <div>
        <h1>Consultar Endereço ViaCEP</h1>
        <div>
            <div>
                <label for="cep">Digite seu CEP: </label>
                <input type="text" name="cep" id="cep">
                <button type="submit" name="consultar">Consultar</button>
            </div>
           
            <div>
                <p>Seu resultado: <?php if(isset($resultado)) echo $resultado; ?></p>
            </div>            
        </div>
        
    </div>

</form> 
</body>
</html>
