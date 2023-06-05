<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Banco de Dados</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <br>
    <div align="center" id="divverdadeira">
        <br><br>
        <h1>Alistar para o Evento dos Séculos!</h1>
        <a href="index.php">Voltar para a lista</a>
        <br><br>
        <form method="post" action="">
            <input type="text" name="escolhido" id="escolhido" required minlength="1">
            <input type="text" name="nome" placeholder="Nome" maxlength="99" required minlength="3"><br><br>
            <input type="text" name="rg" placeholder="RG" maxlength="9" onkeyup="this.value=formatarRG(this.value)" required minlength="9"><br><br><br>
            <label>De que Lado você está?:</label><br>
            <p id="escolherlado">
                <button id="diggo" class="escolha" onclick="escolher('diggo', event)"><img draggable="false" src="images/Diggo.jpg" alt="Diggo"><br>DIGGO</button>
                <label id="shipX">X</label>
                <button id="raluca" class="escolha" onclick="escolher('raluca', event)"><img draggable="false" src="images/raluca.jfif" alt="Raluca"><br>RALUCA</button>
            </p>
            <br><br>

            <input type="submit" name="campo3">
            <br><br>
        </form>
        <?php
        //Conectar com o bando de dados
        $conn = mysqli_connect("localhost", "root", "", "inscricao");

        //Verificar se o formulario foi enviado pelo metodo POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $campo1 = $_POST['nome'];
            $campo2 = $_POST['rg'];
            $campo3 = $_POST['escolhido'];

            //Cria os valores SQL para inserir um registro na tabela
            $sql = "INSERT INTO `cadastrados` (nome, rg, escolha) VALUES ('$campo1', '$campo2', '$campo3')";

            //Verifica se o formulario foi enviado com sucesso
            if (mysqli_query($conn, $sql)) {
                echo "Registro inserido com sucesso";
            } else {
                echo "Registro deu ruim man";
            }
        }
        ?>
    </div>
</body>
<script>
    function formatarRG(rg) {
        rg = rg.replace(/\D/g, ""); // Remove tudo que não é dígito
        rg = rg.replace(/^(\d{2})(\d{3})(\d{3})(\d{1})$/, "$1.$2.$3-$4"); // Adiciona a máscara
        return rg;
    }

    apertouS = false;
    apertouH = false;
    apertouI = false;
    apertouP = false;
    document.addEventListener('keyup', function(event) {
        if (event.key == "s") {
            console.log("apertou s");
            apertouS = true;
            console.log(apertouS);
        }
        if (apertouS & event.key == "h") {
            console.log("apertou h");
            apertouH = true;
        }
        if (apertouH & event.key == "i") {
            console.log("apertou i");
            apertouI = true;
        }
        if (apertouI & event.key == "p") {
            console.log("apertou p");
            apertouP = true;
        }
        if (apertouP) {
            document.getElementById("shipX").innerHTML = `
                <button id="ship" class="escolha" onclick="escolher('ship', event)"><img draggable="false" src="images/shipmisterio.jfif" alt="Ship"><br>SHIP</button>`
            console.log("ship desbloqueado");
        }
    });

    function escolher(escolha, event) {
        event.preventDefault()
        resposta = document.getElementById('escolhido');
        botaodiggo = document.getElementById('diggo');
        botaoraluca = document.getElementById('raluca');
        if (apertouP) {
            botaoship = document.getElementById('ship');
        }
        switch (escolha) {
            case "diggo":
                botaodiggo.style.backgroundColor = "greenyellow";
                botaodiggo.style.color = "black";
                botaoraluca.style.backgroundColor = "black";
                botaoraluca.style.color = "orange";
                if (apertouP) {
                    botaoship.style.backgroundColor = "black";
                    botaoship.style.color = "rgb(165, 81, 42)";
                }
                resposta.value = "diggo";
                break;
            case "raluca":
                botaoraluca.style.backgroundColor = "orange";
                botaoraluca.style.color = "black";
                botaodiggo.style.backgroundColor = "black";
                botaodiggo.style.color = "greenyellow";
                if (apertouP) {
                    botaoship.style.backgroundColor = "black";
                    botaoship.style.color = "rgb(165, 81, 42)";
                }
                resposta.value = "raluca";
                break;
            case "ship":
                botaoship.style.backgroundColor = "rgb(165, 81, 42)";
                botaoship.style.color = "black";
                botaodiggo.style.backgroundColor = "black";
                botaodiggo.style.color = "greenyellow";
                botaoraluca.style.backgroundColor = "black";
                botaoraluca.style.color = "orange";
                resposta.value = "ship";
                break;
        }
    }
</script>

</html>