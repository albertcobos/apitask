<?php
namespace App\Models;




use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $table = "tasks";



    /**
     * The attributes that are mass assignable.
     *
     * @var array 
     */
    protected $fillable = [
        'id','title','content','date','state'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];
}
