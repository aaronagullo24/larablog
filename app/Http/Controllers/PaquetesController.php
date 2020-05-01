<?php

namespace App\Http\Controllers;

use App\Charts\MyChart;
use Illuminate\Http\Request;

class PaquetesController extends Controller
{
    public function charts()
    {
        $chart = new MyChart();
        return view("paquetes.chart",["chart"=>$chart->my_chart()]);
        
    }
}
