<?php
            
/**
 * Classe feita para manipulação do objeto Info
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */
class InfoController {
	private $post;
	private $view;
    private $dao;
    
    public static function main(){
        $controller = new InfoController();
        if (isset($_GET['selecionar'])){
            echo '<div class="row justify-content-center">';
                $controller->selecionar();
            echo '</div>';
            return;
        }
        echo '
		<div class="row justify-content-center">';
        echo '<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">';
        $controller->listar();
        echo '</div>';
        echo '<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">';
        if(isset($_GET['editar'])){
            $controller->editar();
        }else if(isset($_GET['deletar'])){
            $controller->deletar();
	    }else{
            $controller->cadastrar();
        }
        echo '</div>';
        echo '</div>';
            
    }
    public static function mainREST(){
        $controller = new InfoController();
        $controller->listarJSON();
        $controller->cadastrarPOST();
    }
	public function __construct(){
		$this->dao = new InfoDAO();
		$this->view = new InfoView();
		foreach($_POST as $chave => $valor){
			$this->post[$chave] = $valor;
		}
	}
	public function listar() {
		$infoDao = new InfoDAO ();
		$lista = $infoDao->retornaLista ();
		$this->view->exibirLista($lista);
	}
    public function selecionar(){
	    if(!isset($_GET['selecionar'])){
	        return;
	    }
        $selecionado = new Info();
	    $selecionado->setId($_GET['selecionar']);
	        
        $this->dao->preenchePorId($selecionado);

        echo '<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">';
	    $this->view->mostrarSelecionado($selecionado);
        echo '</div>';
            

            
    }
            
	public function cadastrar() {
            
        if(!isset($this->post['enviar_info'])){
            $this->view->mostraFormInserir();
		    return;
		}
		if (! ( isset ( $this->post ['temperaturasuperficie'] ) && isset ( $this->post ['temperaturaar'] ) && isset ( $this->post ['umidade'] ) && isset ( $this->post ['datahora'] ))) {
			echo "Incompleto";
			return;
		}
            
		$info = new Info ();
		$info->setTemperaturasuperficie ( $this->post ['temperaturasuperficie'] );
		$info->setTemperaturaar ( $this->post ['temperaturaar'] );
		$info->setUmidade ( $this->post ['umidade'] );
		$info->setDatahora ( $this->post ['datahora'] );
            
		if ($this->dao->inserir ( $info ))
        {
			echo "Sucesso";
		} else {
			echo "Fracasso";
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=index.php?pagina=info">';
	}
	public function cadastrarApiGET() {
	    
	    
	    if (! ( isset ( $_GET ['temperaturasuperficie'] ) && isset ( $_GET ['temperaturaar'] ) && isset ( $_GET ['umidade'] ) && isset ( $_GET ['datahora'] ))) {
	        echo "Fracasso";
	        return;
	    }
	    
	    $info = new Info ();
	    $info->setTemperaturasuperficie ($_GET ['temperaturasuperficie'] );
	    $info->setTemperaturaar ( $_GET ['temperaturaar'] );
	    $info->setUmidade ( $_GET ['umidade'] );
	    $info->setDatahora ( $_GET ['datahora'] );
	    if ($this->dao->inserir ( $info ))
	    {
	        echo "Sucesso";
	    } else {
	        echo "Fracasso";
	    }
	}
    public function editar(){
	    if(!isset($_GET['editar'])){
	        return;
	    }
        $selecionado = new Info();
	    $selecionado->setId($_GET['editar']);
	    $this->dao->pesquisaPorId($selecionado);
	        
        if(!isset($_POST['editar_info'])){
            $this->view->mostraFormEditar($selecionado);
            return;
        }
            
		if (! ( isset ( $this->post ['temperaturasuperficie'] ) && isset ( $this->post ['temperaturaar'] ) && isset ( $this->post ['umidade'] ) && isset ( $this->post ['datahora'] ))) {
			echo "Incompleto";
			return;
		}

		$selecionado->setTemperaturasuperficie ( $this->post ['temperaturasuperficie'] );
		$selecionado->setTemperaturaar ( $this->post ['temperaturaar'] );
		$selecionado->setUmidade ( $this->post ['umidade'] );
		$selecionado->setDatahora ( $this->post ['datahora'] );
            
		if ($this->dao->atualizar ($selecionado ))
        {
            
			echo "Sucesso";
		} else {
			echo "Fracasso";
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?pagina=info">';
            
    }
    public function deletar(){
	    if(!isset($_GET['deletar'])){
	        return;
	    }
        $selecionado = new Info();
	    $selecionado->setId($_GET['deletar']);
	    $this->dao->pesquisaPorId($selecionado);
        if(!isset($_POST['deletar_info'])){
            $this->view->confirmarDeletar($selecionado);
            return;
        }
        if($this->dao->excluir($selecionado)){
            echo "excluido com sucesso";
        }else{
            echo "Errou";
        }
    	echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=index.php?pagina=info">';
    }
	public function listarJSON()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'GET') {
            return;
        }
        if (! array_key_exists('path', $_GET)) {
            echo 'Error. Path missing.';
            return;
        }
        
        $path = explode('/', $_GET['path']);
        
        if (count($path) == 0 || $path[0] == "") {
            echo 'Error. Path missing.';
            return;
        }
        
        $param1 = "";
        if (count($path) > 1) {
            $param1 = $path[1];
        }
        
        if ($path[0] != 'info') {
            return;
        }
        
        header('Content-type: application/json');
        $body = file_get_contents('php://input');
        
        
		$infoDao = new InfoDAO ();
		$lista = $infoDao->retornaLista ();
		$listagem = array ();
		foreach ( $lista as $linha ) {
			$listagem ['lista'] [] = array (
					'id' => $linha->getId (), 
					'temperaturasuperficie' => $linha->getTemperaturasuperficie (), 
					'temperaturaar' => $linha->getTemperaturaar (), 
					'umidade' => $linha->getUmidade (), 
					'datahora' => $linha->getDatahora ()
            
            
			);
		}
		echo json_encode ( $listagem );
	}

	public function resDELETE(){
	    if($_SERVER['REQUEST_METHOD'] != 'DELETE'){
	        return;
	    }
        if($json[$path[0]]){
            if($param1==""){
                echo 'error';
            }else{
                $encontrado = findById($json[$path[0]], $param1);
                if($encontrado>=0){
                    echo json_encode($json[$path[0]][$encontrado]);
                    unset($json[$path[0]][$encontrado]);
                    file_put_contents('db.json', json_encode($json));
                }else{
                    echo 'ERROR.';
                    exit;
                }
            }
        }else{
            echo 'error.';
        }
	    
	    
	}
	public function restPUT(){
	    if($_SERVER['REQUEST_METHOD'] != 'PUT'){
            return;   
	    }
	    if (! array_key_exists('path', $_GET)) {
	        echo 'Error. Path missing.';
	        return;
	    }
	    
        if($json[$path[0]]){
            if($param1==""){
                echo 'error';
            }else{
                $encontrado = findById($json[$path[0]], $param1);
                if($encontrado>=0){
                    $jsonBody = json_decode($body, true);
                    $jsonBody['id'] = $param1;
                    $json[$path[0]][$encontrado] = $jsonBody;
                    echo json_encode($json[$path[0]][$encontrado]);
                    file_put_contents('db.json', json_encode($json));
                }else{
                    echo 'ERROR.';
                    exit;
                }
            }
        }else{
            echo 'error.';
        }
	    
	}
	/**
	 *
	 * Passar um post dessa forma: 
        {
            "temperaturasuperficie": "24",
            "temperaturaar": "25",
            "umidade": "10",
            "datahora": "100"
        }
 
	 */
	public function cadastrarPOST(){
	    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	        return;
	    }
	    if (! array_key_exists('path', $_GET)) {
	        echo 'Error. Path missing.';
	        return;
	    }
	    
	    $path = explode('/', $_GET['path']);
	    
	    if (count($path) == 0 || $path[0] == "") {
	        echo 'Error. Path missing.';
	        return;
	    }
	    
	    $param1 = "";
	    if (count($path) > 1) {
	        $param1 = $path[1];
	    }
	    
	    
	    header('Content-type: application/json');
	    $body = file_get_contents('php://input');
	    
        $jsonBody = json_decode($body, true);

        
        if (! ( isset ( $jsonBody ['temperaturasuperficie'] ) && isset ( $jsonBody ['temperaturaar'] ) && isset ( $jsonBody ['umidade'] ) && isset ( $jsonBody ['datahora'] ))) {
            echo "Incompleto.";
            return;
        }
        
        $info = new Info ();
        $info->setTemperaturasuperficie ($jsonBody ['temperaturasuperficie'] );
        $info->setTemperaturaar ( $jsonBody ['temperaturaar'] );
        $info->setUmidade ( $jsonBody ['umidade'] );
        $info->setDatahora ( $jsonBody ['datahora'] );
        if ($this->dao->inserir ( $info ))
        {
            echo "Sucesso";
        } else {
            echo "Fracasso";
        }
       
	}
            
		
}
?>