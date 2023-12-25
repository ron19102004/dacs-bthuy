<?php
require($_SERVER['DOCUMENT_ROOT'] . "/helpers/env.php");
$url = ENV::getObjectArray('url') ?? 'http://localhost:3000/';
?>
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gray-900 flex flex-col items-center justify-center">
    <h1 class="text-5xl text-white font-bold mb-8 animate-pulse">
        Coming Soon
    </h1>
    <p class="text-white text-lg mb-8">
        We're working hard to bring you something amazing. Stay tuned!
    </p>
    <a href="<?php echo $url; ?>" class="text-white ring-2 p-3 rounded-md hover:bg-blue-500">Go to home</a>
</div>