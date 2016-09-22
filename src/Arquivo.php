<?php
namespace Hmarinjr\RemessaSantander;

use DateTime;

class Arquivo
{
    private $header;
    private $filename;
    private $trailler;
    const QUEBRA_LINHA = "\r\n";
    private $movimentos = array();

    /**
     * @param string $codigoTransmissao
     * @param type $dataGravacao
     * @param type $nomeEmpresa
     * @param type $numeroSequencialRemessa
     */
    public function __construct($codigoTransmissao, DateTime $dataGravacao, $nomeEmpresa, $numeroSequencialRemessa)
    {
        $header = new Header($codigoTransmissao, $nomeEmpresa, $dataGravacao, $numeroSequencialRemessa);

        $this->setHeader($header);
    }

    /**
     * @return the $filename
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param field_type $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return the $detalhes
     */
    public function getMovimentos()
    {
        return $this->movimentos;
    }

    /**
     * @param array $movimentos
     */
    public function setMovimentos(array $movimentos)
    {
        $this->movimentos = $movimentos;
    }

    /**
     * @param Movimento $movimentos
     */
    public function addMovimento(Movimento $movimentos)
    {
        $this->movimentos[] = $movimentos;
    }

    /**
     * @return Header
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return Trailler
     */
    public function getTrailler()
    {
        return $this->trailler;
    }

    /**
     * @param Header $header
     */
    public function setHeader(Header $header)
    {
        $this->header = $header;
    }

    /**
     * @param Trailler $trailler
     */
    public function setTrailler(Trailler $trailler)
    {
        $this->trailler = $trailler;
    }

    /**
     * metodo para criar o texto inteiro da remessa
     */
    public function getText()
    {
        //Montando texto
        $dados = $this->getHeader()->montaLinha() . self::QUEBRA_LINHA;
        //montando linhas dos boletos
        $sequencial = 2;
        $valorTotal= 0;
        foreach ($this->getMovimentos() as $movimento) {
            $movimento->setSequencial($sequencial++);
            $valorTotal += $movimento->getValorTitulo() / 100;
            $dados .= $movimento->montaLinha() . self::QUEBRA_LINHA;
        }
        //montando rodapé
        $trailler = new Trailler($sequencial, $valorTotal, $sequencial);
        $this->setTrailler($trailler);
        $dados .= $this->getTrailler()->montaLinha();

        return $dados;
    }

    /**
     * metodo para fazer download do arquivo de remessa
     */
    public function save()
    {
        $text = $this->getText();
        //die($text);
        //atribuindo um nome do arquivo
        if ($this->getFilename() == '') {
            $this->setFilename('CB' . date('dm') . 'A1');
        }

        file_put_contents($this->getFilename() . '.REM', $text);
    }

    /**
     * Metodo para retornar a quantida de detalhes inseridos na remessa
     * @return number
     */
    public function countDetalhes()
    {
        return count($this->movimentos);
    }
}
