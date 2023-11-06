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

        $value = session()->get('token');
        $id = JWTAuth::decode(new Token($value))['sub'];
        
        return view('profile', ['user' => $user, 'myID' => $id, 'publicaciones' => $publicaciones, 'followers'=> $followers]);
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
        if (!DB::table('locations')->where('location', $request->location)->exists()) {
                $location = DB::insert("insert into locations (location) values ('?')", array($request->location));
            }
        $location = DB::table('locations')
            ->where('location', $request->location)->first();

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

        $skills = explode(',', $request->skills);
        

        foreach ($skills as $skill){
            if($skill == ""){
                continue;
            }
            $skill = DB::table("skills")->where("name", $skill)->first();
            if (!DB::table('my_skills')->where('skills_id', $skill->id)->where('users_id', $request->id)->exists()) {
                DB::insert("insert into my_skills values (?, ?)", array($request->id,$skill->id));
            }
        }

        $myskills = DB::select('SELECT * FROM my_skills INNER JOIN skills ON skills.id = my_skills.skills_id  WHERE my_skills.users_id = '. $request->id );

        foreach ($myskills as $skillf) {
            if(!in_array($skillf->name,$skills)){
                DB::delete('DELETE FROM my_skills WHERE my_skills.skills_id = ' . $skillf->id );
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
