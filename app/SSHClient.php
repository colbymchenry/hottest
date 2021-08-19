<?php

class SSHClient {
    // SSH Host
    private $ssh_host;
    // SSH Port
    private $ssh_port;
    // SSH Username
    private $ssh_auth_user;
    // SSH Private Key Passphrase (null == no passphrase)
    private $ssh_auth_pass;
    // SSH Connection
    private $connection;

    public function __construct($host, $port, $username, $password) {
        $this->ssh_host = $host;
        $this->ssh_port = $port;
        $this->ssh_auth_user = $username;
        $this->ssh_auth_pass = $password;
    }

    public function connect() {
        if (!($this->connection = ssh2_connect($this->ssh_host, $this->ssh_port))) {
            throw new Exception('Cannot connect to server');
        }

        if (!ssh2_auth_password($this->connection, $this->ssh_auth_user, $this->ssh_auth_pass)) {
            throw new Exception('Autentication rejected by server');
        }
    }
    public function exec($cmd) {
        if (!($stream = ssh2_exec($this->connection, $cmd))) {
            throw new Exception('SSH command failed');
        }
        stream_set_blocking($stream, true);
        $data = "";
        while ($buf = fread($stream, 4096)) {
            $data .= $buf;
        }
        fclose($stream);
        return $data;
    }
    public function disconnect() {
        $this->exec('echo "EXITING" && exit;');
        $this->connection = null;
    }
    public function __destruct() {
        $this->disconnect();
    }
}