<?php namespace laravel5\Http\Controllers;


use Carbon\Carbon;
use laravel5\User;

class UsersController extends Controller {

    public function getOrm()
    {
        $users=User::select('id','first_name')
            ->where('first_name','<>','edward')
            ->with('profile')
            ->orderBy('first_name','ASC')
            ->get();
        dd($users->toArray());
        //esto es para un solo registro
        //$result=User::first();
        //dd($result->profile->age);
        //dd($result->profile);
        //dd($result->getFullNameAttribute());
        //dd($result->full_name);
    }

    public function getIndex()
    {
        $result= \DB::table('users')
            ->select('users.*',
                'user_profiles.id as profile_id',
                'user_profiles.twitter',
                'user_profiles.birthdate')
            //->where('first_name','edward')//si no se coloca '<>' se da por entendido que es un igual
            ->orderBy('id','ASC')
            ->leftJoin('user_profiles','users.id','=','user_profiles.user_id')
            ->get();

        foreach($result as $row)
        {
            $row->full_name=$row->first_name.' '.$row->last_name;
            $row->age=\Carbon\Carbon::parse($row->birthdate)->age;
        }
        dd($result);
        return $result;
    }
}