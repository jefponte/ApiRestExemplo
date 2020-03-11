
<?php
            
/**
 * Classe feita para manipulação do objeto Info
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */
class Info {
	private $id;
	private $temperaturasuperficie;
	private $temperaturaar;
	private $umidade;
	private $datahora;
    public function __construct(){

    }
	public function setId($id) {
		$this->id = $id;
	}
		    
	public function getId() {
		return $this->id;
	}
	public function setTemperaturasuperficie($temperaturasuperficie) {
		$this->temperaturasuperficie = $temperaturasuperficie;
	}
		    
	public function getTemperaturasuperficie() {
		return $this->temperaturasuperficie;
	}
	public function setTemperaturaar($temperaturaar) {
		$this->temperaturaar = $temperaturaar;
	}
		    
	public function getTemperaturaar() {
		return $this->temperaturaar;
	}
	public function setUmidade($umidade) {
		$this->umidade = $umidade;
	}
		    
	public function getUmidade() {
		return $this->umidade;
	}
	public function setDatahora($datahora) {
		$this->datahora = $datahora;
	}
		    
	public function getDatahora() {
		return $this->datahora;
	}
	public function __toString(){
	    return $this->id.' - '.$this->temperaturasuperficie.' - '.$this->temperaturaar.' - '.$this->umidade.' - '.$this->datahora;
	}
                

}
?>