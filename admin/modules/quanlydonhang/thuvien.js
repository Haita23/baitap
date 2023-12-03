$(document).ready(function () {

    //Hiển thị số lượng sản phẩm trong giỏ hàng
    soluongsp();
    tongdonhang();

    //Xóa sản phẩm trong giỏ hàng
    $(".remo").click(function (e) {
        e.preventDefault();

        var tr = $(this).parent().parent();
        var tensp = tr.children("td").eq(0).text();

        tr.remove();

        //Cập nhật lại số lượng sản phẩm
        soluongsp();
        //Cập nhật lại tổng đơn hàng
        tongdonhang();
        
        //Tạo hiệu ứng cho giỏ hàng
        $(".boxcart").addClass("cartani");

        setTimeout(function () { $(".boxcart").removeClass("cartani"); }, 500);

    });

    //Thay đổi số lượng sản phẩm 
    $(".num").change(function (e) {
        e.preventDefault();

        var sl = this.value;
        var tr = $(this).parent().parent();
        var tensp = tr.children("td").eq(0).text();
        var dongia = tr.children("td").eq(2).text();
        var tt = dongia * sl;
        tr.children("td").eq(4).text(tt);

        //alert(sl);

    });

    //Hàm cập nhật lại số lượng sản phẩm
    function soluongsp() {
        var giohang = $("#giohang").children("tr");
        var slsp = giohang.length;
        var boxcart = $("#boxcart").children("span").eq(0);
        boxcart.text(slsp);
    }

    //Hàm tính tổng đơn hàng
    function tongdonhang() {
        var tongdh = $("#tongdonhang").children("tr");

        //Tính tổng đơn hàng
        var giohang = $("#giohang").children("tr");
        var tong = 0;
        for (let i = 0; i < giohang.length; i++) {
            tong+=eval(giohang.eq(i).children("td").eq(4).text());
        }
        tongdh.children("td").eq(1).text(tong);
    }
});