<html>
<body><h2>Cadastrar Pessoa</h2>
<form action="cadastrar.php" name="formInserirMySistema"
id="formInserirMySistema" method="POST">
<table>
<tr>
<td colspan="2"><b><a href="index.php"><<< Voltar</a></b></td>
</tr>
<tr>
<td><b>CPF: </b></td>
<td> <input type="text" name="cpf" value=""> </td>
</tr>
<tr>
<td><b>Nome: </b></td>
<td> <input type="text" name="nome" value=""> </td>
</tr>
<tr>
<td><b>Endereço: </b></td>
<td> <input type="text" name="endereco" value=""> </td>
</tr>
<tr>
<td><b>Data de Nascimento: </b></td>
<td> <input type="text" name="datadeNascimento" value=""> </td>
</tr>
<tr>
<td><b>Telefone: </b></td>
<td> <input type="text" name="telefone" value=""> </td>
</tr>
<tr>
<td><b>Renda: </b></td>
<td> <input type="text" name="renda" value=""> </td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="inserir" value="Inserir">
</td>
</tr>
</table>
</form>
</body>
</html>

<?php
$cpf = "";
$nome = "";
$endereco = "";
$datadeNascimento = "";
$telefone = "";
$renda = "";


if(isset($_POST["cpf"])){
    $cpf = $_POST['cpf'];
   }

    if(isset($_POST["nome"])){
    $nome = $_POST['nome'];
   }
    if(isset($_POST["endereco"])){
    $endereco = $_POST['endereco'];
   }
    if(isset($_POST["datadeNascimento"])){
    $datadeNascimento = $_POST['datadeNascimento'];
   }
    if(isset($_POST["telefone"])){
    $telefone = $_POST['telefone'];
   }
    if(isset($_POST["renda"])){
    $renda = $_POST['renda'];
   }


if($cpf != ""){
$erro = adicionarPessoa($cpf, $nome, $endereco, $datadeNascimento, $telefone, $renda);

if($erro != -1){
echo "<font color='#00FF00' size='+2'> <b>Registro insserido com sucesso!</b> </font>";

}
}


function abrirConexao(){
$con = mysqli_connect("localhost",
"usermysistema","1234", "mysistema");
// Checando a conexão
if (mysqli_connect_errno($con)){
echo "Erro ao conectar com a base de dados: ";
mysqli_connect_error();
}else{
//echo "Conexão Aberta!!";
}

return $con;

}

function adicionarPessoa($cpf, $nome, $endereco, $datadeNascimento, $telefone,
$renda){

$con = abrirConexao();

$sql = "INSERT INTO Pessoa(cpf, nome, endereco, datadeNascimento,
telefone, renda) VALUES (" .
"'" . $cpf . "', " .
"'" . $nome . "', " .
"'" . $endereco . "', " .
"'" . $datadeNascimento . "', " .
"'" . $telefone . "', " .
"" . $renda . ");" ;


echo "<br><br>SQL: " . $sql;


$lastInsertedid = -1;
   
   if (mysqli_query($con, $sql)) {
  //echo "New record created successfully";
  $lastInsertedid = mysqli_insert_id($con);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

return lastInsertedid;

}

?>