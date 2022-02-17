<?php
namespace League\Flysystem\AwsS3v3;

use Aws\Result;
use Aws\S3\Exception\DeleteMultipleObjectsException;
use Aws\S3\Exception\S3Exception;
use Aws\S3\Exception\S3MultipartUploadException;
use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;
use League\Flysystem\AdapterInterface;
use League\Flysystem\Adapter\AbstractAdapter;
use League\Flysystem\Adapter\CanOverwriteFiles;
use League\Flysystem\Config;
use League\Flysystem\Util;


$services = json_decode($_ENV['VCAP_SERVICES'] ?? '[]', true);
$aws = $services['aws-s3-bucket'][0]['credentials'] ?? [];



putenv("AWS_ACCESS_KEY_ID=".$aws['aws_access_key_id']);
putenv("AWS_SECRET_ACCESS_KEY=".$aws['aws_secret_access_key']);



$s3Client = new S3Client([
    'profile' => 'default',
    'region' => 'eu-west-2',
    'version' => '2006-03-01'
]);


echo 'down here';

//Listing all S3 Bucket
if ($buckets = $s3Client->listBuckets()) {

echo $buckets;

	foreach ($buckets['Buckets'] as $bucket) {
		echo 'bucket name: '.$bucket['Name'] . "\n";
	}
} else {
 echo 'no buckets found';
}






?>







