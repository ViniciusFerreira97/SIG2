<html>

<HEAD>
  <TITLE></TITLE>
  <STYLE>
    td.BoletoCodigoBanco {
      font-size: 6mm;
      font-family: arial, verdana;
      font-weight: bold;
      FONT-STYLE: italic;
      text-align: center;
      vertical-align: bottom;
      border-bottom: 0.15mm solid #000000;
      border-right: 0.15mm solid #000000;
      padding-bottom: 1mm
    }

    td.BoletoLogo {
      border-bottom: 0.15mm solid #000000;
      border-right: 0.15mm solid #000000;
      text-align: center;
      height: 10mm
    }

    td.BoletoLinhaDigitavel {
      font-size: 4 mm;
      font-family: arial, verdana;
      font-weight: bold;
      text-align: center;
      vertical-align: bottom;
      border-bottom: 0.15mm solid #000000;
      padding-bottom: 1mm;
    }

    td.BoletoTituloEsquerdo {
      font-size: 0.2cm;
      font-family: arial, verdana;
      padding-left: 0.15mm;
      border-right: 0.15mm solid #000000;
      text-align: left
    }

    td.BoletoTituloDireito {
      font-size: 2mm;
      font-family: arial, verdana;
      padding-left: 0.15mm;
      text-align: left
    }

    td.BoletoValorEsquerdo {
      font-size: 3mm;
      font-family: arial, verdana;
      text-align: center;
      border-right: 0.15mm solid #000000;
      font-weight: bold;
      border-bottom: 0.15mm solid #000000;
      padding-top: 0.5mm
    }

    td.BoletoValorDireito {
      font-size: 3mm;
      font-family: arial, verdana;
      text-align: right;
      padding-right: 3mm;
      padding-top: 0.8mm;
      border-bottom: 0.15mm solid #000000;
      font-weight: bold;
    }

    td.BoletoTituloSacado {
      font-size: 2mm;
      font-family: arial, verdana;
      padding-left: 0.15mm;
      vertical-align: top;
      padding-top: 0.15mm;
      text-align: left
    }

    td.BoletoValorSacado {
      font-size: 3mm;
      font-family: arial, verdana;
      font-weight: bold;
      text-align: left
    }

    td.BoletoTituloSacador {
      font-size: 2mm;
      font-family: arial, verdana;
      padding-left: 0.15mm;
      vertical-align: bottom;
      padding-bottom: 0.8mm;
      border-bottom: 0.15mm solid #000000
    }

    td.BoletoValorSacador {
      font-size: 3mm;
      font-family: arial, verdana;
      vertical-align: bottom;
      padding-bottom: 0.15mm;
      border-bottom: 0.15mm solid #000000;
      font-weight: bold;
      text-align: left
    }

    td.BoletoPontilhado {
      border-top: 0.3mm dashed #000000;
      font-size: 1mm
    }

    ul.BoletoInstrucoes {
      font-size: 3mm;
      font-family: verdana, arial
    }
  </STYLE>
</HEAD>

<BODY>

    <p>Prezado, <br><br> Após realização do pagamento do boleto, <a href="{{$url}}">Clique Aqui</a> para sinalização. <br><br></p>

  <P align=center>
    <TABLE cellSpacing=0 cellPadding=0 border=0 class=Boleto>

      <TR>
        <TD style='width: 0.9cm'></TD>
        <TD style='width: 1cm'></TD>
        <TD style='width: 1.9cm'></TD>

        <TD style='width: 0.5cm'></TD>
        <TD style='width: 1.3cm'></TD>
        <TD style='width: 0.8cm'></TD>
        <TD style='width: 1cm'></TD>

        <TD style='width: 1.9cm'></TD>
        <TD style='width: 1.9cm'></TD>

        <TD style='width: 3.8cm'></TD>

        <TD style='width: 3.8cm'></TD>

      <tr>
        <td colspan=11 class=BoletoPontilhado>&nbsp;</td>
      </tr>
      <TR>
        <TD colspan=4 class=BoletoLogo><img src="{{ $message->embed(public_path() . '/img/logoBoletoJPG.jpg') }}"></TD>
        <!-- Mudar para base_path() ao subir para o servidor!!!! Código de barras também-->
        <TD colspan=2 class=BoletoCodigoBanco>237-2 </TD>
        <TD colspan=6 class=BoletoLinhaDigitavel>29879.38762 60028.128987 22000.986609 4 82880000003456</TD>
      </TR>
      <TR>
        <TD colspan=10 class=BoletoTituloEsquerdo>Local de Pagamento</TD>
        <TD class=BoletoTituloDireito>Vencimento</TD>
      </TR>
      <TR>
        <TD colspan=10 class=BoletoValorEsquerdo style='text-align: left; padding-left : 0.1cm'>Pagável preferencialmente na Rede Seder ou nas casas lotéricas</TD>
        <TD class=BoletoValorDireito>{{$dataVencimento}}</TD>
      </TR>
      <TR>
        <TD colspan=10 class=BoletoTituloEsquerdo>Cedente</TD>
        <TD class=BoletoTituloDireito>Agência/Código do Cedente</TD>
      </TR>
      <TR>
        <TD colspan=10 class=BoletoValorEsquerdo style='text-align: left; padding-left : 0.1cm'>Gráfica Seder</TD>
        <TD class=BoletoValorDireito>------</TD>
      </TR>
      <TR>
        <TD colspan=3 class=BoletoTituloEsquerdo>Data do Documento</TD>
        <TD colspan=4 class=BoletoTituloEsquerdo>Número do Documento</TD>
        <TD class=BoletoTituloEsquerdo>Espécie</TD>
        <TD class=BoletoTituloEsquerdo>Aceite</TD>
        <TD class=BoletoTituloEsquerdo>Data do Processamento</TD>
        <TD class=BoletoTituloDireito>Nosso Número</TD>
      </TR>
      <TR>
        <TD colspan=3 class=BoletoValorEsquerdo>{{$dataDocumento}}</TD>
        <TD colspan=4 class=BoletoValorEsquerdo>287545</TD>
        <TD class=BoletoValorEsquerdo>DM</TD>
        <TD class=BoletoValorEsquerdo>N</TD>
        <TD class=BoletoValorEsquerdo>{{$dataDocumento}}</TD>
        <TD class=BoletoValorDireito>28/00498714255-4</TD>
      </TR>
      <TR>
        <TD colspan=3 class=BoletoTituloEsquerdo>Uso do Banco</TD>
        <TD colspan=2 class=BoletoTituloEsquerdo>Carteira</TD>
        <TD colspan=2 class=BoletoTituloEsquerdo>Moeda</TD>
        <TD colspan=2 class=BoletoTituloEsquerdo>Quantidade</TD>
        <TD class=BoletoTituloEsquerdo>(x) Valor</TD>
        <TD class=BoletoTituloDireito>(=) Valor do Documento</TD>
      </TR>
      <TR>
        <TD colspan=3 class=BoletoValorEsquerdo>&nbsp;</TD>
        <TD colspan=2 class=BoletoValorEsquerdo>25</TD>
        <TD colspan=2 class=BoletoValorEsquerdo>R$</TD>
        <TD colspan=2 class=BoletoValorEsquerdo>&nbsp;</TD>
        <TD class=BoletoValorEsquerdo>&nbsp;</TD>
        <TD class=BoletoValorDireito>{{$valorTotal}},00</TD>
      </TR>
      <TR>
        <TD colspan=10 class=BoletoTituloEsquerdo>Instruções</TD>
        <TD class=BoletoTituloDireito>(-) Desconto</TD>
      </TR>
      <TR>
        <TD colspan=10 rowspan=9 class=BoletoValorEsquerdo
          style='text-align: left; vertical-align:top; padding-left : 0.1cm'>Sr.Caixa <br> 1)Não aceitar pagamento em cheque
        <br>2)Não aceitar mais de um pagamento com o mesmo boleto</TD>
        <TD class=BoletoValorDireito>&nbsp;</TD>
      </TR>
      <TR>
        <TD class=BoletoTituloDireito>(-) Outras Deduções/Abatimento</TD>
      </TR>
      <TR>
        <TD class=BoletoValorDireito>&nbsp;</TD>
      </TR>
      <TR>
        <TD class=BoletoTituloDireito>(+) Mora/Multa/Juros</TD>
      </TR>
      <TR>
        <TD class=BoletoValorDireito>&nbsp;</TD>
      </TR>
      <TR>
        <TD class=BoletoTituloDireito>(+) Outros Acréscimos</TD>
      </TR>
      <TR>
        <TD class=BoletoValorDireito>&nbsp;</TD>
      </TR>
      <TR>
        <TD class=BoletoTituloDireito>(=) Valor Cobrado</TD>
      </TR>
      <TR>
        <TD class=BoletoValorDireito>&nbsp;</TD>
      </TR>
      <TR>
        <TD colspan=2 Class=BoletoTituloSacador>Sacador / Avalista:</TD>
        <TD colspan=9 Class=BoletoValorSacador>{{$nomeCliente}}</TD>
      </TR>
      <TR>
        <TD colspan=11 class=BoletoTituloDireito style='text-align: right; padding-right: 0.1cm'>Ficha de Compensação -
          Autenticação Mecânica</TD>
      </TR>
      <TR>
        <TD colspan=11 height=60 valign=top><img src="{{ $message->embed(public_path() . '/img/codbar.JPG') }}"></TD>
      </TR>
      <tr>
        <td colspan=11 class=BoletoPontilhado>&nbsp;</td>
      </tr>
    </TABLE>
  </P>

  <p>
      <br><br>
      Agredecemos sua Preferência!
      <br><br>
      Obrigado!
  </p>
</BODY>

</HTML>