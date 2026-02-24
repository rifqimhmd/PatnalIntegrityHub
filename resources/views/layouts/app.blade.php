<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>@yield('title', 'Patnal Integrity Hub')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    @include('components.header')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('components.footer')

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('authModal', () => ({
                showAuthModal: false,
                tab: 'login',
                showPassword: false,
                showRegisterPassword: false,

                open() {
                    this.showAuthModal = true
                    this.tab = 'login'
                },

                close() {
                    this.showAuthModal = false
                    this.showPassword = false
                    this.showRegisterPassword = false
                },

                changeTab(tabName) {
                    this.tab = tabName
                }
            }))
        })
    </script>
</body>

</html>