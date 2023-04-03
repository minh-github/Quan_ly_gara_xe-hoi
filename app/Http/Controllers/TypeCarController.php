<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\typeCar;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class TypeCarController extends Controller
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
        $typeCar = typeCar::all();
        return view('pages.typecar', compact('typeCar'));
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
        $type = typeCar::create([
            'TenLoaiXe' => $request['nameType'],
            'GhiChu' => $request['note'],
        ]);
        if ($type) {
            return redirect('/them-loai-xe')->with('success', 'Thêm loại thành công !');
        }

        return redirect('/them-loai-xe')->with('error', 'Thêm loại xe không thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\typeCar  $typeCar
     * @return \Illuminate\Http\Response
     */
    public function show(typeCar $typeCar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\typeCar  $typeCar
     * @return \Illuminate\Http\Response
     */
    public function edit(typeCar $typeCar, $id)
    {
        $typeCar = typeCar::find($id);
        if ($typeCar) {
            return [
                'name' => $typeCar->TenLoaiXe,
                'note' => $typeCar->GhiChu,
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
     * @param  \App\Models\typeCar  $typeCar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, typeCar $typeCar, $id)
    {
        $type = typeCar::find($id);
        $type->TenLoaiXe = $request['nameType'];
        $type->GhiChu = $request['note'];
        $type->save();
        return redirect('/them-loai-xe')->with('success', 'Sửa thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\typeCar  $typeCar
     * @return \Illuminate\Http\Response
     */
    public function destroy(typeCar $typeCar, $id)
    {
        $type = typeCar::find($id);
        if ($type) {
            $delete = $type->delete();
            if ($delete) {
                return redirect('/them-loai-xe')->with('success', 'xóa loại xe thành công');
            } else {
                return redirect('/them-loai-xe')->with('error', 'xóa loại xe không thành công');
            }
        } else {
            return redirect('/them-loai-xe')->with('error', 'loại xe không tồn tại');
        }
    }
}
