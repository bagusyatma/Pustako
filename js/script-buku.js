$(document).ready(function () {

    //event ketika keyword ditulis
    $('#keyword').on('keyup', function () {
        $('.loader').show();
        //ajax menggunakan load
        // $('#container').load('ajax/siswa.php?keyword=' + $('#keyword').val());

        //$.get()
        $.get('../result/buku.php?keyword=' + $('#keyword').val(), function (data) {

            $('.pustaka').html(data);
            $('.loader').hide();
        });
    });
});