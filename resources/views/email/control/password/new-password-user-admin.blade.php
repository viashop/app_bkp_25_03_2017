@extends('email.template.default.app')

@section('main-content')
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
                        {{ $subject }}
                    </td>
                    <!-- End of Title -->
                    <td width="20"></td>
                </tr>
                <tr>
                    <td colspan="3" height="10" bgcolor="#f7f7f7"></td>
                </tr>

                <tr>
                    <td width="20"></td>
                    <td width="560" valign="top" align="left" class="inside" style="font-size: 13px; color: #525252; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top; line-height: 20px;">

                        <br />
                        Olá <span style="font-weight:bold;">{{$name}}</span>, seu cadastro adminstrativo foi efetuado.

                        @include('email.control.password.partials.dataaccess')

                    </td>
                    <!-- End of Content Text -->
                    <td width="20"></td>
                </tr>

                @include('email.control.password.partials.htmlbody')

                @include('email.template.default.partials.htmlteam')

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

@endsection
