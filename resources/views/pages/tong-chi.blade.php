@extends('index')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Data Table</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-30">
                    <div class="support-ticket-system support-ticket-system--search">
                        <div class="breadcrumb-main breadcrumb-main--table justify-content-sm-between m-0">
                            <div class="d-flex justify-content-center breadcrumb-main__wrapper flex-wrap">
                                <div
                                    class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Tổng thu</h4>
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="#" class="btn btn-primary">
                                    Export
                                    <i class="las la-angle-down"></i>
                                </a>
                            </div>
                        </div>
                        <div
                            class="support-form datatable-support-form d-flex justify-content-xxl-between justify-content-center align-items-center flex-wrap">
                            <div class="support-form__input">
                                <div class="d-flex flex-wrap">
                                    <div class="support-form__input-id">
                                        <label>Id:</label>
                                        <div class="dm-select">
                                            <select name="select-search" class="select-search form-control">
                                                <option value="01">All</option>
                                                <option value="02">Option 2</option>
                                                <option value="03">Option 3</option>
                                                <option value="04">Option 4</option>
                                                <option value="05">Option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="support-form__input-status">
                                        <label>status:</label>
                                        <div class="dm-select">
                                            <select name="select-search" class="select-search form-control">
                                                <option value="01">All</option>
                                                <option value="02">Option 2</option>
                                                <option value="03">Option 3</option>
                                                <option value="04">Option 4</option>
                                                <option value="05">Option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="support-form__input-button">search</button>
                                </div>
                            </div>
                            <div class="support-form__search">
                                <div class="support-order-search">
                                    <form action="https://demo.dashboardmarket.com/" class="support-order-search__form">
                                        <img src="img/svg/search.svg" alt="search" class="svg">
                                        <input class="form-control box-shadow-none border-0" type="search"
                                            placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
                            <div class="table-responsive">
                                <table class="table-borderless mb-0 table">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th>
                                                <span class="userDatatable-title">ID</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">User</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Country</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Company</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Position</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Join Date</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Status</span>
                                            </th>
                                            <th class="actions">
                                                <span class="userDatatable-title">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#02</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>Robert Clinton</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Japan
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--subject">
                                                    Vehicle Master
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    Senior Manager
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content--priority">
                                                    January 20, 2020
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span
                                                        class="bg-opacity-warning color-warning userDatatable-content-status active">deactivated</span>
                                                </div>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-warning">
                                                            xem chi tiết
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end pt-30">
                                <nav class="dm-page">
                                    <ul class="dm-pagination d-flex">
                                        <li class="dm-pagination__item">
                                            <a href="#" class="dm-pagination__link pagination-control"><span
                                                    class="la la-angle-left"></span></a>
                                            <a href="#" class="dm-pagination__link"><span
                                                    class="page-number">1</span></a>
                                            <a href="#" class="dm-pagination__link active"><span
                                                    class="page-number">2</span></a>
                                            <a href="#" class="dm-pagination__link"><span
                                                    class="page-number">3</span></a>
                                            <a href="#" class="dm-pagination__link pagination-control"><span
                                                    class="page-number">...</span></a>
                                            <a href="#" class="dm-pagination__link"><span
                                                    class="page-number">12</span></a>
                                            <a href="#" class="dm-pagination__link pagination-control"><span
                                                    class="la la-angle-right"></span></a>
                                            <a href="#" class="dm-pagination__option">
                                            </a>
                                        </li>
                                        <li class="dm-pagination__item">
                                            <div class="paging-option">
                                                <select name="page-number" class="page-selection">
                                                    <option value="20">20/page</option>
                                                    <option value="40">40/page</option>
                                                    <option value="60">60/page</option>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
