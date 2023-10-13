<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn | Login</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div  id="main">

    </div>

  
  <script>
    let viewState = 'login'
    let mainCOnt = document.getElementById('main');
    const login = `<div class='p-5 pt-9'>
    <img src="assets/logo.svg" alt="" width={50} height={50} class='w-[105px] mb-4' />
    <div class='flex flex-col w-full justify-center items-center'>
      <div  class='flex flex-col w-full sm:w-[60%]'>
        <h1 class='header'>Iniciar sesión</h1>
        <p class='text-sm'>Mantente al día de tu mundo profesional</p>
        <div class="form__group">
            <input type="text" id='12' class="form__field w-100" placeholder="Input text" />
            <label htmlFor="name" class="form__label"> Email or phone </label>
        </div>
        <div class="form__group">
            <input type="password" id='13' class="form__field w-100" placeholder="Input text" />
            <label htmlFor="name" class="form__label"> Password </label>
        </div>
        <a class='btnIni' onclick="loginF()" href="#"><button >Inicia sesion</button></a>
        <span class='mt-5'>¿Estás empezando a usar LinkedIn? <span class='txt-pri' onClick="view()">Unirse ahora</span></span>
      </div>
    </div>
  </div>`;
  const register = `<div class='p-5 pt-9'>
    <img src="assets/logo.svg" height={50} alt="" width={50} class='w-[105px] mb-4' />
    <div class='flex flex-col w-full justify-center items-center'>
        <h1 class='headerS'>Saca el máximo partido a tu vida profesional</h1>
      <div class='flex flex-col w-full sm:w-[60%]'>
        <div class="form__group">
            <input type="text" id='14' class="form__field w-100" placeholder="Input text" />
            <label htmlFor="name" class="form__label"> Name </label>
        </div>
        <div class="form__group">
            <input type="text" id='15' class="form__field w-100" placeholder="Input text" />
            <label htmlFor="name" class="form__label"> Email or phone </label>
        </div>
        <div class="form__group">
            <input type="password" id='16' class="form__field w-100" placeholder="Input text" />
            <label htmlFor="password" class="form__label"> Password </label>
        </div>
        <a class='btnIni'  onclick="registerF()" href="#"><button >Aceptar y unirse</button></a>
        <span class='mt-5'>¿Ya estás LinkedIn? <span class='txt-pri' onClick="view()">Iniciar sesión</span></span>
      </div>
    </div>
  </div>`
  mainCOnt.innerHTML = viewState === 'login' ? login : register
    function view() {
        viewState = viewState === 'login' ? 'register' : 'login'
        mainCOnt.innerHTML = viewState === 'login' ? login : register
    }

    function loginF() {
      const email = document.getElementById('12').value;
      const password = document.getElementById('13').value;
      if (email=="" || password=="") {
        return
      }
      let formData = new FormData();
      formData.append('email', email);
      formData.append('password', password);
      const options = {method: 'POST', body: formData};

      fetch('/api/login', options)
        .then(response => response.json())
        .then(response => alert(response))
        .catch(err => console.error(err));
    }

    function registerF(){
      const name = document.getElementById('14').value;
      const email = document.getElementById('15').value;
      const password = document.getElementById('16').value;
      if (name=="" || email=="" || password=="") {
        return
      }
      let formData = new FormData();
      formData.append('name', name);
      formData.append('email', email);
      formData.append('password', password);
      const options = {method: 'POST', body: formData};

      fetch('/api/register', options)
      .then(response => response.json())
        .then(response => alert(response))
        .catch(err => console.error(err));
    }
  </script>
</body>
</html>