<?php

$sdk = new Aws\Sdk();

$ec2Client = $sdk->createClient('ec2');

$ec2Client->execute('DescribeInstances', );

if ($notCreated) {
    $result = $ec2Client->execute('RunInstances', [
        'ImageId'        => 'ami-d05e75b8',
        'MinCount'       => 1,
        'MaxCount'       => 1,
        'InstanceType'   => 't2.micro',
        //'KeyName'        => $keyPairName,
        //'SecurityGroups' => array($securityGroupName),
    ]);
}
