$(document).ready(function () {
    let sudahKlik = {};

    const fields = [
        { id: '#nama', pesan: 'Nama wajib diisi.' },
        { id: '#jabatan', pesan: 'Jabatan wajib diisi.' },
        { id: '#nama_instansi', pesan: 'Jabatan wajib diisi.' },
        { id: '#alamat', pesan: 'Alamat wajib diisi.' },
        { id: '#email', pesan: 'Email wajib diisi.' },
        { id: '#nomor_telepon', pesan: 'Nomor telepon wajib diisi.' },
        { id: '#bidang_kerjasama', pesan: 'Bidang kerjasama wajib diisi.' },
        { id: '#kota', pesan: 'Kota wajib diisi.' },
        { id: '#tanggal', pesan: 'Kolom ini wajib diisi.' },
        { id: '#rencana', pesan: 'Kolom ini wajib diisi.' },
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
            case '#nomor_telepon':
                return /^[0-9]{10,13}$/.test(val);

            case '#email':
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);

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

        if (id === '#nomor_telepon') {
            if (!val) pesanAkhir = 'Nomor telepon wajib diisi.';
            else pesanAkhir = 'Nomor telepon hanya boleh angka (10–13 digit).';
        }

        if (id === '#email') {
            if (!val) pesanAkhir = 'Email wajib diisi.';
            else pesanAkhir = 'Email tidak valid, harus mengandung "@" dan domain.';
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