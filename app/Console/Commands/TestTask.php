<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Indicador;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Storage;

class TestTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'indicadores';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $year = date("Y");
        
        
        //Cantidad de proyectos que se encuentran en proceso al último día hábil del mes.
        $querysindicadorproceso = Proyecto::where('year', $year)->whereIn("estadoproyecto_id",[1,10])->get()->count();

        //Cantidad de proyectos suspendidos al último día hábil del mes.
        $querysindicadorsuspendido = Proyecto::where('year', $year)->whereIn("estadoproyecto_id",[4])->get()->count();
        
        //Cantidad de proyectos acumulados en el mes
        $querysindicadoracumulado = Proyecto::where('year', $year)->whereIn("estadoproyecto_id",[3])->get()->count();
        
        //Cantidad de proyectos terminados en el mes
        $querysindicadorterminado = Proyecto::where('year', $year)->whereIn("estadoproyecto_id",[2,9])->get()->count();
        
        //Cantidad de proyectos con medición de satisfacción realizada en el mes
        $querysindicadormedicion = Proyecto::where('year', $year)->where("measuring",True)->get()->count();
        
        //Cantidad de proyectos con medición satisfactoria en el mes
        $querysindicadorsatisfactorio = Proyecto::where('year', $year)->where("measuring",True)->where("satisfactorio",True)->get()->count();


        $indicador = new Indicador();

        $indicador->name = date("M");
        $indicador->proyectos_procesos = $querysindicadorproceso;
        $indicador->proyectos_suspendidos = $querysindicadorsuspendido;
        $indicador->proyectos_acumulados = $querysindicadoracumulado;
        $indicador->proyectos_terminados = $querysindicadorterminado;
        $indicador->proyectos_con_medicion = $querysindicadormedicion;
        $indicador->proyectos_satisfactorio = $querysindicadorsatisfactorio;
        $indicador->save();

        
    }
}

