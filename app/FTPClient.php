<?php

namespace App;

use Illuminate\Support\Facades\Log;

class FTPClient {

    private $connectionId;
    private $loginOk = false;
    private $messageArray = array();

    public function __construct() {
    }

    public function __deconstruct() {
        if ($this->connectionId) {
            ftp_close($this->connectionId);
        }
    }

    private function logMessage($message) {
        $this->messageArray[] = $message;
    }

    public function getMessages() {
        return $this->messageArray;
    }

    public function connect($server, $ftpUser, $ftpPassword, $isPassive = true) {

        // *** Set up basic connection
        $this->connectionId = ftp_connect($server);

        // *** Login with username and password
        $loginResult = ftp_login($this->connectionId, $ftpUser, $ftpPassword);

        // *** Sets passive mode on/off (default off)
        ftp_pasv($this->connectionId, $isPassive);

        // *** Check connection
        if ((!$this->connectionId) || (!$loginResult)) {
            $this->logMessage('FTP connection has failed!');
            $this->logMessage('Attempted to connect to ' . $server . ' for user ' . $ftpUser);
            return false;
        } else {
            $this->logMessage('Connected to ' . $server . ', for user ' . $ftpUser);
            $this->loginOk = true;
            return true;
        }
    }

    public function makeDir($directory) {
        // *** If creating a directory is successful...
        if (ftp_mkdir($this->connectionId, $directory)) {
            $this->logMessage('Directory "' . $directory . '" created successfully');
            return true;

        } else {
            // *** ...Else, FAIL.
            $this->logMessage('Failed creating directory "' . $directory . '"');
            return false;
        }
    }

    public function uploadFile($fileFrom, $fileTo) {
        // *** Set the transfer mode
        $asciiArray = array('txt', 'csv');
        $exp = explode('.', $fileFrom);
        $extension = end($exp);
        if (in_array($extension, $asciiArray)) {
            $mode = FTP_ASCII;
        } else {
            $mode = FTP_BINARY;
        }

        // *** Upload the file
        $upload = ftp_put($this->connectionId, $fileTo, $fileFrom, $mode);

        // *** Check upload status
        if (!$upload) {

            $this->logMessage('FTP upload has failed!');
            return false;

        } else {
            $this->logMessage('Uploaded "' . $fileFrom . '" as "' . $fileTo);
            return true;
        }
    }

    public function setFilePermission($file, $mode = 0604) {
        if (ftp_chmod($this->connectionId, $mode, $file) !== false) {
            $this->logMessage($file . ' chmoded successfully to 644');
        } else {
            $this->logMessage('could not chmod ' . $file);
        }
    }

    public function changeDir($directory) {
        if (ftp_chdir($this->connectionId, $directory)) {
            $this->logMessage('Current directory is now: ' . ftp_pwd($this->connectionId));
            return true;
        } else {
            $this->logMessage('Couldn\'t change directory');
            return false;
        }
    }

    public function getDirListing($directory = '.', $parameters = '-la') {
        // get contents of the current directory
        $contentsArray = ftp_nlist($this->connectionId, $parameters . '  ' . $directory);

        return $contentsArray;
    }

    public function downloadFile($fileFrom, $fileTo) {

        // *** Set the transfer mode
        $asciiArray = array('txt', 'csv');
        $extension = end(explode('.', $fileFrom));
        if (in_array($extension, $asciiArray)) {
            $mode = FTP_ASCII;
        } else {
            $mode = FTP_BINARY;
        }

        // try to download $remote_file and save it to $handle
        if (ftp_get($this->connectionId, $fileTo, $fileFrom, $mode, 0)) {
            $this->logMessage(' file "' . $fileTo . '" successfully downloaded');
            return true;
        } else {
            $this->logMessage('There was an error downloading file "' . $fileFrom . '" to "' . $fileTo . '"');
            return false;
        }

    }

    public function getDirSize($directory) {
        Log::info($directory);
        $lines = ftp_rawlist($this->connectionId, $directory, true);
        Log::info($lines === false);
        $result = 0;
        foreach ($lines as $line)
        {
            $tokens = preg_split("/\s+/", $line);
            $name = $tokens[8];
            if ($tokens[0][0] === 'd')
            {
                $size = $this->getDirSize("$directory/$name");
            }
            else
            {
                $size = intval($tokens[4]);
            }
            $result += $size;
        }

        return $result;
    }

    public function deleteFile($file) {
        return ftp_delete($this->connectionId, $file);
    }

}