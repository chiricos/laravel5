<?php namespace laravel5;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    protected $fillable=['first_name','last_name','email','password','type'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function profile(){
        return $this->hasOne('laravel5\UserProfile');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function setPasswordAttribute($value)
    {
        if( ! empty($value))
        {
            return $this->attributes['password']= bcrypt($value);
        }

    }

    public function scopeName($query,$name)
    {
        if(!empty($name))
        {
            //return $query->where('first_name',$name);
            return $query->where(\DB::raw("CONCAT(first_name, ' ',last_name)"),"LIKE","%$name%");
        }

    }

    public function scopeType($query,$type)
    {
        $types=config('options.types');
        if($type != "" && isset($types[$type]))
        {
            return $query->where('type',$type);
        }

    }

    public function isAdmin()
    {
        return $this->type === 'admin';
    }

}
