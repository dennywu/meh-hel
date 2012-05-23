$(document).ready(function(){
    showitem();
});
function showitem(){
    $.ajax({
        type:'GET',
        url:'/meh-hil/Application/admin/getAllBook.php',
        dataType:'json',
        success:showitemCallBack
    });
}
function showitemCallBack(data){
    for(var i = 0; i< data.length; i++){
        var bgcolor = i % 2 == 0 ? "#FFF" : "#EDEDED";
        $("#tblbook tbody").append("<tr bgcolor='"+ bgcolor +"'>"+
                            "<td><img src='"+data[i].image+"' width='30px'/></td>"+
                            "<td>"+data[i].name+"</td>"+
                            "<td>"+data[i].kategoriname+"</td>"+
                            "<td>"+data[i].author+"</td>"+
                            "<td>"+data[i].publisher+"</td>"+
                            "<td width= '85px'>"+data[i].published.toDefaultFormatDate()+"</td>"+
                            "<td width= '90px' class='text-right'>"+data[i].amount.toCurrency(2)+"</td>"+
                            "<td class='text-right'>"+data[i].stock+"</td>"+
							"<td><input type='button' value='Update' id='"+ data[i].id +"'class='update'/></td>"+
                            "</tr>");
    }
	$(".update").click(updateBook);
}
function updateBook(){
	var id = $(this).attr("id");
	var editDialog = ModalDialog.Show();
        $('.Detail').load('/meh-hil/views/admin/editBook.html');
        setDataToUpdateDialog(id);
}
function createBook(){
	var editDialog = ModalDialog.Show();
        $('.Detail').load('/meh-hil/views/admin/newBook.html');
}
function closeDialogEdit(){
      $('.ModalDialog').remove();
}