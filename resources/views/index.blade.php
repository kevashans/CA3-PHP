@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Welcome!
                </h1>
                <a 
                    href="/forums"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Browse Forums
                </a>
            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.discordapp.com/emojis/1073643496814166056.webp?size=96&quality=lossless" width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Wise Kevas
            </h2>
            
            <p class="py-8 text-gray-500 text-s">
            Join the conversation on Wise Kevas - the ultimate forum platform for creating and exploring topics that matter. Connect with like-minded individuals, share your ideas and perspectives, and gain valuable insights from diverse communities. With user-friendly features and customizable options, Wise Kevas makes it easy to start, manage, and participate in discussions that inspire you. Sign up today and join the community of curious and passionate minds!
        </p>

            <a 
                href="/register"
                class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Register
            </a>
        </div>
    </div>
@endsection