<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\brands;
use App\Models\carsLeases;
use App\Models\check;
use App\Models\typeCar;
use App\Models\leases;
use Illuminate\Http\Request;
use Exception;
use \PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Alignment;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Style\Table as TableStyle;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\SimpleType\TblWidth;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\IOFactory;


class LeaseController extends Controller
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
        $cars = cars::where('TinhTrang', '<', '3')->get();
        $brands = brands::all();
        $types = typeCar::all();
        return view('pages.list-cho-thue', compact('cars', 'brands', 'types'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function luuKho($id)
    {
        $lease = leases::find($id);
        $lease->TrangThai = '4';
        $lease->save();
        $car = cars::where('idCheck', $lease->idKTS)->first();
        $car->idChoThue = null;
        $car->save();
        return redirect('/thanh-toan-thue-xe')->with('success', 'lưu thành công');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanhtoan()
    {
        $checks = check::where('TrangThaiCheck', '2')->get();
        $idCheck = [];
        foreach ($checks as $key => $item) {
            array_push($idCheck, $item->id);
        }
        $phieuThue = leases::whereIn('idKTS', $idCheck)->where('TrangThai', '3')->get();
        return view('pages.list-phieu-thue', compact('phieuThue'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ketThucThue($id)
    {
        $lease = leases::find($id);
        $backcheck = check::find($lease->idKTS);
        $frontcheck = check::find($lease->idKTT);
        $car = cars::where('idCheck', $backcheck->id)->first();
        $detailCheck = $backcheck->detail;
        $denBu = [];
        $tienDenBu = 0;
        $tienThue = $lease->TienThue;
        $tienCoc = $lease->TamUng;
        foreach ($detailCheck as $key => $value) {
            if ($value->Gia > 0) {
                $tienDenBu += $value->Gia + ($value->Gia * 15 / 100);
                array_push($denBu, $value);
            }
        }
        $phuThu = $lease->PhuThu;
        $lease->TienDenBu = $tienDenBu;
        $lease->ThanhTien = $tienThue + $tienDenBu + $phuThu - $tienCoc;
        $lease->save();
        return view('pages.phieu-thanh-toan', compact('lease', 'car', 'backcheck', 'frontcheck', 'denBu'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function traxe()
    {
        return view('pages.phieu-tra-xe');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nhanxe($id)
    {
        $check = check::create([
            'TrangThaiCheck' => '0',
            'TinhTrang' => '0',
            'DenBu' => '0',
        ]);
        $lease = leases::find($id);
        $lease->TrangThai = '3';
        $lease->idKTS = $check->id;
        $lease->save();

        return redirect('/tra-xe')->with('success', 'nhận xe thành công');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $car = cars::find($id);
        $car->TinhTrang = '0';
        $car->save();
        $images = ($car->AnhMoTa) ? explode("|", $car->AnhMoTa) : [];
        return view('pages.phieu-coc', compact('car', 'images'));
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
            'TrangThaiCheck' => '0',
            'TinhTrang' => '0',
            'DenBu' => '0',
        ]);
        $phuThu = 0;
        $diaChiGiaoHang = '0';
        if ($request['giaoTanNoi']) {
            $phuThu = 100000;
            $diaChiGiaoHang = $request['noteGiaoXe'];
        }
        $phieuThue = leases::create([
            'TrangThai' => '1',
            'TenNguoiThue' => $request['TenNguoiThue'],
            'SoDienThoai' => $request['SoDienThoai'],
            'CMNDT' => $request['cmtNguoiThue'],
            'NgayThue' => $request['ngayNhan'],
            'NgayTra' => $request['ngayTra'],
            'SoNgayThue' => $request['soNgayThue'],
            'TamUng' => $request['TamUng'],
            'TienThue' => $request['thanhTien'],
            'GhiChuNhanHang' => $request['note'],
            'ThanhTien' => '0',
            'GhiChuPhuThu' => $diaChiGiaoHang,
            'CMNDS' => '0',
            'TienDenBu' => '0',
            'PhuThu' => $phuThu,
            'ThanhTien' => '0',
            'idKTT' => $check->id,
        ]);
        $idPhieuThue = $phieuThue->id;
        $car = cars::find($request['idXe']);
        $car->idChoThue = $idPhieuThue;
        $car->idCheck = $check->id;
        $car->save();
        $lienKet = carsLeases::create([
            'idXe' => $request['idXe'],
            'idChoThue' => $idPhieuThue,
        ]);

        if ($lienKet) {
            return redirect('/danh-sach-cho-thue')->with('success', 'đặt cọc xe thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = cars::find($id);
        $images = ($car->AnhMoTa) ? explode("|", $car->AnhMoTa) : [];
        return view('pages.thong-tin-thue', compact('car', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function result(Request $request)
    {
        $data = json_decode($request->getContent());
        $lease = leases::find($data->idPhieu);
        $car = cars::where('idChoThue', '=', $lease->id)->first();
        $KTT = check::find($lease->idKTT);
        $typeCar = $car->typeCar->TenLoaiXe;
        $thuongHieu = $car->brand->TenThuongHieu;
        if ($car->TinhTrang == 1) {
            $tinhTrangXe = 'Tốt';
        }
        if ($car->TinhTrang == 2) {
            $tinhTrangXe = 'Trung Bình';
        }
        if ($car->TinhTrang == 3) {
            $tinhTrangXe = 'Cần bảo trì';
        }
        return [
            'thongTinThue' => $lease,
            'thongTinXe' => $car,
            'KTT' => $KTT,
            'typeCar' => $typeCar,
            'thuongHieu' => $thuongHieu,
            'tinhTrangXe' => $tinhTrangXe,
            'message' => 'lấy phiếu thành công'
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $car = cars::find($id);
        $lease = leases::find($car->idChoThue);
        Settings::setZipClass(Settings::PCLZIP);
        $lease->TrangThai = 2;
        $lease->save();

        // Tạo một đối tượng PhpWord mới
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        // Thêm một trang mới vào tài liệu
        $section = $phpWord->addSection(['colsSpace' => true]);

        $phpWord->addTitleStyle('title', ['bold' => true, 'size' => 20]);
        $section->addTitle('THÔNG TIN PHIẾU THUÊ', 'title');
        $section->addTextBreak();
        $section->addTextBreak();

        $phpWord->addTitleStyle('title2', ['bold' => true, 'size' => 18]);
        $section->addTitle('Mã số phiếu: ' . $lease->id, 'title2');
        $section->addTextBreak();
        $tableStyle = array(
            'borderColor' => '006699',
            'borderSize' => 6,
            'cellMargin' => 50
        );

        $firstRowStyle = array('bgColor' => '66BBFF');

        $phpWord->addTableStyle('myTable1', $tableStyle, $firstRowStyle);
        $phpWord->addTableStyle('myTable2', $tableStyle, $firstRowStyle);
        $phpWord->addTableStyle('myTable3', $tableStyle, $firstRowStyle);

        $table = $section->addTable('myTable1');

        $table->addRow();
        $table->addCell(4000)->addText('Thông tin xe');
        $table->addCell(2000);

        $table->addRow();
        $table->addCell(4000)->addText('Tên xe');
        $table->addCell(4000)->addText($car->TenXe);

        $table->addRow();
        $table->addCell(4000)->addText('Thương hiệu');
        $table->addCell(4000)->addText($car->brand->TenThuongHieu);

        $table->addRow();
        $table->addCell(4000)->addText('Loại xe');
        $table->addCell(4000)->addText($car->typeCar->TenLoaiXe);

        $table->addRow();
        $table->addCell(4000)->addText('Biển số');
        $table->addCell(4000)->addText($car->BienSo);

        $table->addRow();
        $table->addCell(4000)->addText('Số ghế');
        $table->addCell(4000)->addText($car->SoCho);

        $table->addRow();
        $table->addCell(4000)->addText('Giá thuê');
        $table->addCell(4000)->addText($car->GiaThueNgay);

        $section->addTextBreak();
        //bảng 2
        $table2 = $section->addTable('myTable2');

        $table2->addRow();
        $table2->addCell(4000)->addText('Thông tin người thuê');
        $table2->addCell(2000);

        $table2->addRow();
        $table2->addCell(4000)->addText('Tên người thuê');
        $table2->addCell(4000)->addText($lease->TenNguoiThue);

        $table2->addRow();
        $table2->addCell(4000)->addText('Số điện thoại');
        $table2->addCell(4000)->addText($lease->SoDienThoai);

        $table2->addRow();
        $table2->addCell(4000)->addText('Số căn cước');
        $table2->addCell(4000)->addText($lease->CMNDT);

        $table2->addRow();
        $table2->addCell(4000)->addText('Ngày thuê xe');
        $table2->addCell(4000)->addText($lease->NgayThue);

        $table2->addRow();
        $table2->addCell(4000)->addText('Hạn trả xe');
        $table2->addCell(4000)->addText($lease->NgayTra);

        $table2->addRow();
        $table2->addCell(4000)->addText('Giao xe tận nơi');
        $table2->addCell(4000)->addText($lease->PhuThu == 0 ? 'Không' : 'Có');

        $table2->addRow();
        $table2->addCell(4000)->addText('Địa chỉ giao xe');
        $table2->addCell(4000)->addText($lease->GhiChuPhuThu);

        $table2->addRow();
        $table2->addCell(4000)->addText('Ghi chú');
        $table2->addCell(4000)->addText($lease->GhiChuNhanHang);

        $section->addTextBreak();
        // bảng 3

        $table3 = $section->addTable('myTable3');

        $table3->addRow();
        $table3->addCell(4000)->addText('Chi phí');
        $table3->addCell(2000);

        $table3->addRow();
        $table3->addCell(4000)->addText('Tiền cọc');
        $table3->addCell(4000)->addText(number_format($lease->TamUng) . ' VND');

        $table3->addRow();
        $table3->addCell(4000)->addText('Tiền thuê');
        $table3->addCell(4000)->addText(number_format($lease->TienThue) . ' VND');

        $fileName = 'Phieu' . $lease->id . '-' . $lease->TenNguoiThue . '.docx';

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($fileName);

        session()->flash('download.in.the.next.request', $fileName);
        return Redirect('/danh-sach-cho-thue')->with('success', 'xuất xe thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
