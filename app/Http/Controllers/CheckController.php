<?php

namespace App\Http\Controllers;

use App\Models\brands;
use App\Models\cars;
use App\Models\check;
use App\Models\detailCheck;
use App\Models\leases;
use App\Models\typeCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckController extends Controller
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
        $normalCheck = cars::whereNull('idChoThue')->where('TinhTrang', '4')->get();
        $checksLease = check::where('TrangThaiCheck', '0')->get();
        $leaseArr = [];
        foreach ($checksLease as $key => $item) {
            array_push($leaseArr, $item->id);
        }
        $leasesFrontCheck = leases::whereIn('idKTT', $leaseArr)->get();
        $leasesBackCheck = leases::whereIn('idKTS', $leaseArr)->get();
        $listFrontCheck = [];
        $listBackCheck = [];
        foreach ($leasesFrontCheck as $key => $item) {
            array_push($listFrontCheck, $item->lease[0]);
        }
        foreach ($leasesBackCheck as $key => $item) {
            array_push($listBackCheck, $item->lease[0]);
        }
        return view('pages.danh-sach-kiem-tra', compact('normalCheck', 'listFrontCheck', 'listBackCheck'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $car = cars::find($id);
        $check = check::find($car->idCheck);
        return view('pages.phieu-kiem-tra', compact('car', 'check'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function luuphieunhanxe(Request $request, $id)
    {
        $check = check::find($id);
        $check->TinhTrang = $request->danhGia;
        $check->TrangThaiCheck = '2';
        $check->save();
        foreach ($request->tenPhuTung as $index => $item) {
            detailCheck::create([
                'TenThietBi' => $item,
                'TrangThai' => $request->tinhTrang[$index],
                'XuLy' => $request->xuLy[$index],
                'Gia' => $request->giaKhacPhuc[$index],
                'idCheck' => $id,
            ]);
        }
        $car = cars::find($request->idXe);
        $car->TinhTrang = $request->danhGia;
        $car->idCheck = $id;
        $car->save();
        return redirect('/danh-sach-kiem-tra')->with('success', 'lưu thành công');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nhanxe($id)
    {
        $lease = leases::where('idKTS', $id)->first();
        $frontCheck = check::find($lease->idKTT);
        $backCheck = check::find($id);
        $car = $lease->lease[0]->car;
        return view('pages.phieu-kiem-tra-nhan-xe', compact('car', 'frontCheck', 'backCheck'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent());
        if ($data) {
            $check = check::find($data->idPhieuCheck);
            $check->TrangThaiCheck = '1';
            $check->save();
            foreach ($data->itemNames as $index => $item) {
                $check = detailCheck::where('TenThietBi', $item)->where('idCheck', $data->idPhieuCheck)->first();
                if ($check) {
                    $check->TrangThai = $data->statuses[$index];
                    $check->XuLy = $data->actions[$index];
                    $check->Gia = $data->prices[$index];
                    $check->save();
                } else {
                    detailCheck::create([
                        'TenThietBi' => $item,
                        'TrangThai' => $data->statuses[$index],
                        'XuLy' => $data->actions[$index],
                        'Gia' => $data->prices[$index],
                        'idCheck' => $data->idPhieuCheck,
                    ]);
                }
            }
            return [
                'message' => 'lưu thành công'
            ];
        } else {
            $car = cars::find($request->idXe);
            $car->TinhTrang = $request->danhGia;
            $car->save();
            $check = check::find($request->idPhieuCheck);
            $check->TinhTrang = $request->danhGia;
            $check->TrangThaiCheck = '2';
            $check->save();
            detailCheck::where('idCheck', '=', $request->idPhieuCheck)->delete();
            foreach ($request->tenPhuTung as $index => $item) {
                detailCheck::create([
                    'TenThietBi' => $item,
                    'TrangThai' => $request->tinhTrang[$index],
                    'XuLy' => $request->xuLy[$index],
                    'Gia' => $request->giaKhacPhuc[$index],
                    'idCheck' => $request->idPhieuCheck,
                ]);
            }
            return redirect('/danh-sach-kiem-tra')->with('success', 'lưu thành công');
        }
    }

    public function kiemTraDinhKy($id)
    {
        $car = cars::find($id);
        $check = check::find($car->idCheck);
        return view('pages.phieu-kiem-tra', compact('car', 'check'));
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
}
