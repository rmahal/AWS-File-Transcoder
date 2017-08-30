<?php
use Aws\ElasticTranscoder\ElasticTranscoderClient;
require 'vendor/autoload.php';


function transcodeVideo($file,$format){

$client = ElasticTranscoderClient::factory(array(
    'credentials' => array(
//    'profile' => array(
        'key' => 'Account Key goes here',
        'secret' => 'Account Secret Key goes here',
        ),
    'region' => 'us-west-1', // dont forget to set the region
));


$job = $client->createJob(array(

    'PipelineId' => 'PipelineId goes here',
    'OutputKeyPrefix' => 'OutputKeyPrefix goes here',
    'Input' => array(
        'Key' => $file ,
        'FrameRate' => 'auto',
        'Resolution' => 'auto',
        'AspectRatio' => 'auto',
        'Interlaced' => 'auto',
        'Container' => 'auto',
    ),
    'Outputs' => array(
        array(
            'Key' => 'Outputs filename goes here',
            'Rotate' => 'auto',
            'PresetId' => 'Transcoder setting preset goes here',
        ),
    ),
));


// get the job data as array
//$jobData = $job->get('Job');

// you can save the job ID somewhere, so you can check 
// the status from time to time.
//$jobId = $jobData['Id'];

}

$a = "test.mov";
$b = "webm";

transcodeVideo($a,$b);

?>

