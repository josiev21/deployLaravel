<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;
 
class What extends Model
{
    protected $table = "role_user";
    protected $fillable = ['user_id','role_id'];
}
