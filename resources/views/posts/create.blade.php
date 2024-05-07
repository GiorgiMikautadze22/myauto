<x-layout>
    <x-header></x-header>
    <section class="mt-10 px-10">
        <div class="bg-white p-10">
            <p>Main features</p>
            <div class="w-full h-[1px] bg-gray-300"></div>
            <div class="mt-10">
                <div>
                    <label>
                        <select
                            name="" id=""
                            class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                            <option hidden="">Manufacturer</option>
                            @foreach($cars as $car)
                                <option>{{$car->make}}</option>
                            @endforeach
                        </select>
                    </label>
                    <img src="" alt="">
                </div>


            </div>
        </div>
    </section>
</x-layout>

