<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave_Request_Response extends Model
{
    use HasFactory;
    protected $table="leaves_request";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function leave(){
        return $this->belongsTo(Leave::class);
    }
}
