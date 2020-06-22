
// $(document).ready(function () {

//     $("#search_text").click(function () {
//         var action = 'fetch_data';
//         $.ajax({
//             url: "http://localhost/e-Commerce/OmahOutfit/myproduct/fetch_data",
//             type: "POST",
//             dataType: "JSON",
//             data: { action: action, barang: $("#barang").val() },
//             success: function (data) {
//                 $(".result").html(data.product_list);
//                 $('#pagination_link').html(data.pagination_link);
//             },
//         });
//     });
// });







$(document).ready(function () {

    load_data();

    function load_data(query) {
        $.ajax({
            url: "http://localhost/e-Commerce/OmahOutfit/myproduct/search",
            method: "POST",
            data: { query: query },
            success: function (data) {
                $('#result').html(data);
            }
        })
    }

    $('#search_text').keyup(function () {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        }
        else {
            load_data();
        }
    });
});





// $(document).ready(function () {
//     $("#search").click(function () { // Ketika tombol simpan di klik
//         // Ubah text tombol search menjadi SEARCHING...
//         // Dan tambahkan atribut disable pada tombol nya agar tidak bisa diklik lagi
//         $(this).html("SEARCHING...").attr("disabled", "disabled");

//         $.ajax({
//             url: baseurl + 'homepage/search', // File tujuan
//             type: 'POST', // Tentukan type nya POST atau GET
//             data: { keyword: $("#kunci").val() }, // Set data yang akan dikirim
//             dataType: "json",
//             beforeSend: function (e) {
//                 if (e && e.overrideMimeType) {
//                     e.overrideMimeType("application/json;charset=UTF-8");
//                 }
//             },
//             success: function (response) { // Ketika proses pengiriman berhasil
//                 // Ubah kembali text button search menjadi SEARCH
//                 // Dan hapus atribut disabled untuk meng-enable kembali button search nya
//                 $("#search").html("SEARCH").removeAttr("disabled");

//                 // Ganti isi dari div view dengan view yang diambil dari controller siswa function search
//                 $("#view").html(response.hasil);
//             },
//             error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
//                 alert(xhr.responseText); // munculkan alert
//             }
//         });
//     });
// });