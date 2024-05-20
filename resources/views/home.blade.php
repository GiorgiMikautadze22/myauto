<x-layout>
    <x-header></x-header>
    <section class="mt-10 px-10">
        <div class="grid grid-cols-6 items-center gap-10">

            @foreach($posts as $post)
                <a href="/{{$post->id}}" class="w-[225px] cursor-pointer">
                    <img
                        src="https://www.usnews.com/object/image/00000186-0f0d-da67-a5ef-2f5f87990000/2023-lucid-air-1.jpg?update-time=1675289789997&size=responsive640"
                        alt="post image" class="w-full h-[170px] object-cover rounded-t-[12px]">
                    <div class="bg-white w-full p-5 rounded-b-[12px]">
                        <div>

                            <p>{{$post->year}} - {{$post->make}}</p>
                        </div>
                        <div class="">
                            <p class="font-bold">{{number_format($post->price)}} GEL</p>
                        </div>

                        <div class="h-[1px] w-full bg-gray-300 my-3"></div>

                        <div class="flex gap-5 justify-center items-center">


                            <div class="flex px-3 py-1 text-xs font-semibold text-gray-600 bg-gray-200 rounded-[8px]">

                                <p>{{ucfirst($post->category)}}</p>
                            </div>

                            <div class="flex px-3 py-1 text-xs font-semibold text-gray-600 bg-gray-200 rounded-[8px]">

                                <p>{{ucfirst($post->fuel_type)}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        <div class="my-10">
            {{$posts->links()}}
        </div>
    </section>
</x-layout>

