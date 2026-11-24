<?php

/* escrita
echo"Hello, word!";
echo "<h1>hello, word!</h1>";
*/

/* variavel
$nome = "Raphael";
$idade = 18;
$altura = 1.70;     
$ativo = true;

echo "Meu nome é: ". $nome . "\nMinha idade é: ". $idade;
echo "Minha altura é: $altura";
*/

/* estrutura de condição
$valor = 75;

if ($valor < 75) {
    echo "menor que 75";
}
else if ($valor > 75) {
    echo "maior que 75";
}
else {
    echo "é 75";
}

$Valor = 2;

switch ($Valor) {
    case 1:
        echo "case 1 ";
        break;
    case 2:
        echo "case 2";
        break;
    default:
        echo "case 3";
        break;
    
}
*/

/* laço de repetição

for ($i = 0; $i < 2; $i++) {
    echo $i. " ";
}

$contador = 0;

while ($contador < 3) {
    echo $contador." ";
    $contador++;
}
*/

/*Arrays
$linguagens = ["PHP", "Java", "Python"];

for ($i = 0; $i <3; $i++) {
    echo $linguagens[$i] . PHP_EOL;
}

$usuario = [
    "nome" => "Raphael",
    "idade" => "18",
    "sexo" => "Masculino"
];
*/

/* Função
function saudar($nome){
    return "Bem vindo ". $nome .PHP_EOL;
}
function somar(float $a , float $b): float{
    return $a + $b;
}

echo saudar("Raphael");
echo somar (10,5.2);
*/ 

/*Interação com HTML
<form method="POST" action="index.php" >
    <input type="text" name="email" placeholder="Digite seu e-mail">
    <input type="text" name="senha" placeholder="Digite sua senha">
    <button type="submit">Enviar</button>
</form>

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura o campo pelo atributo 'name' do input HTML
    $emailRecebido = $_POST["email"];
    $senhaRecebida = $_POST["senha"];
    if ($emailRecebido == null){
        echo "E-mail não foi cadastrato";
    }
    else{
        echo "E-mail cadastrado: " . htmlspecialchars($emailRecebido);
    }
    if ($senhaRecebida == null){
        echo "<br>Senha não foi recebida";
    }
    else{
        echo "<br>Senha recebida: ". htmlspecialchars($senhaRecebida);
    }
}
GET inves de POST parece no link do navegador 
type="submit": Diz ao navegador que clicar nesse botão deve empacotar todos os inputs daquele
form e disparar para o destino definido no action. 
*/

/* Validação de Dados
<h1> "Você pode beber?"</h1>
<form method="POST" action="index.php">
    <input name="nome" type="text" placeholder="Digite seu nome">
    <input name="idade" type="int" placeholder="Digite sua idade">
    <button type="submit">Enviar</button>
</form> 
if  ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $idade = $_POST["idade"] ?? 0;
    if (empty($nome)){
        echo"Não possui nome";
    }
    else if ($idade<18){
        echo "Não pode, é menor de 18 anos.";
    }
    else {
        echo $nome .", tá permitido beber.";
    }
}
*/

/* verificação de login
session_start();

if (!isset($_SESSION["usuario_logado"])){
    die("Acesso restrito! Faça login primeiro. "); trava a execução do cod aqui 
}

echo"Seja bem-vindo ao painel, " . $_SESSION["usuario_logado"];
*/

/*conexão com banco de dados 
<?php
$host = "localhost";
$banco = "meu_sistema";
$usuario = "root";
$senha = "";

try {
    // 1. Cria a conexão com o banco MySQL
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    
    // Configura o PDO para mostrar erros caso algo dê errado no SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_EXCEPTION);

    // 2. Inserindo dados com segurança (Prepared Statement)
    $nomeNovo = "Raphael";
    $emailNovo = "raphael@email.com";

    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nomeNovo, $emailNovo]); // Substitui os '?' na ordem

    // 3. Buscando dados (SELECT)
    $consulta = $pdo->query("SELECT id, nome, email FROM usuarios");
    $listaUsuarios = $consulta->fetchAll(PDO::FETCH_ASSOC); // Retorna um array associativo

    foreach ($listaUsuarios as $u) {
        echo $u["id"] . " - " . $u["nome"] . " (" . $u["email"] . ")<br>";
    }

} catch (PDOException $erro) {
    echo "Erro na conexão com o banco: " . $erro->getMessage();
}
*/

?>