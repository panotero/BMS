<!DOCTYPE html>
<html lang="en">
@include('partials.header')
<body class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg p-4">
        <h1 class="text-xl font-bold mb-4">Laravel SPA</h1>
        <nav class="flex flex-col space-y-2">
            <button class="load-page text-left px-3 py-2 bg-gray-200 rounded" data-url="/section/candidate">Candidate</button>
            <button class="load-page text-left px-3 py-2 bg-gray-200 rounded" data-url="/section/dashboard">Dashboard</button>
            <button class="load-page text-left px-3 py-2 bg-gray-200 rounded" data-url="/section/settings">Settings</button>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6" id="main-content">
        <h2 class="text-2xl font-semibold">Welcome!</h2>
        <p>Select a menu item to load content dynamically.</p>
    </main>

    <script>
        $(document).on('click', '.load-page', function () {
            let url = $(this).data('url');
            $('#main-content').html('<p class="text-gray-400">Loading...</p>');

            $.get(url, function (data) {
                $('#main-content').html(data);

            console.log('nav button clicked');
            }).fail(function () {
                $('#main-content').html('<p class="text-red-600">Failed to load content.</p>');
            });
        });
    </script>

</body>
</html>
