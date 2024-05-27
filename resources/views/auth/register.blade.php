<x-layout>
    <x-header></x-header>
    <form method="POST" action="/register">
        @csrf
        <div class="flex flex-col gap-5 m-10 bg-white p-10">
            <label for="first_name">
                <input type="text" placeholder="Name" name="first_name" id="first_name"
                       class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
            </label>

            <label for="last_name">
                <input type="text" placeholder="Lastname" name="last_name" id="last_name"
                       class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
            </label>

            <label for="email">
                <input type="email" placeholder="Email" name="email" id="email"
                       class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
            </label>

            <label for="password">
                <input type="password" placeholder="Password" name="password" id="password"
                       class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
            </label>

            <label for="password_confirmation">
                <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation"
                       class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
            </label>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6 mt-10 px-10">
            <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save
            </button>
        </div>
    </form>


</x-layout>
