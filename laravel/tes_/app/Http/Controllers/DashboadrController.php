<?php

namespace App\Http\Controllers;

use App\Models\Born;
use App\Models\Come;
use App\Models\Death;
use App\Models\FamilyCard;
use App\Models\Move;
use App\Models\Resident;
use Illuminate\Http\Request;

class DashboadrController extends Controller
{
    public function index()
    {
        $residents = Resident::count();
        $kk = FamilyCard::count();
        $lk = Resident::where('gender', 'LK')->get();
        $pr = Resident::where('gender', 'PR')->get();
        $borns = Born::count();
        $dies = Death::count();
        $comes = Come::count();
        $moves = Move::count();

        $date = date('Y');

        $datang = [
            'Jan' => Come::whereMonth('tanggal_datang', 1)->whereYear('tanggal_datang', $date)->count(),
            'Feb' => Come::whereMonth('tanggal_datang', 2)->whereYear('tanggal_datang', $date)->count(),
            'March' => Come::whereMonth('tanggal_datang', 3)->whereYear('tanggal_datang', $date)->count(),
            'April' => Come::whereMonth('tanggal_datang', 4)->whereYear('tanggal_datang', $date)->count(),
            'May' => Come::whereMonth('tanggal_datang', 5)->whereYear('tanggal_datang', $date)->count(),
            'June' => Come::whereMonth('tanggal_datang', 6)->whereYear('tanggal_datang', $date)->count(),
            'July' => Come::whereMonth('tanggal_datang', 7)->whereYear('tanggal_datang', $date)->count(),
            'Aug' => Come::whereMonth('tanggal_datang', 8)->whereYear('tanggal_datang', $date)->count(),
            'Sept' => Come::whereMonth('tanggal_datang', 9)->whereYear('tanggal_datang', $date)->count(),
            'Okt' => Come::whereMonth('tanggal_datang', 10)->whereYear('tanggal_datang', $date)->count(),
            'Nov' => Come::whereMonth('tanggal_datang', 11)->whereYear('tanggal_datang', $date)->count(),
            'Dec' => Come::whereMonth('tanggal_datang', 12)->whereYear('tanggal_datang', $date)->count(),
        ];

        $pindah = [
            'Jan' => Move::whereMonth('tanggal_pindah', 1)->whereYear('tanggal_pindah', $date)->count(),
            'Feb' => Move::whereMonth('tanggal_pindah', 2)->whereYear('tanggal_pindah', $date)->count(),
            'March' => Move::whereMonth('tanggal_pindah', 3)->whereYear('tanggal_pindah', $date)->count(),
            'April' => Move::whereMonth('tanggal_pindah', 4)->whereYear('tanggal_pindah', $date)->count(),
            'May' => Move::whereMonth('tanggal_pindah', 5)->whereYear('tanggal_pindah', $date)->count(),
            'June' => Move::whereMonth('tanggal_pindah', 6)->whereYear('tanggal_pindah', $date)->count(),
            'July' => Move::whereMonth('tanggal_pindah', 7)->whereYear('tanggal_pindah', $date)->count(),
            'Aug' => Move::whereMonth('tanggal_pindah', 8)->whereYear('tanggal_pindah', $date)->count(),
            'Sept' => Move::whereMonth('tanggal_pindah', 9)->whereYear('tanggal_pindah', $date)->count(),
            'Okt' => Move::whereMonth('tanggal_pindah', 10)->whereYear('tanggal_pindah', $date)->count(),
            'Nov' => Move::whereMonth('tanggal_pindah', 11)->whereYear('tanggal_pindah', $date)->count(),
            'Dec' => Move::whereMonth('tanggal_pindah', 12)->whereYear('tanggal_pindah', $date)->count(),
        ];

        // dd(date('Y'));

        return view('pages.dashboard', [
            'residents' => $residents,
            'kk' => $kk,
            'lk' => $lk,
            'pr' => $pr,
            'borns' => $borns,
            'dies' => $dies,
            'comes' => $comes,
            'moves' => $moves,
            'datang' => $datang,
            'pindah' => $pindah
        ]);
    }
}
