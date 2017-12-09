<?php
/**
 * Segunda questão do teste Fidelize
 *  
 * @version 0.0.1
 * @author  Wesley S. Araújo <wesley@agits.com.br>
 */

/**
 * Função que calcula o valor total levando em consideração as notas e suas quantidades
 *
 * @param  Array $notasTroco
 * @return number
 */
function calcNotas($notasTroco) 
{
    if (count($notasTroco) > 0) {
        $calc = 0;
        
        foreach ($notasTroco as $nota) {
            $calc = $calc + ($nota['nota'] * $nota['qtd']);
        }

        return $calc;
    } else {
        return 0;
    }
}

/**
 * Nesse primerio bloco eu defino algumas variáveis nelas temos:
 * 
 * @var $notas Array de notas disponíveis para troco
 * @var $valor Valor devido
 * @var $valorPago valor que foi pago
 * @var $troco Calcula do valor pago - valor devido para definir troco
 * @var $notasTroco Notas do troco
 */
$notas = [100, 50, 20, 10, 5, 2, 1];
$valor = 62;
$valorPago = 100;
$troco = $valorPago - $valor;
$notasTroco = [];

if ($troco > 0) {
    for ($i = 0; $i < count($notas); $i++) {
        $nota = $notas[$i];
        $calcNotasTroco = calcNotas($notasTroco);
        $faltaTroco = $troco - $calcNotasTroco;
        if ($troco >= $nota && $calcNotasTroco < $troco) {
            $qtdNota = intval($faltaTroco / $nota);

            if ($qtdNota > 0) {
                array_push(
                    $notasTroco,
                    [
                        "nota" => $nota, 
                        "qtd" => $qtdNota
                    ]
                );
            }
        }
    }
}

echo "Troco: R$" . number_format($troco, 2, ',', '.') . "\n";

foreach ($notasTroco as $key => $notaTroco) {
    $virgula = $key > 0 ? ', ' : '';

    echo $virgula . $notaTroco['qtd'] . ' nota de R$' . number_format($notaTroco['nota'], 2, ',', '.');
}

echo ". \n";