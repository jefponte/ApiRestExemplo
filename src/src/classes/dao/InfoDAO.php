<?php
                
/**
 * Classe feita para manipulação do objeto Info
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 *
 *
 */
class InfoDAO extends DAO {
    
    
    public function atualizar(Info $info)
    {
        
        $id = $info->getId();
        $sql = "UPDATE info
                SET
                temperaturasuperficie = :temperaturasuperficie,
                temperaturaar = :temperaturaar,
                umidade = :umidade,
                datahora = :datahora
                WHERE info.id = :id;";
			$temperaturasuperficie = $info->getTemperaturasuperficie();
			$temperaturaar = $info->getTemperaturaar();
			$umidade = $info->getUmidade();
			$datahora = $info->getDatahora();
                
        try {
                
            $stmt = $this->getConexao()->prepare($sql);
			$stmt->bindParam("id", $id, PDO::PARAM_STR);
			$stmt->bindParam("temperaturasuperficie", $temperaturasuperficie, PDO::PARAM_STR);
			$stmt->bindParam("temperaturaar", $temperaturaar, PDO::PARAM_STR);
			$stmt->bindParam("umidade", $umidade, PDO::PARAM_STR);
			$stmt->bindParam("datahora", $datahora, PDO::PARAM_STR);
                
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
                
    }
                
	public function inserir(Info $info){
	    
		$sql = "INSERT INTO info(temperaturasuperficie, temperaturaar, umidade, datahora)
				VALUES(:temperaturasuperficie, :temperaturaar, :umidade, :datahora)";
			$temperaturasuperficie = $info->getTemperaturasuperficie();
			$temperaturaar = $info->getTemperaturaar();
			$umidade = $info->getUmidade();
			$datahora = $info->getDatahora();
// 			$sql = "INSERT INTO info(temperaturasuperficie, temperaturaar, umidade, datahora)
// 				VALUES($temperaturasuperficie, $temperaturaar, $umidade, '$datahora')";
// 			echo $sql;
			
			
		try {
			$db = $this->getConexao();
			$stmt = $db->prepare($sql);
			$stmt->bindParam("temperaturasuperficie", $temperaturasuperficie, PDO::PARAM_STR);
			$stmt->bindParam("temperaturaar", $temperaturaar, PDO::PARAM_STR);
			$stmt->bindParam("umidade", $umidade, PDO::PARAM_STR);
			$stmt->bindParam("datahora", $datahora, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}
	public function excluir(Info $info){
		$id = $info->getId();
		$sql = "DELETE FROM info WHERE id = :id";
		    
		try {
			$db = $this->getConexao();
			$stmt = $db->prepare($sql);
			$stmt->bindParam("id", $id, PDO::PARAM_INT);
			return $stmt->execute();
			    
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}
			    
			    
	public function retornaLista() {
		$lista = array ();
		$sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                 LIMIT 1000";
		$result = $this->getConexao ()->query ( $sql );
                
		foreach ( $result as $linha ) {
                
			$info = new Info();
        
			$info->setId( $linha ['id'] );
			$info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
			$info->setTemperaturaar( $linha ['temperaturaar'] );
			$info->setUmidade( $linha ['umidade'] );
			$info->setDatahora( $linha ['datahora'] );
			$lista [] = $info;
		}
		return $lista;
	}
                    
    public function pesquisaPorId(Info $info) {
        $lista = array();
	    $id = $info->getId();
	    $sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                WHERE info.id = $id";
	    $result = $this->getConexao ()->query ( $sql );
                    
	    foreach ( $result as $linha ) {
            $info = new Info();
	        $info->setId( $linha ['id'] );
	        $info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
	        $info->setTemperaturaar( $linha ['temperaturaar'] );
	        $info->setUmidade( $linha ['umidade'] );
	        $info->setDatahora( $linha ['datahora'] );
			$lista [] = $info;
		}
		return $lista;
    }
                    
    public function pesquisaPorTemperaturasuperficie(Info $info) {
        $lista = array();
	    $temperaturasuperficie = $info->getTemperaturasuperficie();
	    $sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                WHERE info.temperaturasuperficie = $temperaturasuperficie";
	    $result = $this->getConexao ()->query ( $sql );
                    
	    foreach ( $result as $linha ) {
            $info = new Info();
	        $info->setId( $linha ['id'] );
	        $info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
	        $info->setTemperaturaar( $linha ['temperaturaar'] );
	        $info->setUmidade( $linha ['umidade'] );
	        $info->setDatahora( $linha ['datahora'] );
			$lista [] = $info;
		}
		return $lista;
    }
                    
    public function pesquisaPorTemperaturaar(Info $info) {
        $lista = array();
	    $temperaturaar = $info->getTemperaturaar();
	    $sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                WHERE info.temperaturaar = $temperaturaar";
	    $result = $this->getConexao ()->query ( $sql );
                    
	    foreach ( $result as $linha ) {
            $info = new Info();
	        $info->setId( $linha ['id'] );
	        $info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
	        $info->setTemperaturaar( $linha ['temperaturaar'] );
	        $info->setUmidade( $linha ['umidade'] );
	        $info->setDatahora( $linha ['datahora'] );
			$lista [] = $info;
		}
		return $lista;
    }
                    
    public function pesquisaPorUmidade(Info $info) {
        $lista = array();
	    $umidade = $info->getUmidade();
	    $sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                WHERE info.umidade = $umidade";
	    $result = $this->getConexao ()->query ( $sql );
                    
	    foreach ( $result as $linha ) {
            $info = new Info();
	        $info->setId( $linha ['id'] );
	        $info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
	        $info->setTemperaturaar( $linha ['temperaturaar'] );
	        $info->setUmidade( $linha ['umidade'] );
	        $info->setDatahora( $linha ['datahora'] );
			$lista [] = $info;
		}
		return $lista;
    }
                    
    public function pesquisaPorDatahora(Info $info) {
        $lista = array();
	    $datahora = $info->getDatahora();
	    $sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                WHERE info.datahora like '%$datahora%'";
	    $result = $this->getConexao ()->query ( $sql );
                    
	    foreach ( $result as $linha ) {
            $info = new Info();
	        $info->setId( $linha ['id'] );
	        $info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
	        $info->setTemperaturaar( $linha ['temperaturaar'] );
	        $info->setUmidade( $linha ['umidade'] );
	        $info->setDatahora( $linha ['datahora'] );
			$lista [] = $info;
		}
		return $lista;
    }
                    
    public function preenchePorId(Info $info) {

	    $id = $info->getId();
	    $sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                WHERE info.id = $id";
	    $result = $this->getConexao ()->query ( $sql );
                    
	    foreach ( $result as $linha ) {
	        $info->setId( $linha ['id'] );
	        $info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
	        $info->setTemperaturaar( $linha ['temperaturaar'] );
	        $info->setUmidade( $linha ['umidade'] );
	        $info->setDatahora( $linha ['datahora'] );

		}
		return $info;
    }
                    
    public function preenchePorTemperaturasuperficie(Info $info) {

	    $temperaturasuperficie = $info->getTemperaturasuperficie();
	    $sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                WHERE info.temperaturasuperficie = $temperaturasuperficie";
	    $result = $this->getConexao ()->query ( $sql );
                    
	    foreach ( $result as $linha ) {
	        $info->setId( $linha ['id'] );
	        $info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
	        $info->setTemperaturaar( $linha ['temperaturaar'] );
	        $info->setUmidade( $linha ['umidade'] );
	        $info->setDatahora( $linha ['datahora'] );

		}
		return $info;
    }
                    
    public function preenchePorTemperaturaar(Info $info) {

	    $temperaturaar = $info->getTemperaturaar();
	    $sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                WHERE info.temperaturaar = $temperaturaar";
	    $result = $this->getConexao ()->query ( $sql );
                    
	    foreach ( $result as $linha ) {
	        $info->setId( $linha ['id'] );
	        $info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
	        $info->setTemperaturaar( $linha ['temperaturaar'] );
	        $info->setUmidade( $linha ['umidade'] );
	        $info->setDatahora( $linha ['datahora'] );

		}
		return $info;
    }
                    
    public function preenchePorUmidade(Info $info) {

	    $umidade = $info->getUmidade();
	    $sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                WHERE info.umidade = $umidade";
	    $result = $this->getConexao ()->query ( $sql );
                    
	    foreach ( $result as $linha ) {
	        $info->setId( $linha ['id'] );
	        $info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
	        $info->setTemperaturaar( $linha ['temperaturaar'] );
	        $info->setUmidade( $linha ['umidade'] );
	        $info->setDatahora( $linha ['datahora'] );

		}
		return $info;
    }
                    
    public function preenchePorDatahora(Info $info) {

	    $datahora = $info->getDatahora();
	    $sql = "SELECT 
                info.id, 
                info.temperaturasuperficie, 
                info.temperaturaar, 
                info.umidade, 
                info.datahora
                FROM info
                WHERE info.datahora like '%$datahora%'";
	    $result = $this->getConexao ()->query ( $sql );
                    
	    foreach ( $result as $linha ) {
	        $info->setId( $linha ['id'] );
	        $info->setTemperaturasuperficie( $linha ['temperaturasuperficie'] );
	        $info->setTemperaturaar( $linha ['temperaturaar'] );
	        $info->setUmidade( $linha ['umidade'] );
	        $info->setDatahora( $linha ['datahora'] );

		}
		return $info;
    }
                
                
}