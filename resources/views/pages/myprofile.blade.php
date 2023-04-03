@extends('index')
@section('content')
    @include('components.notification')
    <div class="contents">
        <div class="profile-setting">
            <div class="container-fluid">
                <form action="{{ url('/luu-thong-tin-nguoi-dung/' . Auth::user()->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-main">
                                <h4 class="text-capitalize breadcrumb-title">Tài khoản của tôi</h4>
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                                        class="uil uil-estate"></i>Home</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-5">
                            <div class="card-body p-0 text-center">
                                <div class="account-profile pt-25 px-25 flex-column d-flex align-items-center pb-0">
                                    <div class="ap-img pro_img_wrapper mb-20">
                                        <input id="file-upload" type="file" name="fileUpload"
                                            onchange="displayPreviewAvt(event)" class="d-none">
                                        <label for="file-upload">
                                            <img id="avatar_img" class="ap-img__main rounded-circle wh-120"
                                                style="object-fit: cover" src="{{ Auth::user()->Avatar }}" alt="profile">
                                            <span class="cross" id="remove_pro_pic">
                                                <img src="img/svg/camera.svg" alt="camera" class="svg">
                                            </span>
                                        </label>
                                    </div>
                                    <div class="ap-nameAddress pb-3">
                                        <h5 class="ap-nameAddress__title">{{ Auth::user()->name }}</h5>
                                        <p class="ap-nameAddress__subTitle fs-14 m-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="mb-50">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="edit-profile mt-25">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="edit-profile__body mx-xl-20">
                                                                <div class="form-group mb-20">
                                                                    <label for="names">Tên người dùng</label>
                                                                    <input type="text" name="tenNguoiDung"
                                                                        class="form-control @error('tenNguoiDung') is-invalid @enderror"
                                                                        id="names" value="{{ Auth::user()->name }}">
                                                                    @error('tenNguoiDung')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group mb-20">
                                                                    <label for="email">Email</label>
                                                                    <input type="text"
                                                                        class="form-control @error('tenNguoiDung') is-invalid @enderror"
                                                                        value="{{ Auth::user()->email }}" name="email"
                                                                        id="email" placeholder="Email">
                                                                    @error('email')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group mb-20">
                                                                    <label for="name">mật khẩu cũ</label>
                                                                    <input type="text" class="form-control"
                                                                        name="matKhauCu" id="name"
                                                                        placeholder="mật khẩu cũ">
                                                                </div>
                                                                <div class="form-group mb-1">
                                                                    <label for="password-field">mật khẩu mới</label>
                                                                    <div class="position-relative">
                                                                        <input id="password-field" type="password"
                                                                            class="form-control" name="password"
                                                                            name="matKhauMoi" placeholder="mật khẩu mới">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-1">
                                                                    <label for="password-confirm">Xác nhận</label>
                                                                    <div class="position-relative">
                                                                        <input id="password-confirm" type="password"
                                                                            class="form-control @error('password') is-invalid @enderror"
                                                                            name="password_confirmation"
                                                                            onchange="checkPass()"
                                                                            placeholder="mật khẩu mới">
                                                                        @error('password')
                                                                            <div class="alert alert-danger">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="button-group d-flex justify-content-center pt-30 mb-15">
                                                                    <button
                                                                        class="btn btn-primary btn-default btn-squared me-15 text-capitalize btn-sm">Lưu
                                                                        thông tin
                                                                    </button>
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
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ url('js/profile_edit.js') }}"></script>
@endsection
