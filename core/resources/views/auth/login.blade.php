<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="flex w-full min-h-screen justify-between">
        <div class="w-full bg-blue-500 min-h-full border border-black">
            <!-- <div class="flex justify-center items-center gap-1 bg-white">
                <img src="{{asset('assets/img/logo.png')}}" alt="" class="w-20 h-20">
                <div class="flex flex-col">
                    <h1 class="text-3xl font-bold underline decoration-gray-400 decoration-2 text-center"><span
                            class="text-blue-600">Task</span>Flow</h1>
                    <p class="text-xs text-gray-400">Management Apps</p>
                </div>
            </div> -->
        </div>
        <div class="w-full border border-black">
            <form action="" method="post" class="flex flex-col justify-center items-center border border-black h-full ">
                <div class="w-full max-w-xl p-20">
                    <h1 class="text-3xl mb-4">Login</h1>
                    <div class="mt-4">
                        <label for="email" class="text-gray-700">Email</label>
                        <input type="text" name="email"
                            class="mt-2 w-full h-12 border-2 rounded-lg py-2 px-3 focus:border-blue-200 focus:ring-4 focus:ring-blue-200 outline-none transition-colors text-gray-700"
                            autocomplete="off" placeholder="Enter your email">
                    </div>
                    <div class="mt-4">
                        <label for="password" class="text-gray-700">Password</label>
                        <input type="password" name="password"
                            class="mt-2 w-full h-12 border-2 rounded-lg py-2 px-3 focus:border-blue-200 focus:ring-4 focus:ring-blue-200 outline-none transition-colors"
                            placeholder="Enter your password">
                    </div>
                    <div class="flex flex-row-reverse mt-2">
                        <p class=" text-blue-700 hover:underline cursor-pointer">Forgot Password?</p>
                    </div>

                    <button type="submit"
                        class="w-full rounded-xl bg-blue-600 text-white mt-5 py-3 text-center hover:bg-blue-500 transition-colors">Login</button>

                    <div class="flex mt-5 justify-center">
                        <p class="text-gray-600 font-normal">Don't have an account? <a
                                class="text-blue-600 hover:underline" href="/register">Sign up</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>