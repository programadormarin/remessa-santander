<?php
namespace Hmarinjr\RemessaSantander;

use Exception;

class Detalhes extends Funcoes
{
    //001 - 001 - 1 -  N CONSTANTE
    private $identificacaoRegistro = 1;

    //002 - 003 - 2 - N
    private $tipoInscricaoCedente;

    //004 - 0017 - 14 - N
    private $cnpjCedente;

    //018 - 007 - 1 - A
    private $codigoTransmissao;

    //008 - 012 - 5 N
    private $razaoContaCorrente;

    //013 - 019 - 7 - N
    private $contaCorrente;

    //020 - 020 - 1 - A
    private $digitoContaCorrente;

    //021 - 037 - 17 - A
    private $identificacaoEmpresaBenificiarioBanco;

    //038 - 062 - 25 - A
    private $numeroControleParticipante;

    //063 - 065 - 3 - N
    private $codigoBancoDebitoCompensacao;

    //066 - 066 - 1 - N
    private $campoMulta;

    //067 - 070 - 4 - N
    private $percentualMulta;

    //071 - 081 - 11 - N
    private $identificacaoTituloBanco;

    //082 - 082 - 1 - A
    private $digitoAutoConsferenciaBancaria;

    //083 - 092 - 10 - N
    private $descontoBonificacaoDia;

    //093 - 093 - 1 - CONSTANTE
    private $condicaoEmissaoPapeletaCobranca = 2; //<--- verificar observações

    //094 - 094 - 1 - A - CONSTANTE
    private $identDebitoAutomatico = 'N'; //<---- ver observações

    //095 - 104 - 10 - A
    //PREENCHER ESPAÇOS EM BRANCO
    //105 - 105 - 1 - A
    private $indicadorRateioCredito;

    //106 - 106 - 1 - N - CONSTANTE
    private $enderecamentoAvisoDebito = '0'; //<---- ver observações

    //107 - 108 - 2 - A
    //PREENCHER ESPAÇOS EM BRANCO
    //109 - 110 - 2 - N - CONSTANTE
    private $identificacaoOcorrencia = '01'; //<---- ver observações

    //111 - 120 - 10 - A
    private $numeroDocumento;

    //121 - 126 - 6 - N
    private $dataVencimentoTitulo;

    //127 - 139 - 13 - N
    private $valorTitulo; //<---- ver observações

    //140 - 142 - 3 - N
    private $bancoEncarregadoCobranca = "000";

    //143 - 147 - 5 - N
    private $agenciaDepositaria = "00000";

    //148 - 149 - 2 - N - CONSTRANTE
    private $especieTitulo = '01'; //<---- ver observações

    //150 - 150 - 1 - A
    private $identificacao = "N";

    //151 - 156 - 6 - N
    private $dataEmissaoTitulo;

    //157 -  158 - 2 - N
    private $instrucao1 = '00'; //<---- ver observações

    //159 - 160 - 2 - N
    private $instrucao2 = '00'; //<---- ver observações

    //161 - 173 - 13 - N
    private $valoCobradoDiaAtraso; //<---- ver observações

    //174 - 179 - 6 - N
    private $dataLimiteDesconto; //<---- ver observações

    //180 - 192 - 13 - N
    private $valorDesconto;

    //192 - 205 - 13 N
    private $valorIOF;

    //206 - 218 - 13 - N
    private $valorAbatimentoConcedidoCancelado;

    //219 - 220 - 2 - N
    private $identificacaoTipoIncricaoPagador; //<---- ver observações

    //221 - 234 - 14 - N
    private $numeroInscricaoPagador; //<---- ver observações

    //235 - 274 - 40 - A
    private $nomePagador;

    //275 - 314 - 40 - A
    private $enderecoPagador;

    //315 - 326 - 12 - A
    private $primeiraMensagem;

    //327 - 331 - 5 - N
    private $cep;

    //332 - 334 - 3 - N
    private $sufixoCep;

    //335 - 394 - 60 - A
    private $sacadorSegundaMensagem; //<---- ver observações

    //395 - 400 - 6 - N - AUTOINCREMENTADO E UNICO
    private $numeroSequencialRegistro;

    //EXTRA
    private $carteira;

    /**
     * @return the $carteira
     */
    public function getCarteira()
    {
        return $this->carteira;
    }

    /**
     * @return the $agencia_debito
     */
    public function getAgenciaDebito()
    {
        return $this->tipoInscricaoCedente;
    }

    /**
     * @return the $digito_debito_debito
     */
    public function getDigitoDebito()
    {
        return $this->digitoDebito;
    }

    /**
     * @return the $razao_conta_corrente
     */
    public function getRazaoContaCorrente()
    {
        return $this->razaoContaCorrente;
    }

    /**
     * @return the $conta_corrente
     */
    public function getContaCorrente()
    {
        return $this->contaCorrente;
    }

    /**
     * @return the $digito_conta_corrente
     */
    public function getDigitoContaCorrente()
    {
        return $this->digitoContaCorrente;
    }

    /**
     * @return the $identificacao_empresa_benificiario_banco
     */
    public function getIdentificacaoEmpresaBenificiarioBanco()
    {
        /*
         * montando numero de identificacao da empresa
         * exemplo: 0|009|01800|0018399|7
         */
        $identificacao_empresa_benificiario_banco = '0' .
            $this->getCarteira() .
            $this->getAgenciaDebito() .
            $this->getContaCorrente() .
            $this->getDigitoContaCorrente();

        return $identificacao_empresa_benificiario_banco;
    }

    /**
     * @return the $numero_controle_participante
     */
    public function getNumeroControleParticipante()
    {
        return $this->numeroControleParticipante;
    }

    /**
     * @return the $codigo_banco_debito_compensacao
     */
    public function getCodigoBancoDebitoCompensacao()
    {
        return $this->codigoBancoDebitoCompensacao;
    }

    /**
     * @return the $campo_multa
     */
    public function getCampoMulta()
    {
        return $this->campoMulta;
    }

    /**
     * @return the $percentual_multa
     */
    public function getPercentualMulta()
    {
        return $this->percentualMulta;
    }

    /**
     * @return the $identificacao_titulo_banco
     */
    public function getIdentificacaoTituloBanco()
    {
        return $this->identificacaoTituloBanco;
    }

    /**
     * @return the $digito_auto_consferencia_bancaria
     */
    public function getDigitoAutoConsferenciaBancaria()
    {
        return $this->digitoVerificadorNossoNumero($this->getCarteira() . $this->getIdentificacaoTituloBanco());
    }

    /**
     * @return the $desconto_bonificacao_dia
     */
    public function getDescontoBonificacaoDia()
    {
        return $this->descontoBonificacaoDia;
    }

    /**
     * @return the $indicador_rateio_credito
     */
    public function getIndicadorRateioCredito()
    {
        return $this->indicadorRateioCredito;
    }

    /**
     * @return int
     */
    public function getIdentificacaoRegistro()
    {
        return $this->identificacaoRegistro;
    }

    /**
     * @return string
     */
    public function getCondicaoEmissaoPapeletaCobranca()
    {
        return $this->condicaoEmissaoPapeletaCobranca;
    }

    /**
     * @return string
     */
    public function getIdentDebitoAutomatico()
    {
        return $this->identDebitoAutomatico;
    }

    /**
     * @return string
     */
    public function getEnderecamentoAvisoDebito()
    {
        return $this->enderecamentoAvisoDebito;
    }

    /**
     * @return int
     */
    public function getIdentificacaoOcorrencia()
    {
        return $this->identificacaoOcorrencia;
    }

    /**
     * @return int
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * @return string ddmmyy
     */
    public function getDataVencimentoTitulo()
    {
        return $this->dataVencimentoTitulo;
    }

    /**
     * @return float
     */
    public function getValorTitulo()
    {
        return $this->valorTitulo;
    }

    /**
     * @return int
     */
    public function getBancoEncarregadoCobranca()
    {
        return $this->bancoEncarregadoCobranca;
    }

    /**
     * @return int
     */
    public function getAgenciaDepositaria()
    {
        return $this->agenciaDepositaria;
    }

    /**
     * @return int
     */
    public function getEspecieTitulo()
    {
        return $this->especieTitulo;
    }

    /**
     * @return string
     */
    public function getIdentificacao()
    {
        return $this->identificacao;
    }

    /**
     * @return string ddmmyy
     */
    public function getDataEmissaoTitulo()
    {
        return $this->dataEmissaoTitulo;
    }

    /**
     * @return string
     */
    public function getInstrucao1()
    {
        return $this->instrucao1;
    }

    /**
     * @return string
     */
    public function getInstrucao2()
    {
        return $this->instrucao2;
    }

    /**
     * @return float
     */
    public function getValoCobradoDiaAtraso()
    {
        return $this->valoCobradoDiaAtraso;
    }

    /**
     * @return string ddmmyy
     */
    public function getDataLimiteDesconto()
    {
        return $this->dataLimiteDesconto;
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
    public function getValorAbatimentoConcedidoCancelado()
    {
        return $this->valorAbatimentoConcedidoCancelado;
    }

    /**
     * @return int
     */
    public function getIdentificacaoTipoIncricaoPagador()
    {
        return $this->identificacaoTipoIncricaoPagador;
    }

    /**
     * @return int
     */
    public function getNumeroInscricaoPagador()
    {
        return $this->numeroInscricaoPagador;
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
    public function getPrimeiraMensagem()
    {
        return $this->primeiraMensagem;
    }

    /**
     * @return int
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @return int
     */
    public function getSufixoCep()
    {
        return $this->sufixoCep;
    }

    /**
     * @return string
     */
    public function getSacadorSegundaMensagem()
    {
        return $this->sacadorSegundaMensagem;
    }

    /**
     * @return int
     */
    public function getNumeroSequencialRegistro()
    {
        return $this->numeroSequencialRegistro;
    }

    /**
     * @param field_type $agencia_debito
     */
    public function setAgenciaDebito($agencia_debito)
    {
        //verificando se � um numero
        if (is_numeric($agencia_debito)) {
            //completando o campo
            $agencia_debito = $this->addZeros($agencia_debito, 5);
            //realizando valida��es
            if ($this->validaTamanhoCampo($agencia_debito, 5)) {
                $this->tipoInscricaoCedente = $agencia_debito;
            } else {
                throw new Exception('Error: A quantidade dos digito do numero da agencia excedido.');
            }
        } else {
            throw new Exception('Error: O campo Agencia_debito não é um numero.');
        }
    }

    /**
     * @param field_type $digito_debito_debito
     */
    public function setDigitoDebito($digito_debito_debito)
    {
        //verifica se � numerico
        if (is_numeric($digito_debito_debito)) {
            //validando a quantidade de caracteres
            if ($this->validaTamanhoCampo($digito_debito_debito, 1)) {
                $this->digitoDebito = $digito_debito_debito;
            } else {
                throw new Exception('Error: Quantidade de digitos para o campo Digito Agencia Debito invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Digito Agencia debito não é um numero.');
        }
    }

    /**
     * @param field_type $razao_conta_corrente
     */
    public function setRazaoContaCorrente($razao_conta_corrente)
    {
        //validando para ver se � um numero
        if (is_numeric($razao_conta_corrente)) {
            //completando com zeros a string
            $razao_conta_corrente = $this->addZeros($razao_conta_corrente, 5);
            //validando o tamanho da string
            if ($this->validaTamanhoCampo($razao_conta_corrente, 5)) {
                $this->razaoContaCorrente = $razao_conta_corrente;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Razão Conta Corrente invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Razão Conta Corrente não é um numero.');
        }
    }

    /**
     * @param field_type $conta_corrente
     */
    public function setContaCorrente($conta_corrente)
    {
        //verificando se � um numero
        if (is_numeric($conta_corrente)) {
            $conta_corrente = $this->addZeros($conta_corrente, 7);

            if ($this->validaTamanhoCampo($conta_corrente, 7)) {
                $this->contaCorrente = $conta_corrente;
            } else {
                throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Conta Corrente não é um numero.');
        }
    }

    /**
     * @param field_type $digito_conta_corrente
     */
    public function setDigitoContaCorrente($digito_conta_corrente)
    {
        //verificando se � numerico
        if (is_numeric($digito_conta_corrente)) {
            if ($this->validaTamanhoCampo($digito_conta_corrente, 1)) {
                $this->digitoContaCorrente = $digito_conta_corrente;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Digito Conta Conrrente.');
            }
        } else {
            throw new Exception('Error: O campo Digito Conta Corrente não é um numero.');
        }
    }

    /**
     * semelhante ao numero do documento - pode ser uma chave unica de identificação de cada boleto da remessa
     * @param field_type $numero_controle_participante
     */
    public function setNumeroControleParticipante($numero_controle_participante)
    {
        //verificando e � um numero
        if (is_numeric($numero_controle_participante)) {
            //adicionando caracteres zeros
            $numero_controle_participante = $this->addZeros($numero_controle_participante, 25);
            //verificando tamanho da string
            if ($this->validaTamanhoCampo($numero_controle_participante, 25)) {
                $this->numeroControleParticipante = $numero_controle_participante;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Numero Controle Participante invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Numero Controle Participante não é um numero.');
        }
    }

    /**
     * se existir debito automatico para o beneficiario, dever� ser passado como parametro TRUE
     * @param string $codigo_banco_debito_compensacao
     */
    public function setCodigoBancoDebitoCompensacao($codigo_banco_debito_compensacao = false)
    {
        if ($codigo_banco_debito_compensacao == true) {
            $this->codigoBancoDebitoCompensacao = '237';
        } else {
            $this->codigoBancoDebitoCompensacao = '000';
        }
    }

    /**
     * habilita o campo para receber a porcentagem de multas por atraso de pagamento
     * @param field_type $campo_multa
     */
    public function setCampoMulta($campo_multa = true)
    {
        if ($campo_multa == true) {
            $this->campoMulta = 2;
        } else {
            $this->campoMulta = '0';
        }
    }

    /**
     * @param field_type $percentual_multa
     */
    public function setPercentualMulta($percentual_multa)
    {
        //verificando e o campo multa foi setado como verdadeiro
        if ($this->getCampoMulta()) {
            //verificando se � um numero
            if (is_numeric($percentual_multa)) {
                //adicionando caracteres zeros na string
                $percentual_multa = $this->addZeros($percentual_multa, 4);
                //verificando o tamnho da string
                if ($this->validaTamanhoCampo($percentual_multa, 4)) {
                    $this->percentualMulta = $percentual_multa;
                } else {
                    throw new Exception('Error: Quantidade de caracteres do campo Percentual Multa invalidos.');
                }
            } else {
                throw new Exception('Error: O campo Percentual Multa não é um numero.');
            }
        } else {
            $this->percentualMulta = '0000';
        }
    }

    /**
     * campo de NOSSO NUMERO, identificador unico para cada boleto gerado
     * @param field_type $identificacao_titulo_banco
     */
    public function setIdentificacaoTituloBanco($identificacao_titulo_banco)
    {
        //verificando se � um numero
        if (is_numeric($identificacao_titulo_banco)) {
            //adicionando zeros na string
            $identificacao_titulo_banco = $this->addZeros($identificacao_titulo_banco, 11);
            //verificando o tamnho da string
            if ($this->validaTamanhoCampo($identificacao_titulo_banco, 11)) {
                $this->identificacaoTituloBanco = $identificacao_titulo_banco;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Identificação Titulo Banco invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Identificação Titulo Banco não é um numero.');
        }
    }

    /**
     * valor de bonifica��o por dia
     * @param field_type $desconto_bonificacao_dia
     */
    public function setDescontoBonificacaoDia($desconto_bonificacao_dia)
    {
        //verificando se � um numero
        if (is_numeric($desconto_bonificacao_dia)) {
            //adicionando zeros na string
            $desconto_bonificacao_dia = $this->addZeros($desconto_bonificacao_dia, 10);
            //verificando quantidade de caracteres
            if ($this->validaTamanhoCampo($desconto_bonificacao_dia, 10)) {
                $this->descontoBonificacaoDia = $desconto_bonificacao_dia;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Desconto Bonificação Dia invalidos');
            }
        } else {
            throw new Exception('Error: O campo Desconto Bonificação Dia  não é um numero.');
        }
    }

    /**
     * @param string $indicador_rateio_credito
     */
    public function setIndicadorRateioCredito($indicador_rateio_credito)
    {
        if ($indicador_rateio_credito) {
            $this->indicadorRateioCredito = 'R';
        } else {
            $this->indicadorRateioCredito = ' ';
        }
    }

    /**
     * @param field_type $numero_documento
     */
    public function setNumeroDocumento($numero_documento)
    {
        //verificando se � alfanumerico
        if (ctype_alnum($numero_documento)) {
            //adicionando zeros na string
            $numero_documento = $this->addZeros($numero_documento, 10);
            //verificando quantidade de caracteres
            if ($this->validaTamanhoCampo($numero_documento, 10)) {
                $this->numeroDocumento = $numero_documento;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Numero Documento invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Numero Documento não é alfanumerico.');
        }
    }

    /**
     * @param field_type $data_vencimento_titulo
     */
    public function setDataVencimentoTitulo($data_vencimento_titulo)
    {
        //verificando se � um numero
        if (is_numeric($data_vencimento_titulo)) {
            //adicionando zeros na string
            $data_vencimento_titulo = $this->addZeros($data_vencimento_titulo, 6);
            //verificando a quantidade de caracteres
            if ($this->validaTamanhoCampo($data_vencimento_titulo, 6)) {
                $this->dataVencimentoTitulo = $data_vencimento_titulo;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Data Vencimento Titulo invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Data Vencimento Titulo não é um numero.');
        }
    }

    /**
     * @param field_type $valor_titulo
     */
    public function setValorTitulo($valor_titulo)
    {
        //verificando se � um numero
        if (is_numeric($valor_titulo)) {
            //adicionando zeros na string
            $valor_titulo = $this->addZeros($valor_titulo, 13);
            //verificando quantidade de caracteres
            if ($this->validaTamanhoCampo($valor_titulo, 13)) {
                $this->valorTitulo = $this->removeFormatacaoMoeda($valor_titulo);
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Valor Titulo invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Valor Titulo não é um numero.');
        }
    }

    /**
     * @param field_type $data_emissao_titulo
     */
    public function setDataEmissaoTitulo($data_emissao_titulo)
    {
        //verificando se � um numero
        if (is_numeric($data_emissao_titulo)) {
            //adicionando zeros
            $data_emissao_titulo = $this->addZeros($data_emissao_titulo, 6);
            //verificando a quantidade de caracteres
            if ($this->validaTamanhoCampo($data_emissao_titulo, 6)) {
                $this->dataEmissaoTitulo = $data_emissao_titulo;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Data Emiss�o Titulo invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Data Emissao Titulo não é um numero.');
        }
    }

    /**
     * @param field_type $valo_cobrado_dia_atraso
     */
    public function setValoCobradoDiaAtraso($valo_cobrado_dia_atraso)
    {
        //verifica se � um numero
        if (is_numeric($valo_cobrado_dia_atraso)) {
            //adicionando caracteres na string
            $valo_cobrado_dia_atraso = $this->addZeros($valo_cobrado_dia_atraso, 13);
            //verificando a quantidade de caracteres
            if ($this->validaTamanhoCampo($valo_cobrado_dia_atraso, 13)) {
                $this->valoCobradoDiaAtraso = $this->removeFormatacaoMoeda($valo_cobrado_dia_atraso);
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Valor Cobrado Dia Atraso invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Valor Cobrado Dia Atraso não é um numero.');
        }
    }

    /**
     * @param field_type $data_limite_desconto
     */
    public function setDataLimiteDesconto($data_limite_desconto)
    {
        //verificando se � um numero
        if (is_numeric($data_limite_desconto)) {
            //verificando quantidade de caracteres
            if ($this->validaTamanhoCampo($data_limite_desconto, 6)) {
                $this->dataLimiteDesconto = $data_limite_desconto;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Data Limite Desconto invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Data Limite Desconto não é um numero.');
        }
    }

    /**
     * @param field_type $valor_desconto
     */
    public function setValorDesconto($valor_desconto)
    {
        //verificando se � um numero
        if (is_numeric($valor_desconto)) {
            //adicionando zeros na string
            $valor_desconto = $this->addZeros($valor_desconto, 13);
            //verificando a quantidade de caracteres
            if ($this->validaTamanhoCampo($valor_desconto, 13)) {
                $this->valorDesconto = $this->removeFormatacaoMoeda($valor_desconto);
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Valor Desconto invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Valor Desconto não é um numero.');
        }
    }

    /**
     * @param field_type $valor_iof
     */
    public function setValorIOF($valor_iof = 0)
    {
        //verificando se � um numero
        if (is_numeric($valor_iof)) {
            //adicionando zeros na string
            $valor_iof = $this->addZeros($valor_iof, 13);
            //verificando a quantidade de caracteres
            if ($this->validaTamanhoCampo($valor_iof, 13)) {
                $this->valorIOF = $this->removeFormatacaoMoeda($valor_iof);
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Valor IOF invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Valor IOF não é um numero.');
        }
    }

    /**
     * @param field_type $valor_abatimento_concedido_cancelado
     */
    public function setValorAbatimentoConcedidoCancelado($valor_abatimento_concedido_cancelado = 0)
    {
        //verifica se � um numero
        if (is_numeric($valor_abatimento_concedido_cancelado)) {
            //adicionando zeros na string
            $valor_abatimento_concedido_cancelado = $this->addZeros($valor_abatimento_concedido_cancelado, 13);
            //verificando quantidade de caracteres
            if ($this->validaTamanhoCampo($valor_abatimento_concedido_cancelado, 13)) {
                $this->valorAbatimentoConcedidoCancelado = $this->removeFormatacaoMoeda(
                    $valor_abatimento_concedido_cancelado
                );
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Valor Concedido Cancelado invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Valor Abatimento Concedido Cancelado não é um numero.');
        }
    }

    /**
     * @param field_type $identificacao_tipo_incricao_pagador
     */
    public function setIdentificacaoTipoIncricaoPagador($identificacao_tipo_incricao_pagador)
    {
        if ($identificacao_tipo_incricao_pagador == 'CPF') {

            $this->identificacaoTipoIncricaoPagador = '01';
        } elseif ($identificacao_tipo_incricao_pagador == 'CNPJ') {

            $this->identificacaoTipoIncricaoPagador = '02';
        } elseif ($identificacao_tipo_incricao_pagador == 'PIS') {

            $this->identificacaoTipoIncricaoPagador = '03';
        } elseif ($identificacao_tipo_incricao_pagador == 'NAO_TEM') {

            $this->identificacaoTipoIncricaoPagador = '98';
        } elseif ($identificacao_tipo_incricao_pagador == 'OUTROS') {

            $this->identificacaoTipoIncricaoPagador = '99';
        } else {
            throw new Exception('Error - Valor do tipo de pagador esta incorreto.');
        }
    }

    /**
     * @param field_type $numero_inscricao_pagador
     */
    public function setNumeroInscricaoPagador($numero_inscricao_pagador)
    {
        //verifica se � um numero
        if (is_numeric($numero_inscricao_pagador)) {
            //verificando o tipo de pagador
            if ($this->getIdentificacaoTipoIncricaoPagador() == '01') {
                if ($this->validaTamanhoCampo($numero_inscricao_pagador, 11)) {
                    //completando campo
                    $numero_inscricao_pagador = '000' . $numero_inscricao_pagador;

                    $this->numeroInscricaoPagador = $numero_inscricao_pagador;
                } else {
                    throw new Exception('Error -  CPF do campo Numero Inscrição Pagador Invalido.');
                }
            } elseif ($this->getIdentificacaoTipoIncricaoPagador() == '02') {
                //verificando o tamanho do campo
                if ($this->validaTamanhoCampo($numero_inscricao_pagador, 14)) {
                    $this->numeroInscricaoPagador = $numero_inscricao_pagador;
                } else {
                    throw new Exception('Error -  CNPJ do campo Numero Inscrição Pagador Invalido.');
                }
            } else {
                throw new Exception('Error -  O campo Numero Inscrição é invalido.');
            }
        } else {
            throw new Exception('Error -  O campo Numero Inscrição Pagador não é um numero.');
        }
    }

    /**
     * @param field_type $nome_pagador
     */
    public function setNomePagador($nome_pagador)
    {
        //adiciona brancos na string
        $nome_pagador = $this->montarBranco($nome_pagador, 40, 'right');
        //verifica a quantidade de caracteres
        if ($this->validaTamanhoCampo($nome_pagador, 40)) {
            $this->nomePagador = $nome_pagador;
        } else {
            throw new Exception('Error - Nome do pagador invalido, excedido o tamanho maximo de 40 caracteres.');
        }
    }

    /**
     * @param field_type $endereco_pagador
     */
    public function setEnderecoPagador($endereco_pagador)
    {
        //	die($endereco_pagador);
        $tamanho = strlen($endereco_pagador);
        if ($tamanho > 40) {

            $endereco_pagador = $this->resumeTexto($endereco_pagador, 39);

            $endereco_pagador = $this->montarBranco($endereco_pagador, 40, 'right');

            if ($this->validaTamanhoCampo($endereco_pagador, 40)) {
                $this->enderecoPagador = $endereco_pagador;
            } else {
                throw new Exception(
                    'Error - Endereço do pagador invalido, excedido o tamanho maximo de 40 caracteres.'
                );
            }
        } else {

            $endereco_pagador = $this->montarBranco($endereco_pagador, 40, 'right');

            if ($this->validaTamanhoCampo($endereco_pagador, 40)) {
                $this->enderecoPagador = $endereco_pagador;
            } else {
                throw new Exception(
                    'Error - Endereço do pagador invalido, excedido o tamanho maximo de 40 caracteres.'
                );
            }
        }
    }

    /**
     * @param field_type $primeira_mensagem
     */
    public function setPrimeiraMensagem($primeira_mensagem)
    {
        //preenchendo com brancos
        $primeira_mensagem = $this->montarBranco($primeira_mensagem, 12, 'right');

        if ($this->validaTamanhoCampo($primeira_mensagem, 12)) {
            $this->primeiraMensagem = $primeira_mensagem;
        } else {
            throw new Exception('Error - Primeira mensagem invalida, excedido o tamanho maximo de 12 caracteres.');
        }
    }

    /**
     * @param field_type $cep
     */
    public function setCep($cep)
    {
        //verificando se � um numero
        if (is_numeric($cep)) {
            //verificando o tamanho da string
            if ($this->validaTamanhoCampo($cep, 5)) {
                $this->cep = $this->addZeros($cep, 5);
            } else {
                throw new Exception('Error - Quantidade de caracteres do compo CEP invalidos.');
            }
        } else {
            throw new Exception('Error - O campos CEP não é um numero.');
        }
    }

    /**
     * @param field_type $sufixo_cep
     */
    public function setSufixoCep($sufixo_cep)
    {
        //verificando se � um numero
        if (is_numeric($sufixo_cep)) {
            //verificando o tamanho da string
            if ($this->validaTamanhoCampo($sufixo_cep, 3)) {
                $this->sufixoCep = $this->addZeros($sufixo_cep, 3);
            } else {
                throw new Exception('Error - Quantidade de caracteres do campo Sufixo invalidos.');
            }
        } else {
            throw new Exception('Error - O campos Sufixo CEP não é um numero.');
        }
    }

    /**
     * N�o utilizar as express�es 'taxa banc�ria' ou 'tarifa banc�ria' nos boletos de
     * cobran�a, pois essa tarifa refere-se � negociada pelo Banco com seu cliente
     * benefici�rio. Orienta��o da FEBRABAN (Comunicado FB-170/2005).
     *
     * @param field_type $sacador_segunda_mensagem
     */
    public function setSacadorSegundaMensagem($sacador_segunda_mensagem)
    {
        //preenchendo com brancos
        $sacador_segunda_mensagem = $this->montarBranco($sacador_segunda_mensagem, 60);

        if ($this->validaTamanhoCampo($sacador_segunda_mensagem, 60)) {
            $this->sacadorSegundaMensagem = $sacador_segunda_mensagem;
        } else {
            throw new Exception('Error - Dados da segunda mensagem estão invalidos.');
        }
    }

    /**
     * @param field_type $numero_sequencial_registro
     */
    public function setNumeroSequencialRegistro($numero_sequencial_registro)
    {
        //verificando se � um numero
        if (is_numeric($numero_sequencial_registro)) {
            //completando com zeros na string
            $numero_sequencial_registro = $this->addZeros($numero_sequencial_registro, 6);
            //verificando o tamanho da string
            if ($this->validaTamanhoCampo($numero_sequencial_registro, 6)) {
                $this->numeroSequencialRegistro = $numero_sequencial_registro;
            } else {
                throw new Exception('Error - Quantidade de caracteres do campo Numero Sequencial Registro invalidos.');
            }
        } else {
            throw new Exception('Error - O campos Numero Sequencial Registro não é um numero.');
        }
    }

    /**
     * @param field_type $carteira
     */
    public function setCarteira($carteira)
    {
        //verificando se � um numero
        if (is_numeric($carteira)) {
            $carteira = $this->addZeros($carteira, 3);
            if ($this->validaTamanhoCampo($carteira, 3)) {
                $this->carteira = $carteira;
            } else {
                throw new Exception('Error - Quantidade de caracteres do campo Carteira estão invalidos.');
            }
        } else {
            throw new Exception('Error - O campos Carteira não é um numero.');
        }
    }

    /* (non-PHPdoc)
     * Medotos para gerar a linha dos detalhes dos boletos que seram gerados
     * @see IFuncoes::montar_linha()
     */

    public function montaLinha()
    {
         $linha = $this->getIdentificacaoRegistro() . //nao seta
            //opcional para pagador debito em conta corrente
            $this->addZeros('', 5) .
            $this->addZeros('', 1) .
            $this->addZeros('', 5) .
            $this->addZeros('', 7) .
            $this->addZeros('', 1) .
            //
            $this->getIdentificacaoEmpresaBenificiarioBanco() .
            $this->montarBranco('', 25) .
            $this->getCodigoBancoDebitoCompensacao() .
            $this->getCampoMulta() .
            $this->getPercentualMulta() .
            $this->getIdentificacaoTituloBanco() .
            $this->getDigitoAutoConsferenciaBancaria() .
            $this->getDescontoBonificacaoDia() .
            $this->getCondicaoEmissaoPapeletaCobranca() . //nao seta
            $this->getIdentDebitoAutomatico() .
            $this->montarBranco('', 10) . //nao seta
            $this->getIndicadorRateioCredito() .
            $this->getEnderecamentoAvisoDebito() . //nao seta
            $this->montarBranco('', 2) . //nao seta
            $this->getIdentificacaoOcorrencia() . //nao seta
            $this->getNumeroDocumento() .
            $this->getDataVencimentoTitulo() .
            $this->getValorTitulo() .
            $this->getBancoEncarregadoCobranca() . //nao seta
            $this->getAgenciaDepositaria() . //nao seta
            $this->getEspecieTitulo() . //nao seta
            $this->getIdentificacao() . //nao seta
            $this->getDataEmissaoTitulo() .
            $this->getInstrucao1() . //nao seta
            $this->getInstrucao2() . //nao seta
            $this->getValoCobradoDiaAtraso() .
            $this->getDataLimiteDesconto() .
            $this->getValorDesconto() .
            $this->getValorIOF() .
            $this->getValorAbatimentoConcedidoCancelado() .
            $this->getIdentificacaoTipoIncricaoPagador() .
            $this->getNumeroInscricaoPagador() .
            $this->getNomePagador() .
            $this->getEnderecoPagador() .
            $this->getPrimeiraMensagem() .
            $this->getCep() .
            $this->getSufixoCep() .
            $this->getSacadorSegundaMensagem() .
            $this->getNumeroSequencialRegistro();

        return $this->validaLinha($linha);
    }
}
