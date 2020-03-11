<?php
        
function __autoload($classe) {
        
	if (file_exists ( 'classes/dao/' . $classe . '.php' )){
		include_once 'classes/dao/' . $classe . '.php';
	}
	else if (file_exists ( 'classes/model/' . $classe . '.php' )){
		include_once 'classes/model/' . $classe . '.php';
	}
	else if (file_exists ( 'classes/controller/' . $classe . '.php' )){
		include_once 'classes/controller/' . $classe . '.php';
	}
	else if (file_exists ( 'classes/util/' . $classe . '.php' )){
		include_once 'classes/util/' . $classe . '.php';
	}
	else if (file_exists ( 'classes/view/' . $classe . '.php' )){
		include_once 'classes/view/' . $classe . '.php';
	}
}

if(isset($_REQUEST['path'])){
    InfoController::mainREST();
    exit;
}

        
?>
        
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>ApiRestExemplo</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ApiRestExemplo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav"><a class="nav-item nav-link" href="?pagina=info">Info</a>
        
    </div>
  </div>
</nav>
	<main role="main">
        
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">ApiRestExemplo</h1>
              
        </div>
      </section>
              
        <div class="album py-5 bg-light">
            <div class="container">
        
        
        
<?php
if(isset($_GET['pagina'])){
					switch ($_GET['pagina']){
						case 'info':
						    InfoController::main();
							break;
						default:
							InfoController::main();
							break;
					}
				}else{
					InfoController::main();
				}
					    
?>
        
        
              </div>
        
            </div>
        
     </main>
        
        
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Voltar ao topo</a>
        </p>
        <p>Este é um software desenvolvido automaticamente pelo escritor de Software.</p>
        <p>Novo no Escritor De Software? Problema o seu.</p>
      </div>
    </footer>
        

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>