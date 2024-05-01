<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [

        'Name',
        'Email_Address',
        'Phone_Number',
        'Mailing_Address',
        'Gender',
        
    ];
}
