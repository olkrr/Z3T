<?php
	namespace Config\Database;

	class DBConfig{
        public static $databaseName = 'Z3T';
        public static $hostname = 'localhost';
        public static $databaseType = 'mysql';
        public static $port = '3306';
        public static $user = 'root';
        public static $password = 'root';
		
		
        public static $tableTypMyjki = 'TypMyjki';
        public static $tableNaprawa = 'Naprawa';
		public static $tableKlient = 'Klient';
        public static $tableUser = 'User'; 
        public static $tableOsprzet = 'Osprzet';
        public static $tableStatus = 'Status';
        public static $tableProducent = 'Producent';
	}
