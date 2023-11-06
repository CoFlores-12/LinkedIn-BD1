<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$user->name}} | LinkedIn</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <style>
        html, body {
            min-height: 100%;
        }
        form {
            margin: 30px 0px !important;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 10px;
        }
        input {
            border: 1px solid #eee;
        }
        input[type="file"] {
            width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
        }
        #photo {
            width: 100px
        }
        input[type="text"], input[type="password"] {
            margin-bottom: 10px
        }
        .skill {
            border-radius: 1rem;
            border: 1px solid #999;
            padding: 6px 10px;
            margin-bottom: 4px;
            margin-right: 5px;
            padding-right: 30px;
            vertical-align: middle;
            position:relative;
        }
        #skillscont {
            padding: 10px;
            width:100%;
            display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	justify-content: flex-start;
	align-items: center;
	align-content: flex-start;
        }
        h1{
            font-weight: 600 !important;
            font-size: 1.3rem !important;
            margin-top: 2rem !important;
        }
        .deleteSkill {
            font-size: 0.7rem;
            margin-left: 5px;
            vertical-align: middle;
            position: absolute;
            top:50%;
            transform: translate(0px, -45%);
            right: 10px;
        }
        .exp, .edu {
            margin: 20px 10px;
            border-radius: 10px;
            padding: 10px;
            border: 1px solid #999;
        }
        .save {
            width: 80%;
            
        }
        .add {
            padding: 7px !important;
        }
        .save, .add {
            background-color: #0073b1 !important;
            border: 0;
            border-radius: 20px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 1rem;
            font-weight: 600;
            font-family: inherit;
            overflow: hidden;
            outline-width: 2px;
            padding: 7px 24px;
            position: relative;
            text-align: center;
            text-decoration: none;
            -webkit-transition-duration: 167ms;
            transition-duration: 167ms;
            -webkit-transition-property: background-color,color,-webkit-box-shadow;
            transition-property: background-color,color,-webkit-box-shadow;
            transition-property: background-color,box-shadow,color;
            transition-property: background-color,box-shadow,color,-webkit-box-shadow;
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
            vertical-align: middle;
            z-index: 0;
        }
        .divider {
            margin-top:10px;
            border:1px solid #eee;
            width: calc(100% + 20px);
            transform: translate(-10px, 0px);
            height: 0.001px
        }
    </style>
</head>
<body>
    <div class="flex justify-center items-center h-full w-full">
        <form autocomplete="off" class="flex flex-col w-[95%] md:w-[70%] h-full" action="/update"  enctype="multipart/form-data" method="post" onkeydown="return event.key != 'Enter';">


            <input type="hidden" name="id" value="{{$user->id}}">
            <label for="bannerInp">
                <img src="{{URL::asset('storage/'.$user->banner)}}" id="banner" alt="">
            </label>
            <input type="hidden" name="oldBanner" value="{{$user->banner}}">
            <input type="file" accept="image/*" name="bannerSC" id="bannerInp">
            
            <label for="photoInt">
                <img src="{{URL::asset('storage/'.$user->photo)}}" id="photo" alt="">
            </label>
            <input type="hidden" name="oldPhoto" value="{{$user->photo}}">
            <input type="file" accept="image/*" name="photoSC" id="photoInt">
            
            <label for="name">Nombre*</label>
            <input type="text" name="name" id="nombre" value="{{$user->name}}">

            <label for="email">Correo*</label>
            <input type="text" name="email" id="email" value="{{$user->email}}">
            
            <label for="password">Contrasena*</label>
            <input type="password" name="password" id="contrasena" value="{{$user->password}}">
            
            <label for="info">Informacion</label>
            <input type="text" name="info" id="info" cols="30" rows="10" value="{{$user->info}}">

            
            @if ($user->categories_id != 0)
                <label for="category">Titular</label>
                <input autocomplete="off" aria-autocomplete="none" type="text" name="category" id="category" value="{{$user->categoryname}}" list="categories">
            @else
                <label for="category">Titular</label>
                <input autocomplete="off" aria-autocomplete="none" type="text" name="category" id="category" list="categories">
            @endif

            <datalist id="categories">
                @foreach ($categories as $category)
                    <option value="{{$category->nombre}}">
                @endforeach
            </datalist>

            <label for="location">Ubicacion</label>
            <input type="text" list="locations" name="location" id="ubi" value="{{$user->location}}">

            <datalist id="locations">
                @foreach ($locations as $location)
                    <option value="{{$location->location}}">
                @endforeach
            </datalist>
            
            <div>
                <h1>Experiencia</h1>
                <input type="hidden" name="countExp" id="countExp" value="{{count($exp)}}">
                <datalist id="companies">
                    @foreach ($works as $company)
                        <option value="{{$company->company_name}}">
                    @endforeach
                </datalist>
                <datalist id="companiesOC">
                    @foreach ($works as $company)
                        <option value="{{$company->occupation}}">
                    @endforeach
                </datalist>
               <div id="expCont">
               @for($i = 0; $i < count($exp); $i++)
               <div class="flex flex-col exp">
                <input readonly type="hidden" name="id-company-{{$i}}" value="{{$exp[$i]->id}}">
                <label for="company-{{$i}}">Compania</label>
                <input readonly type="text" list="companies" name="company-{{$i}}" id="company-{{$i}}"  value="{{$exp[$i]->company_name}}">

                <label for="locationCompany-{{$i}}">Ubicacion</label >
                <input readonly type="text" name="locationCompany-{{$i}}" list="locations" id="locationCompany-{{$i}}"  value="{{$exp[$i]->location}}">

                <label for="occupation-{{$i}}">Cargo</label>
                <input readonly type="text" list="companiesOC" name="occupation-{{$i}}" id="company"  value="{{$exp[$i]->occupation}}">
                <div class="flex flex-row">
                    <div class="flex flex-col w-[50%]">
                        <label for="dateIni-{{$i}}">Fecha de inicio</label>
                        <input readonly type="text" name="dateIni-{{$i}}" id="dateIni-{{$i}}"  value="{{$exp[$i]->start_date}}">
                    </div>
                    <div class="flex flex-col w-[50%]">
                        <label for="datefin-{{$i}}">Fecha de finalizacion</label>
                        <input readonly type="text" name="datefin-{{$i}}" id="dateIni"  value="{{$exp[$i]->finish_date}}">
                    </div>
                </div>
            </div>
                    @endfor


               </div>
                <button type="button" onclick="addExp()" class="add">Agregar</button>
            </div>
            <div >
                <h1>Educacion</h1>
                
                <input type="hidden" name="countEdu" id="countEdu" value="{{count($edu)}}">
                <datalist id="educations">
                    @foreach ($insti as $educationInsti)
                        <option value="{{$educationInsti->institute}}">
                    @endforeach
                </datalist>
                <datalist id="educationsGrades">
                    @foreach ($insti as $educationInsti)
                        <option value="{{$educationInsti->grade}}">
                    @endforeach
                </datalist>
                <div id="eduCont">
                    @for($i = 0; $i < count($edu); $i++)
                     <div class="flex flex-col edu">
                        <input readonly type="hidden" name="id-institute-{{$i}}" value="{{$edu[$i]->id}}">
                        <label for="institute-{{$i}}">Institucion</label>
                        <input readonly type="text" list="educations" name="institute-{{$i}}" id="institute-{{$i}}" value="{{$edu[$i]->institute}}">

                        <label for="locationinstitute-{{$i}}">Ubicacion</label >
                        <input readonly type="text" name="locationinstitute-{{$i}}" list="locations" id="instituteLocation-{{$i}}" value="{{$edu[$i]->location}}">

                        <label for="grade-{{$i}}">Grado</label>
                        <input readonly type="text" list="educationsGrade" name="grade-{{$i}}" id="institutegrade-{{$i}}" value="{{$edu[$i]->grade}}">

                        <div class="flex flex-row">
                            <div class="flex flex-col w-[50%]">
                                <label for="dateIniinstitute-{{$i}}">Fecha de inicio</label>
                                <input readonly type="text" name="dateIniinstitute-{{$i}}" id="dateIni-{{$i}}" value="{{$edu[$i]->start_date}}">
                            </div>
                            <div class="flex flex-col w-[50%]">
                                <label for="datefininstitute-{{$i}}">Fecha de finalizacion</label>
                                <input readonly type="text" name="datefininstitute-{{$i}}" id="datefin-{{$i}}" value="{{$edu[$i]->finish_date}}">
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
                <button type="button" onclick="addEdu()" class="add">Agregar</button>
            </div>
            <div>
                <h1>Skills</h1>
                <div id="skillscont">
                    @foreach($ski as $skill)
                        <span id="skill-{{$skill->name}}" class="skill">{{$skill->name}} <span class="deleteSkill" onclick="deleteSkill('{{$skill->name}}')">X</span></span>
                    @endforeach
                </div>
                <input type="hidden" name="skills" id="skillsInp" value="@foreach($ski as $skill),{{$skill->name}}@endforeach">
                <input type="text" list="skills" id="skillsTEMP" name="skillsHide" placeholder="agregar skill">
                <datalist id="skills">
                    @foreach ($skills as $skill)
                        <option value="{{$skill->name}}">
                    @endforeach
                </datalist>
            </div>
            <div class="divider"></div>
            <div class="flex justify-center mt-3">
                <button class="save">Guardar</button>
            </div>
        </form>
    </div>

    <script>
        let skillsInp = document.getElementById("skillsInp");
        let skillsCont = document.getElementById("skillscont");
        let expCont = document.getElementById("expCont");
        let eduCont = document.getElementById("eduCont");
        let countEdu = document.getElementById("countEdu");
        let countExp = document.getElementById("countExp");

        let indiceEdu = {{count($edu)}};
        let indiceExp = {{count($exp)}};
        document.getElementById("skillsTEMP")
            .addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                if (event.srcElement.value == "") {
                    return
                }
                let skill = event.srcElement.value;
                skillsCont.innerHTML += `<span id="skill-${skill}" class="skill">${skill} <span class="deleteSkill" onclick="deleteSkill('${skill}')">X</span></span>`
                skillsInp.value += `,${skill}`;
                event.srcElement.value = "";
            }
        });

        function deleteSkill(event) {
            document.getElementById("skill-"+event).remove();
            skillsInp.value = skillsInp.value.replace(','+event, '');
        }

        function addEdu() {
            eduCont.innerHTML += ` 
            <div class="flex flex-col edu">
                <input type="hidden" name="id-institute-${indiceEdu}">
                <label for="institute-${indiceEdu}">Institucion</label>
                <input type="text" list="educations" name="institute-${indiceEdu}" id="institute-${indiceEdu}">

                <label for="locationinstitute-${indiceEdu}">Ubicacion</label >
                <input type="text" name="locationinstitute-${indiceEdu}" list="locations" id="instituteLocation-${indiceEdu}">

                <label for="grade-${indiceEdu}">Grado</label>
                <input type="text" list="educationsGrade" name="grade-${indiceEdu}" id="institutegrade-${indiceEdu}">

                <div class="flex flex-row">
                    <div class="flex flex-col w-[50%]">
                        <label for="dateIniinstitute-${indiceEdu}">Fecha de inicio</label>
                        <input type="date" name="dateIniinstitute-${indiceEdu}" id="dateIni-${indiceEdu}">
                    </div>
                    <div class="flex flex-col w-[50%]">
                        <label for="datefininstitute-${indiceEdu}">Fecha de finalizacion</label>
                        <input type="date" name="datefininstitute-${indiceEdu}" id="datefin-${indiceEdu}">
                    </div>
                </div>
            </div>`;
            indiceEdu++;
            countEdu.value = indiceEdu;
        }

        function addExp() {
            expCont.innerHTML += `
            <div class="flex flex-col exp">
                <input type="hidden" name="id-company-${indiceExp}">
                <label for="company-${indiceExp}">Compania</label>
                <input type="text" list="companies" name="company-${indiceExp}" id="company-${indiceExp}">

                <label for="locationCompany-${indiceExp}">Ubicacion</label >
                <input type="text" name="locationCompany-${indiceExp}" list="locations" id="locationCompany-${indiceExp}">

                <label for="occupation-${indiceExp}">Cargo</label>
                <input type="text" list="companiesOC" name="occupation-${indiceExp}" id="company">
                <div class="flex flex-row">
                    <div class="flex flex-col w-[50%]">
                        <label for="dateIni-${indiceExp}">Fecha de inicio</label>
                        <input type="date" name="dateIni-${indiceExp}" id="dateIni-${indiceExp}">
                    </div>
                    <div class="flex flex-col w-[50%]">
                        <label for="datefin-${indiceExp}">Fecha de finalizacion</label>
                        <input type="date" name="datefin-${indiceExp}" id="dateIni">
                    </div>
                </div>
            </div>`;
            indiceExp++;
            countExp.value = indiceExp;
        }
        const imgInp = document.getElementById('photoInt')
        const bannerInp = document.getElementById('bannerInp')
        const banner = document.getElementById('banner')
        const photo = document.getElementById('photo')
        imgInp.onchange = evt => {
            console.log("photo changed");
            const [file] = imgInp.files
            if (file) {
                photo.src = URL.createObjectURL(file);
            }
        }
        bannerInp.onchange = evt => {
            console.log('banner changed');
            const [file] = bannerInp.files
            if (file) {
                banner.src = URL.createObjectURL(file);
            }
        }
    </script>
</body>
</html>