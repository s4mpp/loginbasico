<?php
class Conf{
    private $pdo;
    private $numRows;
    private $array;
    public function __construct(){
        try{
            $dbname = "DGP";
            $host = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $this->pdo = new PDO("mysql:dbname=$dbname;host=$host", "$dbuser", "$dbpass");
        }catch(PDOException $e){
            echo "ERRO: ".$e->getMessage();
        }
    }
    public function select($table, $where, $where_cond = "AND"){
        if( !empty($table) && is_array($where) && count($where) > 0 ){
            $sql = "SELECT * FROM $table";
            $dados = array();
            foreach( $where as $chave => $valor ){
                $dados[] = $chave." = '".addslashes($valor)."'";
            }
            $sql = $sql." WHERE ".implode(" ".$where_cond." ", $dados);
            $query = $this->pdo->query($sql);
            $this->numRows = $query->rowCount();
            $this->array = $query->fetch();
        }
    }
    public function resultArray(){
        return $this->array;
    }
    public function resultRowCount(){
        return $this->numRows;
    }
    public function insert($table, $data){
        if(!empty($table) && is_array($data) && count($data) > 0){
            $sql = "INSERT INTO $table SET ";
            $dados = array();
            foreach($data as $chave => $valor){
                $dados[] = $chave." = '".addslashes($valor)."'";
            }
            $sql = $sql.implode(", ", $dados);
            $this->pdo->query($sql);
        }
    }
    public function update($table, $data, $where = array(), $where_cond = "AND"){
        if( !empty($table) && is_array($data) && count($data) > 0 ){
            $sql = "UPDATE $table SET ";
            $dados = array();
            foreach($data as $chave => $valor){
                $dados[] = $chave." = '".addslashes($valor)."'";
            }
            $sql = $sql.implode(", ", $dados);
            if(count($where) > 0){
                $dados = array();
                foreach($where as $chave => $valor){
                    $dados[] = $chave." = '".addslashes($valor)."'";
                }
                $sql = $sql." WHERE ".implode(" ".$where_cond." ", $dados);
            }
            $this->pdo->query($sql);
        }
    }
    public function delete($table, $where, $where_cond = "AND"){
        if( !empty($table) && is_array($where) && count($where) > 0 ){
            $sql = "DELETE FROM $table";
            $dados = array();
            foreach( $where as $chave => $valor ){
                $dados[] = $chave." = '".addslashes($valor)."'";
            }
            $sql = $sql." WHERE ".implode(" ".$where_cond." ", $dados);
            $this->pdo->query($sql);
        }
    }
}