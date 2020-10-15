<?php
class StopWatch {
    /**
     * @var $startTimes array The start times of the StopWatches
     */
    private static $startTimes = array();

    /**
     * Start the timer
     *
     * @param $timerName string The name of the timer
     * @return void
     */
    public static function start($timerName = 'default') {
        self::$startTimes[$timerName] = microtime(true);
    }

    /**
     * Get the elapsed time in seconds
     *
     * @param $timerName string The name of the timer to start
     * @return float The elapsed time since start() was called
     */
    public static function elapsed($timerName = 'default') {
        return microtime(true) - self::$startTimes[$timerName];
    }
}
?>
<?php
// start the timer
StopWatch::start();

// sleep for 2 seconds
sleep(2);

// check how long 2 seconds is...
echo "Elapsed time: " . StopWatch::elapsed() . " seconds";
?>
<?php
// create a new S3 instance
$s3 = new S3('my access key', 'my secret key');

// start the timer
StopWatch::start();

// read & send the file
$f = $s3->inputFile('file_to_upload.zip');
$r = $s3->putObject($f, 'my-bucket-name', 'uploaded_file.zip', S3::ACL_PUBLIC_READ);

// check the result of the operation
if ($r !== false) {
    // check how long it took
    echo "Elapsed time: " . StopWatch::elapsed() . " seconds";
} else {
    echo "S3 Error!";
}
?>