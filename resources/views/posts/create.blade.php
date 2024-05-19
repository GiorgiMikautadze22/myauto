<x-layout>
    <x-header></x-header>
    <section class="mt-10 px-10">
        <div class="bg-white p-10">
            <p>Main features</p>
            <div class="w-full h-[1px] bg-gray-300"></div>
            <div class="mt-10">
                <form method="POST" action="/posts" >
                    @csrf
                    <div class="grid grid-cols-4 items-center gap-5">
                        <label for="make">
                            <select
                                name="make" id="make"
                                class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                <option hidden="">Make</option>
                                @foreach($brands as $brand)
                                    <option>{{$brand->brand}}</option>
                                @endforeach
                            </select>
                            @error('make')
                            <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                            @enderror
                        </label>
                        <label for="model">
                            <select
                                name="model" id="model"
                                class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                <option hidden="">Model</option>
                                @foreach($models as $model)
                                    <option>{{$model->model}}</option>
                                @endforeach
                            </select>
                            @error('model')
                            <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                            @enderror
                        </label>
                        <label for="year">
                            <select
                                name="year" id="year"
                                class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                <option hidden="">Year</option>
                                @for($year = 1990; $year <= 2024; $year++)
                                    <option>{{$year}}</option>
                                @endfor
                            </select>
                            @error('year')
                            <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                            @enderror
                        </label>
                        <label for="color">
                            <input
                                name="color" id="color"
                                class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5"
                                placeholder="Color"
                            />
                            @error('color')
                            <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                            @enderror
                        </label>
                        <label for="mileage">
                            <input
                                name="mileage" id="mileage"
                                class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5"
                                placeholder="Mileage"
                            />
                            @error('mileage')
                            <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                            @enderror
                        </label>
                        <label for="price">
                            <input
                                name="price" id="price"
                                class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5"
                                placeholder="Price"
                            />
                            @error('price')
                            <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                            @enderror
                        </label>
                        <label for="fuel_type">
                            <select
                                name="fuel_type" id="fuel_type"
                                class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                <option hidden="">Fuel Type</option>
                                <option>Gasoline</option>
                                <option>Diesel</option>
                                <option>Electricity</option>
                            </select>
                            @error('fuel_type')
                            <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                            @enderror
                        </label>
                        <label for="transmission">
                            <select
                                name="transmission" id="transmission"
                                class="w-[300px] h-[50px] border border-gray-300 rounded-[8px] placeholder-black px-5 items-center pb-0.5">
                                <option hidden="">Transmission</option>
                                <option>Automatic</option>
                                <option>Mechanic</option>
                            </select>
                            @error('transmission')
                            <p class="text-xs font-bold text-red-500 mt-2">{{$message}}</p>
                            @enderror
                        </label>

                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>

