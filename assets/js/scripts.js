$(document).ready(function () {
    $(".owl-carousel").owlCarousel();
});
$(document).ready(function () {
    $('.datatables').dataTable({
        "language": {
            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "sProcessing": "Sedang memproses...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            }
        }
    });


});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.img-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$('.custom-file-input').on('change', function () {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
    readURL(this);
})

$('.image').on('change', function () {
    console.log('ok');
    readURL(this);
})


$(document).ready(function () {
    $('#checkout_form').validate({
        rules: {
            email: { required: true },
            nama: { required: true },
            harga_ongkir: { required: true },
            no_tlp: { required: true },
            alamat: { required: true },
            provinsi: { required: true },
            kota: { required: true },


        },
        messages: {
            email: { required: "Email Harus diisi!" },
            nama: { required: "Nama Harus diisi!" },
            harga_ongkir: { required: "Ongkir Harus diisi!" },
            no_tlp: { required: "No telepon Harus diisi!" },
            alamat: { required: "Alamat Harus diisi!" },
            provinsi: { required: "Provinsi Harus diisi!" },
            kota: { required: "Kota Harus diisi!" },

        },

        submitHandler: function (form) {
            form.submit();
        }
    });

});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            $('.img-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$('.custom-file-input').on('change', function () {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
    readURL(this);
})

$('.image').on('change', function () {
    console.log('ok');
    readURL(this);
})





$(document).on('change', '#warna', function () {

    let warna = $('#warna').val();
    let kd_brg = $('input[name="kd"]').val();


    $.ajax({
        url: 'http://localhost/muthia-fashion/produk/ajax_produk_warna',
        data: {
            warna: warna,
            kd_brg: kd_brg
        },
        method: 'post',
        dataType: 'json',

        success: function (data) {
            $('#ukuran').html(data.option);
            $(".img_produk").attr("src", data.image);
            $(".product_detail").html(data.title);

        }
    })
})


$(document).ready(function () {
    $('#ukuran').on('change', function () {

        let warna = $('#warna').val();
        let kd_brg = $('input[name="kd"]').val();
        let ukuran = $('#ukuran').val();

        $.ajax({
            url: 'http://localhost/muthia-fashion/produk/ajax_produk_ukuran',
            data: {
                warna: warna,
                kd_brg: kd_brg,
                ukuran: ukuran
            },
            dataType: 'json',
            method: 'post',

            success: function (data) {
                $(".img_produk").attr("src", data.image);
                $(".product_detail").html(data.title);

            }
        })
    })
});

$(document).ready(function () {

    $('.qty').on('change', function () {
        let rowid = $(this).attr('id');
        let jumlah = $('#' + rowid + '').val();
        console.log(jumlah);
        console.log(rowid);

        $.ajax({
            url: 'http://localhost/muthia-fashion/cart/ajax_cart_jumlah',
            data: {
                rowid: rowid,
                jumlah: jumlah,

            },
            method: 'post',

            success: function (data) {
                document.location.href = 'http://localhost/muthia-fashion/cart/';

            }
        })
    })
})

$(document).ready(function () {

    $('.hapus_cart').on('click', function () {
        let rowid = $(this).attr('id');

        console.log(rowid);

        $.ajax({
            url: 'http://localhost/muthia-fashion/cart/ajax_cart_hapus',
            data: {
                rowid: rowid,


            },
            method: 'post',

            success: function (data) {
                document.location.href = 'http://localhost/muthia-fashion/cart/';

            }
        })
    })
})
$(document).ready(function () {
    $("#ajax_loader").hide();
})


$(document).ready(function () {
    $('#checkout_provinsi').on('change', function () {
        let id_provinsi = $(this).val();
        let id_kota = $('#checkout_kota').val();

        console.log(id_kota);
        console.log(id_provinsi);
        $.ajax({
            url: 'http://localhost/muthia-fashion/cart/ajax_provinsi/',
            data: {
                id_provinsi: id_provinsi,
                id_kota: id_kota
            },
            method: 'post',

            success: function (data) {
                $('#checkout_kota').html(data);

            }
        })

    })
})

$(document).on('change', '#checkout_kota', function () {

    let gram = $('#total_berat').val();
    let id_provinsi = $('#checkout_provinsi').val();
    let id_kota = $(this).val();
    let asal = $('#asal').val();

    $.ajax({
        url: 'http://localhost/muthia-fashion/cart/ajax_kota/',
        data: {
            id_provinsi: id_provinsi,
            id_kota: id_kota,
            gram: gram,
            asal: asal,

        },
        method: 'post',
        beforeSend: function () {
            $('#checkout_ongkir').hide();
            $('#ajax_loader').show();
        },
        complete: function () {
            $("#checkout_ongkir").show();
            $('#ajax_loader').hide();
        },
        success: function (data) {
            $('#checkout_ongkir').html(data);

        }

    })
})

$(document).ready(function () {
    $('#provinsi').on('change', function () {
        console.log('ok');

        let id_provinsi = $(this).val();

        $.ajax({
            url: 'http://localhost/muthia-fashion/admin/akun/ajax_provinsi',
            data: {
                id_provinsi: id_provinsi,

            },
            method: 'post',

            success: function (data) {
                $('#kota').html(data);

            }
        })

    })
})
$(document).ready(function () {
    $('#provinsi_auth').on('change', function () {
        console.log('ok');

        let id_provinsi = $(this).val();

        $.ajax({
            url: 'http://localhost/muthia-fashion/auth/ajax_provinsi',
            data: {
                id_provinsi: id_provinsi,

            },
            method: 'post',

            success: function (data) {
                $('#kota_auth').html(data);

            }
        })

    })
})

$(document).on('change', '#checkout_ongkir', function () {

    let kurir = $(this).find(':selected').data('kurir');
    let ongkir = parseInt($(this).find(':selected').data('ongkir'));
    let layanan = $(this).find(':selected').data('layanan');
    let total_item = parseInt($('#total_item').val());
    let total_bayar = (ongkir + total_item);
    $('.ongkir').text(ongkir);
    $('.total_bayar').text(total_bayar);
    $('#total_bayar').val(total_bayar);
    $('#ongkir').val(ongkir);
    $('#layanan').val(layanan);
    $('#kurir').val(kurir);
})

$('#pay-button').click(function (event) {
    if ($("#checkout_form").valid()) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");
        // shipping
        let shipping_nama = $('#checkout_name').val();
        let shipping_no_tlp = $('#checkout_notlp').val();
        let shipping_alamat = $('#checkout_address').val();
        let shipping_kota = $('#checkout_kota').val();
        let shipping_kode_pos = $('#checkout_kodepos').val();


        let total_bayar = $('#total_bayar').val();
        let ongkir = $('#ongkir').val();
        let total_item = parseInt($('#total_item').val());
        let layanan = $('#layanan').val();
        $.ajax({
            url: 'http://localhost/muthia-fashion/cart/token',
            data: { total_bayar: total_bayar, ongkir: ongkir, total_item: total_item, layanan: layanan, shipping_kota: shipping_kota, shipping_alamat: shipping_alamat, shipping_no_tlp: shipping_no_tlp, shipping_nama: shipping_nama, shipping_kode_pos: shipping_kode_pos },
            method: 'POST',
            cache: false,


            success: function (data) {
                console.log(total_bayar);
                console.log(ongkir);
                //location = data;
                console.log(data);
                console.log('token = ' + data);

                // var resultType = document.getElementById('result-type');
                // var resultData = document.getElementById('result-data');

                function changeResult(type, data) {

                    $("#result_type").val(type);
                    $("#result_data").val(JSON.stringify(data));


                }

                snap.pay(data, {

                    onSuccess: function (result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#checkout_form").submit();
                    },
                    onPending: function (result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#checkout_form").submit();
                    },
                    onError: function (result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#checkout_form").submit();
                    },
                    onClose: function (result) {
                        $('#pay-button').prop("disabled", false);
                    },
                });
            }
        });
    }

});

$(document).ready(function () {
    $('.update_stok').on('click', function () {
        var id = $(this).attr('id');
        $('#' + id + '').prop('disabled', false);
        $('#' + id + '').focus();
        $('#' + id + '').on('change', function () {
            var stok = $(this).val();
            var kd_brg = $(this).data('kd_brg');

            $.ajax({
                url: 'http://localhost/muthia-fashion/admin/detail_barang/ajax_detail_stok',
                data: {
                    stok: stok,
                    id: id,
                    kd_brg: kd_brg
                },

                method: 'post',

                success: function () {
                    document.location.href = 'http://localhost/muthia-fashion/admin/detail_barang/tampil/' + kd_brg + '';

                }
            })
        })
    })
});

$(document).ready(function () {
    $('#tanggal_awal').on('change', function () {
        let tanggal_awal = $(this).val();
        let tanggal_akhir = $('#tanggal_akhir').val();

        console.log(tanggal_awal);
        console.log(tanggal_akhir);


        $.ajax({
            url: 'http://localhost/muthia-fashion/pemilik/laporan/ajax_laporan_penjualan/',
            data: {
                tanggal_awal: tanggal_awal,
                tanggal_akhir: tanggal_akhir
            },
            method: 'post',

            success: function (data) {
                $('.laporan_penjualan').html(data);

            }
        })

    })
})
$(document).ready(function () {
    $('#tanggal_akhir').on('change', function () {
        let tanggal_awal = $('#tanggal_awal').val();
        let tanggal_akhir = $(this).val();

        console.log(tanggal_awal);
        console.log(tanggal_akhir);


        $.ajax({
            url: 'http://localhost/muthia-fashion/pemilik/laporan/ajax_laporan_penjualan/',
            data: {
                tanggal_awal: tanggal_awal,
                tanggal_akhir: tanggal_akhir
            },
            method: 'post',

            success: function (data) {
                $('.laporan_penjualan').html(data);

            }
        })

    })
})

$(document).ready(function () {
    $('#barang_laporan').on('change', function () {


        let kd_brg = $(this).val();
        console.log(kd_brg);

        $.ajax({
            url: 'http://localhost/muthia-fashion/pemilik/laporan/ajax_laporan_stok/',
            data: {
                kd_brg: kd_brg
            },
            method: 'post',

            success: function (data) {
                $('.laporan_stok').html(data);
                $('.laporan_stok').DataTable({
                    "destroy": true, //use for reinitialize datatable
                });

            }
        })
    })



})

    (function ($) {
        var element = $('#ringkasan'),
            originalY = element.offset().top;

        // Space between element and top of screen (when scrolling)
        var topMargin = 80;

        // Should probably be set in CSS; but here just for emphasis
        element.css('position', 'relative');

        $(window).on('scroll', function (event) {
            var scrollTop = $(window).scrollTop();



            if ($(window).scrollTop() > 1000) {
                element.stop();

            } else {

                element.stop(false, false).animate({

                    top: scrollTop < originalY
                        ? 0
                        : scrollTop - originalY + topMargin
                }, 500);
            }
        });
    })(jQuery);



