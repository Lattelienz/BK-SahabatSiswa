    
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
    });

    // function to hide and disable certain elements in create modal
    function changeElement() {
        let select = document.getElementById('level');

        let admin = document.querySelectorAll('.nis, .kelas, .jurusan, .jabatan');
        let siswa = document.querySelectorAll('.nis, .kelas, .jurusan');
        let guru = document.querySelectorAll('.jurusan, .jabatan');

        let nis = document.querySelector('#nis');
        let kelas = document.querySelector('#kelas');
        let jurusan = document.querySelector('#jurusan');
        let jabatan = document.querySelector('#jabatan');

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

    //var for each edit button
    var editButtons = document.querySelectorAll('.edit-btn');

    //event listeners for each button
    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            //getting the id from data attribute
            var id = this.getAttribute('data-id');

            //calling function with the specific id
            changeEditElement(id);
        });
    });

    //receiving ajax request and process them here
    function editUser(id) {
        $.ajax({
            url: '/user/edit/' + id ,
            success: function(response) {
                $('#editLevel' + id).val(response.user.level).change(   );
                $('#editNama' + id).val(response.user.nama_lengkap);
                $('#editEmail' + id).val(response.user.email);
                $('#editJK' + id).val(response.user.jenis_kelamin);

                if (response.user.level === 'Siswa') {
                    // $('#editLevel' + id).change(changeEditElement);
                    $('#editNis' + id).val(response.user.siswa.nis);
                    $('#editJurusan' + id).val(response.user.siswa.jurusan.id_jurusan);
                    $('#editKelas' + id).val(response.user.siswa.kelas);
                }

                else if (response.user.level === 'Guru') {
                    // $('#editLevel' + id).change(changeEditElement);
                    $('#editJurusan' + id).val(response.user.guru.jurusan.id_jurusan);
                    $('#editJabatan' + id).val(response.user.guru.jabatan);
                }

                $('#editModal' + id).modal('show');
                
            },
            error: function(error) {
                // console.error('Error fetching user data:', error);
                alert('Gagal mencari data user, coba lagi.');
            }
        });
    }

    // function to hide and disable certain elements in edit modal
    function changeEditElement(id) {
        let editSelect = document.getElementById('editLevel' + id);

        let admin = document.querySelectorAll('.editNis' + id + ', .editKelas' + id + ', .editJurusan' + id + ', .editJabatan' + id);
        let siswa = document.querySelectorAll('.editNis' + id + ', .editKelas' + id + ', .editJurusan' + id);
        let guru = document.querySelectorAll('.editJurusan' + id + ', .editJabatan' + id);

        let nis = document.querySelector('#editNis' + id);
        let kelas = document.querySelector('#editKelas' + id);
        let jurusan = document.querySelector('#editJurusan' + id);
        let jabatan = document.querySelector('#editJabatan' + id);

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
            document.querySelector('.editJabatan' + id).style.display = 'none';
        }

        function handleGuru () {
            nis.disabled = true;
            kelas.disabled = true;
            jurusan.disabled = false;
            jabatan.disabled = false;
            guru.forEach(function(hide){
                hide.style.display = 'block';
            });
            document.querySelector('.editKelas' + id).style.display = 'none';
            document.querySelector('.editNis' + id).style.display = 'none';
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

    function editProfileUser(id) {
        $.ajax({
            url: '/user/edit/' + id ,
            success: function(response) {   
                $('.editProfileNama').val(response.user.nama_lengkap);
                $('.editProfileEmail').val(response.user.email);
                $('.editProfileJK').val(response.user.jenis_kelamin);

                $('#editProfileModal' + id).modal('show');
            },
            error: function(error) {
                console.error('Error fetching user data:', error);
                alert('Gagal mencari data user, coba lagi.');
            }
        });
    }