<?php
class Usuario{
 
    // 
    private $conn;
    private $table_name = "usuario";
 
    //  
    public $id;
    public $name;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // 
    function read(){
        //
        $query = "SELECT nome, senha
					FROM " . $this->table_name . "
					WHERE tipo = 'N'";  
 
        $prep_query = $this->conn->prepare( $query );
        $prep_query->execute();
 
        return $prep_query;
    }
	
	// 
	function readAll($usuario, $senha){
		$query = "SELECT tipo from usuario where nome='".$usuario."' and senha='".$senha."'";
	 
		$prep_query = $this->conn->prepare( $query );
		$prep_query->execute();

		return $prep_query;
	}

    function readOne($usuario){
        $query = "SELECT tipo from usuario where nome='".$usuario."'";
     
        $prep_query = $this->conn->prepare( $query );
        $prep_query->execute();

        return $prep_query;
    }

    function insert($tipo, $usuario, $senha){
        $query = "INSERT into usuario(tipo, nome, senha) values ('".$tipo."', '".$usuario."', '".$senha."')";

        $prep_query = $this->conn->prepare( $query );
        $prep_query->execute();

        return $prep_query;
    }

    function deleta($usuario){
        $query = "DELETE from usuario where nome ='".$usuario."'";

        $prep_query = $this->conn->prepare( $query );
        $prep_query->execute();

        return $prep_query;
    }
 
    function pegaFoto($usuario){
        $query = "SELECT foto from usuario where nome='".$usuario."'";
     
        $prep_query = $this->conn->prepare( $query );
        $prep_query->execute();

        return $prep_query;
    }

    function upload($nome, $foto){
        $query = "UPDATE usuario SET  foto = :f where nome=:n";
     
        $prep_query = $this->conn->prepare( $query );
        $prep_query->bindParam(":f", $foto);
        $prep_query->bindParam(":n", $nome);

        return $prep_query->execute();
    }
}
?>