<?php
function calcular($num1, $num2, $operacao) {
    switch ($operacao) {
        case 'adicao':
            return $num1 + $num2;
        case 'subtracao':
            return $num1 - $num2;
        case 'multiplicacao':
            return $num1 * $num2;
        case 'divisao':
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Erro: Divisão por zero.";
            }
        default:
            return "Operação inválida.";
    }
}

// Exemplo de uso
$num1 = 10;
$num2 = 5;
$operacao = 'multiplicacao';

$resultado = calcular($num1, $num2, $operacao);
echo "Resultado: " . $resultado;
?>