<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = "appointments";
    protected $primaryKey = "id";

    protected $fillable = [

        'Name',
        'start_time',
        'finish_time',
        'comments',
        
        
    ];
   
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
 
    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}
