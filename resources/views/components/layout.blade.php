<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
</head>

<body>

    <body>
        <nav class="layout">
            <a href="/"><img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo" /></a>
            <h1 class="header-title">PetSitters</h1>
            <ul class="link-container">
                @auth
                    @php
                        $user = auth()->user();
                    @endphp


                    <span class="font-bold uppercase">
                        Welcome {{ $user->name }}
                    </span>

                    <a href="/users/{{ $user->id }}">
                        <span class="uppercase">
                            <i class="fa-solid fa-user"></i>
                            View profile
                        </span>
                    </a>
                    <li>
                        <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                            Manage Listings</a>
                    </li>
                    <li>
                        <a href="/my-jobs"><i class="fa-solid fa-dog"></i> My Jobs</a>
                    </li>
                    <li>
                        <form method="POST" action="/logout" class="inline">
                            @csrf
                            <button type="submit"><i class="fa-solid fa-door-closed"></i>Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>
                            Register</a>
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
    </body>
    <footer>
        <a class="button" href="/listings/create">Post Job</a>
    </footer>

    <x-flash-message />
</body>

</html>

</html>
