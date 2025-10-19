$(document).ready(function () {
    let sudahKlik = {};

    const fields = [
        { id: '#nama', pesan: 'Nama wajib diisi.' },
        { id: '#usia', pesan: 'Usia wajib diisi.' },
        { id: '#jeniskelamin', pesan: 'Pilih jenis kelamin.' },
        { id: '#alamat', pesan: 'Alamat wajib diisi.' },
        { id: '#nomor_telepon', pesan: 'Nomor telepon wajib diisi.' },
        { id: '#saranmasukkan', pesan: '| Saran dan masukan maksimal 255 karakter. |' },
        { id: '#prodi', pesan: 'Pilih program studi.' },
        { id: '#tahun_lulus', pesan: 'Tahun lulus wajib diisi.' },
        { id: '#pekerjaan', pesan: 'Pilih status pekerjaan.' },
        { id: '#kesesuaian', pesan: 'Pilih kesesuaian pekerjaan dengan prodi.' },
        { id: '#waktu', pesan: 'Pilih waktu memperoleh pekerjaan pertama.' },
        { id: '#jenistempatkerja', pesan: 'Pilih Jenis tempat Kerja.' },
        { id: '#instansi', pesan: 'Pilih instansi tempat bekerja.' },
        { id: '#tempat_kerja', pesan: 'Nama instansi wajib diisi.' },
        { id: '#penghasilan', pesan: 'Pilih penghasilan per bulan.' },
        { id: '#cara', pesan: 'Pilih cara mendapatkan pekerjaan.' },
        { id: '#studi_lanjut', pesan: 'Pilih sumber biaya studi lanjutan.' },
    ];

    fields.forEach(({ id, pesan }) => {
        $(id).on('focus', function () {
            sudahKlik[id] = true;
        });

        $(id).on('blur change', function () {
            if (sudahKlik[id]) {
                if (!cekValidasi(id)) {
                    tampilkanError(id, pesan);
                } else {
                    sembunyikanError(id);
                }
            }
        });
    });

    $('#saranmasukkan').on('input', function () {
        const val = $(this).val();
        const count = val.length;
        const max = 255;

        $('#saranmasukkan-count').text(`${count} / ${max} karakter`);

        if (count > max) {
            tampilkanError('#saranmasukkan', '| Saran dan masukan maksimal 255 karakter. |');
            $('#saranmasukkan-count').addClass('text-danger').removeClass('text-muted');
        }
        else {
            sembunyikanError('#saranmasukkan');
            $('#saranmasukkan-count').removeClass('text-danger').addClass('text-muted');
        }
    });


    function cekValidasi(id) {
        const val = $(id).val()?.trim();

        if (id === '#saranmasukkan') {
            if (val === '') return true;
            return val.length <= 255;
        }

        if (!val) return false;

        switch (id) {
            case '#usia':
                return /^[0-9]+$/.test(val) && val >= 16;

            case '#nomor_telepon':
                return /^[0-9]{10,13}$/.test(val);

            case '#tahun_lulus':
                const year = parseInt(val);
                const currentYear = new Date().getFullYear();
                return year >= 1980 && year <= currentYear;

            case '#saran':
                return val.length <= 255;

            default:
                return true;
        }
    }

    function tampilkanError(id, pesan) {
        let errorId = id + '-error';
        let pesanAkhir = pesan;
        const val = $(id).val()?.trim();

        if (id === '#usia') {
            if (!val) pesanAkhir = 'Usia wajib diisi.';
            else pesanAkhir = 'Usia minimal 16 tahun.';
        }

        if (id === '#nomor_telepon') {
            if (!val) pesanAkhir = 'Nomor telepon wajib diisi.';
            else pesanAkhir = 'Nomor telepon hanya boleh angka (10–13 digit).';
        }

        if (id === '#tahun_lulus') {
            if (!val) pesanAkhir = 'Tahun lulus wajib diisi.';
            else pesanAkhir = 'Tahun lulus tidak valid.';
        }

        if ($(errorId).length === 0) {
            $(id).after(`<small class="text-danger" id="${errorId.substring(1)}">${pesanAkhir}</small>`);
        }
        $(id).addClass('is-invalid');
        $(errorId).show().text(pesanAkhir);
    }

    function sembunyikanError(id) {
        let errorId = id + '-error';
        $(id).removeClass('is-invalid');
        $(errorId).hide();
    }

    $('form').on('submit', function (e) {
        let valid = true;

        fields.forEach(({ id, pesan }) => {
            if (!cekValidasi(id)) {
                tampilkanError(id, pesan);
                $(id).addClass('is-invalid');
                valid = false;
            } else {
                sembunyikanError(id);
            }
        });

        if (!valid) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $('.is-invalid:first').offset().top - 100
            }, 500);
        }
    });
});