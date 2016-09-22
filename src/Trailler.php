<?php
namespace Hmarinjr\RemessaSantander;

use Exception;

class Trailler extends Funcoes
{

    //001 - 001 - 1 - N CONSTANTE
    private $identificacaoRegistro = 9;

    //002 - 007 - 6 - N
    private $quantidadeRegistros;

    //008 - 020 - 13 - N
    private $valorTotal;

    //395 - 400 - 6 - N
    private $numeroSequencialRegistro = ''; //ultima numero do sequencial dado pelo gerador

    public function __construct($quantidadeRegistros, $valorTotal, $numeroSequencialRegistro)
    {
        $this->setQuantidadeRegistros($quantidadeRegistros);
        $this->setValorTotal($valorTotal);
        $this->setNumeroSequencialRegistro($numeroSequencialRegistro);
    }

    /**
     * @return the $numero_sequencial_regsitro
     */

    public function getNumeroSequencialRegistro()
    {
        return $this->numeroSequencialRegistro;
    }

    /**
     * @param int $quantidadeRegistros
     */
    public function setQuantidadeRegistros($quantidadeRegistros)
    {
        if (!is_numeric($quantidadeRegistros)) {
            throw new \InvalidArgumentException('Quantidade de registros invalida');
        }

        $this->quantidadeRegistros = $quantidadeRegistros;
    }

    /**
     * @param float $valorTotal
     */
    public function setValorTotal($valorTotal)
    {
        if (!is_numeric($valorTotal)) {
            throw new \InvalidArgumentException('Valor total invalido');
        }

        $this->valorTotal = $valorTotal;
    }

    /**
     * @param string $numeroSequencialRegistro
     */
    public function setNumeroSequencialRegistro($numeroSequencialRegistro)
    {
        if (is_numeric($numeroSequencialRegistro)) {
            $numeroSequencialRegistro = $this->addZeros($numeroSequencialRegistro, 6);

            if ($this->validaTamanhoCampo($numeroSequencialRegistro, 6)) {
                $this->numeroSequencialRegistro = $numeroSequencialRegistro;
            } else {
                throw new Exception('Error - Numero do sequencial invalido.');
            }
        } else {
            throw new Exception('Error - Numero do sequencial invalido.');
        }
    }

    /* (non-PHPdoc)
     * @see IFuncoes::montar_linha()
     */

    public function montaLinha()
    {
        // TODO Auto-generated method stub
        $linha = $this->identificacaoRegistro .
            $this->addZeros($this->quantidadeRegistros, 6) .
            $this->addZeros(number_format($this->valorTotal, 2, '', ''), 13).
            $this->addZeros('', 374) .
            $this->addZeros($this->getNumeroSequencialRegistro(), 6);

        return $this->validaLinha($linha);
    }
}
