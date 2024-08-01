<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VoteWise') - VoteWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#10B981',
                        accent: '#F59E0B',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
    @stack('styles')
</head>

<body class="font-sans bg-gray-100 lg:px-36">
    <header class="bg-primary text-white">
        <div class="container mx-auto px-4 py-6">
            <nav class="flex justify-between items-center">
                {{-- <a href="{{ route('home') }}" class="text-2xl font-bold">VoteWise</a>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('home') }}" class="hover:text-accent">Home</a></li>
                    <li><a href="{{ route('candidates') }}" class="hover:text-accent">Candidates</a></li>
                    <li><a href="{{ route('issues') }}" class="hover:text-accent">Issues</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-accent">About</a></li>
                </ul> --}}
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <p>&copy; {{ date('Y') }} VoteWise. All rights reserved.</p>
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:text-accent"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="hover:text-accent"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#" class="hover:text-accent"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>
