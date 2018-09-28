<?php

function Data($Tipo) {
    $Dia = date('l');
    switch ($Dia) {
        case 'Monday':
            $Dia = "Segunda-feira";
            break;
        case 'Tuesday':
            $Dia = "Terça-feira";
            break;
        case 'Wednesday':
            $Dia = "Quarta-Feira";
            break;
        case 'Thursday':
            $Dia = "Quinta-feira";
            break;
        case 'Friday':
            $Dia = "Sexta-feira";
            break;
        case 'Saturday':
            $Dia = "Sábado";
            break;
        case 'Sunday':
            $Dia = "Domingo";
            break;
    }

    $Ano_Numero = date('Y');
    $Mes_Numero = date('m');
    $Dia_Numero = date('d');
    $Hora = date('H');
    $Minuto = date('i');
    $Segundo = date('s');

    if ($Tipo == 'Completa') {
        return $Dia . ', ' . $Dia_Numero . '-' . $Mes_Numero . '-' . $Ano_Numero . ' ' . $Hora . ':' . $Minuto . ':' . $Segundo;
    } else if ($Tipo == 'Simples') {
        return $Dia_Numero . '/' . $Mes_Numero . '/' . $Ano_Numero;
    } else if ($Tipo == 'Simplesifan') {
        return $Dia_Numero . '-' . $Mes_Numero . '-' . $Ano_Numero;
    } else if ($Tipo == 'Simples_Invertida') {
        return $Ano_Numero . '-' . $Mes_Numero . '-' . $Dia_Numero;
    } else if ($Tipo == 'Simples_Invertida_Horas') {
        return $Ano_Numero . '-' . $Mes_Numero . '-' . $Dia_Numero . ' ' . $Hora . ':' . $Minuto . ':' . $Segundo;
    } else if ($Tipo == 'Simples_Invertida_Horas_Backup') {
        return $Ano_Numero . '-' . $Mes_Numero . '-' . $Dia_Numero . '_' . $Hora . '-' . $Minuto . '-' . $Segundo;
    } else if ($Tipo == 'SimplesHoras') {
        return $Dia_Numero . '-' . $Mes_Numero . '-' . $Ano_Numero . ' ' . $Hora . ':' . $Minuto . ':' . $Segundo;
    } else if ($Tipo == 'Horas') {
        return $Hora . ':' . $Minuto . ':' . $Segundo;
    } else if ($Tipo == 'Horamin') {
        return $Hora . ':' . $Minuto;
    } else if ($Tipo == 'Dia_Nome') {
        return $Dia;
    } else if ($Tipo == 'Mes_Ano') {
        return $Mes_Numero . '-' . $Ano_Numero;
    } else if ($Tipo == 'Ano') {
        return $Ano_Numero;
    }
}