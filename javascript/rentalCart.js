$(document).ready(function(){
    $("#btncheckout").click(showInputCustomer);
	
});
function showInputCustomer(){
    $("#btncheckout").hide();
    $("#inputcust").load("/meh-hil/views/inputCustomer.html",function(){
		$("#cust-id").change(searchCustById);
	});
}
function searchCustById(){
	$.ajax({
        type:'GET',
        url: '/meh-hil/Application/getCustomerById.php?id='+$(this).val(),
        dataType:'json',
        success:showDetailCustomer
    });
}
function showDetailCustomer(data){
	if(data == null){
		alert('nomor customer tidak ditemukan');
		$('#cust-id').val('');
		$("#cust-title").val('');
		$("#cust-name").val('');
		$("#cust-address").val('');
		$("#cust-city").val('');
		$("#cust-state").val('');
		$("#cust-telp").val('');
		$("#cust-email").val('');
	}
	else{
		$("#cust-title").val(data.title);
		$("#cust-name").val(data.name);
		$("#cust-address").val(data.address);
		$("#cust-city").val(data.city);
		$("#cust-state").val(data.state);
		$("#cust-telp").val(data.telp);
		$("#cust-email").val(data.email);
	}
}
function Booking(){
    var data = $("#frmInpuTCust").serialize();
    $.ajax({
        type:'POST',
        url: '/meh-hil/Application/checkout.php',
        data: data,
        dataType:'json',
        success:showDetailRental
    });
}
function showDetailRental(data){
    $(".hide").hide();
    setReadonly($("input[type=number]"));
    $("#inputcust").remove();
    setInformation(data);
}
function setReadonly(el){
    for(var i =0; i< el.length; i++){
        el[i].setAttribute("readonly");
    }
}
function setInformation(data){
    $("#spanCart").empty().append("Keranjang Penyewaan: 0 Buku");
    
    $(".tblRentalCart").append("<tr><td colspan='8'>"+
                                "<div>Nomor Rental : <strong>"+ data.norental +"</strong></div>"+
                                "</td></tr>");
	$(".tblRentalCart").append("<tr><td colspan='8'>"+
                                "<div>Nomor Pelanggan : <strong>"+ data.id +"</strong></div>"+
                                "</td></tr>");
    $(".tblRentalCart").append("<tr><td colspan='8'>"+
                                "<div>Nama Pelanggan : <strong>"+ data.title +". "+ data.name +"</strong></div>"+
                                "<div>Alamat : <strong>"+data.address+"</strong></div>"+
                                "</td></tr>");
    $(".tblRentalCart").append("<tr><td colspan='8'>"+
                                "<div>Tanggal Booking : <strong>"+ data.rentaldate.date.toDefaultFormatDateTime() +"</strong></div>"+
                                "</td></tr>");
    $(".tblRentalCart").append("<tr><td colspan='8'>"+
                                "<div>Berlaku Sampai Tanggal : <strong>"+ data.expiredate.date.toDefaultFormatDateTime() +"</strong></div>"+
                                "</td></tr>");
    $(".tblRentalCart").append("<tr><td colspan='8'></td></tr>"+
                                "<tr><td colspan='8'><div>"+
                                "Terima Kasih <strong>"+data.title +". "+ data.name +"</strong>,<br/><br/>"+
                                "Penyewaan buku ini akan berlaku sampai tanggal "+ data.expiredate.date.toDefaultFormatDateTime() +",<br/>"+
                                "jika pada tanggal "+ data.expiredate.date.toDefaultFormatDateTime() +" anda belum mengambil buku penyewaan atau tidak konfirmasi maka status penyewaan anda <strong>Batal</strong>."+
                                "Pembayaran dilakukan pada saat pengambilan buku sewaan. <b>Nomor Pelanggan</b> harap disimpan, untuk penyewaan berikutnya anda hanya perlu"+
								" mengisi nomor pelanggan saja.<br/><br/>"+
                                "Untuk informasi lebih lanjut, hubungi : <br/>"+
                                "Telp : XXXXXXXXXXXXX <br/>"+
                                "<strong>Mei-hil Nagoya Center</strong>"+
                                "</div>"+
                                "</td></tr>");
     
    $(".tblRentalCart").append("<tr class='print'><td colspan='8'>"+
                                "<div><input type='button' value='Cetak' onclick='cetak()'/></div>"+
                                "</td></tr>");
}

function cetak(){
    $(".print").hide();
    var print = $(".tblRentalCart");
    print.jqprint();
    $(".print").show();
}