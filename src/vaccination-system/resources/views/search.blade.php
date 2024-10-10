<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/htmx.org@1.9.4"></script>
    <style>
        .spinner {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-6">Search Your Vaccination Registration</h1>

        <form id="search-form" action="{{ route('register.search') }}" method="GET" hx-get="{{ route('register.search') }}" hx-target="#result" hx-swap="innerHTML" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="nid" class="block text-sm font-medium text-gray-700">Enter Your NID:</label>
                <input type="text" name="nid" id="nid" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500" placeholder="Your NID">
            </div>
            <button type="submit" class="relative w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700 focus:outline-none">
                <span class="spinner">Loading...</span>
                <span class="text">Search</span>
            </button>
        </form>

        <div id="result" class="mt-6">
            <!-- Search results will be injected here -->
        </div>
    </div>

    <script>
        document.getElementById('search-form').addEventListener('htmx:configRequest', function() {
            const button = this.querySelector('button[type="submit"]');
            const spinner = this.querySelector('.spinner');
            const text = this.querySelector('.text');
            button.setAttribute('disabled', true); // Disable button
            spinner.style.display = 'block'; // Show spinner
            text.style.display = 'none'; // Hide text
        });

        document.getElementById('search-form').addEventListener('htmx:afterRequest', function() {
            const button = this.querySelector('button[type="submit"]');
            const spinner = this.querySelector('.spinner');
            const text = this.querySelector('.text');
            button.removeAttribute('disabled'); // Enable button
            spinner.style.display = 'none'; // Hide spinner
            text.style.display = 'block'; // Show text
        });
    </script>
</body>
</html>
