<?php
class Database {
    private $pdo;
    
    public function __construct($config) {
        try {
            $this->pdo = new PDO(
                "mysql:host={$config['db_host']};dbname={$config['db_name']};charset=utf8",
                $config['db_user'],
                $config['db_pass']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
      }
    
    public function getUsers() {
        $stmt = $this->pdo->query("SELECT * FROM users ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}