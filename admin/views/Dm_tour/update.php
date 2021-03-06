﻿<?php
$root_ctl = "Dm_tour";
?>
<script src="plugin/ckfinder/ckfinder_v1.js"></script>
<script type="text/javascript">
    function BrowseServer() {
        var finder = new CKFinder();
        finder.BasePath = 'plugin/ckfinder/';
        finder.startupPath = "Images:/";
        finder.SelectFunction = SetFileField;
        finder.Popup();
    }
    function SetFileField(fileUrl) {
        //var _fileUrl = fileUrl.replace(/^.*[\/\\]/g, '');
        $("input[name='HinhAnh']").val(fileUrl);
        $('#img-slider').attr("src", fileUrl);
    }
    function DeleteImage() {
        var ok = confirm("Bạn có muốn xóa ảnh");
        if (ok) {
            $("input[name='Image']").val("");
            $('#img-slider').attr("src", "templates/images/no_images.png");
        }
    }
    function gotoPage() {
        var url = $("input[name='Url']").val();
        window.open(url, "_blank");
    }
</script>
<div class="card">
    <div class="card-body">
        <div class="form-validation">
            <form class="form-valide" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Mã tour <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control"  name="txtMaTour" value="<?= !empty($_MaTour) ? $_MaTour : "" ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Tên tour <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtTenTour" placeholder="Nhập tên tour.." value="<?= isset($_TenTour) ? $_TenTour : "" ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Ngày bắt đầu <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" id="txtNgayBatDau" name="txtNgayBatDau" value="<?= isset($_NgayBatDau) ? $_NgayBatDau : "" ?>"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Ngày kết thúc <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" id="txtNgayKetThuc" name="txtNgayKetThuc" value="<?= isset($_NgayKetThuc) ? $_NgayKetThuc : "" ?>"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Giá tiền <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtGiaTien" value="<?= isset($_GiaTien) ? $_GiaTien : "" ?>"  required>
                    </div>
                </div>
                <!--                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tình trạng <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="txtTinhTrang" value="<?= isset($_TinhTrang) ? $_TinhTrang : "" ?>" required>
                                    </div>
                                </div>-->
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Số lượng khách <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtSoLuongKhach" value="<?= isset($_SoLuongKhach) ? $_SoLuongKhach : "" ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Loại Tour <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <select class="form-control" name="txtLoaiTour">
                            <option value="">-- Chọn --</option>

                            <?php
                            if (!is_null($list_loai_tour)) {
                                foreach ($list_loai_tour as $value) {
                                    if ($value["Id"] == $_LoaiTour) {
                                        ?>
                                        <option value="<?= $value["Id"] ?>" selected><?= $value["TenLoai"] ?></option>    
                                    <?php } else { ?>
                                        <option value="<?= $value["Id"] ?>"><?= $value["TenLoai"] ?></option>    
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Địa điểm <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <select class="form-control" name="txtDiaDiem">
                            <option value="">-- Chọn --</option>

                            <?php
                            if (!is_null($list_diadiem)) {
                                foreach ($list_diadiem as $value) {
                                    if ($value["Id"] == $_DiaDiem) {
                                        ?>
                                        <option value="<?= $value["Id"] ?>" selected><?= $value["TenDiaDiem"] ?></option>    
                                    <?php } else { ?>
                                        <option value="<?= $value["Id"] ?>"><?= $value["TenDiaDiem"] ?></option>    
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Mô tả <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <textarea class="ckeditor" name="txtMoTa" ><?= isset($_MoTa) ? $_MoTa : "" ?></textarea>                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Giá tour bao gồm <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <textarea class="ckeditor" name="txtGiaTourBaoGom" ><?= isset($_GiaTourBaoGom) ? $_GiaTourBaoGom : "" ?></textarea>                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Giá tour không bao gồm <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <textarea class="ckeditor" name="txtGiaTourKhongBaoGom" ><?= isset($_GiaTourKhongBaoGom) ? $_GiaTourKhongBaoGom : "" ?></textarea>                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Phụ thu <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <textarea class="ckeditor" name="txtPhuThu" ><?= isset($_PhuThu) ? $_PhuThu : "" ?></textarea>                        
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Hình ảnh <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <div class="cform-group row">						
                            <img src="<?= (!empty($_HinhAnh)) ? $_HinhAnh : UPLOAD_IMAGE_URL . "/" . "no-image.jpg" ?>" class="img-responsive" id="img-slider" style="border:1px solid #ccc;cursor: pointer;width:200px;height: 100%" onclick="BrowseServer()"/>
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 5px">
                                    <button type="button" class="btn btn-primary btn-sm btn-block" onclick="BrowseServer()"><i class="fa fa-image"></i> Chọn ảnh</button>
                                </div>

                                <div class="col-md-6" style="padding-left: 0px">
                                    <button type="button" class="btn btn-danger btn-sm btn-block" onclick="DeleteImage()"><i class="fa fa-trash"></i> Xóa ảnh</button>
                                </div>
                            </div>
                            <input type="hidden" class="form-control input-sm" placeholder="" name="HinhAnh" value="<?= $_HinhAnh ?>">    
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-8 ml-auto">
                        <button type="submit" name="btnSave" value="save" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-floppy-o"></i> Lưu</button>

                        <a href="index.php?ctl=<?= $root_ctl ?>" class="btn btn-sm btn-danger"><i class="ace-icon fa fa-arrow-left"></i> Quay lại </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $.validator.addMethod("greaterThan", function (value, element, params) {
            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date($(params[0]).val());
            }
            return isNaN(value) && isNaN($(params[0]).val()) || (Number(value) > Number($(params[0]).val()));
        }, 'Ngày kết thúc phải lớn hơn {1}.');
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $(".form-valide").validate({

            errorClass: "invalid-feedback animated fadeInDown",
            errorElement: "div",
            errorPlacement: function (e, a) {
                jQuery(a).parents(".form-group > div").append(e);
            },
            highlight: function (e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid");
            },
            success: function (e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove();
            },
            rules: {
                txtTenTour: "required",
                txtNgayBatDau: "required",
                txtNgayKetThuc: {required: true, greaterThan: ["#txtNgayBatDau", "Ngày bắt đầu"]},
                txtGiaTien: "required",
                txtSoLuongKhach: "required",
                txtLoaiTour: "required",
                txtDiaDiem: "required"

            },
            messages: {
                txtTenTour: "Vui lòng nhập tên tour",
                txtNgayBatDau: "Vui lòng chọn ngày bắt đầu",
                txtNgayKetThuc: {required: "Vui lòng nhập ngày kết thúc"},
                txtGiaTien: "Vui lòng nhập giá tiền",
                txtSoLuongKhach: "Vui lòng nhập số lượng khách đi",
                txtLoaiTour: "Vui lòng chọn loại tour",
                txtDiaDiem: "Vui lòng chọn địa điểm"
            }
        });
    });
</script>