@{
    ViewBag.Title = "WorkInfor";
    Layout = "~/Views/Shared/_Layout.cshtml";
}

<form name="workinfor" id="workinfor" method="post" action="" enctype="multipart/form-data">
    <fieldset id="workinforContainer">
        <legend>THÔNG TIN CÔNG VIỆC</legend>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Lãnh dạo giao việc</label>
                    <select name="kh_tendangnhap" id="kh_tendangnhap" class="form-control">
                        <option value="">Chọn Lãnh đạo</option>
                        <!--Xử lý chọn lđ #  -->

                        <option value="#"></option>

                    </select>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label>Nguồn lập</label>
                    <input type="text" name="nguonlap" id="nguonlap" class="form-control" />
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Tên công việc</label>
                    <input type="text" name="workname" id="workname" class="form-control" />
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Nội dung công việc</label> <br />
                    <textarea id="workcontent" name="workcontent" rows="4" cols="200">
                    </textarea>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Lĩnh vực</label>
                    <select name="linhvuc" id="linhvuc" class="form-control">
                        <option value="">Chọn Lĩnh vực</option>
                        <!--Xử lý chọn lv #  -->

                        <option value="#"></option>

                    </select>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label>Loại công việc</label>
                    <select name="worktype" id="worktype" class="form-control">
                        <option value="">Công việc phát sinh</option>
                        <!--Xử lý chọn cvps #  -->

                        <option value="#"></option>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>File đính kèm</label> <br />
                    <input type="file" class="form-control" id="file" name="file">
                </div>
            </div>

            <div class="col">
<div class="form-group">
                    <label>Văn bản liên quan</label> <br />
                    <button type="button"><b>+ Thêm</b></button>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Mức độ công việc</label>
                    <select name="level" id="level" class="form-control">
                        <option value="">Chọn mức độ</option>
                        <!--Xử lý chọn mđ #  -->

                        <option value="#"></option>

                    </select>
                </div>
            </div>



                <div class="col">
                    <div class="form-group">
                        <label>Ngày hết hạn</label>
                        <input type="date" name="limitdate" id="limitdate" class="form-control" />
                    </div>
                </div>
            </div>

        <div class="form-row">
            <div class="col">
                <button type="button"><b>+ Nhắc việc định kỳ</b></button>
             </div>

            </div>

</form>