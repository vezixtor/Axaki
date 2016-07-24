<?php
require_once 'Controller.php';
require_once './Model/MerchandiseModel.php';

class HomeController extends Controller {
	protected $conteudo;
	protected $dados;
	
	//Home/Index
	public function index(){
		//Definindo o titulo
		$this->title = "Home";
		
		//Conteudo são as views que serão colocadas na tela
		$this->conteudo = [
			'./View/Home/Index.php',
			//'./View/Merchandise/mercadoria_view.php'
			'./View/Merchandise/list_view_item.php'
		];
		
		//Pegando informções no banco de dados
		$mercadoria = new Mercadoria();
		$mercadoria->selecionaTudo($mercadoria);
		while ($linha = $mercadoria->retornaDados("assoc")){
			$this->dados[] = $linha;
		}
		
		//Renderizar Pagina
		$this->render($this->conteudo);
	}
	
	public function about(){
		$this->title = "Sobre";
		
		$this->conteudo = ['./View/Home/About.php'];

		//Renderizar Pagina
		$this->render($this->conteudo);
	}
	
	public function contact(){
		$this->title = "Contato";
		
		$this->conteudo = ['./View/Home/Contact.php'];
		
		//Renderizar Pagina
		$this->render($this->conteudo);
	}
}
?>