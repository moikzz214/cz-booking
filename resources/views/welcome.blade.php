<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Creative Zone</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;600;700&display=swap" rel="stylesheet">
 
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}" defer></script> 
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    </head>
    <body class="antialiased">
        <div id="app">
            <v-app> 
                <home-page></home-page>
            </v-app>
        </div>
    </body>
</html>
