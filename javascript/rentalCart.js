$(document).ready(function(){
    $("#btncheckout").click(showInputCustomer);
});
function showInputCustomer(){
    $("#btncheckout").hide();
    $("#inputcust").load("/meh-hil/views/inputCustomer.html");
}