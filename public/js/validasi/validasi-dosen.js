$(document).ready(function () {
    let sudahKlik = {};

    const fields = [
        { id: '#nama', pesan: 'Nama wajib diisi.' },
        { id: '#nip', pesan: 'Nomor Identitas Pegawai Negeri Sipil harus berupa 18 digit angka.' },
        { id: '#usia', pesan: 'Usia wajib diisi.' },
        { id: '#jeniskelamin', pesan: 'Pilih jenis kelamin.' },
        { id: '#alamat', pesan: 'Alamat wajib diisi.' },
        { id: '#nomor_telepon', pesan: 'Nomor telepon wajib diisi.' },
        { id: '#saranmasukkan', pesan: '| Saran dan masukan maksimal 255 karakter. |' },
        { id: '#prodi', pesan: 'Pilih program studi.' },
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

    $('#nip').on('input', function () {
        this.value = this.value.replace(/\D/g, '');
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

        if (!val) {
            // Semua field lain tetap harus diisi, kecuali NIP
            if (id === '#nip') return true; // NIP kosong dianggap valid
            return false;
        }
        switch (id) {

            case '#usia':
                return /^[0-9]+$/.test(val) && val >= 16;

            case '#nomor_telepon':
                return /^[0-9]{10,13}$/.test(val);

            case '#nip':
                if (val === '') return true; // NIP kosong valid
                return /^[0-9]{18}$/.test(val);

            default:
                return true;
        }
    }

    function tampilkanError(id, pesan) {
        let errorId = id + '-error';
        let pesanAkhir = pesan;
        const val = $(id).val()?.trim();

        if (id === '#nip') {
            if (val === '') {
                sembunyikanError(id); // kosong = valid
                return;
            }
            if (!/^[0-9]{18}$/.test(val)) {
                pesanAkhir = 'Nomor Identitas Pegawai Negeri Sipil harus berupa 18 digit angka.';
            } else {
                sembunyikanError(id);
                return;
            }
        }

        if (id === '#usia') {
            if (!val) pesanAkhir = 'Usia wajib diisi.';
            else pesanAkhir = 'Usia minimal 16 tahun.';
        }

        if (id === '#nomor_telepon') {
            if (!val) pesanAkhir = 'Nomor telepon wajib diisi.';
            else pesanAkhir = 'Nomor telepon hanya boleh angka (10–13 digit).';
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