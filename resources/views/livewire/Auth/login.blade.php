<div>
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Zaloguj się do swojego konta
        </h1>
        <form wire:submit.prevent="submit" method="POST" class="space-y-4 md:space-y-6">
            @csrf
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nazwa użytkownika</label>
                <input wire:model.lazy="username" type="text" name="username" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none" placeholder="jan.kowalski@gmail.com" required>
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasło</label>
                <input wire:model.lazy="password" type="password" name="password" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none" placeholder="••••••••" required>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                      <input wire:model.lazy="remember" id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                    </div>
                    <div class="ml-3 text-sm">
                      <label for="remember" class="text-gray-500 dark:text-gray-300">Zapamiętaj mnie</label>
                    </div>
                </div>
                <a  href="{{ route('password.request') }}"class="text-sm font-medium text-blue-600 hover:underline">Nie pamiętam hasła</a>
            </div>
            <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Zaloguj</button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                Nie masz jeszcze konta?
                <a  href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline">Zarejestruj się</a>
            </p>
        </form>
    </div>
</div>
