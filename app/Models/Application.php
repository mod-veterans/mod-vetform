<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Application extends Model
{
    use HasFactory;

    public $fillable = [];

    public function encyrypt($data = []) {
        return Crypt::encrypt($data);
    }

    public function decrypt($data) {
        return Crypt::decrypt($data);
    }
}
