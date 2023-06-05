<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Banco de Dados</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<!-- DIRETÓRIO -->
<!-- DISCO LOCAL C: > xampp > htdocs > diggoXraluca -->

<body>
    <br>
    <div align="center">
        <br><br>
        <h1><i id="diggo">DIGGO</i> X <i id="raluca">RALUCA</i></h1>
        <h2>Compareça ao Putz Raluca 2</h2><br>
        <iframe src="https://www.youtube.com/embed/ZP655QKW2CA" title="DiggoXRaluca" frameborder="0"
            allow="autoplay; clipboard-write; encrypted-media;"></iframe>
        <hr><br>
        <h3>Está preparado?<a href="entrar.php"><br>entre na lista de presença agora!</a></h3>
        <br>
        <table>
            <thead>
                <tr>
                    <td colspan="3">
                        <h3>Pessoas Aguardando:</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Nome:</h4>
                    </td>
                    <td>
                        <h4>RG:</h4>
                    </td>
                    <td>
                        <h4>Lado:</h4>
                    </td>
                </tr>
            </thead>

            <tbody style="display:block; max-height: 400px; overflow-y: scroll;">
                <?php
                //Definir as informações de conexão ao banco de dados
                $servidor = "localhost";
                $usuario = "root";
                $senha = "";
                $dbnome = "inscricao";

                //Cria a conexão com o banco de dados
                $conn = mysqli_connect($servidor, $usuario, $senha, $dbnome);

                //Definir a consulta SQL para selecionar os registros da tabela
                $result_tabela = "SELECT * FROM cadastrados";

                //Executa a consulta SQL e armazena o resultado em uma variavel
                $resultado_tabela = mysqli_query($conn, $result_tabela);

                //Percorre todos os registros retornando o valor do SQL e imprime na pagina
                while ($row_usuario = mysqli_fetch_assoc($resultado_tabela)) {
                    echo "<tr>";
                    //Imprime o valor do Nome
                    echo "<td id='pessoas' class=' " . htmlspecialchars($row_usuario['escolha']) . " '>" . htmlspecialchars($row_usuario['nome']) . "</td>";
                    //Imprime o valor do ID
                    echo "<td id='pessoas' class=' " . htmlspecialchars($row_usuario['escolha']) . " '>" . htmlspecialchars($row_usuario['rg']) . "</td>";
                    //Imprime o valor do Sobrenome
                    echo "<td id='pessoas' class=' " . htmlspecialchars($row_usuario['escolha']) . " '>" . htmlspecialchars($row_usuario['escolha']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h3 id="navAguarde">Pessoas Aguardando:</h3>
        <nav align="left">
            <br>
            <tbody style="display:block; max-height: 400px; overflow-y: scroll;">
                <?php
                //Definir as informações de conexão ao banco de dados
                $servidor = "localhost";
                $usuario = "root";
                $senha = "";
                $dbnome = "inscricao";

                //Cria a conexão com o banco de dados
                $conn = mysqli_connect($servidor, $usuario, $senha, $dbnome);

                //Definir a consulta SQL para selecionar os registros da tabela
                $result_tabela = "SELECT * FROM cadastrados";

                //Executa a consulta SQL e armazena o resultado em uma variavel
                $resultado_tabela = mysqli_query($conn, $result_tabela);

                //Percorre todos os registros retornando o valor do SQL e imprime na pagina
                while ($row_usuario = mysqli_fetch_assoc($resultado_tabela)) {
                    //Imprime o valor do Nome
                    echo "Nome: <i id='pessoas' class=' " . htmlspecialchars($row_usuario['escolha']) . " '>" . htmlspecialchars($row_usuario['nome']) . "</i><br>";
                    //Imprime o valor do ID
                    echo "RG: <i id='pessoas' class=' " . htmlspecialchars($row_usuario['escolha']) . " '>" . htmlspecialchars($row_usuario['rg']) . "</i><br>";
                    //Imprime o valor do Sobrenome
                    echo "Lado: <i id='pessoas' class=' " . htmlspecialchars($row_usuario['escolha']) . " '>" . htmlspecialchars($row_usuario['escolha']) . "</i><br>";
                    echo "</br>";
                }
                ?>
            </tbody>
        </nav>
    </div>
</body>


</html>