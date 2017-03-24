@extends('email.template.default.app')

@section('main-content')
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
    <tr>
        <td bgcolor="#f7f7f7">
            <!-- Tables Width -->
            <table width="600" bgcolor="#f7f7f7" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
                <tr><td colspan="3" height="20" bgcolor="#f7f7f7"></td></tr>
                <tr>
                    <td width="20"></td>

                    <!-- Title Here -->
                    <td width="560" valign="top" align="left" class="inside" style="font-size: 20px; color: #0080b7; font-weight: bold; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">
                        {{ $subject }}
                    </td>
                    <!-- End of Title -->

                    <td width="20"></td>
                </tr>
                <tr><td colspan="3" height="10" bgcolor="#f7f7f7"></td></tr>
                <tr>
                    <td width="20"></td>

                    <!-- Content Text Here -->
                    <td width="560" valign="top" align="left" class="inside" style="font-size: 13px; color: #525252; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top; line-height: 20px;">
                        <br />
                        Olá <span style="font-weight:bold;">{{ $name }}</span>, clique no botão abaixo para verificar seu endereço de email.
                        <br />
                        <br />
                    <td>
                </tr>
                <tr>
                    <td width="20"></td>
                    <td width="560" valign="top" align="left" class="inside" style="font-size: 13px; color: #525252; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">

                        <!--[if mso]>
                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ route('account.email.confirm', $token ) }}" style="height:40px;v-text-anchor:middle;width:300px;" arcsize="10%" stroke="f" fillcolor="#8CB82B" class="button">
                        <w:anchorlock/>
                            <center style="color:#ffffff;font-family:sans-serif;font-size:16px;font-weight:bold;">
                              Verificar endereço de email
                            </center>
                        </v:roundrect>
                        <![endif]-->
                        <![if !mso]>
                        <table cellspacing="0" cellpadding="0"> <tr>
                          <td align="center" width="300" height="40" bgcolor="#8CB82B" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;" class="button">
                            <a href="{{ route('account.email.confirm', $token ) }}" style="color: #ffffff; font-size:16px; font-weight: bold; font-family:sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block;">
                              Verificar endereço de email
                            </a>
                          </td>
                        </tr>
                        </table>
                        <![endif]>

                    </td>
                </tr>
                <tr>
                    <td width="20"></td>

                    <td width="560" valign="top" align="left" class="inside" style="font-size: 11px; color: #525252; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">
                        <br/>
                        Se não for possível verificar o seu endereço de e-mail clicando no botão acima, clique no link abaixo ou copie-o e cole-o na barra de endereços de seu navegador.
                        <br/>
                        <br/>

                        <a href="{{ route('account.email.confirm', $token ) }}" style="font-size: 13px; font-family: Helvetica, Arial, sans-serif;">{{ route('account.email.confirm', $token ) }}</a>

                    </td>
                </tr>
                <tr>
                    <td width="20"></td>
                    <td width="560" valign="top" align="left" class="inside" style="font-size: 13px; color: #525252; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top; line-height: 20px;">
                        <br/>
                        <br/>
                        Segue abaixo as informações de acesso:
                        <br />
                        <br />
                        <span style="font-weight:bold;">Email:</span> {{$email}}
                        <br/>
                        <span style="font-weight:bold;">Senha:</span> *** escolhido por Você ***
                        <!-- End of Content Text -->
                        <br/>
                        <br/>
                        Se você não sabe do que se trata. Você pode desconsiderar este e-mail, pois nada será alterado.
                        <br/>
                        <br/>
                        Para fazer o login, acesse <a href="{{ route('account.login') }}">{{ route('account.login') }}</a>
                    </td>
                    <!-- End of Content Text -->

                    <td width="20"></td>
                </tr>

                @include('email.template.default.partials.htmlteam')

                <tr><td colspan="3" height="15" bgcolor="#f7f7f7"></td></tr>

            </table>
            <!-- End of Tables Width -->
        </td>
    </tr>
    <tr><td height="19" bgcolor="#f7f7f7"></td></tr>
    <tr><td height="1" bgcolor="#d7d7d7"></td></tr>
    <tr><td height="1" bgcolor="#ffffff"></td></tr>
</table>
<!-- * End of Image 560x200 Module + Text Module * -->

@endsection
