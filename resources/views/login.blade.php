<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn | Login</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .txt-pri{
        cursor: pointer;
        padding: 5px 3px;
        border-radius: 10px;
      }
      .txt-pri:hover{
        background-color: #0a66c20F;
        outline: 1px solid #0a66c2;
      }
    </style>
</head>
<body>
    <div  id="main">
    <div class='p-5 pt-9' id="contLogin">
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
        <button id="logBtn" class='btnIni flex justify-center items-center' onclick="loginF()" >Iniciar sesión</button>
        <span class='mt-5'>¿Estás empezando a usar LinkedIn? <span class='txt-pri' onClick="view()">Unirse ahora</span></span>
      </div>
    </div>
  </div>
  <div class='p-5 pt-9 hidden' id="signCont">
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
        <button id="signBtn" class='btnIni flex justify-center items-center' onclick="registerF()" >Aceptar y unirse</button>
        <span class='mt-5'>¿Ya estás LinkedIn? <span class='txt-pri' onClick="view()">Iniciar sesión</span></span>
      </div>
    </div>
  </div>
    </div>
  <script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const viewParam = Boolean( urlParams.get('signin') )
    let viewState = 'login'
    if (viewParam) {
      viewState = 'register'
    }
    let mainCOnt = document.getElementById('main');
    let contLogin = document.getElementById('contLogin');
    let signCont = document.getElementById('signCont');
    view();
    function view() {
        if(viewState === 'login'){
          contLogin.classList.remove('hidden')
          signCont.classList.add('hidden')
          viewState = 'register'
        }else{
          signCont.classList.remove('hidden')
          contLogin.classList.add('hidden')
          viewState = 'login'
        }
    }

    function loginF() {
      const logBtn = document.getElementById('logBtn');
      const signBtn = document.getElementById('signBtn');
      logBtn.innerHTML = '<span class="loader"></span>'
      logBtn.disabled = true;
      signBtn.innerHTML = '<span class="loader"></span>'
      signBtn.disabled = true;
      const email = document.getElementById('12').value;
      const password = document.getElementById('13').value;
      if (email=="" || password=="") {
        return
      }
      let formData = new FormData();
      formData.append('email', email);
      formData.append('password', password);
      const options = {method: 'POST', body: formData};

      fetch('/login', options)
        .then(response => response.json())
        .then(response => setCookie('token', response.token, 7))
        .catch(err => {
          console.error(err)
          logBtn.innerHTML = 'Iniciar sesión'
          logBtn.disabled = false;
          signBtn.innerHTML = 'Aceptar y unirse'
          signBtn.disabled = false;
        });
    }

    function registerF(){
      const logBtn = document.getElementById('logBtn');
      const signBtn = document.getElementById('signBtn');
      logBtn.innerHTML = '<span class="loader"></span>'
      logBtn.disabled = true;
      signBtn.innerHTML = '<span class="loader"></span>'
      signBtn.disabled = true;
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

      fetch('/register', options)
        .then(response => response.json())
        .then(response => setCookie('token', response.token, 7))
        .catch(err => {
          console.error(err)
          logBtn.innerHTML = 'Iniciar sesión'
          logBtn.disabled = false;
          signBtn.innerHTML = 'Aceptar y unirse'
          signBtn.disabled = false;
        });
    }
    function setCookie(cname, cvalue, exdays) {
      const d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      let expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      window.location.href = '/home'
    }
  </script>
</body>
</html>