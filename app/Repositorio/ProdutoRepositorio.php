<?php

namespace App\Repositorio;

use \App\Produto;

class ProdutoRepositorio {

    protected $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }


    public function paginarProdutosComFiltros($filtros)
    {
        $produtoQueryBuilder = $this->produto->select('*');

        if(!empty($filtros['nome'])) {
            $produtoQueryBuilder->where(\DB::raw('LOWER(nome)'), 'LIKE', '%'.strtolower($filtros['nome']).'%');
        }
        return $produtoQueryBuilder->paginate(5);
    }

}