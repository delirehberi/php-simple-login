<?php
function login($username,$plainPassword){
        $pdo = database_connect();
    
        try {
            // Hash the provided password with MD5
            $hashedPassword = md5($plainPassword);
            
            // Prepare and execute the SQL query to check if the user exists
            $query = "SELECT id FROM user_account WHERE username = :username AND password = :password";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                $_SESSION['logged_in'] = true;
                return true;
            }
            
            return false; 

        } catch (PDOException $e) {
            return false;
            //echo "Error: " . $e->getMessage();
        }
}

function database_connect() {
    $host = 'postgres'; // This is the service name defined in docker-compose.yaml
    $db = 'login_system';
    $user = 'login_system_user';
    $password = 'login_system_password';
    
    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

function run_query_from_file($filename, $pdo) {
    try {
        $queries = file_get_contents($filename);
        $queryArray = explode(';', $queries);
        
        foreach ($queryArray as $query) {
            $query = trim($query);
            if (!empty($query)) {
                $pdo->exec($query);
            }
        }
        
        echo "Initial queries executed successfully.";
    } catch (PDOException $e) {
        var_dump($e) ;
        die("Error executing initial queries: " . $e->getMessage());
    }
}
