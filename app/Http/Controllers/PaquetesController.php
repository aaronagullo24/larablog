<?php

namespace App\Http\Controllers;

use App\Charts\MyChart;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PaquetesController extends Controller
{
    public function charts()
    {
        $chart = new MyChart();
        return view("paquetes.chart", ["chart" => $chart->my_chart()]);
    }

    public function image()
    {

        // create empty canvas with background color
        $img = Image::canvas(100, 100, '#ddd');

        // draw an empty rectangle border
        $img->rectangle(10, 10, 190, 190);

        // draw filled red rectangle
        $img->rectangle(5, 5, 195, 195, function ($draw) {
            $draw->background('#ff0000');
        });

        // draw transparent rectangle with 2px border
        $img->rectangle(5, 5, 195, 195, function ($draw) {
            $draw->background('rgba(255, 255, 255, 0.5)');
            $draw->border(2, '#000');
        });
        /*
        $img = Image::make('logo.png');
        $img->resize(320, 240, function ($contraint) {
            $contraint->aspectRatio();
        });
        $img->insert('1587496534.png');
        */
        $img->save('thumnail.png');
    }
}
