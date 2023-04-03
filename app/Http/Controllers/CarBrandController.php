<?php

namespace App\Http\Controllers;

use App\Models\brands;
use App\Models\carBrand;
use App\Models\nation;
use Illuminate\Http\Request;

class CarBrandController extends Controller
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
        $brands = brands::all();
        return view('pages.brands', compact('brands'));
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
        $code = explode("-", $request['nations'])[0];
        $tenquocgia = explode("-", $request['nations'])[1];
        $nation = nation::where('MaQuocGia', $code)->first();
        $brand = brands::where('TenThuongHieu', $request['nameBrand'])->first();
        if (!$nation && !$brand) {
            $newNation = nation::create([
                'MaQuocGia' => $code,
                'TenQuocGia' => $tenquocgia,
            ]);
            brands::create([
                'TenThuongHieu' => $request['nameBrand'],
                'idQuocGia' => $newNation->id,
            ]);
            return redirect('/them-thuong-hieu')->with('success', 'Thêm thành công!');
        }
        if ($nation && !$brand) {
            brands::create([
                'TenThuongHieu' => $request['nameBrand'],
                'idQuocGia' => $nation->id,
            ]);
            return redirect('/them-thuong-hieu')->with('success', 'Thêm thành công!');
        }
        if ($brand) {
            return redirect('/them-thuong-hieu')->with('error', 'Thương hiệu đã tồn tại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carBrand  $carBrand
     * @return \Illuminate\Http\Response
     */
    public function show($carBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carBrand  $carBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(brands $carBrand, $id)
    {
        $brand = brands::find($id);
        if ($brand) {
            return [
                'name' => $brand->TenThuongHieu,
                'note' => $brand->GhiChu,
                'nation' => $brand->nation->MaQuocGia
            ];
        }
        return [
            'message' => 'không tồn lại loại xe này',
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carBrand  $carBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $code = explode("-", $request['nation'])[0];
        $tenquocgia = explode("-", $request['nation'])[1];
        $nation = nation::where('MaQuocGia', $code)->first();
        $brand = brands::find($id);
        if (!$nation) {
            $newNation = nation::create([
                'MaQuocGia' => $code,
                'TenQuocGia' => $tenquocgia,
            ]);
            $brand = brands::find($id);
            $brand->TenThuongHieu = $request['nameBrand'];
            $brand->idQuocGia = $newNation->id;
            $brand->GhiChu = $request['note'];
            $brand->save();
            return redirect('/them-thuong-hieu')->with('success', 'Sửa thành công!');
        }
        $brand = brands::find($id);
        $brand->TenThuongHieu = $request['nameBrand'];
        $brand->idQuocGia = $nation->id;
        $brand->GhiChu = $request['note'];
        $brand->save();
        return redirect('/them-thuong-hieu')->with('success', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carBrand  $carBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy($carBrand)
    {
        //
    }
}
