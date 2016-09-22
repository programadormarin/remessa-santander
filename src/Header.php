<?php
namespace Hmarinjr\RemessaSantander;

use InvalidArgumentException;
use DateTime;

class Header extends Funcoes
{
    //001 - 001 - 1 -  N CONSTANTE
    private $identificacaoRegistro = 0;

    //002 - 002 - 1 - N CONSTANTE
    private $identificacaoArquivoRemessa = 1;

    //003 - 009 - 7 - A CONSTANTE
    private $literalRemessa = 'REMESSA';

    //010 - 011 - 2 - N CONSTANTE
    private $codigoServico = '01';

    //012 - 026 - 15 - A CONSTANTE - COMPLETAR COM ESPAÇOS EM BRANCO A DIREITA
    private $literalServico = 'COBRANCA';

    //027 - 046 - 20 - N COMPLETAR COM ZEROS A ESQUERDA
    private $codigoTransmissao = '';     //<---- verificar observações

    //047 - 076 - 30 - A - COMPLETAR COM ESPAÇOS EM BRANCO A DIREITA
    private $nomeEmpresa = '';

    //077 - 079 - 3 - N CONSTANTE
    private $numeroBradescoCompensacao = '033';

    //080 - 094 - 15 - A CONSTANTE - COMPLETAR COM ESPAÇOES EM BRANCO A DIREITA
    private $nomeBanco = 'SANTANDER';

    /**
     * @var DateTime 095 - 100 - 6 - N
     */
    private $dataGravacao = null;     //<---- verificar observações

    //392 - 394 - 3 - N
    private $numeroSequencialRemessa = '000';

    //392 - 400 - 6 - N CONSTANTE
    private $numeroSequencialRegistro = '000001';

    /**
     * @param string $codigoTransmissao
     * @param string $nomeEmpresa
     * @param DateTime $dataGravacao
     * @param int $numeroSequencialRemessa
     */
    public function __construct($codigoTransmissao, $nomeEmpresa, DateTime $dataGravacao, $numeroSequencialRemessa)
    {
        $this->setCodigoTransmissao($codigoTransmissao);
        $this->setNomeEmpresa($nomeEmpresa);
        $this->dataGravacao = $dataGravacao;
        $this->setNumeroSequencialRemessa($numeroSequencialRemessa);
    }

    /**
     * @return the $codigo_empresa
     */
    public function getCodigoTransmissao()
    {
        return $this->codigoTransmissao;
    }

    /**
     * @return the $nome_empresa
     */
    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    /**
     * @return DateTime
     */
    public function getDataGravacao()
    {
        //verifica se a variavel esta vazia, se sim poe a data atual como default
        if (empty($this->dataGravacao)) {
            $this->setDataGravacao(new DateTime());
        }

        return $this->dataGravacao;
    }

    /**
     * @return the $numero_sequencial_remessa
     */
    public function getNumeroSequencialRemessa()
    {
        return $this->numeroSequencialRemessa;
    }

    /**
     * @param string $codigoTransmissao
     */
    public function setCodigoTransmissao($codigoTransmissao)
    {
        if (strlen($codigoTransmissao) != 20) {
            throw new InvalidArgumentException('Código da empresa deve ter 20 posições');
        }

        $this->codigoTransmissao = $this->addZeros($codigoTransmissao, 20);
    }

    /**
     * @param string $nomeEmpresa
     */
    public function setNomeEmpresa($nomeEmpresa)
    {
        $length = (int) strlen($nomeEmpresa);

        if ($length <= 0 || $length > 30) {
            throw new InvalidArgumentException('Tamanho de texto invalido, para o nome da empresa.');
        }

        $this->nomeEmpresa = $this->montarBranco($nomeEmpresa, 30, 'right');
    }

    /**
     * @param DateTime $data_gravacao
     */
    public function setDataGravacao(DateTime $data_gravacao)
    {
        if (!is_numeric($data_gravacao)) {
            throw new InvalidArgumentException('O campo data de gravação não é um numero.');
        }

        $this->dataGravacao = $data_gravacao;
    }

    /**
     * @param string $numeroSequencialRemessa
     */
    public function setNumeroSequencialRemessa($numeroSequencialRemessa)
    {
        //verificando se � um numero
        if (!is_numeric($numeroSequencialRemessa)) {
            throw new InvalidArgumentException('O campo numero sequencial remessa não é um numero.');
        }

        //completando a string com zeros
        $numeroSequencialRemessa = $this->addZeros($numeroSequencialRemessa, 3);
        if (!$this->validaTamanhoCampo($numeroSequencialRemessa, 3)) {
            throw new InvalidArgumentException('Tamanho de texto invalido, para o campo numero sequencial remessa.');
        }

        $this->numeroSequencialRemessa = $numeroSequencialRemessa;
    }

    public function montaLinha()
    {

        //motando linha do cabeçalho da remessa
        $linha = $this->identificacaoRegistro .
            $this->identificacaoArquivoRemessa .
            $this->literalRemessa .
            $this->codigoServico .
            $this->literalServico .
            $this->getCodigoEmpresa() .
            $this->getNomeEmpresa() .
            $this->numeroBradescoCompensacao .
            $this->nomeBanco .
            $this->getDataGravacao()->format('dmy') .
            $this->addZeros('', 16) .
            $this->montarBranco('', 274) .
            $this->getNumeroSequencialRemessa() .
            $this->numeroSequencialRegistro;

        return $this->validaLinha($linha);
    }
}
