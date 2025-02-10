<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Pendingtask extends Model
{
    protected $fillable= 
    ["id","title","content","user_id","date"];
   
}

