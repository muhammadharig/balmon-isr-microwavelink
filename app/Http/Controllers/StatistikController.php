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

            if ($dataTerakhir !== null) {
                $bulan = $dataTerakhir->month;
                $tahun = $dataTerakhir->year;
            } else {
                // Handle the case when $dataTerakhir is null
                $bulan = date(''); // kosongkan
                $tahun = date('Y');
            }
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

    public function bhpStatistik(Request $request)
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

            if ($dataTerakhir !== null) {
                $bulan = $dataTerakhir->month;
                $tahun = $dataTerakhir->year;
            } else {
                // Handle the case when $dataTerakhir is null
                $bulan = date(''); // kosongkan
                $tahun = date('Y');
            }
        }

        // use parameters to get data
        $sum_bhp = DB::table('microwavelinks')
            ->select('city', DB::raw('SUM(bhp) as total'))
            ->whereMonth('mon_query', $bulan)
            ->whereYear('mon_query', $tahun)
            ->groupBy('city')
            ->get();

        // save data to array
        $labels = [];
        $data = [];

        foreach ($sum_bhp as $city) {
            $labels[] = $city->city;
            $data[] = $city->total;
        }

        // send year to select
        $tahuns = Microwavelink::selectRaw('YEAR(mon_query) as tahuns')
            ->distinct()
            ->pluck('tahuns');

        return view('pages.bhp.index')
            ->with('data', $data)
            ->with('labels', $labels)
            ->with('tahuns', $tahuns)
            ->with('bulan', $bulan)
            ->with('tahun', $tahun);

    }

    public function dashboardStatistik(Request $request)
    {
        // Mendapatkan data terakhir isr
        $dataTerakhirIsr = DB::table('microwavelinks')
            ->select(DB::raw('MONTH(mon_query) as month, YEAR(mon_query) as year'))
            ->orderBy('mon_query', 'desc')
            ->first();

        // Jika data terakhir tidak null, kita gunakan bulan dan tahunnya untuk filter data
        if ($dataTerakhirIsr !== null) {
            $count_city = DB::table('microwavelinks')
                ->select('city', DB::raw('COUNT(city) as total'))
                ->whereMonth('mon_query', $dataTerakhirIsr->month)
                ->whereYear('mon_query', $dataTerakhirIsr->year)
                ->groupBy('city')
                ->get();
        } else {
            // Jika tidak ada data terakhir, tampilkan pesan atau beri tindakan yang sesuai
            $dataTerakhirIsr = date('M');
            $dataTerakhirIsr = date('Y');
        }

        // save data to array
        $isrCity = [];
        $isrData = [];

        foreach ($count_city as $city) {
            $isrCity[] = $city->city;
            $isrData[] = $city->total;
        }


        // Mendapatkan data terakhir bhp
        $dataTerakhirBhp = DB::table('microwavelinks')
            ->select(DB::raw('MONTH(mon_query) as month, YEAR(mon_query) as year'))
            ->orderBy('mon_query', 'desc')
            ->first();

        // Jika data terakhir tidak null, kita gunakan bulan dan tahunnya untuk filter data
        if ($dataTerakhirBhp !== null) {
            $sum_bhp = DB::table('microwavelinks')
                ->select('city', DB::raw('SUM(bhp) as total'))
                ->whereMonth('mon_query', $dataTerakhirBhp->month)
                ->whereYear('mon_query', $dataTerakhirBhp->year)
                ->groupBy('city')
                ->get();
        } else {
            // Jika tidak ada data terakhir, tampilkan pesan atau beri tindakan yang sesuai
            return 'Tidak ada data tersedia.';
        }

        // save data to array
        $bhpCity = [];
        $bhpData = [];

        foreach ($sum_bhp as $bhp) {
            $bhpCity[] = $bhp->city;
            $bhpData[] = $bhp->total;
        }

        // dd($isrCity, $isrData, $bhpCity, $bhpData);

        return view('pages.home.dashboard')
            ->with('isrCity', $isrCity)
            ->with('isrData', $isrData)
            ->with('bhpCity', $bhpCity)
            ->with('bhpData', $bhpData);
    }
}
