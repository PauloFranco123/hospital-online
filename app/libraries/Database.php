<?php

class Database {
    private $host = DB['HOST'];
private $usuario = DB['USUARIO'];
private $senha = DB['SENHA'];
private $banco = DB['BANCO'];
private $porta = DB['PORTA'];
private $dbh;
private $stmt;


    public function __construct()
    {
        //fonte de dados ou DSN contém as informações necessárias para conectar ao banco de dados
        $dsn = 'mysql:host ='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
        $opcoes = [
            //armazena em cahe a conexao para ser reutilizado, evita a sobrecarga de uma nocva conexão, resultando em um  aplicativo mais rápido
            PDO::ATTR_PERSISTENT => true,
            //lança um PDOException se ocorrer um erro
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            //cria a instancia do PDO
            $this->dbh = new PDO($dsn, $this->usuario, $this->senha, $opcoes);
        
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }
    //Prepared statements com query
    public function query($sql){
        //prepara uma consulta sql
        $this->stmt = $this->dbh->prepare($sql);
    }
    //vincula um valor a um parametro
    public function bind($parametro, $valor, $tipo = null){
        if(is_null($tipo)):
            switch (true):
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                break;
                case is_NULL($valor):
                    $tipo = PDO::PARAM_NULL;
                break;
                default:
                $tipo = PDO::PARAM_STR;
            endswitch;
        endif; 
        
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    public function executa(){
        return $this->stmt->execute();
    }

    public function resultado(){
        $this->executa();
        return $this->stmt->fetch(PDO::FETCH_OBJ);  
    }
    public function resultados(){
        $this->executa();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);  
    }
    public function totalResultados(){
        return $this->stmt->rowCount();
    }
    public function ultimoIdInserido(){
        return $this->dbh->lastInsertId();
    }    
} 