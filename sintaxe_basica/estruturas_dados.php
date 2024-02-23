<?php 

//Arrays

echo "MANIPULANDO ARRAYS <br/><br/>";

$numeros = array(4, 20, 58, 1, 32);
foreach ($numeros as $n) {
    echo "Número: $n <br/>";
}

echo "<br/>";

$numeros[] = 10; // Adiciona 10 ao final do array
foreach ($numeros as $n) {
    echo "Número: $n <br/>";
}

echo "<br/>";

unset($numeros[3]); // Remove o elemento da posição 3 do array
foreach ($numeros as $n) {
    echo "Número: $n <br/>";
}

echo "<br/>";

if (in_array(5, $numeros)) {
    echo "Número 5 está presente no array.";
} else {
    echo "Número 5 não está presente no array.";
}

echo "<br/>";
echo "<br/>";

sort($numeros); // Ordena os elementos em ordem crescente
print_r($numeros);

echo "<br/>";
echo "<br/>";

$pessoa = array("nome" => "João", "idade" => 30, "cidade" => "São Paulo");
foreach ($pessoa as $chave => $valor) {
    echo "$chave: $valor <br/>";
}

echo "<br/>";

//Strings

echo "MANIPULANDO STRINGS <br/>";

$texto = "Olá, mundo!";

echo "<br/>";

// Obtendo o comprimento da string
echo strlen($texto);

echo "<br/>";

// Convertendo a string para minúsculas
echo strtolower($texto); // Saída: olá, mundo!

echo "<br/>";

// Convertendo a string para maiúsculas
echo strtoupper($texto); // Saída: OLÁ, MUNDO!

echo "<br/>";

// Substituindo substrings da string
echo str_replace("Olá", "Hi", $texto);

echo "<br/>";
echo "<br/>";

//Objetos

echo "MANIPULANDO OBJETOS <br/><br/>";

// Definindo a classe Pessoa
class Pessoa {
    public $nome;
    public $idade;
    public function apresentar() {
        echo "Olá, meu nome é {$this->nome} e tenho {$this->idade} anos.";
    }
}

// Criando um objeto da classe Pessoa
$pessoa = new Pessoa();
$pessoa->nome = "Maria";
$pessoa->idade = 25;

// Chamando o método apresentar
$pessoa->apresentar(); // Saída: Olá, meu nome é Maria e tenho 25 anos.


?>