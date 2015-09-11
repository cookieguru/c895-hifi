<?php

class UploadController extends BaseController
{
	public function mainAction()
	{
		return View::make('upload');
	}

	public function doAction()
	{
		if (Input::hasFile('audio')) {

			/**
			 * @var \Symfony\Component\HttpFoundation\File\UploadedFile $file
			 */
			$file = Input::file('audio');

			$extension = $file->getClientOriginalExtension();
			$path = $file->getRealPath();
			$mime = $file->getMimeType();
			$name = sha1(time() . $path);

			/**
			 * @var \Aws\Sdk $aws
			 */
			$aws = App::make('Providers\AwsServiceProvider');
			$s3 = $aws->createS3();
			$resp = $s3->upload('test-c895', "uploads/{$name}.{$extension}", fopen($path, 'r'));

			unlink($path);

			Redirect::to('list');
		}
	}

	public function listAction()
	{
		/**
		 * @var \Aws\Sdk $aws
		 */
		$aws = App::make('Providers\AwsServiceProvider');
		$s3Client = $aws->createS3();

		$results = $s3Client->getPaginator('ListObjects', [
			'Bucket' => 'test-c895',
		]);

		foreach ($results->search('Contents[].Key') as $key) {
			'<p>' . $key . '</p>';
		}

	}
}
