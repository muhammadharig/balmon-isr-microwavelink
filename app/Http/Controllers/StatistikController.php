<?php

namespace App\Http\Controllers;

use App\Models\Microwavelink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function isrStatistik(Request $request)
    {
        // get parameters month and year
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // if month and year is null
        if (empty($bulan) || empty($tahun)) {
            $dataTerakhir = DB::table('microwavelinks')
                ->select(DB::raw('MONTH(mon_query) as month, YEAR(mon_query) as year'))
                ->orderBy('mon_query', 'desc')
                ->first();

            $bulan = $dataTerakhir->month;
            $tahun = $dataTerakhir->year;
        }

        // use parameters to get data
        $count_city = DB::table('microwavelinks')
            ->select('city', DB::raw('COUNT(city) as total'))
            ->whereMonth('mon_query', $bulan)
            ->whereYear('mon_query', $tahun)
            ->groupBy('city')
            ->get();

        // save data to array
        $labels = [];
        $data = [];

        foreach ($count_city as $city) {
            $labels[] = $city->city;
            $data[] = $city->total;
        }

        // send year to select
        $tahuns = Microwavelink::selectRaw('YEAR(mon_query) as tahuns')
            ->distinct()
            ->pluck('tahuns');

        // dd($tahuns);
        return view('pages.isr.index')
            ->with('data', $data)
            ->with('labels', $labels)
            ->with('tahuns', $tahuns)
            ->with('bulan', $bulan)
            ->with('tahun', $tahun);
    }
}
