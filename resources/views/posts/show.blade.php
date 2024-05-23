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
                <div class="w-120px  rounded-[12px] px-10 bg-white flex flex-col justify-between">
                    <div>

                    <p class="text-[27px] font-bold">
                        Cost: ${{$post->price}}
                    </p>
                    <p><strong>Model</strong>: {{$post->model}}</p>
                    <p><strong>Category</strong>: {{$post->category}}</p>
                    <p><strong>Color</strong>: {{$post->color}}</p>
                    <p><strong>Mileage</strong>: {{$post->mileage}}</p>
                    <p><strong>Fuel Type</strong>: {{$post->fuel_type}}</p>
                    <p><strong>Transmission</strong>: {{$post->transmission}}</p>
                    <h3 class="text-[20px] font-semibold">Description</h3>
                    <p>{{$post->description}}</p>
                    </div>
                    <a href="{{$post->id}}/edit" class="w-[100px] h-[40px] bg-sky-300 text-white rounded-[8px] mb-5 hover:bg-sky-400 transition flex items-center justify-center font-semibold">Edit</a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
