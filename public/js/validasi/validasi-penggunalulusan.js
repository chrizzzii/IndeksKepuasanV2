$(document).ready(function () {
    let sudahKlik = {};

    const fields = [
        { id: '#nama_identitaspenilai', pesan: 'Nama wajib diisi.' },
        { id: '#usia_identitaspenilai', pesan: 'Usia wajib diisi.' },
        { id: '#jeniskelamin_identitaspenilai', pesan: 'Pilih jenis kelamin.' },
        { id: '#alamat_identitaspenilai', pesan: 'Alamat wajib diisi.' },
        { id: '#kontak_identitaspenilai', pesan: 'Kontak person wajib diisi.' },
        { id: '#instansi_identitaspenilai', pesan: 'Instansi wajib diisi.' },
        { id: '#jabatan_identitaspenilai', pesan: 'Jabatan wajib diisi.' },
        { id: '#lamabekerjadenganlulusan', pesan: 'Kolom ini wajib diisi' },

        { id: '#nama_identitaslulusan', pesan: 'Nama wajib diisi.' },
        { id: '#jeniskelamin_identitaslulusan', pesan: 'Pilih jenis kelamin.' },
        { id: '#jabatan_identitaslulusan', pesan: 'Jabatan wajib diisi.' },
        { id: '#latarbelakang_identitaslulusan', pesan: 'Kolom ini wajib diisi' },
        { id: '#lamabekerja_identitaslulusan', pesan: 'Kolom ini wajib diisi' },
        { id: '#lamabekerjadiinstansisaatini', pesan: 'Kolom ini wajib diisi' },
        { id: '#saranmasukkan', pesan: '| Saran dan masukan maksimal 255 karakter. |' },
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
            case '#usia_identitaspenilai':
                return /^[0-9]+$/.test(val) && val >= 16;

            case '#kontak_identitaspenilai':
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

        if (id === '#usia_identitaspenilai') {
            if (!val) pesanAkhir = 'Usia wajib diisi.';
            else pesanAkhir = 'Usia minimal 16 tahun.';
        }

        if (id === '#kontak_identitaspenilai') {
            if (!val) pesanAkhir = 'Kontak person wajib diisi.';
            else pesanAkhir = 'Kontak person hanya boleh angka (10–13 digit).';
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