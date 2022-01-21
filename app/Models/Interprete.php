<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interprete extends Model
{
    use HasFactory;

    protected $fillable = ["nombre"];
    public $table="interprete";
    
    protected static function boot(){
        parent::boot();
        self::creating(function($table){
            if(! app()->runningInConsole()){
                $table->user_id=auth()->id();
            }
        });
    }
    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tracks()
    {
        return $this->hasMany(Track::class,'id_int');
    }
}
