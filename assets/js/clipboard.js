function copyToClipboard(elemento) {
    var $temp = $("<input>")
    $("body").append($temp);
    $temp.val(elemento).select();
    document.execCommand("copy");
    $temp.remove();
}
$(function () {
    $(".span-copy").click(function () {
        const target = $(this).data("reference");
        const fai = '#' + $(this).data("fai");
        console.log(target);
        copyToClipboard(target);
        $(fai).removeClass();
        $(fai).addClass('fa fa-clipboard-check')


    });
});