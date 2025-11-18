<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts / Styles / Scripts - Keep the originals -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <!-- ... (Keep the inline Tailwind CSS block) ... -->
        @endif
        <style>
            /* Custom CSS for button size (since the provided Tailwind classes are small) */
            .custom-btn {
                padding: 0.75rem 1.5rem !important; /* Make bigger */
                font-size: 1.125rem !important; /* Make text larger */
            }
        </style>
    </head>
    <!-- Use flex-col to stack items, min-h-screen for full height, and justify-center/items-center to center content -->
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col justify-center items-center min-h-screen">

        <!-- 1. Red Headline -->
        <h1 class="text-5xl font-extrabold mb-12 text-[#F53003] dark:text-[#F61500]">
            Welcome to School System
        </h1>

        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
            @if (Route::has('login'))
                <!-- 2. Centralized and Bigger Buttons -->
                <nav class="flex items-center justify-center gap-6"> <!-- justify-center to center the buttons -->
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal custom-btn"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal custom-btn"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal custom-btn">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Removed the hidden h-14.5 element as the body flex centers the content -->

    </body>
</html>