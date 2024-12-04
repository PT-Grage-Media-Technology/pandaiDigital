<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm New Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<div class="flex flex-col justify-center max-w-md mx-auto mt-24 p-8 bg-gray-100 rounded-xl shadow-md hover:shadow-lg transition duration-300 md:mt-1.5">
    <div class="text-center space-y-3">
        <h2 class="text-3xl font-bold text-gray-800">Reset Password</h2>
        <p class="text-lg text-gray-600">Please enter a new password to secure your account</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-6 mt-6">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="flex flex-col">
            <label for="email" class="text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-gray-400 bg-white placeholder-gray-400 text-gray-700 transition duration-200 ease-in-out" />
        </div>

        <div class="flex flex-col">
            <label for="password" class="text-sm font-medium text-gray-700">New Password</label>
            <input type="password" name="password" placeholder="New password" required autocomplete="new-password"
                class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-gray-400 bg-white placeholder-gray-400 text-gray-700 transition duration-200 ease-in-out" />
        </div>

        <div class="flex flex-col">
            <label for="password_confirmation" class="text-sm font-medium text-gray-700">Confirm New Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm new password" required autocomplete="new-password"
                class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-400 focus:border-gray-400 bg-white placeholder-gray-400 text-gray-700 transition duration-200 ease-in-out" />
        </div>

        <button type="submit"
            class="w-full py-3 px-6 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded-lg shadow-md hover:shadow-lg focus:ring-4 focus:ring-gray-300 transition-all duration-200">
            Confirm
        </button>
    </form>
</div>


    <script src="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/js/app.js"
        defer></script>
</body>
</html>