<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
  
class ModelMaster extends Authenticatable
{
    use SoftDeletes;
    protected $table = 'models_master';
    protected $fillable = [
        'name',
        'image',
        'number',
        'description'
    ];
    protected $dates = ['deleted_at'];
    protected $softDelete = true;
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $final = mt_rand(100000,999999); 
            $model->attributes['uuid'] = $final;
        });
    }
}