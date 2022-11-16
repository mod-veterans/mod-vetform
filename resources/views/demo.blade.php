<?php
die();
namespace App\Http\Controllers;
use App\Services\Application;
use App\Services\Forms\BaseForm;
use Illuminate\Support\Facades\Storage;

if (empty (getenv('DB_PASSWORD'))) {

    $dbCredentialsUrl = $_ENV['DATABASE_URL'] ?? null;
    $dbCredentials = parse_url($dbCredentialsUrl);


    $_ENV['DB_HOST']   = $dbCredentials['host'];
    $_ENV['DB_PORT']     = '5432';
    $_ENV['DB_DATABASE'] = trim($dbCredentials['path'], '/');
    $_ENV['DB_USERNAME'] = $dbCredentials['user'];
    $_ENV['DB_PASSWORD'] = $dbCredentials['pass'];


} else {

    $_ENV['DB_HOST'] =  getenv('DB_HOST');
    $_ENV['DB_PORT']  = getenv('DB_PORT');
    $_ENV['DB_DATABASE']     = getenv('DB_DATABASE');
    $_ENV['DB_USERNAME'] = getenv('DB_USERNAME');
    $_ENV['DB_PASSWORD'] = getenv('DB_PASSWORD');
}





$db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");


//initial DB creation
if (pg_query($db, "CREATE SEQUENCE IF NOT EXISTS userdatatable_id_seq")) {
    echo 'table sequence created<br />';
}

if (
pg_query($db, 'CREATE TABLE "public"."userdatatable" (
    "id" int4 NOT NULL DEFAULT nextval(\'userdatatable_id_seq\'::regclass),
    "datetimeadded" timestamp,
    "datelastaccessed" timestamp DEFAULT now(),
    "data" varchar,
    "surnamehash" text,
    "emailhash" text,
    "nihash" text,
    "userid" varchar,
    "userref" text,
    "accesscode" text,
    "accessuseby" timestamp,
    PRIMARY KEY ("id")
)'


    )) {
    echo 'table created<br />';
}



/*

if  ( (!empty($_GET['doInstall'])) && ($_GET['doInstall'] == 'InstallPaul') ) {

    $db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");


        if (pg_query($db, "DROP TABLE IF EXISTS public.uatdatatable")) {
            echo 'table dropped<br />';
        }
        if (pg_query($db, "CREATE TABLE public.uatdatatable (LIKE public.modvetdevusertable INCLUDING ALL)")) {
            echo 'table copied<br />';
        }
        if (pg_query($db, "INSERT INTO public.uatdatatable SELECT * FROM public.modvetdevusertable")) {
            echo 'data copied<br />';
        }

}



echo strtotime("-93 days");

*/


/*
if ($_GET['s'] == 'HEIC') {

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;
// create an image manager instance with favored driver
$manager = new ImageManager(['driver' => 'imagick']);
// to finally create image instances
$image = $manager->make($_SERVER['DOCUMENT_ROOT'].'/image.heic')->resize(300, 200);
}
*/






/*
$count = 0;
if (!empty($_GET['s'])) {


collect(Storage::disk('s3')->listContents())
	->each(function($file) {
        $removeTime = strtotime('now -100 days');
		if (($file['type'] == 'file') && ($file['timestamp'] < $removeTime)) {
			//echo var_dump($file).'<br />';
			echo $file['filename'].' - '.date('H:i:s d-m-Y', $file['timestamp']).'<br />';

		}
	});



}

*/

?>

@include('framework.header')

@include('framework.backbutton')



</div>

@include('framework.footer')

