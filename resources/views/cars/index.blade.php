<x-layout>
    <x-header></x-header>
    <section class="mt-10 px-10">
        <div class="grid grid-cols-6 items-center gap-10">

            @foreach($cars as $car)
                <div class="w-[225px] cursor-pointer">
                    <img
                        src="https://www.usnews.com/object/image/00000186-0f0d-da67-a5ef-2f5f87990000/2023-lucid-air-1.jpg?update-time=1675289789997&size=responsive640"
                        alt="car image" class="w-full h-[170px] object-cover rounded-t-[12px]">
                    <div class="bg-white w-full p-5 rounded-b-[12px]">
                        <p>{{$car->year}} - {{$car->make}}</p>
                        <p>${{$car->cost}}</p>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="my-10">
            {{$cars->links()}}
        </div>
    </section>
</x-layout>

