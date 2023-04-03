@extends('index')
@section('content')
    <div class="contents">
        <div class="profile-setting ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Chi tiết tài khoản</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                                    class="uil uil-estate"></i>Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{ url('/danh-sach-user') }}"><i
                                                    class="uil uil-users-alt"></i>Quản lý nhân viên</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Chi tiết nhân viên</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-5">
                        <div class="card-body text-center p-0">
                            <div
                                class="account-profile border-bottom pt-25 px-25 pb-0 flex-column d-flex align-items-center ">
                                <div class="ap-img mb-20 pro_img_wrapper">
                                    <input id="file-upload" type="file" name="fileUpload" class="d-none">
                                    <label for="file-upload">

                                        <img class="ap-img__main rounded-circle wh-120"
                                            src="{{ url('img/author/profile.png') }}" alt="profile">
                                        <span class="cross" id="remove_pro_pic">
                                            <img src="{{ url('img/svg/camera.svg') }}" alt="camera" class="svg">
                                        </span>
                                    </label>
                                </div>
                                <div class="ap-nameAddress pb-3">
                                    <h5 class="ap-nameAddress__title">{{ Auth::user()->name }}</h5>
                                    <p class="ap-nameAddress__subTitle fs-14 m-0">
                                        @if (Auth::user()->role == '1')
                                            Quản trị viên
                                        @else
                                            Nhân viên
                                        @endif
                                    </p>
                                    <p class="ap-nameAddress__subTitle fs-14 m-0">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="mb-50">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade  show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="edit-profile mt-25">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-xxl-6">
                                                        <div class="edit-profile__body mx-xl-20">
                                                            <form>
                                                                <div class="form-group mb-20">
                                                                    <div class="countryOption">
                                                                        <label for="countryOption">
                                                                            Địa chỉ
                                                                        </label>
                                                                        <select
                                                                            class="js-example-basic-single js-states form-control"
                                                                            id="countryOption">
                                                                            <option value="thai_nguyen">Thái Nguyên
                                                                            </option>
                                                                            <option value="quang_ninh">Quảng Ninh</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-20">
                                                                    <div class="cityOption">
                                                                        <label for="cityOption">
                                                                            Thành phố
                                                                        </label>
                                                                        <select
                                                                            class="js-example-basic-single js-states form-control"
                                                                            id="cityOption">
                                                                            <option value="pho_yen">Phổ Yên</option>
                                                                            <option value="uong_bi">Uông Bí</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-20">
                                                                    <label for="chitiet">Chi Tiết</label>
                                                                    <input type="text" class="form-control"
                                                                        id="chitiet" placeholder="số nhà, đường, ngõ,...">
                                                                </div>
                                                            </form>
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
                </div>
            </div>
        </div>
    </div>
@endsection
