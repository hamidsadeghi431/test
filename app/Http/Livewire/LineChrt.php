<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireCharts\Models\LineChartModel;

class LineChrt
{
    public static $in;
    public static $sum;

    /**
     * @return mixed
     */
    public static function getIn()
    {
        return self::$in;
    }

    /**
     * @param mixed $in
     */
    public static function setIn($in,$grpby,$sum,$click): void
    {
        self::$in = $in;
        self::$sum=$sum;

        $multiChartModel1=(new LineChartModel())->setSmoothCurve();
        foreach ($in as $item)
        {
                    if ($grpby == 1)
                    {
                        if ($sum == 'priceMonth'?$multiChartModel1->addPoint($item->cons_month,$item->priceMonth):$multiChartModel1->addPoint($item->fromDate,$item->pwrConsTotal));
                    }
                    elseif ($grpby == 2)
                    {
                        if ($sum == 'priceMonth'?$multiChartModel1->addPoint($item->cons_day,$item->priceMonth):$multiChartModel1->addPoint($item->cons_day,$item->total_cons));
                    }
                    elseif ($grpby == 3)
                    {
                        if ($sum == 'priceMonth'?$multiChartModel1->addPoint($item->cons_time,$item->priceMonth):$multiChartModel1->addPoint($item->cons_time,$item->total_cons));
                    }
        }
        self::$in = $multiChartModel1;
    }


}
