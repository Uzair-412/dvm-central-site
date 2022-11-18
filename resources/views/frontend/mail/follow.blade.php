<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Order</title>
</head>

<body style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'Work Sans', sans-serif;
        }

        .main {
            background: #f9f9f9;
        }

        .main-container {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
        }

        .main-container .section {
            padding: 4%;
            border: 2px solid #ddd;
            border-top: none
        }

        .main-container .section:nth-child(1) {
            border-top: 2px solid #ddd;
        }

        table {
            width: 100%;
        }

        .sub-heading h3 {
            color: #418ffe;
            font-weight: 500;
            text-transform: uppercase;
        }

        table.sub-heading {
            margin-bottom: 10px;
        }

        table.sub-heading tr:nth-child(1) td:nth-child(1) {
            width: 36px;
        }
    </style>
    <div class="main" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; background: #f9f9f9;">
        <div class="main-container" style="padding: 0; font-family: 'Work Sans', sans-serif; background-color: #ffffff; margin: 0 auto; width: 100%; max-width: 600px;">
            <div class="section" style="margin: 0; font-family: 'Work Sans', sans-serif; padding: 4%; border: 2px solid #ddd; border-top: 2px solid #ddd;">
                <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe; text-align: center; font-weight: 600; font-size: 28px;">Hi {{ $vendor->name }}!</p>
                <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;text-align: center;">Congratulations, {{ Auth::user()->name }} started following you</p>
                <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;text-align: center;">You have {{ $followers }} number of followers at DVM Central</p>
            </div>

            {{-- Footer Content --}}
        </div>
    </div>
</body>

</html>