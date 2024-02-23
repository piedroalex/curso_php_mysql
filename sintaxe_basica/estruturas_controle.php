<?php 

// Estrutura if-else
$idade = 20;
if ($idade >= 18) {
    echo "Você é maior de idade.";
} else {
    echo "Você é menor de idade.";
}

echo "<br/>";
echo "<br/>";

// Estrutura switch-case
$diaSemana = "Quarta";
switch ($diaSemana) {
    case "Segunda":
    case "Terça":
    case "Quarta":
    case "Quinta":
    case "Sexta":
        echo "Dia útil";
        break;
    case "Sábado":
    case "Domingo":
        echo "Fim de semana";
        break;
    default:
        echo "Dia inválido";
}

echo "<br/>";
echo "<br/>";

// Estrutura de repetição while
$contador = 0;
while ($contador < 5) {
    echo "Contador: $contador <br/>";
    $contador++;
}

echo "<br/>";

// Estrutura de repetição for
for ($i = 0; $i < 5; $i++) {
    echo "Valor de i: $i <br/>";
}

echo "<br/>";

// Estrutura de repetição foreach
$frutas = array("Maçã", "Banana", "Morango");
foreach ($frutas as $fruta) {
    echo "Fruta: $fruta <br/>";
}


?>