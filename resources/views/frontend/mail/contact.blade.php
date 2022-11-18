{{-- <p>@lang('strings.emails.contact.email_body_title')</p>

<p><strong>@lang('validation.attributes.frontend.name'):</strong> {{ $request->name }}</p>
<p><strong>@lang('validation.attributes.frontend.email'):</strong> {{ $request->email }}</p>
<p><strong>@lang('validation.attributes.frontend.phone'):</strong> {{ $request->phone ?? 'N/A' }}</p>
<p><strong>@lang('validation.attributes.frontend.message'):</strong> {{ $request->message }}</p> --}}

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DVM Central</title>
    </head>
    <body>
        <h1>Hi , Admin</h1>
        <h3>A New Contact Request Has Submitted With The Following Information.</h3>
        <div class="content" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; border:1px solid gray;">
            <table style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 100%;"
                width="100%">
                <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                    <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                        <span class="heading" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe;">Name:</span>
                    </td>
                    <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                        <span style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">{{ $request->name }}</span>
                    </td>
                </tr>
                <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                    <td>
                        <span class="heading" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe;">Email:</span>
                    </td>
                    <td>
                        <span style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;"> {{ $request->email }}</span>
                    </td>
                </tr>
                <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                    <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                        <span class="heading" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe;">Phone:</span>
                    </td>
                    <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                        <span style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">{{ $request->phone ?? 'N/A'}}</span>
                    </td>
                </tr>
                <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                    <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                        <span class="heading" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe;">Message:</span>
                    </td>
                    <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                        <span class="heading" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #000000;"> {{ $request->message }} </span>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>