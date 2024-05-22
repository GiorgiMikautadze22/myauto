<x-layout>
    <x-header></x-header>
    <section class="mt-10 px-10 ">
        <div class="bg-white p-10 rounded-[16px]">
            <p>Filter</p>
            <div class="w-full h-[1px] bg-gray-300"></div>
            <div class="mt-10">
                <form id="filter-form" method="GET" action="{{ url()->current() }}">
                    <div class="grid grid-cols-4 gap-5">
                        <div>
{{--                            <label for="make" class="block text-sm font-medium text-gray-700">Make</label>--}}
{{--                            <input type="text" name="make" id="make" value="{{ request('make') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">--}}
                            <label for="make">
                                <select
                                    name="make" id="make"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                    <option hidden="">Make</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand}}</option>
                                    @endforeach
                                </select>
                                @error('make')
                                <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </label>
                        </div>
                        <div>
{{--                            <label for="model" class="block text-sm font-medium text-gray-700">Model</label>--}}
{{--                            <input type="text" name="model" id="model" value="{{ request('model') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">--}}
                            <label for="model" id="model-label">
                                <select
                                    name="model_id" id="model"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5"
                                    disabled>
                                    <option hidden="">Model</option>
                                </select>
                                @error('model')
                                <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </label>
                        </div>

                        <input type="hidden" name="make" id="make_name">
                        <input type="hidden" name="model" id="model_name">

                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                            <input type="number" name="year" id="year" value="{{ request('year') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Max Price</label>
                            <input type="number" name="price" id="price" value="{{ request('price') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Filter</button>
                        <button type="button" id="clear-filter" class="px-4 py-2 bg-blue-600 text-white rounded-md">Clear Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="mt-10 px-10 flex flex-col gap-5">
        <h2 class="text-[32px] font-bold">Super VIP</h2>
        <div class="grid grid-cols-6 items-center gap-10">
            @foreach($super_vip as $role)
                <a href="posts/{{$role->id}}" class="w-[225px] cursor-pointer">
                    <img src="https://www.usnews.com/object/image/00000186-0f0d-da67-a5ef-2f5f87990000/2023-lucid-air-1.jpg?update-time=1675289789997&size=responsive640" alt="post image" class="w-full h-[170px] object-cover rounded-t-[12px]">
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
                    <img src="https://www.usnews.com/object/image/00000186-0f0d-da67-a5ef-2f5f87990000/2023-lucid-air-1.jpg?update-time=1675289789997&size=responsive640" alt="post image" class="w-full h-[170px] object-cover rounded-t-[12px]">
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

    <script>
        document.getElementById('clear-filter').addEventListener('click', function() {
            const form = document.getElementById('filter-form');
            form.querySelectorAll('input').forEach(input => {
                input.value = '';
            });
            form.submit();
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            const makeSelect = document.getElementById('make');
            const modelSelect = document.getElementById('model');
            const makeNameInput = document.getElementById('make_name');
            const modelNameInput = document.getElementById('model_name');

            makeSelect.addEventListener('change', function () {
                const makeId = makeSelect.value;
                const makeName = makeSelect.options[makeSelect.selectedIndex].text;

                if (makeId !== '') {
                    makeNameInput.value = makeName;
                    modelSelect.disabled = false;

                    fetch(`/models/${makeId}`)
                        .then(response => response.json())
                        .then(data => {
                            modelSelect.innerHTML = '<option hidden="">Model</option>';
                            data.forEach(model => {
                                const option = document.createElement('option');
                                option.value = model.id;
                                option.textContent = model.model;
                                modelSelect.appendChild(option);
                            });
                        });
                } else {
                    modelSelect.disabled = true;
                    modelSelect.innerHTML = '<option hidden="">Model</option>';
                    makeNameInput.value = '';
                    modelNameInput.value = '';
                }
            });

            modelSelect.addEventListener('change', function () {
                const selectedModel = modelSelect.options[modelSelect.selectedIndex];
                if (selectedModel) {
                    modelNameInput.value = selectedModel.textContent;
                } else {
                    modelNameInput.value = '';
                }
            });
        });

    </script>
</x-layout>
