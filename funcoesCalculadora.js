function mostraEquipe() {
    var equipe = String(document.getElementById('equipe').value);
    var numCar = parseFloat(document.getElementById('numCar').value);

    numCar = numCar.toString().padStart(3, '0');

    // Exibir o resultado
    document.getElementById('resultadoEquipe').innerHTML = "Equipe: " + equipe;
    document.getElementById('numeroCarro').innerHTML = "Carro Nº: " + numCar;
}





function calcularK1() {
    var P = parseFloat(document.getElementById('P').value);
    var D = parseFloat(document.getElementById('D').value/2);
    var d = parseFloat(document.getElementById('d').value);
    var percent = parseFloat(document.getElementById('percent').value);

    var F = ((P/100)*(percent))/2
    var F1 = ((F*D) / d)*10; // kg para N
    F1 = F1*1000;            // mm para M

    var formattedF1 = F1.toLocaleString('pt-BR', { //formata numero para padrao BR
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    document.getElementById('resultadoF1').innerHTML = "F1(K da mola Dianteira) é: " + formattedF1 + "N/m";
}





function calcularK2() {
    var P = parseFloat(document.getElementById('P2').value);
    var D = parseFloat(document.getElementById('D2').value/2);
    var d = parseFloat(document.getElementById('d2').value);
    var percent = parseFloat(document.getElementById('percent2').value);

    var F = ((P/100)*(percent))/2
    var F1 = ((F*D) / d)*10; // kg para N
    F1 = F1*1000;            // mm para M

    var formattedF1 = F1.toLocaleString('pt-BR', { //formata numero para padrao BR
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    document.getElementById('resultadoF2').innerHTML = "F1(K da mola Traseira) é: " + formattedF1 + "N/m";
}





function calcularSeno() {
    var CO = parseFloat(document.getElementById('CO').value/2);
    var HIP = parseFloat(document.getElementById('HIP').value);

    var resultado = CO / HIP;
    var seno = Math.asin(resultado);
    var anguloEmGraus = (seno * 180) / Math.PI;
    var cursorSuspensao = anguloEmGraus * 2;

    var formattedCS = cursorSuspensao.toLocaleString('pt-BR', { //formata numero para padrao BR
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    document.getElementById('resultadoSeno').innerHTML = "Seno= " + resultado;
    document.getElementById('resultadoAngulo').innerHTML = "Ângulo correspondente: " + anguloEmGraus + "°";
    document.getElementById('resultadoCursor').innerHTML = "Curso angular da suspensão: " + formattedCS + "°";
}






function calcularSeno2() {
    var CO = parseFloat(document.getElementById('CO2').value/2);
    var HIP = parseFloat(document.getElementById('HIP2').value);

    var resultado = CO / HIP;
    var seno = Math.asin(resultado);
    var anguloEmGraus = (seno * 180) / Math.PI;
    var cursorSuspensao = anguloEmGraus * 2;

    var formattedCS = cursorSuspensao.toLocaleString('pt-BR', { //formata numero para padrao BR
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    document.getElementById('resultadoSeno2').innerHTML = "Seno= " + resultado;
    document.getElementById('resultadoAngulo2').innerHTML = "Ângulo correspondente: " + anguloEmGraus + "°";
    document.getElementById('resultadoCursor2').innerHTML = "Curso angular da suspensão: " + formattedCS + "°";
}