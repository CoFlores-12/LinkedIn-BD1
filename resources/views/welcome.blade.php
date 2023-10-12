<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/index.css')}}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
    <div >
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
        <div class="w-full md:w-[50%]">
          <h1 style="font-size:'25px'; font-weight:'300'">¡Te damos la bienvenida a tu comunidad profesional!</h1>
          <div class="form__group mt-4">
              <input type="text" id="12" class="form__field w-100" placeholder="Input text" />
              <label htmlFor="name" class="form__label"> Email or phone </label>
          </div>
          <div class="form__group mt-4">
              <input type="password" id="13" class="form__field w-100" placeholder="Input text" />
              <label htmlFor="name"  class="form__label"> Password </label>
          </div>
          <button class="btnIni" onClick={login}>Inicia sesion</button>
        </div>
        <img class="invisible md:visible flip-rtl block z-[-1] w-[700px] h-[560px] absolute top-10 right-0 flex-shrink babybear:w-[374px] babybear:h-[214px] babybear:static" alt="¡Te damos la bienvenida a tu comunidad profesional!" data-test-id="hero__illustration" src="https://static.licdn.com/aero-v1/sc/h/dxf91zhqd2z6b0bwg85ktm5s4"></img>
    </div>
  </div>

            
                
    </body>
</html>
