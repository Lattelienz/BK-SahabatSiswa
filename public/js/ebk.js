    
    // height adjuster
    document.addEventListener('DOMContentLoaded', (event) => {

        const setViewportWidth = () => {
            if (window.innerWidth >= 456 && window.innerHeight >= 720) {
                const viewportHeight = window.innerHeight - 56.75 - 72.55 - 56.75;
                const container = document.querySelector('.siswa');
                console.log('tablet');
                if (container) {
                    container.style.height = viewportHeight + 'px';
                }
            }

            else if (window.innerWidth >= 1024 && window.innerHeight >= 584) {
                const viewportHeight = window.innerHeight - 56.75 - 72.55 - 56.75;
                const container = document.querySelector('.siswa');
                console.log('laptop, etc.');
                if (container) {
                    container.style.height = viewportHeight + 'px';
                }
            }

            else {
                console.log('Window height is not greater than 940');
                const container = document.querySelector('.siswa');
                if (container) {
                    container.style.height = '';
                }
            }
        };

        setViewportWidth();

        window.addEventListener('resize', setViewportWidth);

        changeElement();
        changeEditElement();
        
    });

    // function to hide and disable certain elements in create modal
    function changeElement() {
        var select = document.getElementById('level');

        var admin = document.querySelectorAll('.nis, .kelas, .jurusan, .jabatan');
        var siswa = document.querySelectorAll('.nis, .kelas, .jurusan');
        var guru = document.querySelectorAll('.jurusan, .jabatan');

        var nis = document.querySelector('#nis');
        var kelas = document.querySelector('#kelas');
        var jurusan = document.querySelector('#jurusan');
        var jabatan = document.querySelector('#jabatan');

        function handleAdmin() {
            nis.disabled = true;
            kelas.disabled = true;
            jurusan.disabled = true;
            jabatan.disabled = true;
            admin.forEach(function(hide){
                hide.style.display = 'none';
            });
        }

        function handleSiswa() {
            nis.disabled = false;
            kelas.disabled = false;
            jurusan.disabled = false;
            jabatan.disabled = true;
            siswa.forEach(function(hide){
                hide.style.display = 'block';
            });
            document.querySelector('.jabatan').style.display = 'none';
        }

        function handleGuru() {
            nis.disabled = true;
            kelas.disabled = true;
            jurusan.disabled = false;
            jabatan.disabled = false;
            guru.forEach(function(hide){
                hide.style.display = 'block';
            });
            document.querySelector('.kelas').style.display = 'none';
            document.querySelector('.nis').style.display = 'none';
        }

        if (select.value == 'Admin') {
            handleAdmin();
        }
        
        else if (select.value == 'Siswa') {
            handleSiswa();
        }

        else if (select.value == 'Guru') {
            handleGuru();
        }
    }

    // function to hide and disable certain elements in edit modal
    function changeEditElement() {
        var editSelect = document.getElementById('editLevel');

        var admin = document.querySelectorAll('.editNis, .editKelas, .editJurusan, .editJabatan');
        var siswa = document.querySelectorAll('.editNis, .editKelas, .editJurusan');
        var guru = document.querySelectorAll('.editJurusan, .editJabatan');

        var nis = document.querySelector('#editNis');
        var kelas = document.querySelector('#editKelas');
        var jurusan = document.querySelector('#editJurusan');
        var jabatan = document.querySelector('#editJabatan');

        function handleAdmin() {
            nis.disabled = true;
            kelas.disabled = true;
            jurusan.disabled = true;
            jabatan.disabled = true;
            admin.forEach(function(hide){
                hide.style.display = 'none';
            });
        }

        function handleSiswa () {
            nis.disabled = false;
            kelas.disabled = false;
            jurusan.disabled = false;
            jabatan.disabled = true;
            siswa.forEach(function(hide){
                hide.style.display = 'block';
            });
            document.querySelector('.editJabatan').style.display = 'none';
        }

        function handleGuru () {
            nis.disabled = true;
            kelas.disabled = true;
            jurusan.disabled = false;
            jabatan.disabled = false;
            guru.forEach(function(hide){
                hide.style.display = 'block';
            });
            document.querySelector('.editKelas').style.display = 'none';
            document.querySelector('.editNis').style.display = 'none';
        }

        if (editSelect.value == 'Admin' ) {
            handleAdmin();
        }
        
        else if (editSelect.value == 'Siswa') {
            handleSiswa();
        }

        else if (editSelect.value == 'Guru') {
            handleGuru();
        }
    }

    function editUser(id) {
        $.ajax({
            url: '/user/edit/' + id ,
            success: function(response) {
                // $('#editLevel').val(response.user.level);
                $('.editNama').val(response.user.nama_lengkap);
                $('.editEmail').val(response.user.email);
                $('.editJK').val(response.user.jenis_kelamin);

                $('#editModal' + id).modal('show');
            },
            error: function(error) {
                console.error('Error fetching user data:', error);
                alert('Gagal mencari data user, coba lagi.');
            }
        });
    }