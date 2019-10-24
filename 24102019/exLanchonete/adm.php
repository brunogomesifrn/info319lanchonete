<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/050eefe4c7.js"></script>

    <title>Açai & cia</title>


  </head>
  <body style="background-color: #3d143d">

    <!--Nav-->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-dark bg-faded fixed-top" style="background-color: #9A32CD;">
                <button class="navbar-toggler" style="color: white" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                          </button>
                <a class="navbar-brand" href="index.html" style="font-family: 'Bree Serif', serif; color: whitesmoke; font-size: 40px;">Área do Administrador</a>


              </nav>
      </div>
<!--Pag-->

<div id="qs" class="container" style="background-color: #3d143d; margin-top: 50px;">
    <div class="row">

      <div class="col-sm-6">

        <div id="vazia"></div>

        <h2>Cadastrar Novo Funcionário</h2>

        <div id="vazia"></div>
        <div id="vazia"></div>






        <form action="adm.php" name="formInserirMySistema" id="formInserirMySistema" method="POST">
          <p>Nome</p>
          <input type="text" class="form-control" name="nome" id="" aria-describedby="emailHelpId" placeholder="">
            <p>CPF</p>
          <input type="text" class="form-control" name="cpf" id="" aria-describedby="emailHelpId" placeholder="">
          <p>Senha</p>
          <input type="text" class="form-control" name="senha" id="" aria-describedby="emailHelpId" placeholder="">
     
<input type="submit" name="inserir" value="Inserir">


   </form>





        <div id="vazia"></div>

          <h2>Relatório de Vendas/mês</h2>


          <div id="vazia"></div>

          <div class="form-group">

            <p>Ano:</p>

            <select class="form-control" id="exampleFormControlSelect1">
              <option>2016</option>
              <option>2017</option>
              <option>2018</option>
              <option>2019</option>
            </select>

            <p>Mês:</p>

            <select class="form-control" id="exampleFormControlSelect1">
              <option>JANEIRO</option>
              <option>FEVEREIRO</option>
              <option>MARÇO</option>
              <option>ABRIL</option>
              <option>MAIO</option>
              <option>JUNHO</option>
              <option>JULHO</option>
              <option>AGOSTO</option>
              <option>SETEMBRO</option>
              <option>OUTUBRO</option>
              <option>NOVEMBRO</option>
              <option>DEZEMBRO</option>
            </select>

            <p>De funcionário especifico?</p>

            <select class="form-group" id="exampleFormControlSelect1">
              <option>NÃO</option>
              <option>704.234.312-90</option>
              <option>704.234.312-90</option>
              <option>704.234.312-90</option>
              <option>704.234.312-90</option>
            </select>

            <button type="button" class="btn btn-dark" style="justify-content: center"><a href="adm.html">Buscar!</a></button>

            <p>Resultado:</p>

            <div class="form-group">
              <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" id="comment"></textarea>

            </div>

          </div>

      </div>

      <div class="col-sm-6">

        <div id="vazia"></div>

        <h2>Lista de todos os Funcionários</h2>

        <div id="vazia"></div>
        <div id="vazia"></div>






        <?php

$nome = "";
$cpf = "";
$senha = "";


if(isset($_POST["nome"])){
    $cpf = $_POST['nome'];
   }

    if(isset($_POST["cpf"])){
    $nome = $_POST['cpf'];
   }
    if(isset($_POST["senha"])){
    $endereco = $_POST['senha'];
   }


if($cpf != ""){
$erro = adicionarPessoa($nome,$cpf, $senha);

if($erro != -1){
echo "<font color='#00FF00' size='+2'> <b>Registro insserido com sucesso!</b> </font>";

}
}


function abrirConexao(){
$con = mysqli_connect("localhost",
"root","1234", "local");
// Checando a conexão
if (mysqli_connect_errno($con)){
echo "Erro ao conectar com a base de dados: ";
mysqli_connect_error();
}else{
//echo "Conexão Aberta!!";
}

return $con;

}

function adicionarPessoa($nome,$cpf,$senha){

$con = abrirConexao();

$sql = "INSERT INTO usuario(nome,cpf,senha) VALUES (" .
"'" . $nome . "', " .
"'" . $cpf . "', " .
"'" . $senha . ");" ;


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







        <button type="button" class="btn btn-dark" style="justify-content: center"><a href="adm.html">Editar</a></button>
        <button type="button" class="btn btn-dark" style="justify-content: center"><a href="adm.html">Remover</a></button>
        <div id="vazia"></div>
        <div id="vazia"></div>
      </div>

      </div>


    </div>
    <div id="vazia"></div>
        <div id="vazia"></div>


  </body>
</html>
