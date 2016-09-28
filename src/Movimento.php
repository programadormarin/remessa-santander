<?php
namespace Hmarinjr\RemessaSantander;

use InvalidArgumentException;
use DateTime;

class Movimento extends Funcoes
{
    /**
     * @var int 001 - 001 - 1 - N CONSTANTE
     */
    private $tipoRegistro = 1;

    /**
     * @var int 002 - 003 - 2 - N
     */
    private $tipoInscricaoCedente = 2;

    /**
     * @var string 004 - 017 - 14 - N
     */
    private $inscricaoCedente;

    /**
     * @var string 018 - 037 - 20 - A
     */
    private $codigoTransmissao;

    /**
     * @var string 038 - 062 - 25 - A
     */
    private $controleParticipante;

    /**
     * @var string 063 - 070 - 08 - N
     */
    private $nossoNumero;

    /**
     * @var DateTime 071 - 076 - 06 - N
     */
    private $dataSegundoDesconto = 0;

    /**
     * @var int 078 - 078 - 01 - N
     */
    private $informacaoMulta = 0;

    /**
     * @var int 079 - 082 - 04 - N
     */
    private $percentualMulta = 0;

    /**
     * @var int 083 - 084 - 02 - N
     */
    private $unidadeValor = 0;

    /**
     * @var int 085 - 097 - 13 - N
     */
    private $valorOutraUnidade = 0;

    /**
     * @var DateTime 102 - 107 - 6 - N
     */
    private $dataCobrancaMulta = 0;

    /**
     * @var int 108 - 108 - 1 - N
     */
    private $codigoCarteira = 5;

    /**
     * @var int 109 - 110 - 1 - N
     */
    private $codigoOcorrencia = 1;

    /**
     * @var int 111 - 120 - 10 - A
     */
    private $seuNumero;

    /**
     * @var DateTime 121 - 126 - 6 - N
     */
    private $vencimento;

    /**
     * @var int 127 - 139 - 13 - N
     */
    private $valor;

    /**
     * @var int 140 - 142 - 3 - N
     */
    private $codigoBanco = 33;

    /**
     * @var int 143 - 147 - 5 - N
     */
    private $agencia;

    /**
     * @var int 148 - 149 - 2 - N
     */
    private $especie = 1;

    /**
     * @var int 150 - 150 - 1 - A
     */
    private $tipoAceite = 'N';

    /**
     * @var DateTime 151 - 156 - 6 - N
     */
    private $dataEmissao;

    /**
     * @var int 157 - 158 - 2 - N
     */
    private $primeiraInstrucaoCobranca = 0;

    /**
     * @var int 159 - 160 - 2 - N
     */
    private $segundaInstrucaoCobranca = 0;

    /**
     * @var int 161 - 173 - 13 - N
     */
    private $valorDiaAtrazo = 0;

    /**
     * @var DateTime 174 - 179 - 6 - N
     */
    private $dataDesconto = 0;

    /**
     * @var int 180 - 192 - 13 - N
     */
    private $valorDesconto = 0;

    /**
     * @var int 193 - 205 - 13 - N
     */
    private $valorIOF = 0;

    /**
     * @var int 206 - 218 - 13 - N
     */
    private $valorAbatimento = 0;

    /**
     * @var int 219 - 220 - 2 - N
     */
    private $tipoInscricaoPagador = 1;

    /**
     * @var int 221 - 234 - 14 - N
     */
    private $inscricaoPagador;

    /**
     * @var int 235 - 274 - 40 - A
     */
    private $nomePagador;

    /**
     * @var int 275 - 314 - 40 - A
     */
    private $enderecoPagador;

    /**
     * @var int 315 - 326 - 12 - A
     */
    private $bairroPagador;

    /**
     * @var int 327 - 334 - 8 - N
     */
    private $cepPagador;

    /**
     * @var int 335 - 349 - 15 - A
     */
    private $cidadePagador;

    /**
     * @var int 350 - 351 - 2 - A
     */
    private $estadoPagador;

    /**
     * @var int 352 - 381 - 30 - A
     */
    private $nomeSacador;

    /**
     * @var int 383 - 383 - 1 - A
     */
    private $identificadorComplemento = 'I';

    /**
     * @var int 384 - 385 - 2 - N
     */
    private $complemento;

    /**
     * @var int 392 - 393 - 2 - N
     */
    private $diasParaProtesto = 0;

    /**
     * @var int 395 - 400 - 6 - N
     */
    private $sequencial;

    /**
     * @param int $agencia
     * @param string $bairroPagador
     * @param string $cepPagador
     * @param string $cidadePagador
     * @param string $codigoTransmissao
     * @param int $complemento
     * @param string $controleParticipante
     * @param string $cpfPagador
     * @param string $enderecoPagador
     * @param string $estadoPagador
     * @param string $inscricaoCedente
     * @param string $nomePagador
     * @param string $nomeSacador
     * @param int $nossoNumero
     * @param int $sequencial
     * @param string $seuNumero
     * @param float $valor
     * @param DateTime $vencimento
     * @param DateTime $dataEmissao
     */
    public function __construct(
        $agencia,
        $bairroPagador,
        $cepPagador,
        $cidadePagador,
        $codigoTransmissao,
        $complemento,
        $controleParticipante,
        $cpfPagador,
        $enderecoPagador,
        $estadoPagador,
        $inscricaoCedente,
        $nomePagador,
        $nomeSacador,
        $nossoNumero,
        $sequencial,
        $seuNumero,
        $valor,
        DateTime $vencimento,
        DateTime $dataEmissao
    ) {
        $this->setAgencia($agencia);
        $this->setBairroPagador($bairroPagador);
        $this->setCepPagador($cepPagador);
        $this->setCidadePagador($cidadePagador);
        $this->setCodigoTransmissao($codigoTransmissao);
        $this->setComplemento($complemento);
        $this->setControleParticipante($controleParticipante);
        $this->setCpfPagador($cpfPagador);
        $this->setDataEmissao($dataEmissao);
        $this->setEnderecoPagador($enderecoPagador);
        $this->setEstadoPagador($estadoPagador);
        $this->setInscricaoCedente($inscricaoCedente);
        $this->setNomePagador($nomePagador);
        $this->setNomeSacador($nomeSacador);
        $this->setNossoNumero($nossoNumero);
        $this->setSequencial($sequencial);
        $this->setSeuNumero($seuNumero);
        $this->setValor($valor);
        $this->setVencimento($vencimento);
    }

    /**
     * @return int
     */
    public function getTipoRegistro()
    {
        return $this->tipoRegistro;
    }

    /**
     * @return int
     */
    public function getTipoInscricaoCedente()
    {
        return $this->tipoInscricaoCedente;
    }

    /**
     * @return string Somente números do CPF ou CNPJ do cedente
     */
    public function getInscricaoCedente()
    {
        return $this->inscricaoCedente;
    }

    /**
     * @return string
     */
    public function getCodigoTransmissao()
    {
        return $this->codigoTransmissao;
    }

    /**
     * @return string
     */
    public function getControleParticipante()
    {
        return $this->controleParticipante;
    }

    /**
     * @return string
     */
    public function getNossoNumero()
    {
        return $this->nossoNumero;
    }

    /**
     * @return DateTime
     */
    public function getDataSegundoDesconto()
    {
        return $this->dataSegundoDesconto;
    }

    /**
     * @return int
     */
    public function getInformacaoMulta()
    {
        return $this->informacaoMulta;
    }

    /**
     * @return float
     */
    public function getPercentualMulta()
    {
        return $this->percentualMulta;
    }

    /**
     * @return float
     */
    public function getUnidadeValor()
    {
        return $this->unidadeValor;
    }

    /**
     * @return float
     */
    public function getValorOutraUnidade()
    {
        return $this->valorOutraUnidade;
    }

    /**
     * @return DateTime
     */
    public function getDataCobrancaMulta()
    {
        return $this->dataCobrancaMulta;
    }

    /**
     * @return string
     */
    public function getCodigoCarteira()
    {
        return $this->codigoCarteira;
    }

    /**
     * @return string
     */
    public function getCodigoOcorrencia()
    {
        return $this->codigoOcorrencia;
    }

    /**
     * @return string
     */
    public function getSeuNumero()
    {
        return $this->seuNumero;
    }

    /**
     * @return DateTime
     */
    public function getVencimento()
    {
        return $this->vencimento;
    }

    /**
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @return int
     */
    public function getCodigoBanco()
    {
        return $this->codigoBanco;
    }

    /**
     * @return int
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @return int
     */
    public function getEspecie()
    {
        return $this->especie;
    }

    /**
     * @return string
     */
    public function getTipoAceite()
    {
        return $this->tipoAceite;
    }

    /**
     * @return DateTime
     */
    public function getDataEmissao()
    {
        return $this->dataEmissao;
    }

    /**
     * @return int
     */
    public function getPrimeiraInstrucaoCobranca()
    {
        return $this->primeiraInstrucaoCobranca;
    }

    /**
     * @return int
     */
    public function getSegundaInstrucaoCobranca()
    {
        return $this->segundaInstrucaoCobranca;
    }

    /**
     * @return float
     */
    public function getValorDiaAtrazo()
    {
        return $this->valorDiaAtrazo;
    }

    /**
     * @return DateTime
     */
    public function getDataDesconto()
    {
        return $this->dataDesconto;
    }

    /**
     * @return float
     */
    public function getValorDesconto()
    {
        return $this->valorDesconto;
    }

    /**
     * @return float
     */
    public function getValorIOF()
    {
        return $this->valorIOF;
    }

    /**
     * @return float
     */
    public function getValorAbatimento()
    {
        return $this->valorAbatimento;
    }

    /**
     * @return int
     */
    public function getTipoInscricaoPagador()
    {
        return $this->tipoInscricaoPagador;
    }

    /**
     * @return string Somente números do CPF ou CNPJ do pagador
     */
    public function getInscricaoPagador()
    {
        return $this->inscricaoPagador;
    }

    /**
     * @return string
     */
    public function getNomePagador()
    {
        return $this->nomePagador;
    }

    /**
     * @return string
     */
    public function getEnderecoPagador()
    {
        return $this->enderecoPagador;
    }

    /**
     * @return string
     */
    public function getBairroPagador()
    {
        return $this->bairroPagador;
    }

    /**
     * @return string
     */
    public function getCepPagador()
    {
        return $this->cepPagador;
    }

    /**
     * @return string
     */
    public function getCidadePagador()
    {
        return $this->cidadePagador;
    }

    /**
     * @return string
     */
    public function getEstadoPagador()
    {
        return $this->estadoPagador;
    }

    /**
     * @return string
     */
    public function getNomeSacador()
    {
        return $this->nomeSacador;
    }

    /**
     * @return string
     */
    public function getIdentificadorComplemento()
    {
        return $this->identificadorComplemento;
    }

    /**
     * @return int
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @return int
     */
    public function getDiasParaProtesto()
    {
        return $this->diasParaProtesto;
    }

    /**
     * @return int
     */
    public function getSequencial()
    {
        return $this->sequencial;
    }

    /**
     * @param int $tipoInscricaoCedente 1 para CPF e 2 para CNPJ
     */
    public function setTipoInscricaoCedente($tipoInscricaoCedente)
    {
        if (!is_numeric($tipoInscricaoCedente) || !in_array($tipoInscricaoCedente, [1, 2])) {
            throw new InvalidArgumentException('Tipo de inscrição do cedente inválido');
        }

        $this->tipoInscricaoCedente = $tipoInscricaoCedente;
    }

    /**
     * @param string $inscricaoCedente Somente números do CPF ou CNPJ do cedente
     */
    public function setInscricaoCedente($inscricaoCedente)
    {
        if (!is_numeric($inscricaoCedente) || !in_array(strlen($inscricaoCedente), [11, 14])) {
            throw new InvalidArgumentException('Inscrição do cedente inválido');
        }

        $this->inscricaoCedente = $inscricaoCedente;
    }

    /**
     * @param string $codigoTransmissao
     */
    public function setCodigoTransmissao($codigoTransmissao)
    {
        if (strlen($codigoTransmissao) != 20) {
            throw new InvalidArgumentException('O código de transmissão deve ter 20 caracteres');
        }

        $this->codigoTransmissao = $codigoTransmissao;
    }

    /**
     * @param string $controleParticipante
     */
    public function setControleParticipante($controleParticipante)
    {
        if (strlen($controleParticipante) > 25) {
            throw new InvalidArgumentException('O código de controle do participante deve ter no máximo 25 catacteres');
        }

        $this->controleParticipante = $controleParticipante;
    }

    /**
     * @param int $nossoNumero
     */
    public function setNossoNumero($nossoNumero)
    {
        if (!is_numeric($nossoNumero) || strlen($nossoNumero) > 7) {
            throw new InvalidArgumentException('O nosso número deve ser numérico de, no máximo, 7 posições');
        }

        $this->nossoNumero = $nossoNumero;
    }

    /**
     * @param DateTime $dataSegundoDesconto
     */
    public function setDataSegundoDesconto(DateTime $dataSegundoDesconto)
    {
        $this->dataSegundoDesconto = $dataSegundoDesconto;
    }

    /**
     * @param string $informacaoMulta
     */
    public function setInformacaoMulta($informacaoMulta)
    {
        $this->informacaoMulta = $informacaoMulta;
    }

    /**
     * @param float $percentualMulta
     */
    public function setPercentualMulta($percentualMulta)
    {
        if (!is_numeric($percentualMulta)) {
            throw new InvalidArgumentException('O percentual de multa deve ser numérico');
        }

        $this->percentualMulta = $percentualMulta;
    }

    /**
     * @param DateTime $dataCobrancaMulta
     */
    public function setDataCobrancaMulta(DateTime $dataCobrancaMulta)
    {
        $this->dataCobrancaMulta = $dataCobrancaMulta;
    }

    /**
     * @param string $codigoCarteira
     */
    public function setCodigoCarteira($codigoCarteira)
    {
        if (!is_numeric($codigoCarteira) || !in_array($codigoCarteira, [1, 3, 4, 5, 6, 7])) {
            throw new InvalidArgumentException('Código da carteira inválido');
        }

        $this->codigoCarteira = $codigoCarteira;
    }

    /**
     * @param string $codigoOcorrencia
     */
    public function setCodigoOcorrencia($codigoOcorrencia)
    {
        if (!is_numeric($codigoOcorrencia) || !in_array($codigoOcorrencia, [1, 2, 4, 5, 6, 7, 8, 9, 18])) {
            throw new InvalidArgumentException('Código da ocorrencia inválido');
        }

        $this->codigoOcorrencia = $codigoOcorrencia;
    }

    /**
     * @param string $seuNumero
     */
    public function setSeuNumero($seuNumero)
    {
        if (strlen($seuNumero) > 10) {
            throw new InvalidArgumentException('O seu número de ter no máximo 10 posições');
        }

        $this->seuNumero = $seuNumero;
    }

    /**
     * @param DateTime $vencimento
     */
    public function setVencimento(DateTime $vencimento)
    {
        $this->vencimento = $vencimento;
    }

    /**
     * @param float $valor
     */
    public function setValor($valor)
    {
        if (!is_numeric($valor)) {
            throw new InvalidArgumentException('O valor do título deve ser numérico');
        }

        $this->valor = $valor;
    }

    /**
     * @param int $agencia
     */
    public function setAgencia($agencia)
    {
        if (!is_numeric($agencia) || strlen($agencia) > 5) {
            throw new InvalidArgumentException('A agência deve ser numérica de, no máximo, 5 dígitos');
        }

        $this->agencia = $agencia;
    }

    /**
     * @param int $especie
     */
    public function setEspecie($especie)
    {
        if (!is_numeric($especie) || !in_array($especie, [1, 2, 3, 5, 6, 7])) {
            throw new InvalidArgumentException('Especie do documento inválido');
        }

        $this->especie = $especie;
    }

    /**
     * @param DateTime $dataEmissao
     */
    public function setDataEmissao(DateTime $dataEmissao)
    {
        $this->dataEmissao = $dataEmissao;
    }

    /**
     * @param int $primeiraInstrucaoCobranca
     */
    public function setPrimeiraInstrucaoCobranca($primeiraInstrucaoCobranca)
    {
        if (!is_numeric($primeiraInstrucaoCobranca) || !in_array($primeiraInstrucaoCobranca, [0, 2, 3, 4, 6, 7, 8])) {
            throw new InvalidArgumentException('Código da primeira instrução inválido');
        }

        $this->primeiraInstrucaoCobranca = $primeiraInstrucaoCobranca;
    }

    /**
     * @param int $segundaInstrucaoCobranca
     */
    public function setSegundaInstrucaoCobranca($segundaInstrucaoCobranca)
    {
        if (!is_numeric($segundaInstrucaoCobranca) || !in_array($segundaInstrucaoCobranca, [0, 2, 3, 4, 6, 7, 8])) {
            throw new InvalidArgumentException('Código da segunda instrução inválido');
        }

        $this->segundaInstrucaoCobranca = $segundaInstrucaoCobranca;
    }

    /**
     * @param int $valorDiaAtrazo
     */
    public function setValorDiaAtrazo($valorDiaAtrazo)
    {
        if (!is_numeric($valorDiaAtrazo)) {
            throw new InvalidArgumentException('O valor do dia de atrazo deve ser numérico');
        }

        $this->valorDiaAtrazo = $valorDiaAtrazo;
    }

    /**
     * @param DateTime $dataDesconto
     */
    public function setDataDesconto(DateTime $dataDesconto)
    {
        $this->dataDesconto = $dataDesconto;
    }

    /**
     * @param float $valorDesconto
     */
    public function setValorDesconto($valorDesconto)
    {
        if (!is_numeric($valorDesconto)) {
            throw new InvalidArgumentException('O valor do desconto deve ser numérico');
        }

        $this->valorDesconto = $valorDesconto;
    }

    /**
     * @param float $valorIOF
     */
    public function setValorIOF($valorIOF)
    {
        if (!is_numeric($valorIOF)) {
            throw new InvalidArgumentException('O valor do IOF deve ser numérico');
        }

        $this->valorIOF = $valorIOF;
    }

    /**
     * @param float $valorAbatimento
     */
    public function setValorAbatimento($valorAbatimento)
    {
        if (!is_numeric($valorAbatimento)) {
            throw new InvalidArgumentException('O valor do abatimento deve ser numérico');
        }

        $this->valorAbatimento = $valorAbatimento;
    }

    /**
     * @param int $tipoInscricaoPagador 1 para CPF e 2 para CNPJ
     */
    public function setTipoInscricaoPagador($tipoInscricaoPagador)
    {
        if (!is_numeric($tipoInscricaoPagador) || !in_array($tipoInscricaoPagador, [1, 2])) {
            throw new InvalidArgumentException('Tipo de inscrição do pagador inválido');
        }

        $this->tipoInscricaoPagador = $tipoInscricaoPagador;
    }

    /**
     * @param string $cpfPagador
     */
    public function setCpfPagador($cpfPagador)
    {
        if (!is_numeric($cpfPagador) || !in_array(strlen($cpfPagador), [11, 14])) {
            throw new InvalidArgumentException('Inscrição do pagador inválido');
        }

        $this->inscricaoPagador = $cpfPagador;
    }

    /**
     * @param string $nomePagador
     */
    public function setNomePagador($nomePagador)
    {
        $this->nomePagador = strlen($nomePagador) > 40 ? substr($nomePagador, 0, 40) : $nomePagador;
    }

    /**
     * @param string $enderecoPagador
     */
    public function setEnderecoPagador($enderecoPagador)
    {
        $this->enderecoPagador = strlen($enderecoPagador) > 40 ? substr($enderecoPagador, 0, 40) : $enderecoPagador;
    }

    /**
     * @param string $bairroPagador
     */
    public function setBairroPagador($bairroPagador)
    {
        $this->bairroPagador = strlen($bairroPagador) > 12 ? substr($bairroPagador, 0, 12) : $bairroPagador;
    }

    /**
     * @param string $cepPagador
     */
    public function setCepPagador($cepPagador)
    {
        $cepPagador = preg_replace('/[^0-9]/', '', $cepPagador);

        if (strlen($cepPagador) != 8) {
            throw new InvalidArgumentException('O CEP do pagador deve ter 8 dígitos numéricos');
        }

        $this->cepPagador = $cepPagador;
    }

    /**
     * @param string $cidadePagador
     */
    public function setCidadePagador($cidadePagador)
    {
        $this->cidadePagador = strlen($cidadePagador) > 15 ? substr($cidadePagador, 0, 15) : $cidadePagador;
    }

    /**
     * @param string $estadoPagador
     */
    public function setEstadoPagador($estadoPagador)
    {
        if (strlen($estadoPagador) != 2) {
            throw new InvalidArgumentException('O estado do pagador deve ter 2 caracteres');
        }

        $this->estadoPagador = $estadoPagador;
    }

    /**
     * @param string $nomeSacador
     */
    public function setNomeSacador($nomeSacador)
    {
        $this->nomeSacador = strlen($nomeSacador) > 30 ? substr($nomeSacador, 0, 30) : $nomeSacador;
    }

    /**
     * @param string $identificadorComplemento
     */
    public function setIdentificadorComplemento($identificadorComplemento)
    {
        $this->identificadorComplemento = $identificadorComplemento;
    }

    /**
     * @param int $complemento
     */
    public function setComplemento($complemento)
    {
        if (strlen($complemento) != 2) {
            throw new InvalidArgumentException('O complemento deve ter 2 dígitos numéricos');
        }

        $this->complemento = $complemento;
    }

    /**
     * @param int $diasParaProtesto
     */
    public function setDiasParaProtesto($diasParaProtesto)
    {
        if (!is_numeric($diasParaProtesto)) {
            throw new InvalidArgumentException('Dias para protesto deve ser numérico');
        }

        $this->diasParaProtesto = $diasParaProtesto;
    }

    /**
     * @param int $sequencial
     */
    public function setSequencial($sequencial)
    {
        if (!is_numeric($sequencial)) {
            throw new InvalidArgumentException('O sequencial do registro n arquivo deve ser numérico');
        }

        $this->sequencial = $sequencial;
    }


    /* (non-PHPdoc)
     * Medotos para gerar a linha dos detalhes dos boletos que seram gerados
     * @see IFuncoes::montar_linha()
     */

    public function montaLinha()
    {
         $linha = $this->getTipoRegistro() .
            $this->addZeros($this->getTipoInscricaoCedente(), 2) .
            $this->addZeros($this->getInscricaoCedente(), 14) .
            $this->addZeros($this->getCodigoTransmissao(), 20) .
            $this->addZeros($this->getControleParticipante(), 25) .
            $this->addZeros($this->getNossoNumero(), 7) .
            $this->digitoVerificadorNossoNumero($this->addZeros($this->getNossoNumero(), 7)).
            $this->addZeros($this->getDataSegundoDesconto() ? $this->getDataSegundoDesconto()->format('dmy') : 0, 6) .
            $this->montarBranco('', 1) .
            $this->addZeros($this->getInformacaoMulta(), 1) .
            $this->addZeros(number_format($this->getPercentualMulta(), 2, '', ''), 4) .
            $this->addZeros($this->getUnidadeValor(), 2) .
            $this->addZeros(number_format($this->getValorOutraUnidade(), 2, '', ''), 13) .
            $this->montarBranco('', 4) .
            $this->addZeros($this->getDataCobrancaMulta() ? $this->getDataCobrancaMulta()->format('dmy') : 0, 6) .
            $this->getCodigoCarteira() .
            $this->addZeros($this->getCodigoOcorrencia(), 2) .
            $this->montarBranco($this->getSeuNumero(), 10) .
            $this->addZeros($this->getVencimento() ? $this->getVencimento()->format('dmy') : 0, 6) .
            $this->addZeros(number_format($this->getValor(), 2, '', ''), 13) .
            $this->addZeros($this->codigoBanco, 3) .
            $this->addZeros($this->getAgencia(), 5) .
            $this->addZeros($this->getEspecie(), 2) .
            $this->getTipoAceite() .
            $this->addZeros($this->getDataEmissao() ? $this->getDataEmissao()->format('dmy') : 0, 6) .
            $this->addZeros($this->getPrimeiraInstrucaoCobranca(), 2) .
            $this->addZeros($this->getSegundaInstrucaoCobranca(), 2) .
            $this->addZeros(number_format($this->getValorDiaAtrazo(), 2, '', ''), 13) .
            $this->addZeros($this->getDataDesconto() ? $this->getDataDesconto()->format('dmy') : 0, 6) .
            $this->addZeros(number_format($this->getValorDesconto(), 2, '', ''), 13) .
            $this->addZeros(number_format($this->getValorIOF(), 2, '', ''), 13) .
            $this->addZeros(number_format($this->getValorAbatimento(), 2, '', ''), 13) .
            $this->addZeros($this->getTipoInscricaoPagador(), 2) .
            $this->addZeros($this->getInscricaoPagador(), 14) .
            $this->montarBranco($this->getNomePagador(), 40) .
            $this->montarBranco($this->getEnderecoPagador(), 40) .
            $this->montarBranco($this->getBairroPagador(), 12) .
            $this->addZeros($this->getCepPagador(), 8) .
            $this->montarBranco($this->getCidadePagador(), 15) .
            $this->montarBranco($this->getEstadoPagador(), 2) .
            $this->montarBranco($this->getNomeSacador(), 30) .
            $this->montarBranco('', 1) .
            $this->montarBranco($this->getIdentificadorComplemento(), 1) .
            $this->addZeros($this->getComplemento(), 2) .
            $this->montarBranco('', 6) .
            $this->addZeros($this->getDiasParaProtesto(), 2) .
            $this->montarBranco('', 1) .
            $this->addZeros($this->getSequencial(), 6);

        return $this->validaLinha($linha);
    }
}
