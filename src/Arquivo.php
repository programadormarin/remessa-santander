<?php
namespace Hmarinjr\RemessaSantander;

class Arquivo
{
    private $header_label;
    private $filename;
    private $trailler;
    const QUEBRA_LINHA = "\r\n";
    private $detalhes = array();

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
    public function getDetalhes()
    {
        return $this->detalhes;
    }

    /**
     * @param multitype: $detalhes
     */
    public function setDetalhes($detalhes)
    {
        $this->detalhes[] = $detalhes;
    }

    /**
     * @return the $header_label
     */
    public function getHeaderLabel()
    {
        return $this->header_label;
    }

    /**
     * @return the $trailler
     */
    public function getTrailler()
    {
        return $this->trailler;
    }

    /**
     * @param field_type $header_label
     */
    public function setHeaderLabel($header_label)
    {
        $this->header_label = $header_label;
    }

    /**
     * @param field_type $trailler
     */
    public function setTrailler($trailler)
    {
        $this->trailler = $trailler;
    }

    /**
     * metodo para adicionar boletos na remessa
     * @param unknown $boleto
     */
    public function addBoleto($boleto)
    {
        //preenchendo dados dos detalhes
        $detalhes = new Detalhes();

        //informações da conta
        $detalhes->setAgenciaDebito($boleto['agencia']);
        $detalhes->setDigitoDebito($boleto['agencia_dv']);
        $detalhes->setContaCorrente($boleto['conta']);
        $detalhes->setDigitoContaCorrente($boleto['conta_dv']);
        $detalhes->setCarteira($boleto['carteira']);

        //informações do boleto
        $detalhes->setCodigoBancoDebitoCompensacao($boleto['habilitar_debito_compensacao']);
        $detalhes->setIdentificacaoTituloBanco($boleto['nosso_numero']);
        $detalhes->setDescontoBonificacaoDia($boleto['desconto_dia']);
        $detalhes->setIndicadorRateioCredito($boleto['rateio']);
        $detalhes->setNumeroDocumento($boleto['numero_documento']);
        $detalhes->setDataVencimentoTitulo($boleto['vencimento']);
        $detalhes->setValorTitulo($boleto['valor']);
        $detalhes->setDataEmissaoTitulo($boleto['data_emissao_titulo']);

        //taxas do boleto
        $detalhes->setCampoMulta($boleto['habilitar_multa']);
        $detalhes->setPercentualMulta($boleto['percentual_multa']);
        $detalhes->setValoCobradoDiaAtraso($boleto['valor_dia_atraso']);
        $detalhes->setDataLimiteDesconto($boleto['data_limite_desconto']);
        $detalhes->setValorDesconto($boleto['valor_desconto']);
        $detalhes->setValorIOF($boleto['valor_iof']);
        $detalhes->setValorAbatimentoConcedidoCancelado($boleto['valor_abatimento_concedido']);

        //informações do pagador
        $detalhes->setIdentificacaoTipoIncricaoPagador($boleto['tipo_inscricao_pagador']);
        $detalhes->setNumeroInscricaoPagador($boleto['numero_inscricao']);
        $detalhes->setNomePagador($boleto['nome_pagador']);
        $detalhes->setEnderecoPagador($boleto['endereco_pagador']);
        $detalhes->setPrimeiraMensagem($boleto['primeira_mensagem']);
        $detalhes->setCep($boleto['cep_pagador']);
        $detalhes->setSufixoCep($boleto['sufixo_cep_pagador']);
        $detalhes->setSacadorSegundaMensagem($boleto['sacador_segunda_mensagem']);

        //adicionando boleto
        $this->setDetalhes($detalhes);
    }

    /**
     * metodo para configurar a remessa
     * @param unknown $dados
     */
    public function config($dados)
    {
        $cabecalho = new Header();
        //TESTANDO O HEADERLABEL
        $cabecalho->setCodigoEmpresa($dados['codigo_empresa']);
        $cabecalho->setNomeEmpresa($dados['razao_social']);
        $cabecalho->setNumeroSequencialRemessa($dados['numero_remessa']);
        $cabecalho->setDataGravacao($dados['data_gravacao']);

        $this->setHeaderLabel($cabecalho);
    }

    /**
     * metodo para criar o texto inteiro da remessa
     */
    public function getText()
    {
        //Montando texto
        $dados = $this->getHeaderLabel()->montaLinha() . self::QUEBRA_LINHA;
        //montando linhas dos boletos
        $numero_sequencial = 2;
        $valorTotal= 0;
        foreach ($this->getDetalhes() as $detalhe) {
            $detalhe->setNumeroSequencialRegistro($numero_sequencial++);
            $valorTotal += $detalhe->getValorTitulo() / 100;
            $dados .= $detalhe->montaLinha() . self::QUEBRA_LINHA;
        }
        //montando rodapé
        $trailler = new Trailler();
        $trailler->setNumeroSequencialRegistro($numero_sequencial++);
        $trailler->setQuantidadeRegistros($numero_sequencial);
        $trailler->setValorTotal($valorTotal);
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
        return count($this->detalhes);
    }
}
