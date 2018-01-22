<?php
    
    // classe database
    class Database {

        // dados banco
        public $servername = "";
        public $username = "";
        public $password = "";
        public $dbName = '';

        // metodo construtor
        function conn() {

            // Create connection
            return new mysqli( $this->servername, $this->username, $this->password, $this->dbName );
        }
    }
?>