<x-layout>
    <x-header></x-header>
    <section class="mt-10 px-10 ">
        <div class="bg-white p-10 rounded-[16px]">
            <p>Filter</p>
            <div class="w-full h-[1px] bg-gray-300"></div>
            <div class="mt-10">

            </div>
        </div>
    </section>
    <section class="mt-10 px-10 flex flex-col gap-5">
        <h2 class="text-[32px] font-bold">Super VIP</h2>
        <div class="grid grid-cols-6 items-center gap-10">

            @foreach($super_vip as $role)

                <a href="posts/{{$role->id}}" class="w-[225px] cursor-pointer">
                    <img
                        src="https://www.usnews.com/object/image/00000186-0f0d-da67-a5ef-2f5f87990000/2023-lucid-air-1.jpg?update-time=1675289789997&size=responsive640"
                        alt="post image" class="w-full h-[170px] object-cover rounded-t-[12px]">
                    <div class="bg-white w-full p-5 rounded-b-[12px]">
                        <div>

                            <p>{{$role->year}} - {{$role->make}}</p>
                        </div>
                        <div class="">
                            <p class="font-bold">{{number_format($role->price)}} $</p>
                        </div>

                        <div class="h-[1px] w-full bg-gray-300 my-3"></div>

                        <div class="flex gap-5 justify-center items-center">


                            <div class="flex px-3 py-1 text-xs font-semibold text-gray-600 bg-gray-200 rounded-[8px]">

                                <p>{{ucfirst($role->category)}}</p>
                            </div>

                            <div class="flex px-3 py-1 text-xs font-semibold text-gray-600 bg-gray-200 rounded-[8px]">

                                <p>{{ucfirst($role->fuel_type)}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="grid grid-cols-6 items-center gap-10">

            @foreach($posts as $post)
                <a href="posts/{{$post->id}}" class="w-[225px] cursor-pointer">
                    <img
                        src="https://www.usnews.com/object/image/00000186-0f0d-da67-a5ef-2f5f87990000/2023-lucid-air-1.jpg?update-time=1675289789997&size=responsive640"
                        alt="post image" class="w-full h-[170px] object-cover rounded-t-[12px]">
                    <div class="bg-white w-full p-5 rounded-b-[12px]">
                        <div>

                            <p>{{$post->year}} - {{$post->make}}</p>
                        </div>
                        <div class="">
                            <p class="font-bold">{{number_format($post->price)}} $</p>
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

