<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <svg class="ykt-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1641.68 2101.1"><path d="M248.15,1734.6l64.16,107.81,66.21-107.81h-45.7v-75H527.65v75h-54.5L358.6,1907.15V2026.1h61.82v75H181.65v-75h62.4V1907.15L124.52,1734.6H70.61v-75H290.93v75Z"/><path d="M716.61,1734.6v291.5h51.56v75H542.59v-75h58.88V1734.6H542.59v-75h230v75Zm256.93,0-124.8,121,145,170.51h45.7v75h-237v-75H854L720.42,1869.36,864.27,1734.6H811.53v-75h215.92v75Z"/><path d="M1383.41,1837.13V1734.6h-68.56v291.5h65.92v75H1133.21v-75h67.09V1734.6h-67.09v102.53h-75V1659.6h399.61v177.53Z"/><path class="cls-2" d="M761.45,1594.6C409.69,1594.6,0,1337.27,0,891.51,0,470.06,306.72,243.12,572.71,243.12c75.06,0,160.86,18.25,188.74,34.46,27.89-16.21,113.7-34.46,188.75-34.46,268.14,0,572.7,226.94,572.7,648.39,0,445.75-409.68,703.09-761.45,703.09Zm0-172.23c300.29,0,577-214.78,577-545,0-297.86-227.35-478.18-396.8-464l27.86,26.33c40.77,42.55,107.26,147.92,107.26,263.41,0,186.41-152.29,303.93-315.31,303.93-160.86,0-313.16-117.52-313.16-303.93,0-115.49,64.34-220.84,107.26-263.41l27.87-26.33c-169.44-14.18-399,166.15-399,464,0,330.27,278.86,545,577,545Zm0-583.54c62.21,0,133-40.53,133-152,0-107.4-77.23-194.52-133-231-53.61,36.48-133,123.6-133,231C628.48,798.3,701.4,838.83,761.45,838.83Z"/><circle cx="361.29" cy="1020.31" r="63.33"/><circle cx="1134.2" cy="1020.31" r="63.33"/><path class="cls-2" d="M848.34,1150.8c-3-17.63-42.92-41.87-81.93-41.87-38.84-4.13-70.89,13.82-92.69,59.18-19.72,59.17-5.11,95.59,16.48,118.55s54,32.67,81.54,32.67c46.85,0,115.29-55.89,93.1-65.75-18,8.27-50.73,48.66-108,22.77-22.19-17.06-32.45-31.8-35.65-68.34s14.65-79.16,47.23-76.6c20.35,0,52.83,11.26,62.82,15.7S851.33,1168.42,848.34,1150.8Z"/><polygon points="1287.41 185.3 1418.04 53.17 1273.76 0 1287.41 185.3"/><polygon points="1411.02 214.64 1586.36 164.28 1502.22 56.65 1411.02 214.64"/><polygon points="1507.12 307.49 1641.68 290 1589.55 199.7 1507.12 307.49"/></svg>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="メールアドレス" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="パスワード" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">次回から省略</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    パスワードを忘れましたか？
                </a>
                @endif

                <x-jet-button class="ml-4">
                    ログイン
                </x-jet-button>
            </div>

        </form>
    </x-jet-authentication-card>
</x-guest-layout>
