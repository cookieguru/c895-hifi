<?php

class StorageController extends BaseController {

    public function doFetch($key)
    {
        /**
         * @var \Aws\Sdk $aws
         */
        $aws = App::make('Providers\AwsServiceProvider');
        $s3Client = $aws->createS3();

        $result = $s3Client->getObject([ 'Bucket' => 'test-c895', 'Key' => "uploads/{$key}" ]);

        header('Content-type: audio/mp4');
        header("Content-Disposition: attachment; filename=$key");
        header('Expires: 0');
        header('Pragma: no-cache');

        while ($data = $result['Body']->read(1024)) {
            echo $data;
        }
        exit;
    }

}
