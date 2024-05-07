<x-layout>
    <x-header></x-header>
    <section class="my-10 flex items-center justify-center">
        <div class="w-[1000px]">
            <div class="flex items-baseline gap-5">
                <h2 class="text-[32px] font-bold">{{$post->make}}</h2>
                <p class="text-[27px] font-bold text-gray-400">{{$post->year}}</p>
            </div>
            <div class="flex gap-10 mt-10">

                <img
                    src="https://www.usnews.com/object/image/00000186-0f0d-da67-a5ef-2f5f87990000/2023-lucid-air-1.jpg?update-time=1675289789997&size=responsive640"
                    alt="" class="rounded-[12px]">
                <div class="w-120px grid rounded-[12px] px-10 bg-white">
                    <p class="text-[27px] font-bold">
                       COST: ${{$post->cost}}
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layout>
