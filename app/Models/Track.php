<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    
    protected $fillable=["titulo","path","id_int"];
    protected $table="track";

    protected static function boot(){
        parent::boot();
        self::creating(function($table){
            if(! app()->runningInConsole()){
                $table->id_user = auth()->id();
            }
        });
    }

    public function interprete(){
        return $this->belongsTo(Interprete::class,'id_int');
    }

    public function Users(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function getUrlPath(){
        return \Storage::url($this->path);
    }
}
