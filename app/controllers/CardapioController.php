<?php 

class CardapioController extends Controller{

    private $produtoModel;

    public function __construct(){
        $this->produtoModel = new Produto();
    }
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Café Divino | Cardápio';

        $novidades = $this->produtoModel->getNovidades();
        $dados['novidades'] = $novidades;

        $cafe = $this->produtoModel->getCafe();
        $dados['cafe'] = $cafe;

        $cafeGelado = $this->produtoModel->getCafeGelado();
        $dados['cafeGelado'] = $cafeGelado;

        $smoothies = $this->produtoModel->getSmoothies();
        $dados['smoothies'] = $smoothies;

        $paes = $this->produtoModel->getPaes();
        $dados['paes'] = $paes;
        
        $doces = $this->produtoModel->getDoces();
        $dados['doces'] = $doces;

        $cha = $this->produtoModel->getCha();
        $dados['cha'] = $cha;

        $chaGelado = $this->produtoModel->getChaGelado();
        $dados['chaGelado'] = $chaGelado;

        $shakes = $this->produtoModel->getShakes();
        $dados['shakes'] = $shakes;

        $bebidasVeganas = $this->produtoModel->getBebidasVegan();
        $dados['bebidasVeganas'] = $bebidasVeganas;
        
        $agua = $this->produtoModel->getAgua();
        $dados['agua'] = $agua;

        $this->carregarViews('cardapio', $dados);
        
    }
}