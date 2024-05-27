<x-layout>
    <x-header></x-header>
    <form method="POST" action="/login">
        @csrf
        <div class="flex flex-col gap-5 m-10 bg-white p-10">


            <label for="email">
                <input type="email" placeholder="Email" name="email" id="email" value="{{old('email')}}" required
                       class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                @error('email')
                <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                @enderror
            </label>

            <label for="password">
                <input type="password" placeholder="Password" name="password" id="password"
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
