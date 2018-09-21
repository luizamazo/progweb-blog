<?php 

class sql extends PDO{

    private $conn;

    public function createConn(){
        try{
             $this->conn = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
             return $this->conn;
        }catch(PDOException $e){
            echo 'Conexão falhou: ' . $e->getMessage();
        }     
    }
       //toda vez que eu instanciar, inicio conexao com o bd
    public function __construct(){
        $this->createConn();
    }

    //quando quero setar só um paramaetro
    //key: placeholder; value: variável contendo valor pra dar o bind
    public function setParam($stmt, $key, $value){
        $stmt->bindParam($key, $value);
    }
    //quero setar mais de um parametro
    public function setParams($stmt, $params = array()){
        //para cada um dos parametros, dar um bind
        foreach($params as $key => $value){
            $this->setParam($stmt, $key, $value);
        }
    }

    //query e bind
    //comando genérico pra query, $query é onde envio sql
    public function query($query, $params = array()){
        //faço prepare com o comando sql
        $stmt = $this->conn->prepare($query);
        //faço bind dos parametros na onde $stmt é o resultado da minha query e 
        //$param é o array pro bind
        $this->setParams($stmt, $params);
        $stmt->execute();

        return $stmt;
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    //query e array assoc
    public function select($query, $params = array()){
        //coloco na variável a minha função query que tem o sql e os parametros ja com bind
        //query aqui já tá tratada
        $stmt = $this->query($query, $params);
        //pego tudo e retorno como array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($query, $params = array()){
        $stmt = $this->query($query, $params); 
    }

    public function update($query, $params = array()){
        $stmt = $this->query($query, $params);
    }

    public function delete($query, $params = array()){
        $stmt = $this->query($query, $params);
    }

}
?>