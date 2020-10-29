<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
class Book extends Model
{
    use Notifiable;
    public function owner(){
        return $this->belongsToMany('App\User', 'role_users');
    }
    protected $fillable = [
        'name', 'author', 'namxb', 'nhaxb','theloai','description','quanlity','dongia'
    ];
 
   
}
