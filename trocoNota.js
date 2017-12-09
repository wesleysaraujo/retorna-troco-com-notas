const notas = [100, 50, 20, 10, 5, 2, 1]

const calcNotas = (notrasTroco) => {
  if (notas.length > 0) {
    let calc = 0
    
    notasTroco.forEach((nota, index) => {
        calc = calc + (nota.nota * nota.qtd)
    })

    return calc

  } else {
    return 0;
  }
}

let valor = 60
let valorPago = 100
let troco = valorPago - valor
let notasTroco = []

if (troco > 0) {
  for (let i = 0; i <= notas.length; i++) {
    let nota = notas[i]
    let calcNotasTroco = calcNotas(notasTroco)
    let faltaTroco = troco - calcNotasTroco
    
    if (troco >= nota && calcNotasTroco < troco) {
        let qtdNota = Math.trunc(faltaTroco / nota)

        //console.log(qtdNota < 1)

        if (qtdNota > 0) {
            notasTroco.push(
                {
                    "nota": nota, 
                    "qtd" : qtdNota
                }
            )
        }
    }
  }

let textoNotas = '';

notasTroco.forEach((nota) => {
  textoNotas += ', ' + nota.qtd + ' nota de R$ ' + nota.nota
})

console.log('Troco: R$ ' + troco + textoNotas + '.')
} else {
  console.log('Sem troco')
}
