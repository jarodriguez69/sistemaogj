<?php

namespace App\Enums;

enum ProjectStatusEnum: int
{
    case PROCESOPLANIFICACION = 1;
    case TERMINADOCIERRE = 2;
    case ACUMULADO = 3;
    case SUSPENDIDO = 4;
    case TERMINADOCONACTIVIDADES = 9;
    case PROCESOEJECUCION = 10;
    case INICIO = 11;
}