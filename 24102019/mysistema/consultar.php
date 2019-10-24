<html>
<body>
<h2>Consultar Pessoas</h2>
<form action="consultar.php" name="formFiltrarPessoa"
id="formFiltrarPessoa" method="POST">
<table>
<tr>
<td colspan="4"><b><a href="index.php"><<< Voltar</a></b></td>
</tr>
<tr>
<td colspan="4" align="center"><b>Filtros</b></td>
</tr>
<tr>
<td>Nome:</td>
<td><input type="text" name="fl_nome" value=""></td>
<td></td>
<td></td>
</tr>
<tr>
<td>Endereço:</td>
<td><input type="text" name="fl_endereco" value=""></td>
<td></td>
<td></td>
</tr>
<tr>
<td>Nascimento entre:</td>
<td><input type="text" name="fl_data_inicial" value=""></td>
<td align="center"> E </td>
<td><input type="text" name="fl_data_final" value=""></td>
</tr>
<tr>
<td colspan="4" align="center"> </td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" name="consultar" value="Consultar"></td>
</tr>
</table>
</form>

<table width="800">
<tr>
<td colspan="6" align="center"> <h2>Listagem de Pessoas</h2> </td>
</tr>
<tr>
<td><b>CPF</b></td>
<td><b>Nome</b></td>
<td><b>Endereço</b></td>
<td><b>Data de Nascimento</b></td>
<td><b>Telefone </b></td>
<td><b>Renda</b></td>
</tr>

	<?php

$flNome = "";
$flEndereco = "";
$flDataInicial = "";
$flDataFinal = "";
$btConsultar = "";


if(isset($_POST["fl_nome"])){
    $flNome = $_POST['fl_nome'];
   }

    if(isset($_POST["fl_endereco"])){
    $flEndereco = $_POST['fl_endereco'];
   }
    if(isset($_POST["fl_data_inicial"])){
    $flDataInicial = $_POST['fl_data_inicial'];
   }
    if(isset($_POST["fl_data_final"])){
    $flDataFinal = $_POST['fl_data_final'];
   }
    if(isset($_POST["consultar"])){
    $btConsultar = $_POST['consultar'];
   }

   if($btConsultar != ""){
    consultarPessoa();
   }

   function montarSQL(){
    global $flNome, $flEndereco, $flDataInicial, $flDataFinal;

    $sql = "SELECT * FROM pessoa ";

    if ($flNome != "" || $flEndereco != "" || $flDataInicial != "" || $flDataFinal != "") {
    $sql .= " where ";

    if ($flNome != ""){
    $sql .= " nome like '%" . $flNome . "%' ";
    }

    if ($flEndereco != ""){
    $sql .= " endereco like '%" . $flEndereco . "%' ";
    }
    if ($flDataFinal != ""){
    $sql .= " datadeNascimento between '" . $flDataInicial . "' and '" . $flDataFinal . "'";
    }

    $sql .= ";";
    }

    return $sql;

   }


function consultarPessoa(){

$con = mysqli_connect("192.168.2.205","usermysistema","1234", "mysistema");
// Checando a conexão
if (mysqli_connect_errno($con)){
echo "Erro ao conectar com a base de dados: ";
mysqli_connect_error();
}else{
//echo "Conexão Aberta";

$sql = montarSQL();

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
   // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
echo "<tr> \n";
       echo "<td><a href='alterar.php?cpfcons=" . $row["cpf"] . "'>" . $row["cpf"] . "</a></td> \n";
       echo "<td>" . $row["nome"] . "</td> \n";
       echo "<td>" . $row["endereco"] . "</td> \n";
       echo "<td>" . $row["datadeNascimento"] . "</td> \n";
       echo "<td>" . $row["telefone"] . "</td> \n";
       echo "<td>" . $row["renda"] . "</td> \n";
       echo "</tr> \n";
   }

}


}

}


?>

</table>
</body>

</html>