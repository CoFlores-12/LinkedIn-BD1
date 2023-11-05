<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/index.css')}}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
    <div class="containerLandig">
    <div class="navbar flex flex-row justify-between items-center pt-3 pl-2 pr-2">
            <img class="w-[90px] md:w-[128px]" src="assets/logo.svg" alt="logo"/>
            <div class="navbar__session flex flex-row items-center ">
                <div class="navbar__links flex flex-row items-center ">
                    
                </div>
                <a href="/login?signin=true" >Unirse ahora</a>
                <a class="btnIniN" href="/login">Inicia sesion</a>
            </div>
        </div>
     <div class="containera pl-2 pr-2 pt-10 relative">
        <div class="containerForm w-full md:w-[50%]">
          <h1 style="font-size:45px; font-weight:300; color:#8f5849;" class="text-color">¡Te damos la bienvenida a tu comunidad profesional!</h1>
          <div class="form__group mt-4">
              <input type="text" id="12" class="form__field w-100" placeholder="Input text" />
              <label htmlFor="name" class="form__label"> Email or phone </label>
          </div>
          <div class="form__group mt-4">
              <input type="password" id="13" class="form__field w-100" placeholder="Input text" />
              <label htmlFor="name"  class="form__label"> Password </label>
          </div>
          <button class="btnIni logBtn" id="logBtn" onclick="loginF()">Inicia sesion</button>
        </div>
        <div class="sign-in-form__divider left-right-divider pt-2 pb-3">
          
        </div>
        <img class="invisible md:visible flip-rtl block z-[-1] w-[700px] h-[560px] absolute top-10 right-0 flex-shrink babybear:w-[374px] babybear:h-[214px] babybear:static" alt="¡Te damos la bienvenida a tu comunidad profesional!" data-test-id="hero__illustration" src="https://static.licdn.com/aero-v1/sc/h/dxf91zhqd2z6b0bwg85ktm5s4"></img>
    </div>
  </div>
<div class='flex pl-2 pr-2 pt-10 flex-row section2 containerLandig'>
<div class='flex-1'>
<h1 style="font-size:45px; font-weight:300; color:#8f5849;" class="text-color">Encuentra el empleo o las prácticas adecuadas para ti</h1>
</div>
<div class='flex flex-col flex-1'>
  <span class='mb-2'>BÚSQUEDAS SUGERIDAS</span>
  <div>
  @foreach($skills as $skill)
  <a class="btn-md mb-1.5 mr-[6px] flex items-center w-max float-left btn-secondary"  href="/busqueda/{{$skill->name}}">
          {{$skill->name}}
        </a>
        @endforeach
  </div>
</div>
</div>
            
           <script>
            
    function loginF() {
      const logBtn = document.getElementById('logBtn');
      logBtn.innerHTML = '<span class="loader"></span>'
      logBtn.disabled = true;
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
        .then(response =>  { 
          if (response.code == 200) {
            setCookie('token', response.token, 7);
          }else {
            alert(response.message);
            throw new Error(response.statusText);
          }})
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


