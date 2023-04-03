<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\detailCheck;
use App\Models\leases;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xeHienCo = cars::all();
        $dangChoThue = cars::whereNotNull('idChoThue')->get();
        $phieuDaThu = leases::where('TrangThai', '4')->get();
        $demSoLanLap = DB::table('cars_leases')->select('idXe', DB::raw('count(*) as count'))->groupBy('idXe')->orderBy('count', 'desc')->take(5)->get();
        $xeThueNhieu = [];
        foreach ($demSoLanLap as $key => $value) {
            $xeThueNhieu[$key] = ['ttx' => cars::find($value->idXe), 'solanthue' => $value->count];
        }
        $boPhanKiemTra = detailCheck::all();
        $tongThu = 0;
        $tongChi = 0;
        foreach ($phieuDaThu as $key => $value) {
            $tongThu += $value->ThanhTien + $value->TamUng;
        }
        foreach ($boPhanKiemTra as $key => $value) {
            $tongChi += $value->Gia;
        }
        $sauThangGanDay = [];
        for ($i = 1; $i < 7; $i++) {
            $loiNhuan = 0;
            $value = leases::whereBetween('updated_at', [Carbon::now()->subMonth($i)->lastOfMonth(), Carbon::now()->subMonth($i - 1)->lastOfMonth()])->get(['ThanhTien', 'TamUng']);
            if (count($value) > 0) {
                foreach ($value as $key => $item) {
                    $loiNhuan += $item->ThanhTien + $item->TamUng;
                }
            }
            array_push($sauThangGanDay, $loiNhuan);
        }
        $chiSauThangGanDay = [];
        for ($i = 1; $i < 7; $i++) {
            $Gia = 0;
            $value = detailCheck::whereBetween('updated_at', [Carbon::now()->subMonth($i)->lastOfMonth(), Carbon::now()->subMonth($i - 1)->lastOfMonth()])->get(['Gia']);
            if (count($value) > 0) {
                foreach ($value as $key => $item) {
                    $Gia += $item->Gia;
                }
            }
            array_push($chiSauThangGanDay, $Gia);
        }
        return view('pages.dashboard', compact('xeHienCo', 'dangChoThue', 'tongThu', 'tongChi', 'sauThangGanDay', 'chiSauThangGanDay', 'xeThueNhieu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
    }
}
