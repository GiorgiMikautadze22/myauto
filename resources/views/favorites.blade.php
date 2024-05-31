<x-layout>
    <x-header></x-header>
    <section class="mt-10 px-10 ">
        <div class="bg-white p-10 rounded-[16px] flex flex-col gap-5">
            @foreach($posts as $post)
                <div class="flex gap-5 items-center">

                    <img
                        src="https://www.usnews.com/object/image/00000186-0f0d-da67-a5ef-2f5f87990000/2023-lucid-air-1.jpg?update-time=1675289789997&size=responsive640"
                        alt="post image" class="w-[150px] h-[100px] object-cover rounded-l-[12px]">
                    <p>{{$post->post_id}}</p>
                    <p>{{$post->make}}</p>
                    <p>{{$post->created_at}}</p>
                    <a href="/posts/{{$post->post_id}}" class="w-[100px] h-[40px] bg-sky-300 text-white rounded-[8px] hover:bg-sky-400 transition flex items-center justify-center font-semibold">View</a>
                    <button form="delete-form"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Delete
                    </button>
                </div>
                <form method="POST" action="/posts/{{$post->post_id}}/like" id="delete-form">
                    @csrf
                </form>
            @endforeach

        </div>

    </section>


</x-layout>
