<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    // public $validationrules = [
    //     'name' => 'required',
    //     'email' => 'required|email|unique:users,email',
    //     'password'  =>  'required|min:6|confirmed',
    //     'confirm_password'  =>  'required|min:6|confirmed',
    //     'roles' => 'required'
    // ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'first_name',
        'last_name',
        'middle_name',
        'blood_type',
        'age',
        'birthdate',
        'gender',
        'civil_status',
        'nationality',
        'occupation',
        'address',
        'contact_info',
        'password',
        'unique_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userRole()
    {
        
        return $this->belongsTo('Spatie\Permission\Models\Role', 'id', 'id');
    }

    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }


    public function getCalculatedAgeAttribute()
    {
        if ($this->birthdate) {
            return Carbon::parse($this->birthdate)->age;
        }

        return null;
    }
}
