<?php
            
/**
 * Classe de visao para Info
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */
class InfoView {
	public function mostraFormInserir() {
		echo '
            
            
            
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
            
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"> Adicionar Info</h1>
									</div>
						              <form class="user" method="post">

                                        <div class="form-group">
                                            <label for="temperaturasuperficie">temperaturasuperficie</label>
                                            <input type="text" class="form-control"  name="temperaturasuperficie" id="temperaturasuperficie" placeholder="temperaturasuperficie">
                                        </div>

                                        <div class="form-group">
                                            <label for="temperaturaar">temperaturaar</label>
                                            <input type="text" class="form-control"  name="temperaturaar" id="temperaturaar" placeholder="temperaturaar">
                                        </div>

                                        <div class="form-group">
                                            <label for="umidade">umidade</label>
                                            <input type="text" class="form-control"  name="umidade" id="umidade" placeholder="umidade">
                                        </div>

                                        <div class="form-group">
                                            <label for="datahora">datahora</label>
                                            <input type="text" class="form-control"  name="datahora" id="datahora" placeholder="datahora">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Cadastrar" name="enviar_info">
                                        <hr>
                                            
						              </form>
                                            
								</div>
							</div>
						</div>
					</div>
                                            
                                            
			</div>
';
	}
                                            
                                            
    public function exibirLista($lista){
           echo '
                                            
                                            
                                            
	<div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card mb-4">
                <div class="card-header">
                  Lista
                </div>
                <div class="card-body">
                                            
                                            
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>id</th>
						<th>temperaturasuperficie</th>
						<th>temperaturaar</th>
						<th>umidade</th>
                        <th>Ações</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>id</th>
                        <th>temperaturasuperficie</th>
                        <th>temperaturaar</th>
                        <th>umidade</th>
                        <th>Ações</th>
					</tr>
				</tfoot>
				<tbody>';
            
            foreach($lista as $elemento){
                echo '<tr>';
                echo '<td>'.$elemento->getId().'</td>';
                echo '<td>'.$elemento->getTemperaturasuperficie().'</td>';
                echo '<td>'.$elemento->getTemperaturaar().'</td>';
                echo '<td>'.$elemento->getUmidade().'</td>';
                echo '<td>
                        <a href="?pagina=info&selecionar='.$elemento->getId().'" class="btn btn-info">Selecionar</a>
                        <a href="?pagina=info&editar='.$elemento->getId().'" class="btn btn-success">Editar</a>
                        <a href="?pagina=info&deletar='.$elemento->getId().'" class="btn btn-danger">Deletar</a>
                      </td>';
                echo '</tr>';
            }
            
        echo '
				</tbody>
			</table>
		</div>
            
            
            
            
      </div>
  </div>
</div>
            
';
    }
            
            
        public function mostrarSelecionado(Info $info){
        echo '
            
	<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card mb-4">
            <div class="card-header">
                  Info selecionado
            </div>
            <div class="card-body">
                Id: '.$info->getId().'<br>
                Temperaturasuperficie: '.$info->getTemperaturasuperficie().'<br>
                Temperaturaar: '.$info->getTemperaturaar().'<br>
                Umidade: '.$info->getUmidade().'<br>
                Datahora: '.$info->getDatahora().'<br>
            
            </div>
        </div>
    </div>
            
            
';
    }
            
	public function mostraFormEditar(Info $info) {
		echo '
	    
	    
	    
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
	    
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"> Adicionar Info</h1>
									</div>
						              <form class="user" method="post">
                                        <div class="form-group">
                						  <input type="text" class="form-control form-control-user" value="'.$info->getTemperaturasuperficie().'" id="temperaturasuperficie" name="temperaturasuperficie" placeholder="temperaturasuperficie">
                						</div>
                                        <div class="form-group">
                						  <input type="text" class="form-control form-control-user" value="'.$info->getTemperaturaar().'" id="temperaturaar" name="temperaturaar" placeholder="temperaturaar">
                						</div>
                                        <div class="form-group">
                						  <input type="text" class="form-control form-control-user" value="'.$info->getUmidade().'" id="umidade" name="umidade" placeholder="umidade">
                						</div>
                                        <div class="form-group">
                						  <input type="text" class="form-control form-control-user" value="'.$info->getDatahora().'" id="datahora" name="datahora" placeholder="datahora">
                						</div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Alterar" name="editar_info">
                                        <hr>
                                            
						              </form>
                                            
								</div>
							</div>
						</div>
					</div>
                                            
                                            
                                            
	</div>';
	}
                                            
    public function confirmarDeletar(Info $info) {
		echo '
        
        
        
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
        
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"> Deletar Info</h1>
									</div>
						              <form class="user" method="post">                    Tem Certeza que deseja deletar o '.$info->getTemperaturasuperficie().'
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Deletar" name="deletar_info">
                                        <hr>
                                            
						              </form>
                                            
								</div>
							</div>
						</div>
					</div>
                                            
                                            
                                            
                                            
	</div>';
	}
                                            
    public function mensagem($mensagem) {
		echo '
                                            
                                            
                                            
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
                                            
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">'.$mensagem.'</h1>
									</div>
                                            
                                            
								</div>
							</div>
						</div>
					</div>
                                            
                                            
	</div>';
	}
                                            
                                            
                                            

}