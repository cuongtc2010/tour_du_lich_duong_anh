<?php
$root_ctl = "Phanhoitukhachhang";
?>

<form name="myform" role="form" method="post" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách phản hồi</h4>
            <small>Xem danh sách, tìm kiếm và xóa dữ liệu</small>
            <div class="table-responsive m-t-40">
                <div id="myTable_wrapper" class="dataTables_wrapper no-footer">


                    <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                        <center>
<!--                            <a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=update" class="btn btn-success btn-rounded m-b-10 m-l-5"><i class="fa fa-plus"></i> Thêm mới</a>-->
                            <button type="submit" name="btnDelete" class="btn btn-info btn-rounded m-b-10 m-l-5" onclick="return confirm('Bạn có muốn xác nhận ?')"><i class="fa fa-trash-o"></i> Xác nhận</button>
                        </center>
                        <thead>
                            <tr role="row">
                                <th class="text-center" width="10px">
                                    <div class="checkbox">
                                        <label>
                                            <input id="checkAll" name="CheckAll" type="checkbox" class="select-box check_all" onclick="Check(document.myform)" value="Check All"><i class="input-helper"></i>
                                        </label>
                                    </div>
                                </th>
                                <th class="text-center" width="20px">#</th>
                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" style="width: 150px;">Khách hàng</th>
                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" style="width: 250px;">Nội dung phản hồi</th>
                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" style="width: 100px;">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!is_null($list)) {
                                $i = 1;
                                $Ids = '';
                                foreach ($list as $value) {

                                    $Ids .= $value['Id'] . ",";
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="select-box check_item" name="checklist[]" value="<?= $value["Id"] ?>" onclick="check_item()"><i class="input-helper"></i>
                                                </label>
                                            </div>
                                        </td>
                                        <td><?= $i++ ?></td>
                                        <td><a style="color: #2196F3;" href="index.php?ctl=<?= $root_ctl ?>&act=update&id=<?= $value["Id"] ?>" ><?= $value["TenKH"] ?></a></td> 
                                        <td><?= $value["NoiDung"] ?></td> 
                                         <?php 
                                        $xacnhan = "chưa xác nhận"; 
                                        if($value["Xoa"]  == 1){
                                            $xacnhan = "đã xác nhận";
                                        }
                                        ?>
                                        <td style="color: <?= $value["Xoa"]  == 1 ? "#23b22e" : "#fe0000" ?>"><?= $xacnhan ?></td> 
                                    </tr>
                                    <?php
                                }
                            }
                            ?>                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function Check(frm) {
            var checkBoxes = frm.elements['checklist[]'];
            for (i = 0; i < checkBoxes.length; i++) {
                checkBoxes[i].checked = (frm.CheckAll.value == "Check All") ? 'checked' : '';
            }
            frm.CheckAll.value = (frm.CheckAll.value == "Check All") ? "Uncheck All" : 'Check All';
        }
    </script>
</form>
