<?php 

class DB{
    private $conn;

    public function __construct(string $cn, string $username, string $passwd = ""){
        $this->conn = new PDO($cn,$username,$passwd);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
   

    public function countTable(string $table){
        $query = "SELECT count(*) as sonuc FROM $table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $sonuc = $stmt->fetch();

        return $sonuc["sonuc"] ?? 0;
        
    }


    public function query(string $tableName, array $params){
       
        $query = "SELECT * FROM $tableName";

            
        if (!empty($params)) {
            $conditions = [];
            foreach ($params as $column => $value) {
                $conditions[] = "$column = :$column";
            }
            $query .= " WHERE " . implode(' AND ', $conditions);
        }

        
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);

    
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        return $results ?? [];
    }
    public function queryorder(string $tableName,string $order, array $params){
       
        $query = "SELECT * FROM $tableName";

        if($order){
            $query .= " ORDER BY $order DESC";
        }
            
        if (!empty($params)) {
            $conditions = [];
            foreach ($params as $column => $value) {
                $conditions[] = "$column = :$column";
            }
            $query .= " WHERE " . implode(' AND ', $conditions);
        }

        
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);

    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results ?? [];
    }
    public function queryAll(string $tableName, array $params){

        $query = "SELECT * FROM $tableName";


        if (!empty($params)) {
            $conditions = [];
            foreach ($params as $column => $value) {
                $conditions[] = "$column = :$column";
            }
            $query .= " WHERE " . implode(' AND ', $conditions);
        }


        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);


        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results ?? [];
    }

    public function insert(string $tableName, array $data){
       
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

        
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

       
        return $this->conn->lastInsertId();
    }


    public function delete(string $tableName, array $data) {
        $whereClause = implode(' AND ', array_map(fn($column) => "$column = :$column", array_keys($data)));
        
        $query = "DELETE FROM $tableName WHERE $whereClause";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);
    
        return $stmt->rowCount(); 
    }

    public function update(string $tableName, array $data, string $whereCondition = null) {
        $columns = implode(', ', array_keys($data));
        $setValues = implode(', ', array_map(fn($column) => "$column = :$column", array_keys($data)));
        
        $query = "UPDATE $tableName SET $setValues";

        if ($whereCondition) {
            $query .= " WHERE $whereCondition";
        }
    
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }
    
    public function count(string $tableName) {

        $query = "SELECT COUNT(*) as count FROM $tableName";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?? 0;
    }
}
