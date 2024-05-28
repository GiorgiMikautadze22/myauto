<x-layout>
    <x-header></x-header>
    <section class="my-10 flex items-center justify-center">
        <form method="POST" action="/posts/{{ $post->id }}">
            @csrf
            @method('PATCH')
            <section class="mt-10 px-10">
                <div class="bg-white p-10">
                    <p>Main features</p>
                    <div class="w-full h-[1px] bg-gray-300"></div>
                    <div class="mt-10">

                        <div class="grid grid-cols-4 items-center gap-5">
                            <label for="make">
                                <select
                                    name="make" id="make"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                    <option hidden >{{ $post->make }}</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->brand }}" {{ $post->make == $brand->brand ? 'selected' : '' }}>{{ $brand->brand }}</option>
                                    @endforeach
                                </select>
                                @error('make')
                                <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </label>

                            <label for="model" id="model-label">
                                <select
                                    name="model" id="model"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                    <option hidden value="{{ $post->model }}">{{ $post->model }}</option>
                                </select>
                                @error('model')
                                <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </label>

                            <label for="category">
                                <select
                                    name="category" id="category"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                    <option hidden>{{ $post->category }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}" {{ $post->category == $category ? 'selected' : '' }}>{{ $category }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </label>

                            <label for="year">
                                <select
                                    name="year" id="year"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                    <option hidden>{{ $post->year }}</option>
                                    @for($year = 1990; $year <= 2024; $year++)
                                        <option value="{{ $year }}" {{ $post->year == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('year')
                                <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </label>
                            <label for="color">
                                <input
                                    name="color" id="color" value="{{ $post->color }}"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5"
                                    placeholder="Color"
                                />
                                @error('color')
                                <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </label>
                            <label for="mileage">
                                <input
                                    name="mileage" id="mileage" value="{{ $post->mileage }}"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5"
                                    placeholder="Mileage"
                                />
                                @error('mileage')
                                <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </label>
                            <label for="price">
                                <input
                                    name="price" id="price" value="{{ $post->price }}"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5"
                                    placeholder="Price"
                                />
                                @error('price')
                                <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </label>
                            <label for="fuel_type">
                                <select
                                    name="fuel_type" id="fuel_type"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                    <option hidden>{{ $post->fuel_type }}</option>
                                    <option value="gasoline" {{ $post->fuel_type == 'gasoline' ? 'selected' : '' }}>Gasoline</option>
                                    <option value="diesel" {{ $post->fuel_type == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                    <option value="electricity" {{ $post->fuel_type == 'electricity' ? 'selected' : '' }}>Electricity</option>
                                </select>
                                @error('fuel_type')
                                <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </label>
                            <label for="transmission">
                                <select
                                    name="transmission" id="transmission"
                                    class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                    <option hidden>{{ $post->transmission }}</option>
                                    <option value="automatic" {{ $post->transmission == 'automatic' ? 'selected' : '' }}>Automatic</option>
                                    <option value="mechanic" {{ $post->transmission == 'mechanic' ? 'selected' : '' }}>Mechanic</option>
                                </select>
                                @error('transmission')
                                <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </label>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-10 px-10">
                <div class="bg-white p-10">
                    <p>Roles</p>
                    <div class="w-full h-[1px] bg-gray-300"></div>
                    <div class="mt-10">
                        <div class="flex">
                            <label for="role_id_1">
                                <input type="checkbox" name="role_id" id="role_id" value="1" {{ $post->role_id === 1 ? 'checked' : '' }}>
                            </label>
                            <p>Super VIP</p>
                            @error('role_id')
                            <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex">
                            <label for="role_id_2">
                                <input type="checkbox" name="role_id" id="role_id" value="2" {{ $post->role_id === 2 ? 'checked' : '' }}>
                            </label>
                            <p>VIP+</p>
                            @error('role_id')
                            <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex">
                            <label for="role_id_3">
                                <input type="checkbox" name="role_id" id="role_id" value="3" {{ $post->role_id === 3 ? 'checked' : '' }}>
                            </label>
                            <p>VIP</p>
                            @error('role_id')
                            <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </section>
            <div class="col-span-full my-10 px-10">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                    <textarea placeholder="Write Here..." id="description" name="description" rows="3" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $post->description }}</textarea>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6 mt-10 px-10">
                <a href="/posts/{{$post->id}}" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button form="delete-form"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Delete
                </button>
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update
                </button>
            </div>
            @error('role_id')
            <p class="text-xs font-bold text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </form>

        <form method="POST" action="/posts/{{$post->id}}" id="delete-form">
            @csrf
            @method('DELETE')
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const makeSelect = document.getElementById('make');
                const modelSelect = document.getElementById('model');
                const makeNameInput = document.getElementById('make_name');
                const modelNameInput = document.getElementById('model_name');

                // Get all brands and find the ID for the selected make
                const brands = @json($brands);
                let selectedBrand = brands.find(brand => brand.brand === "{{ $post->make }}");

                if (selectedBrand) {
                    fetchModels(selectedBrand.id);
                }

                function fetchModels(makeId) {
                    fetch(`/models/${makeId}`)
                        .then(response => response.json())
                        .then(data => {
                            modelSelect.innerHTML = '<option hidden="">Model</option>';
                            data.forEach(model => {
                                const option = document.createElement('option');
                                option.value = model.id;
                                option.textContent = model.model;
                                if (model.model === "{{ $post->model }}") {
                                    option.selected = true;
                                }
                                modelSelect.appendChild(option);
                            });
                        });
                }

                makeSelect.addEventListener('change', function () {
                    let make = brands.find(brand => brand.brand === makeSelect.value);
                    let makeId = make.id
                    const makeName = make.brand;

                    if (makeId !== '') {
                        // makeNameInput.value = makeName;
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
                    const modelName = modelSelect.options[modelSelect.selectedIndex].text;
                    modelNameInput.value = modelName;
                });
            });
        </script>
    </section>
</x-layout>
