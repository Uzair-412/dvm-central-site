<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DVM Central</title>
    </head>
    <body>
        <h1>New Seller Registration Details</h1>
        <table>
            <tr>
                <th align="left">
                    Name    :
                </th>
                <td>
                    {{ $details['first_name'].'' .$details['last_name'] }}
                </td>
            </tr>
            
            <tr>
                <th align="left">
                    Email   :
                </th>
                <td>
                    {{ $details['email'] }}
                </td>
            </tr>
            <tr>
                <th align="left">
                    Complete Address   :
                </th>
                @php
                    $country = App\Models\Country::find($details['country_id']);
                    $state = App\Models\State::find($details['state']);
                @endphp
                <td>
                    {{ $details['address'].' , '.@$state->name.' , '.$country->name.' , '.$details['zip_code']}}
                </td>
            </tr>
            <tr>
                <th align="left">
                    Phone   :
                </th>
                <td>
                    {{ $details['phone'] }}
                </td>
            </tr>
            <tr>
                <th align="left">
                    Company Name    : 
                </th>
                <td>
                    {{ $details['name'] }}
                </td>
            </tr>
            <tr>
                <th align="left">
                    Contact Person Name    : 
                </th>
                <td>
                    {{ $details['contact_name'] }}
                </td>
            </tr>
            <tr>
                <th align="left">
                    Virtual Booth URL     :
                </th>
                <td>
                    {{ $details['virtual_booth_url'] }}
                </td>
            </tr>
            <tr>
                <th align="left">
                    Message     :
                </th>
                <td>
                    {{ $details['message'] }}
                </td>
            </tr>
            <tr>
                <th align="left">
                    Logo     :
                </th>
                <td>
                    <img src="https://www.dvmcentral.com/up_data/vendors/logo/{{$request->header_image}}" alt="logo" style="width:150px;">
                </td>
            </tr>
            <tr>
                <th align="left">
                    Header Image     :
                </th>
                <td>
                    <img src="https://www.dvmcentral.com/up_data/vendors/header_image/{{$request->logo}}" alt="header_image" style="width:250px;">
                </td>
            </tr>
        </table>
    </body>
</html>