<html>
<head>
    <title>SimpleBacklinkCheck</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-grey-light">
<div class="mt-4 p-4 container mx-auto bg-white rounded border shadow">
    <h1 class="pb-8 text-blue-dark">SimpleBacklinkCheck</h1>
    <form method="post" action="process.php">
        <div class="pb-4">
            <label class="block pb-2 text-grey-darkest">URL de la cible</label>
            <input class="w-full bg-blue-lightest p-2 border border-blue" name="target" placeholder="" />
        </div>
        <div class="pb-4">
            <label class="block pb-2 text-grey-darkest">URLs des backlinks (un par ligne)</label>
            <textarea class="w-full bg-blue-lightest p-2 border border-blue" rows="10" name="urls" placeholder=""></textarea>
        </div>

        <button type="submit" class="bg-blue-dark hover:bg-blue text-white rounded px-4 py-2">Vérifier</button>
    </form>
</div>
<div class="container mx-auto text-grey-darker text-center py-2 text-sm">
    Simple Backlink Check is open-sourced software licensed under the <a class="text-black no-underline"href="https://opensource.org/licenses/MIT">MIT license</a>. 
    This tool is freely provided by <a class="text-black no-underline"href="https://soumettre.fr">Soumettre.fr : Netlinking as a Service</a>
</div>
</body>
</html>