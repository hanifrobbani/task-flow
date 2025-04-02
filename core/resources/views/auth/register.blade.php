<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-blue-50">
    <div class="flex w-full p-5 min-h-screen justify-between max-w-7xl m-auto items-center">
        <div class="w-full py-5 px-16">
            <div class="logo mb-2 flex justify-center items-center gap-1">
                <img src="{{asset('assets/img/logo.png')}}" alt="" class="w-20 h-20">
                <div class="flex flex-col">
                    <h1 class="text-3xl font-bold underline decoration-gray-400 decoration-2 text-center"><span class="text-blue-600">Task</span>Flow</h1>
                    <p class="text-xs text-gray-400">Management Apps</p>
                </div>
            </div>
            <form action="" method="post" class="bg-white rounded-2xl px-10 py-8 shadow-lg">
                <div class=" text-center">
                    <h1 class="font-bold text-2xl">Sign Up</h1>
                    <p class="text-gray-500 text-base">Hello fellows! please enter your credentials</p>
                </div>
                <div class="mt-4">
                    <label for="username" class="text-blue-600 font-medium">Username</label>
                    <input type="text" name="email" class="mt-2 w-full h-12 border-2 rounded-lg py-2 px-3 focus:border-blue-200 focus:ring-4 focus:ring-blue-200 outline-none transition-colors text-gray-700" autocomplete="off" placeholder="Enter your name">
                </div>
                <div class="mt-4">
                    <label for="email" class="text-blue-600 font-medium">Email</label>
                    <input type="email" name="email" class="mt-2 w-full h-12 border-2 rounded-lg py-2 px-3 focus:border-blue-200 focus:ring-4 focus:ring-blue-200 outline-none transition-colors text-gray-700" autocomplete="off" placeholder="Enter your email">
                </div>
                <div class="mt-4">
                    <label for="password" class="text-blue-600 font-medium">Password</label>
                    <input type="password" name="password" class="mt-2 w-full h-12 border-2 rounded-lg py-2 px-3 focus:border-blue-200 focus:ring-4 focus:ring-blue-200 outline-none transition-colors" placeholder="Enter your password">
                </div>
                <div class="mt-4">
                    <label for="password" class="text-blue-600 font-medium">Confirm Password</label>
                    <input type="password" name="password" class="mt-2 w-full h-12 border-2 rounded-lg py-2 px-3 focus:border-blue-200 focus:ring-4 focus:ring-blue-200 outline-none transition-colors" placeholder="Enter your password">
                </div>
                <div class="mt-2 mb-1">
                    <input type="checkbox" class="cursor-pointer">
                    <label for="terms-condition" class="text-gray-600">I Accept all terms & <span class="text-blue-600 hover:underline cursor-pointer">conditions</span></label>
                </div>
                <button type="submit" class="w-full rounded-xl bg-blue-600 text-white font-medium mt-5 py-3 text-center hover:bg-blue-500 transition-colors">Sign Up</button>

                <div class="flex mt-5 justify-center">
                    <p class="text-gray-600 font-normal">Already have an account? <a class="font-medium text-gray-800 hover:underline" href="/login">Sign in</a></p>
                </div>
            </form>
        </div>
        <div class="w-full bg-blue-500 rounded-2xl h-full px-7 pt-10 pb-7">
            <div class="text-center">
                <h1 class="text-center text-white text-4xl font-bold">Hai Fellows!</h1>
                <h1 class="text-center text-white text-4xl font-bold">Please sign up to create your TaskFlow account</h1>
                <p class="text-gray-200 mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet, perferendis!</p>
                <div class="flex justify-center px-20 py-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" viewBox="0 0 720 722.539" xmlns:xlink="http://www.w3.org/1999/xlink" role="img" artist="Katerina Limpitsouni" source="https://undraw.co/">
                        <g id="Group_64" data-name="Group 64" transform="translate(-600.001 -166)">
                            <g id="Group_63" data-name="Group 63" transform="translate(39.127 -21.613)">
                                <path id="Path_1-1934" data-name="Path 1" d="M275.321,690.449,270.949,673.2a223.916,223.916,0,0,0-23.758-8.524l-.552,8.015-2.238-8.83c-10.012-2.862-16.824-4.121-16.824-4.121s9.2,34.987,28.5,61.735l22.486,3.95-17.469,2.519a90.608,90.608,0,0,0,7.811,8.28c28.072,26.057,59.34,38.013,69.838,26.7s-3.749-41.6-31.822-67.656c-8.7-8.078-19.635-14.56-30.579-19.664Z" transform="translate(417.297 140.418)" fill="#f2f2f2" />
                                <path id="Path_2-1935" data-name="Path 2" d="M345.1,652.214l5.171-17.023a223.933,223.933,0,0,0-15.931-19.578l-4.615,6.576,2.648-8.716c-7.093-7.623-12.273-12.221-12.273-12.221s-10.208,34.706-7.516,67.579l17.207,15-16.259-6.874a90.606,90.606,0,0,0,2.409,11.128c10.562,36.817,31.149,63.214,45.982,58.958s18.295-37.551,7.732-74.368c-3.274-11.414-9.283-22.614-16.013-32.638Z" transform="translate(389.102 159.921)" fill="#f2f2f2" />
                            </g>
                            <g id="Group_62" data-name="Group 62" transform="translate(44.037 -0.462)">
                                <path id="Path_22-1936" data-name="Path 22" d="M734.978,247.559h-3.956V139.187A62.725,62.725,0,0,0,668.3,76.462H438.687a62.725,62.725,0,0,0-62.725,62.725V733.736a62.725,62.725,0,0,0,62.725,62.725H668.3a62.725,62.725,0,0,0,62.724-62.724V324.7h3.956Z" transform="translate(360 90)" fill="#e6e6e6" />
                                <path id="Path_23-1937" data-name="Path 23" d="M671.423,93.336H641.454a22.255,22.255,0,0,1-20.607,30.659H489.306A22.254,22.254,0,0,1,468.7,93.335H440.708a46.843,46.843,0,0,0-46.843,46.843V733.864a46.843,46.843,0,0,0,46.843,46.843H671.423a46.843,46.843,0,0,0,46.843-46.843h0V140.177a46.843,46.843,0,0,0-46.842-46.842Z" transform="translate(359.405 89.439)" fill="#fff" />
                                <path id="Path_6-1938" data-name="Path 6" d="M530.421,337.151a23.626,23.626,0,0,1,11.827-20.472,23.637,23.637,0,1,0,0,40.939,23.621,23.621,0,0,1-11.823-20.467Z" transform="translate(355.65 82.117)" fill="#ccc" />
                                <path id="Path_7-1939" data-name="Path 7" d="M561.158,337.151a23.625,23.625,0,0,1,11.827-20.472,23.637,23.637,0,1,0,0,40.939,23.621,23.621,0,0,1-11.823-20.467Z" transform="translate(354.627 82.117)" fill="#ccc" />
                                <circle id="Ellipse_1" data-name="Ellipse 1" cx="23.637" cy="23.637" r="23.637" transform="translate(921.189 395.631)" fill="#006cf9" />
                                <path id="Path_8-1940" data-name="Path 8" d="M627.963,409.252H490.2a4.953,4.953,0,0,1-4.947-4.947V266.543A4.953,4.953,0,0,1,490.2,261.6H627.963a4.953,4.953,0,0,1,4.947,4.947V404.3a4.953,4.953,0,0,1-4.947,4.947ZM490.2,263.576a2.971,2.971,0,0,0-2.968,2.968V404.306a2.971,2.971,0,0,0,2.968,2.968H627.963a2.971,2.971,0,0,0,2.968-2.968V266.544a2.971,2.971,0,0,0-2.968-2.968Z" transform="translate(356.366 83.844)" fill="#ccc" />
                                <rect id="Rectangle_1" data-name="Rectangle 1" width="211.284" height="1.979" transform="translate(803.805 598.696)" fill="#ccc" />
                                <circle id="Ellipse_2" data-name="Ellipse 2" cx="6.672" cy="6.672" r="6.672" transform="translate(803.805 572.996)" fill="#006cf9" />
                                <rect id="Rectangle_2" data-name="Rectangle 2" width="211.284" height="1.979" transform="translate(803.805 665.417)" fill="#ccc" />
                                <circle id="Ellipse_3" data-name="Ellipse 3" cx="6.672" cy="6.672" r="6.672" transform="translate(803.805 639.718)" fill="#006cf9" />
                                <path id="Path_977-1941" data-name="Path 977" d="M658.244,670.068H591.472a4.355,4.355,0,0,1-4.35-4.35v-23.4a4.355,4.355,0,0,1,4.35-4.35h66.772a4.355,4.355,0,0,1,4.35,4.35v23.4a4.355,4.355,0,0,1-4.35,4.35Z" transform="translate(352.978 71.328)" fill="#006cf9" />
                                <circle id="Ellipse_7" data-name="Ellipse 7" cx="6.672" cy="6.672" r="6.672" transform="translate(825.57 572.996)" fill="#006cf9" />
                                <circle id="Ellipse_8" data-name="Ellipse 8" cx="6.672" cy="6.672" r="6.672" transform="translate(847.335 572.996)" fill="#006cf9" />
                                <circle id="Ellipse_9" data-name="Ellipse 9" cx="6.672" cy="6.672" r="6.672" transform="translate(825.57 639.718)" fill="#006cf9" />
                                <circle id="Ellipse_10" data-name="Ellipse 10" cx="6.672" cy="6.672" r="6.672" transform="translate(847.335 639.718)" fill="#006cf9" />
                            </g>
                            <path id="Path_88-1942" data-name="Path 88" d="M966.106,823.539H251.642c-1.529,0-2.768-.546-2.768-1.218s1.239-1.219,2.768-1.219H966.106c1.528,0,2.768.546,2.768,1.219S967.634,823.539,966.106,823.539Z" transform="translate(351.127 65)" fill="#e6e6e6" />
                            <g id="Group_61" data-name="Group 61" transform="translate(-21145.078 -2078.104)">
                                <path id="Path_92-1943" data-name="Path 92" d="M893.722,361.268l-16.8,33.257L826.7,417.359c-5.364,9.065-22.409,9.759-23.649,3.9-1.391-6.576,20.7-17.161,20.7-17.161l42.012-28.416,3.676-24.463Z" transform="translate(21477.109 2335.737)" fill="#ffb9b9" />
                                <path id="Path_93-1944" data-name="Path 93" d="M742.662,464.215,745.76,489l-17.969,1.24-1.858-26.023Z" transform="translate(21626.188 2455.967)" fill="#ffb9b9" />
                                <path id="Path_94-1945" data-name="Path 94" d="M900.869,676.83a48.641,48.641,0,0,0,4.434-5.422c2.575-3.564,4.86,14.716,4.86,14.716s2.479,7.435,1.859,11.153-14.87,3.718-17.349,3.1-14.87,0-14.87,0H861.215c-16.11-7.435,0-12.392,0-12.392,4.957-.62,21.686-16.11,21.686-16.11l3.718-6.815c2.478-.62,4.957,8.674,4.957,8.674Z" transform="translate(21465.504 2264.419)" fill="#090814" />
                                <path id="Path_95-1946" data-name="Path 95" d="M802.8,464.616l3.1,24.784-17.969,1.24-1.859-26.024Z" transform="translate(21612.521 2455.876)" fill="#ffb9b9" />
                                <path id="Path_96-1947" data-name="Path 96" d="M961.005,677.231a48.7,48.7,0,0,0,4.434-5.422c2.575-3.564,4.86,14.716,4.86,14.716s2.478,6.816,1.859,10.533-14.87,3.717-17.349,3.1-14.87.62-14.87.62H921.351c-16.11-7.435,0-12.392,0-12.392,4.957-.62,21.686-16.11,21.686-16.11l3.718-6.815c2.478-.62,4.957,8.674,4.957,8.674Z" transform="translate(21451.836 2264.328)" fill="#090814" />
                                <path id="Path_97-1948" data-name="Path 97" d="M930.929,446.165c2.479,3.1,1.239,13.631,1.239,13.631s4.337,34.078,2.478,37.176,1.239,5.576,3.1,9.914,3.718,14.87,3.718,14.87c10.533,8.674,9.914,48.329,9.914,48.329l3.717,35.317c-1.239,3.718-18.588,4.337-21.066,3.718s-9.914-56.384-9.914-56.384l-16.729-31.6s1.239,84.265,1.239,87.983-16.729,1.859-20.447,1.859-3.718-61.96-3.718-61.96l-3.718-16.109-19.827-73.732V450.5l3.1-4.337S928.451,443.067,930.929,446.165Z" transform="translate(21463.943 2314.471)" fill="#090814" />
                                <circle id="Ellipse_11" data-name="Ellipse 11" cx="19.208" cy="19.208" r="19.208" transform="translate(22348.404 2581.572)" fill="#ffb9b9" />
                                <path id="Path_98-1949" data-name="Path 98" d="M901.99,251.326c3.893,8.67,1.588,20.779-6.2,34.078l31.6-14.87-4.957-4.337,1.239-12.392Z" transform="translate(21456.018 2358.437)" fill="#ffb9b9" />
                                <path id="Path_99-1950" data-name="Path 99" d="M894.154,275.527c-4.138,2.46-6.613,6.98-8.034,11.58a109.735,109.735,0,0,0-4.716,26.218l-1.5,26.64L861.316,410.6c16.109,13.631,25.4,10.533,47.089-.62S932.57,413.7,932.57,413.7s1.859-.62,0-2.478,0,0,1.859-1.859,0,0-.62-1.859,0-.62.62-1.239-2.478-6.2-2.478-6.2l4.957-46.47,6.2-65.677c-7.435-9.294-28.5-17.349-28.5-17.349L895.394,284.2c-6.2,2.478-1.239-7.435-1.239-7.435Z" transform="translate(21463.852 2354.064)" fill="#006cf9" />
                                <path id="Path_100-1951" data-name="Path 100" d="M968.242,343.937l2.478,37.176-31.6,45.231c0,10.533-5.576,13.012-5.576,13.012a81.9,81.9,0,0,1-5.576-10.533c-3.1-6.816,1.859-12.392,1.859-12.392l21.686-45.85-9.294-22.925Z" transform="translate(21448.936 2337.39)" fill="#ffb9b9" />
                                <path id="Path_101-1952" data-name="Path 101" d="M960.1,293.046c10.533,3.718,12.392,43.992,12.392,43.992-12.392-6.816-27.262,4.337-27.262,4.337s-3.1-10.533-6.816-24.164a23.68,23.68,0,0,1,4.957-22.306S949.563,289.329,960.1,293.046Z" transform="translate(21446.549 2349.247)" fill="#006cf9" />
                                <path id="Path_102-1953" data-name="Path 102" d="M928.148,237.734c-2.445-1.956-5.781,1.6-5.781,1.6l-1.956-17.606s-12.226,1.467-20.051-.489-9.047,7.091-9.047,7.091a62.8,62.8,0,0,1-.245-11c.489-4.4,6.847-8.8,18.095-11.737s17.116,9.781,17.116,9.781C934.1,219.283,930.593,239.691,928.148,237.734Z" transform="translate(21457.121 2368.931)" fill="#090814" />
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</body>

</html>