<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>Form Biodata</title>

  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body>
  
  <div class="formbold-main-wrapper">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">
      <div class="formbold-form-title">
        <h2 class="">Silahkan Isi Biodata</h2>
        <p>
         Biodata akan dimasukkan ke dalam profil anda
        </p>
      </div>
      <form action="{{route('user.form-save')}}" method="post">
        @csrf
        <div class="formbold-steps">
            <ul>
                <li class="formbold-step-menu1 active">
                    <span>1</span>

                </li> 
                <li class="formbold-step-menu2">
                    <span>2</span>
                    
                </li>
                <li class="formbold-step-menu3">
                    <span>3</span>
                    
                </li>
            </ul>
        </div>

        <!-- Form step-1 biodata siswa -->
        @include('form.menu1')

        <!-- form step-2 biodata orangtua/wali -->
        @include('form.menu2')
      
        <!-- form step-3 pertanyaan lainnya -->
        @include('form.menu3')
          

          <!-- confirm text, bagian akhir form -->
          <div class="formbold-form-confirm mt-5">
            <p>
              Silahkan cek kembali, lalu klik submit
            </p>

            <!-- ini isi div nya yes or no begitu, keknya bisa buat ngecek lagi atau validasi tpi zhd kd bisa menggunakannya:> -->
            {{-- <div>
              <button class="formbold-confirm-btn active">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="11" cy="11" r="10.5" fill="white" stroke="#DDE3EC"/>
                <g clip-path="url(#clip0_1667_1314)">
                <path d="M9.83343 12.8509L15.1954 7.48828L16.0208 8.31311L9.83343 14.5005L6.12109 10.7882L6.94593 9.96336L9.83343 12.8509Z" fill="#536387"/>
                </g>
                <defs>
                <clipPath id="clip0_1667_1314">
                <rect width="14" height="14" fill="white" transform="translate(4 4)"/>
                </clipPath>
                </defs>
                </svg>
                Yes! I want it.
              </button>

              <button class="formbold-confirm-btn">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="11" cy="11" r="10.5" fill="white" stroke="#DDE3EC"/>
                <g clip-path="url(#clip0_1667_1314)">
                <path d="M9.83343 12.8509L15.1954 7.48828L16.0208 8.31311L9.83343 14.5005L6.12109 10.7882L6.94593 9.96336L9.83343 12.8509Z" fill="#536387"/>
                </g>
                <defs>
                <clipPath id="clip0_1667_1314">
                <rect width="14" height="14" fill="white" transform="translate(4 4)"/>
                </clipPath>
                </defs>
                </svg>
                No! I don’t want it.
              </button>
            </div> --}}
          </div>
          
          <!-- button area keknya -->
          <div class="formbold-form-btn-wrapper">
      
            <button class="formbold-back-btn">
              Kembali
            </button>
      
            <button class="formbold-btn">
              Selanjutnya
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_1675_1807)">
              <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
              </g>
              <defs>
              <clipPath id="clip0_1675_1807">
              <rect width="16" height="16" fill="white"/>
              </clipPath>
              </defs>
              </svg>
            </button>
      
          </div>

      </form>

    </div> 
  </div>

  <script>
    const stepMenuOne = document.querySelector('.formbold-step-menu1')
    const stepMenuTwo = document.querySelector('.formbold-step-menu2')
    const stepMenuThree = document.querySelector('.formbold-step-menu3')
  
    const stepOne = document.querySelector('.formbold-form-step-1')
    const stepTwo = document.querySelector('.formbold-form-step-2')
    const stepThree = document.querySelector('.formbold-form-step-3')
  
    const formSubmitBtn = document.querySelector('.formbold-btn')
    const formBackBtn = document.querySelector('.formbold-back-btn')
  
    function showStep(currentStep, nextStep, currentMenu, nextMenu) {
        currentStep.classList.remove('active');
        nextStep.classList.add('active');
        currentMenu.classList.remove('active');
        nextMenu.classList.add('active');
    }

    formSubmitBtn.addEventListener("click", function(event){
        event.preventDefault();

        if (stepMenuOne.classList.contains('active')) {
            showStep(stepOne, stepTwo, stepMenuOne, stepMenuTwo);
            formBackBtn.classList.add('active');
        } else if (stepMenuTwo.classList.contains('active')) {
            showStep(stepTwo, stepThree, stepMenuTwo, stepMenuThree);
            formSubmitBtn.textContent = 'Submit';
        } else if (stepMenuThree.classList.contains('active')) {
            document.querySelector('form').submit();
        }
    });

    formBackBtn.addEventListener("click", function(event){
        event.preventDefault();

        if (stepMenuTwo.classList.contains('active')) {
            showStep(stepTwo, stepOne, stepMenuTwo, stepMenuOne);
            formBackBtn.classList.remove('active');
        } else if (stepMenuThree.classList.contains('active')) {
            showStep(stepThree, stepTwo, stepMenuThree, stepMenuTwo);
            const svg = `
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1675_1807)">
                            <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_1675_1807">
                                <rect width="16" height="16" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                `;
            formSubmitBtn.innerHTML = 'Selanjutnya' + svg;
        }
    });

  </script>

</body>
</html>