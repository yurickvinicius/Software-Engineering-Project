<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;

class MetricasController extends Controller
{
    public function index() {
        $indiceMaturidade = $this->indiceMaturidade();
        $codigoFonte = $this->codigoFonte();
        $totalErros = $this->totalErros();
        $densidadeErros = $this->densidadeErros();
        $esforcoRevisao = $this->esforcoRevisao();

        return view('metricas.metricas', compact('indiceMaturidade', 'codigoFonte', 'totalErros', 'densidadeErros', 'esforcoRevisao'));
    }

    function indiceMaturidade() {
        $indiceMaturidade = [
            $modulos = 6,
            $modulosAlterados = 4,
            $modulosAcrescentados = 2,
            $modulosExcluidos = 0,

            $smi = ($modulos - ($modulosAcrescentados + $modulosAlterados + $modulosExcluidos)) / $modulos,
        ];

        return $indiceMaturidade;
    }

    function codigoFonte() {
        $codigoFonte = [
            $numOperadores = 10,
            $numOperandos = 20,
            $totalOcorrenciaOperador = 20,
            $totalOcorrenciaOperandos = 30,

            $n = ($numOperadores * log($numOperadores, 2)) + ($numOperandos * log($numOperandos, 2)),
            $volumeDoPrograma = number_format(($n * log(($numOperadores + $numOperandos), 2)), 2),
            $volumeMinimo = number_format((2 / $numOperadores) * ($numOperandos / $totalOcorrenciaOperandos), 2),
        ];

        return $codigoFonte;
    }

    function totalErros() {
        $totalErros = [
            $errosSecundarios = 10,
            $errosGraves = 6,
            $total = $errosSecundarios + $errosGraves,
        ];

        return $totalErros;
    }

    function densidadeErros() {
        $densidadeErros = [
            $tamanhoDocumento = 10,
            $tamanhoCodigo = 2500,
            $tps = $tamanhoDocumento + $tamanhoCodigo,
            $totalErros = $this->totalErros(),
            $densidade = $totalErros[2] / $tps,
            // 98166772
        ];

        return $densidadeErros;
    }

    function esforcoRevisao() {
        $esforcoRevisao = [
            $esforcoPreparacao = 12,
            $esforcoAvaliacao = 19,
            $reformulacaoEsforco = 9,
            $esforco = $esforcoPreparacao + $esforcoAvaliacao + $reformulacaoEsforco,
        ];

        return $esforcoRevisao;
    }
}
