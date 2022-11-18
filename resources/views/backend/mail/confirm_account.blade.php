<div style="margin:0 auto;">
    <table border="0" width="550">
        <tbody>
            <tr>
                <td style="width: 98.1795%;" colspan="2" align="center"><img
                        src="https://www.dvmcentral.com/assets/icons/logo.svg" alt="logo" style="width:200px;"></td>
            </tr>
            <tr>
                <td valign="top">
                    <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">
                        Confirm Your Email Address</h1>
                    <p>Thank you for signing up for our customer portal. To get you started, tap the button below to confirm your email address. If you did not create an account with VetandTech, you can safely delete this email.</p>
                    <p style="font-size: 17px;"> <a href="{{ route('frontend.auth.account.confirm', $this->confirmation_code) }}" target="_blank"
                            style="display: inline-block; padding: 16px 36px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Confirm
                            Your Email</a>
                    </p>
                    <p> If you're having trouble clicking the confirmation button, copy and paste the URL below
                        into your web browser: http://www.dvmcentral.com</p>
                </td>
            </tr>
            <tr>
                <td align="left" valign="top">
                    Regards, <br>
                    <a href="https://www.dvmcentral.com">{{ appName() }} support team,</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
{{--  --}}
