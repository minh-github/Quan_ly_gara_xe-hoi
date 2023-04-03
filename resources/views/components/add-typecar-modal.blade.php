<div class="modal modaladd fade new-member" id="new-member" role="dialog" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-xl">
            <div class="modal-header">
                <h6 class="modal-title fw-500" id="staticBackdropLabel">Thêm thương hiệu mới</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="img/svg/x.svg" alt="x" class="svg">
                </button>
            </div>
            <div class="modal-body">
                <div class="new-member-modal">
                    <form method="POST" action="{{ url('/them-loai-xe') }}" id="addTypecar">
                        @csrf
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 form-group-calender">
                                <label for="nameType">Tên loại xe</label>
                                <input type="text" class="form-control" name="nameType" id="nameType"
                                    placeholder="tên xe">
                            </div>
                        </div>
                        <div class="form-group mb-20">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3" placeholder="Ghi chú"></textarea>
                        </div>
                        <div class="button-group d-flex pt-25">
                            <button class="btn btn-primary btn-default btn-squared text-capitalize">Lưu
                            </button>
                            <button type="button"
                                class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light"
                                data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
