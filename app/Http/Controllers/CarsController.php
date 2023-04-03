<?php

namespace App\Http\Controllers;

use App\Models\brands;
use App\Models\cars;
use App\Models\check;
use App\Models\owners;
use App\Models\typeCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CarsController extends Controller
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
        // session()->put('test', 'nguoi dung 1');
        // $value = session()->get('test', 'default');
        // dd($value);
        $cars = cars::all();
        $brands = brands::all();
        $types = typeCar::all();
        return view('pages.list-car', compact('cars', 'brands', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = brands::all();
        $types = typeCar::all();
        return view('pages.add-car', compact('brands', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = check::create([
            'TinhTrang' => '0',
            'TrangThaiCheck' => '0',
            'DenBu' => '0',
        ]);
        $thumbImage = $request->file('thumbImg');
        $fileThumbName = time() . '.' . $thumbImage->getClientOriginalName();
        $storedPath = $thumbImage->move('images', $fileThumbName, $thumbImage->getClientOriginalName());

        $desImages = $request->file('desImgs');
        $files = '';
        foreach ($desImages as $image) {
            $fileDesName = time() . '.' . $image->getClientOriginalName();
            $storedPath = $image->move('images', $fileDesName, $image->getClientOriginalName());
            $files .= $storedPath . '|';
        }
        $finalPath = trim($files, "|");
        $checkNCC = owners::where('CMT', $request['CMTOwner'])->first();
        if (!$checkNCC) {
            $nhaCC = owners::create([
                'TenChuXe' => $request['nameOwner'],
                'CMT' => $request['CMTOwner'],
                'SDT' => $request['SDTOwner'],
            ]);
            $car = cars::create([
                'TenXe' => $request['nameCar'],
                'idLoaiXe' => $request['typeCar'],
                'idNhaCungCap' => $nhaCC->id,
                'DoiXe' => $request['date'],
                'BienSo' => $request['plate'],
                'MauSon' => $request['color'],
                'idThuongHieu' => $request['brand'],
                'GiaThueNgay' => $request['priceD'],
                'GiaThueThang' => '0',
                'TinhTrang' => '4',
                'SoCho' => $request['seats'],
                'DungTich' => $request['capacity'],
                'SoKhung' => $request['soKhung'],
                'SoMay' => $request['soMay'],
                'DangKyLanDau' => $request['dangKy'],
                'HetDangKiem' => $request['hanDangKiem'],
                'HetHanBaoHiem' => $request['baoHiem'],
                'GhiChu' => $request['note'],
                'HinhAnh' => 'images/' . $fileThumbName,
                'AnhMoTa' => $finalPath,
                'idCheck' => $check->id,
            ]);
            if ($car) {
                return redirect('/danh-sach-xe')->with('success', 'Thêm xe thành công !');
            }

            return redirect('/danh-sach-xe')->with('error', 'Thêm xe không thành công !');
        }
        $car = cars::create([
            'TenXe' => $request['nameCar'],
            'idLoaiXe' => $request['typeCar'],
            'idNhaCungCap' => $checkNCC->id,
            'DoiXe' => $request['date'],
            'BienSo' => $request['plate'],
            'MauSon' => $request['color'],
            'idThuongHieu' => $request['brand'],
            'GiaThueNgay' => $request['priceD'],
            'GiaThueThang' => '0',
            'TinhTrang' => '4',
            'SoCho' => $request['seats'],
            'DungTich' => $request['capacity'],
            'SoKhung' => $request['soKhung'],
            'SoMay' => $request['soMay'],
            'DangKyLanDau' => $request['dangKy'],
            'HetDangKiem' => $request['hanDangKiem'],
            'HetHanBaoHiem' => $request['baoHiem'],
            'GhiChu' => $request['note'],
            'HinhAnh' => 'images/' . $fileThumbName,
            'AnhMoTa' => $finalPath,
            'idCheck' => $check->id,
        ]);

        if ($car) {
            return redirect('/danh-sach-xe')->with('success', 'Thêm xe thành công !');
        }

        return redirect('/danh-sach-xe')->with('error', 'Thêm xe không thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(cars $cars, $id)
    {
        $car = cars::find($id);
        $images = explode("|", $car->AnhMoTa);
        return view('pages.detail-car', compact('car', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function edit(cars $cars, $id)
    {
        $car = cars::find($id);
        $brands = brands::all();
        $types = typeCar::all();
        $images = ($car->AnhMoTa) ? explode("|", $car->AnhMoTa) : [];
        return view('pages.edit-car', compact('car', 'types', 'brands', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = cars::find($id);
        if ($request->file('thumbImg')) {
            $thumbImage = $request->file('thumbImg');
            $fileThumbName = time() . '.' . $thumbImage->getClientOriginalName();
            $storedPath = $thumbImage->move('images', $fileThumbName, $thumbImage->getClientOriginalName());
            $car->HinhAnh = 'images/' . $fileThumbName;
            $car->save();
        }
        if ($request->file('desImgs')) {
            $desImages = $request->file('desImgs');
            $files = $request['oldPath'];
            foreach ($desImages as $image) {
                $fileDesName = time() . '.' . $image->getClientOriginalName();
                $storedPath = $image->move('images', $fileDesName, $image->getClientOriginalName());
                $files .= $storedPath . '|';
            }
            $finalPath = trim($files, "|");
            $car->AnhMoTa = $finalPath;
            $car->save();
        }
        $checkNCC = owners::where('CMT', $request['CMTOwner'])->first();
        $idNCC = '';
        if ($checkNCC) {
            $idNCC = $checkNCC->id;
        }
        if (!$checkNCC) {
            $nhaCC = owners::create([
                'TenChuXe' => $request['nameOwner'],
                'CMT' => $request['CMTOwner'],
                'SDT' => $request['SDTOwner'],
            ]);
            $idNCC = $nhaCC->id;
        }
        if ($car) {
            $car->TenXe = $request['nameCar'];
            $car->idLoaiXe = $request['typeCar'];
            $car->idNhaCungCap = $idNCC;
            $car->DoiXe = $request['date'];
            $car->BienSo = $request['plate'];
            $car->MauSon = $request['color'];
            $car->idThuongHieu = $request['brand'];
            $car->GiaThueNgay = $request['priceD'];
            $car->GiaThueThang = $request['priceM'];
            $car->TinhTrang = $request['status'];
            $car->SoCho = $request['seats'];
            $car->DungTich = $request['capacity'];
            $car->SoKhung = $request['soKhung'];
            $car->SoMay = $request['soMay'];
            $car->DangKyLanDau = $request['dangKy'];
            $car->HetDangKiem = $request['hanDangKiem'];
            $car->HetHanBaoHiem = $request['baoHiem'];
            $car->GhiChu = $request['note'];
            if (!$request->file('desImgs')) {
                $car->AnhMoTa = trim($request['oldPath'], "|");
            }
            $car->save();
            return redirect('/danh-sach-xe')->with('success', 'cập nhật thông tin xe thành công');
        }
        return redirect('/danh-sach-xe')->with('error', 'xe không tồn tại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(cars $cars, $id)
    {
        $car = cars::find($id);
        if ($car) {
            $delete = $car->delete();
            if ($delete) {
                return redirect('/danh-sach-xe')->with('success', 'xóa xe thành công');
            } else {
                return redirect('/danh-sach-xe')->with('error', 'xóa xe không thành công');
            }
        } else {
            return redirect('/danh-sach-xe')->with('error', 'xe không tồn tại');
        }
    }
}
