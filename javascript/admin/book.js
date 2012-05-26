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
                            "<td><img src='/meh-hil/images/books/"+data[i].image+"' width='30px' target='_blank'/></td>"+
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
             $.ajax({
                type:'GET',
                url:'/meh-hil/Application/admin/getAllCategory.php',
                dataType:'json',
                success:function(result){
                    for(var i = 0; i< result.length; i++){
                        $("#kategori").append("<option value='"+ result[i].id +"'>"+ result[i].name +"</option>");
                    }
                }
            });
}
function closeDialogEdit(){
      $('.ModalDialog').remove();
}
function setDataToUpdateDialog(id){
    $.ajax({
        type:'GET',
        url:'/meh-hil/Application/admin/getBookById.php?id='+id,
        dataType:'json',
        success:function(data){
            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#author").val(data.author);
            $("#publisher").val(data.publisher);
            $("#published").val(data.published);
            $("#sinopsi").val(data.sinopsi);
            $("#amount").val(data.amount);
            $("#stock").val(data.stock);
            $.ajax({
                type:'GET',
                url:'/meh-hil/Application/admin/getAllCategory.php',
                dataType:'json',
                success:function(result){
                    for(var i = 0; i< result.length; i++){
                        $("#kategori").append("<option value='"+ result[i].id +"'>"+ result[i].name +"</option>");
                    }
                    $("#kategori").val(data.kategori);
                }
            });
        }
    });
}