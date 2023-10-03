<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Livewire : Sélection Pays et Ville</title>
        <!-- Styles livewire -->
        @livewireStyles()
    </head>
    <body>

        <!-- Le composant app/Http/Livewire/CountriesCitiesSelect.php -->
        @livewire("client-equipement-select")

        <!-- Scripts livewire -->
        @livewireScripts()
    </body>
</html>