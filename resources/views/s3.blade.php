<?php

die();

namespace App\Http\Controllers;

use App\Services\Application;
use App\Services\Forms\BaseForm;
use Illuminate\Support\Facades\Storage;


Storage::disk('s3')->put('logo.png', file_get_contents('https://poweredbyreason.co.uk/files/uploads/pbr_logo.png'));

echo Storage::disk('s3')->url('logo.png');

?>
