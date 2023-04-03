<div class="modal new-member" id="modaledit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-xl">
            <div class="modal-header">
                <h6 class="modal-title fw-500" id="staticBackdropLabel">Sửa thương hiệu</h6>
                <button type="button" class="close" onclick="closeModal()">
                    <img src="img/svg/x.svg" alt="x" class="svg">
                </button>
            </div>
            <div class="modal-body">
                <div class="new-member-modal">
                    <form method="POST" action="" id="editBrand">
                        @csrf
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 form-group-calender" id="brand">
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100">
                                <div class="countryOption">
                                    <label for="brand">
                                        Quốc gia
                                    </label>
                                    <select form="editBrand" name="nation"
                                        class="js-example-basic-single js-states form-control" id="nation">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-20">
                            <textarea class="form-control" id="note" name="note" rows="3" placeholder="Ghi chú"></textarea>
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
