<html>

    @include('email.template.default.partials.htmlhead')

    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

    <body style="width:100% !important; color:#333333; background:#f7f7f7; font-family: 'Ubuntu', sans-serif;
        font-size:13px; line-height:130%; margin:0; padding:0;" yahoo="fix">

        <!-- * Header Module * -->
        @include('email.template.default.partials.htmlheader')

        <!-- * End of Header Module * -->
        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
            <tr>
                <td bgcolor="#f7f7f7">
                    <!-- Tables Width -->
                    <table width="600" bgcolor="#f7f7f7" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
                        <tr>
                            <td colspan="3" height="20" bgcolor="#f7f7f7"></td>
                        </tr>
                        <tr>
                            <td width="20"></td>
                            <!-- Title Here -->
                            <td width="560" valign="top" align="left" class="inside" style="font-size: 20px; color: #0080b7; font-weight: bold; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top; margin-top:100px; ">
                                Redefinição de senha
                            </td>
                            <!-- End of Title -->
                            <td width="20"></td>
                        </tr>
                        <tr>
                            <td colspan="3" height="10" bgcolor="#f7f7f7"></td>
                        </tr>
                        <tr>
                            <td width="20"></td>
                            <!-- Content Text Here -->
                            <td width="560" valign="top" align="left" class="inside" style="font-size: 13px; color: #525252; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top; line-height: 20px;">
                                <br />
                                Olá <span style="font-weight:bold;">Williams Duarte</span>, este email está sendo enviado pois alguém, possivelmente você, clicou no link "esqueci a minha senha".
                                <br />
                                <br />
                                Para iniciar a redefinição da sua senha, clique no botão abaixo:
                                <br />
                                <br />
                            <td>
                        </tr>
                        <tr>
                            <td width="20"></td>
                            <td width="560" valign="top" align="left" class="inside" style="font-size: 13px; color: #525252; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">
                                <!--[if mso]>
                                <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://app.vialoja.com.br/public/senha-redefinir/b586fec06b77b096c19bc1b9a2452d52fe9a58f9" style="height:40px;v-text-anchor:middle;width:300px;" class="button" arcsize="10%" stroke="f" fillcolor="#8CB82B">
                                    <w:anchorlock/>
                                    <center style="color:#ffffff;font-family:sans-serif;font-size:16px;font-weight:bold;" class="button">
                                        <span style="color:#ffffff;">Redefinir senha</span>
                                    </center>
                                </v:roundrect>
                                <![endif]-->
                                <![if !mso]>
                                <table cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center" width="300" height="40" bgcolor="#8CB82B" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;" class="button">
                                            <a href="http://app.vialoja.com.br/public/senha-redefinir/b586fec06b77b096c19bc1b9a2452d52fe9a58f9" style="color: #ffffff; font-size:16px; font-weight: bold; font-family:sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block;">
                                            Redefinir senha
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                <![endif]>
                            </td>
                        </tr>
                        <tr>
                            <td width="20"></td>
                            <td width="560" valign="top" align="left" class="inside" style="font-size: 11px; color: #525252; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top; ">
                                <br/>
                                Se não for possível redefinir sua senha clicando no botão acima, clique no link abaixo ou copie-o e cole-o na barra de endereços de seu navegador.
                                <br/>
                                <br/>
                                <a href="http://app.vialoja.com.br/public/senha-redefinir/b586fec06b77b096c19bc1b9a2452d52fe9a58f9" style="font-size: 13px; font-family: Helvetica, Arial, sans-serif;">http://app.vialoja.com.br/public/senha-redefinir/b586fec06b77b096c19bc1b9a2452d52fe9a58f9</a>
                            </td>
                        </tr>
                        <tr>
                            <td width="20"></td>
                            <td width="560" valign="top" align="left" class="inside" style="font-size: 13px; color: #525252; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top; line-height: 20px;">
                                <br/>
                                <br/>
                                Se você não esqueceu sua senha, nem clicou no link "esqueci a minha senha", por favor desconsidere este e-mail.
                                <br/>
                                <br/>
                                Esta confirmação deve ser feita em 24 horas, caso contrário o link acima não mais será válido. Passado o prazo de 24 horas, uma nova solicitação deverá ser refeita.
                                <br/>
                                <br/>
                                Abaixo, encontram-se informações sobre o horário e o endereço IP da máquina de onde partiu esta solicitação.
                                <br/>
                                <br/>
                                <span style="font-weight:bold;">Emitido:</span> 21 de dezembro de 2016 às 21:51:27
                                <br/>
                                <span style="font-weight:bold;">IP:</span> 127.0.0.1
                            </td>
                            <!-- End of Content Text -->
                            <td width="20"></td>
                        </tr>
                        <tr>
                            <td width="20"></td>
                            <td width="560" valign="top" align="left" class="inside" style="font-size: 12px; color: #525252; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">
                                <br />
                                <br />
                                Atenciosamente,<br />
                                Equipe ViaLoja
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" height="15" bgcolor="#f7f7f7"></td>
                        </tr>
                    </table>
                    <!-- End of Tables Width -->
                </td>
            </tr>
            <tr>
                <td height="19" bgcolor="#f7f7f7"></td>
            </tr>
            <tr>
                <td height="1" bgcolor="#d7d7d7"></td>
            </tr>
            <tr>
                <td height="1" bgcolor="#ffffff"></td>
            </tr>
        </table>
        <!-- * End of Image 560x200 Module + Text Module * --><!-- * Footer Module * -->


        @include('email.template.default.partials.htmlfooter')
        @include('email.template.default.partials.htmlcopyright')
        <!-- * End of Footer Module * -->
    </body>
</html>
