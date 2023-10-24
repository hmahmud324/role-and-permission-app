<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'email_verified_at'     => 'datetime',
        'password'              => 'hashed',
    ];


    private static $user,$image,$imageUrl,$directory,$imageName;

    public static function imageUpload($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = 'uploads/admin-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory . self::$imageName;
    }

    public static function newUser($request)
    {
        if ($request->file('image')) {
        self::$imageUrl = self::imageUpload($request);    
        }
        else{
            self::$imageUrl = ' ';
        }
        

        self::$user  = new User();
        self::$user->name                        = $request->name;
        self::$user->email                       = $request->email;
        self::$user->password                    = bcrypt($request->password);
        self::$user->profile_photo_path          = self::$imageUrl;
        self::$user->save();
    }

    public static function updateUser($request,$id)
    {
        self::$user = User::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$user->image)) {
                unlink(self::$user->image);
            }
            self::$imageUrl = self::imageUpload($request);
        }
        else
        {
            self::$imageUrl = self::$user->image;
        }
        self::$user->name                        = $request->name;
        self::$user->email                       = $request->email;
        if($request->password)
        {
        self::$user->password                    = bcrypt($request->password);
        }
        self::$user->profile_photo_path          = self::$imageUrl;
        self::$user->save();
    }

    public static function deleteUser($id)
    {
        self::$user = User::find($id);
        if (file_exists(self::$user->image))
        {
            unlink(self::$user->image);
        }
        self::$user->delete();
    }

}
