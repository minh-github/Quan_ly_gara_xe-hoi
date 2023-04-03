@extends('index')
@section('content')
    <div class="contents">
        <div class="demo2 mb-25 t-thead-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Trang chủ</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Trang
                                                chủ</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-sm-6 col-ssm-12 mb-25">
                        <div
                            class="ap-po-details ap-po-details--luodcy overview-card-shape radius-xl d-flex justify-content-between">
                            <div class="ap-po-details-content d-flex justify-content-between w-100 flex-wrap">
                                <div class="ap-po-details__titlebar">
                                    <p>Tổng xe hiện có</p>
                                    <h1>{{ count($xeHienCo) }}</h1>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xxl-3 col-sm-6 col-ssm-12 mb-25">

                        <div
                            class="ap-po-details ap-po-details--luodcy overview-card-shape radius-xl d-flex justify-content-between">
                            <div class="ap-po-details-content d-flex justify-content-between w-100 flex-wrap">
                                <div class="ap-po-details__titlebar">
                                    <p>Xe đang cho thuê</p>
                                    <h1>{{ count($dangChoThue) }}</h1>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xxl-3 col-sm-6 col-ssm-12 mb-25">
                        <div
                            class="ap-po-details ap-po-details--luodcy overview-card-shape radius-xl d-flex justify-content-between">
                            <div class="ap-po-details-content d-flex justify-content-between w-100 flex-wrap">
                                <div class="ap-po-details__titlebar">
                                    <p>Tổng chi</p>
                                    <h1>{{ number_format($tongChi) }} VND</h1>
                                    <div class="ap-po-details-time">
                                        <span class="color-danger"><i class="las la-arrow-down"></i>
                                            <strong>25.36%</strong></span>
                                        <small>So với tháng trước</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-sm-6 col-ssm-12 mb-25">
                        <div
                            class="ap-po-details ap-po-details--luodcy overview-card-shape radius-xl d-flex justify-content-between">
                            <div class="ap-po-details-content d-flex justify-content-between w-100 flex-wrap">
                                <div class="ap-po-details__titlebar">
                                    <p>Tổng thu </p>
                                    <h1>{{ number_format($tongThu) }} VND</h1>
                                    <div class="ap-po-details-time">
                                        <span class="color-success"><i class="las la-arrow-up"></i>
                                            <strong>25.36%</strong></span>
                                        <small>So với tháng trước</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-25">
                        <div class="card revenueChartTwo border-0">
                            <div class="card-header border-0">
                                <h6>Tổng quan</h6>
                            </div>
                            <div class="card-body pt-0 pb-40">
                                <div class="tab-content">
                                    <div>
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-4 mb-25">
                        <div class="card px-25 border-0">
                            <div class="card-header border-0 px-0">
                                <h6>Xe mới thêm</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="t_selling-today" role="tabpanel"
                                        aria-labelledby="t_selling-today-tab">
                                        <div class="selling-table-wrap">
                                            <div class="table-responsive">
                                                <table class="table--default table-borderless table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên xe</th>
                                                            <th>Giá thuê</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($xeHienCo) > 5)
                                                            @for ($i = 0; $i < 5; $i++)
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="selling-product-img d-flex align-items-center">
                                                                            <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                                style="object-fit: cover"
                                                                                src="{{ url($xeHienCo[$i]->HinhAnh) }}"
                                                                                alt="img">
                                                                            <span>{{ $xeHienCo[$i]->TenXe }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ number_format($xeHienCo[$i]->GiaThueNgay) }} VND
                                                                    </td>
                                                                </tr>
                                                            @endfor
                                                        @else
                                                            @foreach ($xeHienCo as $item)
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="selling-product-img d-flex align-items-center">
                                                                            <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                                style="object-fit: cover"
                                                                                src="{{ url($item->HinhAnh) }}"
                                                                                alt="img">
                                                                            <span>{{ $item->TenXe }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ number_format($item->GiaThueNgay) }} VND
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8 mb-25">
                        <div class="card px-25 border-0">
                            <div class="card-header border-0 px-0">
                                <h6>Xe được ưa chuộng</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="t_selling-today222" role="tabpanel"
                                        aria-labelledby="t_selling-today222-tab">
                                        <div class="selling-table-wrap selling-table-wrap--source">
                                            <div class="table-responsive">
                                                <table class="table--default table-borderless table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên xe</th>
                                                            <th>Loại xe</th>
                                                            <th>Hãng xe</th>
                                                            <th>Giá thuê</th>
                                                            <th>Được thuê</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($xeThueNhieu as $item)
                                                            <tr>
                                                                <td>
                                                                    <div
                                                                        class="selling-product-img d-flex align-items-center">
                                                                        <div
                                                                            class="selling-product-img d-flex align-items-center">
                                                                            <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                                style="object-fit: cover"
                                                                                src="{{ url($item['ttx']->HinhAnh) }}"
                                                                                alt="img">
                                                                        </div>
                                                                        <span>{{ $item['ttx']->TenXe }}</span>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $item['ttx']->typeCar->TenLoaiXe }}</td>
                                                                <td>{{ $item['ttx']->brand->TenThuongHieu }}</td>
                                                                <td>
                                                                    {{ number_format($item['ttx']->GiaThueNgay) }} VND
                                                                </td>
                                                                <td>{{ $item['solanthue'] }} lần</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($xeThueNhieu as $item)
                                                            <tr>
                                                                <td>
                                                                    <div
                                                                        class="selling-product-img d-flex align-items-center">
                                                                        <div
                                                                            class="selling-product-img d-flex align-items-center">
                                                                            <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                                style="object-fit: cover"
                                                                                src="{{ url($item['ttx']->HinhAnh) }}"
                                                                                alt="img">
                                                                        </div>
                                                                        <span>{{ $item['ttx']->TenXe }}</span>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $item['ttx']->typeCar->TenLoaiXe }}</td>
                                                                <td>{{ $item['ttx']->brand->TenThuongHieu }}</td>
                                                                <td>
                                                                    {{ number_format($item['ttx']->GiaThueNgay) }} VND
                                                                </td>
                                                                <td>{{ $item['solanthue'] }} lần</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($xeThueNhieu as $item)
                                                            <tr>
                                                                <td>
                                                                    <div
                                                                        class="selling-product-img d-flex align-items-center">
                                                                        <div
                                                                            class="selling-product-img d-flex align-items-center">
                                                                            <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                                style="object-fit: cover"
                                                                                src="{{ url($item['ttx']->HinhAnh) }}"
                                                                                alt="img">
                                                                        </div>
                                                                        <span>{{ $item['ttx']->TenXe }}</span>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $item['ttx']->typeCar->TenLoaiXe }}</td>
                                                                <td>{{ $item['ttx']->brand->TenThuongHieu }}</td>
                                                                <td>
                                                                    {{ number_format($item['ttx']->GiaThueNgay) }} VND
                                                                </td>
                                                                <td>{{ $item['solanthue'] }} lần</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($xeThueNhieu as $item)
                                                            <tr>
                                                                <td>
                                                                    <div
                                                                        class="selling-product-img d-flex align-items-center">
                                                                        <div
                                                                            class="selling-product-img d-flex align-items-center">
                                                                            <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                                style="object-fit: cover"
                                                                                src="{{ url($item['ttx']->HinhAnh) }}"
                                                                                alt="img">
                                                                        </div>
                                                                        <span>{{ $item['ttx']->TenXe }}</span>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $item['ttx']->typeCar->TenLoaiXe }}</td>
                                                                <td>{{ $item['ttx']->brand->TenThuongHieu }}</td>
                                                                <td>
                                                                    {{ number_format($item['ttx']->GiaThueNgay) }} VND
                                                                </td>
                                                                <td>{{ $item['solanthue'] }} lần</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($xeThueNhieu as $item)
                                                            <tr>
                                                                <td>
                                                                    <div
                                                                        class="selling-product-img d-flex align-items-center">
                                                                        <div
                                                                            class="selling-product-img d-flex align-items-center">
                                                                            <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                                style="object-fit: cover"
                                                                                src="{{ url($item['ttx']->HinhAnh) }}"
                                                                                alt="img">
                                                                        </div>
                                                                        <span>{{ $item['ttx']->TenXe }}</span>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $item['ttx']->typeCar->TenLoaiXe }}</td>
                                                                <td>{{ $item['ttx']->brand->TenThuongHieu }}</td>
                                                                <td>
                                                                    {{ number_format($item['ttx']->GiaThueNgay) }} VND
                                                                </td>
                                                                <td>{{ $item['solanthue'] }} lần</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($sauThangGanDay as $item)
            <input type="hidden" class="loiNhuan" value="{{ $item }}">
        @endforeach
        @foreach ($chiSauThangGanDay as $item)
            <input type="hidden" class="chiTien" value="{{ $item }}">
        @endforeach
    </div>
    </div>
@endsection
@section('js')
    <script>
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        options.timeZoneName = "short";

        function addMonths(date, months) {
            if (date.getDate() > 25) {
                date.setDate(25)
            }
            date.setMonth(date.getMonth() + months);
            return date;
        }

        let inputs = document.querySelectorAll('.loiNhuan');
        let loiNhuan = []
        inputs.forEach(item => {
            loiNhuan.push(item.value)
        });
        let inputChi = document.querySelectorAll('.chiTien');
        let chiTien = []
        inputChi.forEach(item => {
            chiTien.push(item.value)
        });

        let labels = []

        for (let index = -5; index < 1; index++) {
            let temp = addMonths(new Date(), index).toLocaleDateString(undefined, options);
            labels.push('Tháng ' + temp.split('tháng')[1]);
        }

        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: '# tổng thu',
                    data: loiNhuan.reverse(),
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }, {
                    label: '# tổng chi',
                    data: chiTien.reverse(),
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
