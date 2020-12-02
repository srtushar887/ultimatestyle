<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Forgot Password</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1.0">
    <style type="text/css">
        @media only screen and (max-width: 640px) {
            table[class="devicewidth"] {
                width: 440px !important;
                text-align: center !important;
            }
            table[class="devicewidthinner"] {
                width: 380px !important;
                text-align: center !important;
            }
            table[class="sthide"] {
                display: none !important;
            }
            img[class="bigimage"] {
                width: 100% !important;
                height: auto !important;
            }
            img[class="col2img"] {
                width: 420px !important;
                height: 258px !important;
            }
            img[class="image-banner"] {
                width: 440px !important;
                height: 106px !important;
            }
            td[class="menu"] {
                text-align: center !important;
                padding: 10px 0 10px 0 !important;
            }
            td[class="logo"] {
                padding: 0px 0 20px 0 !important;
                margin: 0 auto !important;
            }
            img[class="logo"] {
                padding: 0 !important;
                margin: 0 auto !important;
            }
        }

        @media only screen and (max-width: 480px) {
            table[class="devicewidth"] {
                width: 320px !important;
                text-align: center !important;
            }
            table[class="devicewidthinner"] {
                width: 260px !important;
                text-align: center !important;
            }
            table[class="sthide"] {
                display: none !important;
            }
            img[class="bigimage"] {
                width: 100% !important;
                height: auto !important;
            }
            img[class="col2img"] {
                width: 260px !important;
                height: 160px !important;
            }
            img[class="image-banner"] {
                width: 280px !important;
                height: 68px !important;
            }
        }
    </style>
</head>

<!-----------Background Body----------->

<body style="width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;background-color: #eeeeee">
<!-----------Grey Area at top of email----------->
<div class="block">

    <table width="100%" bgcolor="#eeeeee" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; margin: 0; padding: 0; width: 100% !important; line-height: 100% !important; ">
        <tr>
            <td width="100%" height="40" style="border-collapse: collapse; "></td>
        </tr>
        <!-----------Start Logo----------->
        <table width="50%" bgcolor="#6cc04a" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hlitebg="edit" shadow="edit" style="border-collapse: collapse; border-radius: 3px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; ">
            <tr>
                <td align="center" valign="middle" width="270" style="border-collapse: collapse; padding: 30px 0 30px 0px;background-color: {{$gn->top_header_background_color}}">
                    <a title="OneTrust" style="color: white; border-bottom: 1px solid transparent; text-decoration: none; font-family: 'Open Sans', arial, sans-serif; font-weight: 400; line-height: 25px;" href="https://www.onetrust.com/">
                        <img src="{{asset($gn->logo)}}" style="height:80px;width:80%">

                    </a>
                </td>
            </tr>
        </table>
        <div class="block">
            <table bgcolor="#ffffff" width="50%" cellpadding="30" cellspacing="0" border="0" align="center" class="devicewidth" modulebg="edit" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 3px;">
                <tbody>
                <tr>

                <tr>

                <tr>
                    <td style="border-collapse: collapse; font-family: OpenSans, arial, sans-serif; font-size: 17px; color: #999999; text-align:left;;line-height: 30px; padding-bottom: 0px; padding-top: 30px;" st-content="fulltext-paragraph">
                        <span style="color: #999999">Hi <strong>{{$msg['name']}}</strong></span>
                        <br>
                        <br>

                        <span style="color: #999999">You are just step away from accessign your {{$gn->site_name}} account.</span>
                        <br>
                        <br>
                        <span style="color: #999999">We are sharing a verification code to access your account . The code is valid for 10 minutes and usable only once.</span>
                        <br>
                        <br>
                        <span style="color: #999999">Once you have verified the code. You'll be prompted to set a new password immediately. This is to ensure that only you have access to your account.</span>
                        <br>
                        <br>

                        <span style="color: #999999">Your OPT : <strong>{{$msg['text']}}</strong></span>
                        <br>
                        <span style="color: #999999">Expires in : 10 minutes</span>

                        <br>
                        <br>

                        <span style="color: #999999">Best Regards</span>
                        <br>
                        <span style="color: #999999"><b>Team {{$gn->site_name}}</b>.</span>
                        <br>
                        <br>

                    </td>
                </tr>

                </tbody>
            </table>
            </td>
            </tr>
            </tbody>
    </table>
</div>
<div class="block">
    <table bgcolor="#eeeeee" border="0" cellpadding="0" cellspacing="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; margin: 0; padding: 0; width: 100% !important; line-height: 100% !important;" width="100%">
        <tbody>
        <tr>
            <td style="border-collapse: collapse;" width="100%">
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidth" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="520">
                    <tbody>
                    <tr>
                        <td height="30" style="border-collapse: collapse;" width="100%"></td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; font-family: 'Open Sans', Helvetica, Arial, sans-serif; line-height: 16px;" valign="middle">

                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color:#414042; padding-bottom: 20px;">


                              <span style="font-size: 12px; line-height: 20px;">
                              <p>
                                <a href="{{route('front')}}" id="textEmail" style="color: #6cc04a; text-decoration: underline; display: inline;" target="_blank">{{route('front')}}</a>
                                <span style="display: inline;"> | </span>
                              <a href="tel:18448477154" style="color: #6cc04a; text-decoration: underline; display: inline;">{{$gn->site_phone}}</a>
                              </p>
                              </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
</div>
</body>

</html>
