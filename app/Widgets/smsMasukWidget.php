<?php

namespace App\Widgets;

use App\SmsMasuk;
use Arrilot\Widgets\AbstractWidget;

class smsMasukWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    public $reloadTimeout = 20;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $smsMasuk=SmsMasuk::take(5)->get();

        return view('widgets.sms_masuk', [
            'smsMasuk'=>$smsMasuk,
        ]);
    }
}
