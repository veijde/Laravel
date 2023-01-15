<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#144272",
                        backgroundcolor: "#0A2647"
                    },
                },
            },
        };
    </script>
    <title>Spike Talk</title>
</head>

<body class="mb-48 bg-backgroundcolor text-white">
    <nav class="flex justify-between items-center mb-4">
        <div class="flex items-center mb-4">
            <a href="/"><img class="w-24" src="{{ asset('images/logo.png') }}" alt=""
                    class="logo" /></a>
            <ul class="flex space-x-6 ml-6 text-lg">
                <li>
                    <a href="/faq" class="hover:text-laravel"><i class="fa-solid fa-question"></i> FAQ</a>
                </li>
                <li>
                    <a href="/about" class="hover:text-laravel"><i class="fa-solid fa-hippo"></i> About</a>
                </li>
            </ul>
        </div>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span class="font-bold uppercase">
                        Welcome {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="/users/{{ auth()->id() }}" class="hover:text-laravel"><i class="fa-solid fa-user"></i> User
                        Profile</a>
                </li>
                @if (auth()->user()->admin)
                    <li>
                        <a href="/articles/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage
                            Articles</a>
                    </li>
                @endif
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button>
                            <i class="fa-solid fa-door-closed"></i>
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{ $slot }}
    </main>
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        @auth
            @if (auth()->user()->admin)
                <a href="/articles/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Article</a>
            @endif
        @endauth
    </footer>

    <x-flash-message />
</body>

</html>
