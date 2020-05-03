<?php

namespace App\Http\Controllers;

use App\User;
use App\Charts\MyChart;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Stichoza\GoogleTranslate\GoogleTranslate;

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

    public function qr_generate()
    {
        QrCode::format('svg')->size(700)->color(255, 0, 0)->generate('Aaron Agullo', '../public/qrcode/qrcode.svg');

        //QrCode::format('png')->merge('https://es.wikipedia.org/wiki/Portable_Network_Graphics#/media/Archivo:PNG_transparency_demonstration_1.png', .3, true)->generate('Aaron Agullo','../public/qrcode/qrcode.png');
    }

    public function translate()
    {
        $tr = new GoogleTranslate('en');
        $tr->setSource('es');
        //$tr->setTarget('en');
        echo $tr->translate('Hola mundo');
    }

    public function strip_create_customer()
    {
        $user = User::find(3);
        $stripCustomer = $user->createAsStripeCustomer();
        dd($stripCustomer);
    }

    public function stripe_payment_method_register()
    {
        $user = User::find(3);
        return view('paquetes.stripe_payment_method_register', [
            'intent' => $user->createSetupIntent()
        ]);
    }

    public function stripe_payment_method_create()
    {
        $user = User::find(3);
        $user->addPaymentMethod('pm_1GeelwKrp59k4j6rW0pIqfz5');
    }

    public function stripe_payment_method()
    {
        $user = User::find(3);
        dd($user->paymentMethods());
    }
}
