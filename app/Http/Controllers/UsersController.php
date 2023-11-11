<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Session;
use Tymon\JWTAuth\Token;

class UsersController extends Controller{
    public function viewProfile(Request $request){
        if (!DB::table('users')->where('id', $request->id)->exists()){
            return response()->json([
              'status' => 404,
              'message' => 'No se encontraron resultados'
            ]);
        }
        $user = DB::table('users')
        ->select('users.id','name', 'email', 'banner', 'photo', 'info', 'categories.nombre as categoryName', 'locations.location')
        ->join('categories', 'categories.id','users.categories_id')
        ->leftjoin('locations', 'locations.id','users.locations_id')
        ->where('users.id', $request->id)->first();

        $publicaciones = DB::select('SELECT * FROM posts WHERE users_id = ' . $request->id .'');

        $followers = DB::select('SELECT count(id) as followers FROM following WHERE "TO" = '.$request->id);

        $ski = DB::select('select * from skills join my_skills on skills.id = my_skills.skills_id where my_skills.users_id = '.$request->id);

        $exp = DB::select('select * from work_experience join my_experience on my_experience.work_experience_id = work_experience.id where my_experience.users_id = '.$request->id);

        $edu = DB::select('select * from education inner join my_education on education.id = my_education.education_id where my_education.users_id = '.$request->id);

        $value = session()->get('token');
        $id = JWTAuth::decode(new Token($value))['sub'];

        $following = DB::table('following')->where('from', $id)->where('to', $request->id)->exists();
        
        return view('profile', ['user' => $user, 'myID' => $id, 'publicaciones' => $publicaciones, 'followers'=> $followers, 'skills' => $ski, 'edu' => $edu, 'exp' => $exp, 'following' => $following]);
    }
    public function update(Request $request){
        if (!DB::table('users')->where('id', $request->id)->exists()){
            return response()->json([
                'status'=> 404,
                'message'=> 'Error updating user'
            ]);
        }
        
        //Category logic
        if (!DB::table('categories')->where('nombre', $request->category)->exists()) {
            $category = DB::insert('insert into categories (nombre) values (?)', array($request->category));
        }
        $category = DB::table('categories')
            ->where('nombre', $request->category)->first();

        //Location Logic
        $location = DB::table('locations')
                ->where('location', $request->location)->first();
        if ($request->location != "") {
            if (!DB::table('locations')->where('location', $request->location)->exists()) {
                    $location = DB::insert("insert into locations (location) values ('?')", array($request->location));
                }
            $location = DB::table('locations')
                ->where('location', $request->location)->first();
        }else{
            $location = (object) array('id' => null);
        }

        //PP & banner logic
        $destinationPath = 'storage';
        $photo = $request->oldPhoto;
        $banner = $request->oldBanner;
        if ($request->hasFile('photoSC')){
            $file = $request->file('photoSC');
            $file->move($destinationPath,$file->getClientOriginalName());
            $photo = $file->getClientOriginalName();
        }
        if ($request->hasFile('bannerSC')){
            $file = $request->file('bannerSC');
            $file->move($destinationPath,$file->getClientOriginalName());
            $banner = $file->getClientOriginalName();
        }

        //skills logic
        $skills = explode(',', $request->skills);
        
        //add new
        foreach ($skills as $skill){
            if($skill == ""){
                continue;
            }
            $skill = DB::table("skills")->where("name", $skill)->first();
            if (!DB::table('my_skills')->where('skills_id', $skill->id)->where('users_id', $request->id)->exists()) {
                DB::insert("insert into my_skills values (?, ?)", array($request->id,$skill->id));
            }
        }

        //delete
        $myskills = DB::select('SELECT * FROM my_skills INNER JOIN skills ON skills.id = my_skills.skills_id  WHERE my_skills.users_id = '. $request->id );

        foreach ($myskills as $skillf) {
            if(!in_array($skillf->name,$skills)){
                DB::delete('DELETE FROM my_skills WHERE my_skills.skills_id = ' . $skillf->id );
            }
        }

        //edu logic
        for ($i=0; $i < $request->countEdu ; $i++) { 
            $tempvar = "id-institute-".$i;
            if($request->$tempvar == null){
                $tempname = "institute-".$i;
                $templocation = "locationinstitute-".$i;
                $tempgrade = "grade-".$i;
                $tempini = "dateIniinstitute-".$i;
                $tempfin = "datefininstitute-".$i;
                if (!DB::table('education')->where('institute', $request->$tempname)->where('location', $request->$templocation)->where('grade',$request->$tempgrade)->exists()) {
                    DB::insert("insert into education(institute, location, grade) values ('?', '?', '?')", array($request->$tempname,$request->$templocation, $request->$tempgrade));
                }
                $institute = DB::table('education')->where('institute', $request->$tempname)->where('location', $request->$templocation)->where('grade',$request->$tempgrade)->first();

                DB::insert('insert into my_education(users_id,education_id,start_date,finish_date) values (?, ? , ?, ?)', array( $request->id, $institute->id, $request->$tempini, $request->$tempfin));
            }
        }

        //exp logic
        for ($i=1; $i < $request->countExp ; $i++) { 
            $tempvar = "id-company-".$i;
            if($request->$tempvar == null){
                $tempname = "company-".$i;
                $templocation = "locationCompany-".$i;
                $tempgrade = "occupation-".$i;
                $tempini = "dateIni-".$i;
                $tempfin = "datefin-".$i;
                if (!DB::table('work_experience')->where('company_name', $request->$tempname)->where('location', $request->$templocation)->where('occupation',$request->$tempgrade)->exists()) {
                    DB::insert('insert into work_experience("COMPANY_NAME", "LOCATION","OCCUPATION") values (\''.$request->$tempname.'\', \''.$request->$templocation.'\', \''.$request->$tempgrade.'\')');
                }
                $comapny = DB::table('work_experience')->where('company_name', $request->$tempname)->where('location', $request->$templocation)->where('occupation',$request->$tempgrade)->first();

                DB::insert('insert into my_experience(users_id,work_experience_id,start_date,finish_date) values (?, ? , ?, ?)', array( $request->id, $comapny->id, $request->$tempini, $request->$tempfin));
            }
        }
        
        $user = DB::table('users')
        ->where('id', $request->id)
        ->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
            'info'=> $request->info,
            'categories_id' => $category->id,
            'locations_id'=> $location->id,
            'banner'=>$banner,
            'photo'=>$photo
        ]);
        return redirect()->route('users.viewProfile', $request->id);
    }
}
