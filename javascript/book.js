$(document).ready(function(){
    var totalItem = countBook();
    //alert(totalItem);
    getBooks(1,0);
})
function countBook(){
    var total;
    $.ajax({
        type: 'GET',
        url: '/meh-hil/Application/book.php?action=countBook',
        dataType:'json',
        async:false,
        success: function(result){
            total = result.total;
        }
    });
    return total;
}
function getBooks(kategory,offset){
    $.ajax({
        type: 'GET',
        url: '/meh-hil/Application/book.php?action=getBooks&offset='+ offset,
        dataType:'json',
        success: setListBook
    });
}
function setListBook(books){
    $("#list-books").empty();
    for(var i=0; i< books.length; i++)
    {
        var html="";
        html += "<li>";
        html += "<a href=''>";
        html += "<img src='http://www.gramediashop.com/images/preview/9786020026435.jpg'>";
        html += "</a>"
        html += "<div class='w320 left'>"
        html += "<span class='c_blue_kompas font16'><strong>"+ books[i].name +"</strong></span><br>";
        html += "<span class='font11 c_abu font11'>"+ books[i].author +"</span><br><br>";
        html += "<span class='font11 c_abu font12'>"+ books[i].publisher +"</span><br>";
        html += "<span class='font11 c_abu font12'>Published <strong>"+ books[i].published.toDefaultFormatDate() +"</strong></span>";
        html += "</div>";
        html += "<div class='right w150'>";
        html += "<span class='font14'><b>"+ books[i].amount.toCurrency(2) +"/ Hari</b></span>";
        html += "<br><br>";
        
        html += "<span class='beli'><a href='/meh-hil/Application/cart.php?action=add&id="+ books[i].id +"'></a></span>";
        html += "</div>";
        html += "<div class='clearit pt_5'></div>";
        html += "</li>";
        
        $("#list-books").append(html);
    }
}