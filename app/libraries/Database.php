<?php
class Database {
    private $dbh;
    private $stmt;

    public function __construct(){
        $dbh = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";".DB_CHARSET;
        $options = array(
            PDO::ATTR_PERSISTENT =>true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //Crear instancia de PDO
        try {
            $this->dbh = new PDO($dbh, DB_USER, DB_PASSWORD, $options);
        } catch (PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }

    //Preparamos la consulta
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    //Vinculamos la consulta con el método bind
    public function bind($parameter, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value);
                    $type = PDO::PARAM_INT;
                break;

                case is_bool($value);
                    $type = PDO::PARAM_BOOL;
                break;

                case is_null($value);
                    $type = PDO::PARAM_NULL;
                break;

                default;
                    $type = PDO::PARAM_STR;
                break;
            }
        }

        $this->stmt->bindValue($parameter, $value, $type);
    }

    //Ejecuta la consulta
    public function execute(){
        return $this->stmt->execute();
    }

    //Obtener los registros
    public function records(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Obtener un solo registro
    public function record(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Obtener la cantidad de filas
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
?>