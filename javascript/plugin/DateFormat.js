String.prototype.toFormatDate = function(format) {
    var dateFormated = new Date(parseInt(this.replace(/\/Date\((-?\d+)\)\//, '$1')));
    return dateFormated.format(format);
}
String.prototype.toDefaultFormatDate = function () {
    var date = new Date(this);
    //var dateFormated = new Date(parseInt(date.replace(/\/Date\((-?\d+)\)\//, '$1')));
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();
    return day + " " + ConvertMonthToIndonesian(month) + " " + year;
}
toMonth = function (_number) {

    var month = ConvertMonthToIndonesian(_number)
    return month;
}
var ConvertMonthToIndonesian = function (month) {
    var bulan = new Array("Januari",
    "Februari", "Maret", "April",
    "Mei", "Juni", "Juli",
    "Agustus", "September",
    "Oktober", "November",
    "Desember");

    return bulan[month];
}