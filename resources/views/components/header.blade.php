<style>
    #profile-dropdown {
        display: none;
    }
    #profile-dropdown.show {
        display: block;
    }
</style>

<header class="flex items-center justify-between p-10 pt-8 bg-white">
    <a href="/" class="flex items-center">

        <img class="w-[150px] h-[50px] object-cover cursor-pointer"
             src="https://storage.tbcpay.ge/serviceimages/feca96f6-d775-4d32-9f77-799522cc6012_thumb.JPG" alt="logo">
        <label class="flex items-center">
            <img src="https://static-00.iconduck.com/assets.00/search-icon-2048x2048-cmujl7en.png" alt="search icon"
                 class="w-[20px] h-[20px] relative left-[35px]">
            <input type="text"
                   class="border border-gray-300 rounded-[12px] w-[300px] h-[40px] px-10 outline-none text-[15px] hover:border-gray-400 focus:border-gray-400 transition"
                   placeholder="Search...">
        </label>

    </a>
    @auth()
        <div class="flex items-center gap-5">
            <a href="/posts/create"
               class="px-5 h-[40px] bg-red-300 rounded-[12px] items-center flex justify-center gap-2 hover:bg-red-400 transition cursor-pointer">
                <img src="https://www.clker.com/cliparts/s/7/R/k/j/Z/icon-add.svg.hi.png" class="w-[20px] h-[20px]"
                     alt="add icon">
                <p class="text-[15px] text-white font-semibold">Add</p>
            </a>
            <div
                class="flex items-center gap-3 border border-gray-300 rounded-[12px] px-5 h-[40px] hover:bg-gray-200 hover:border-gray-400 transition cursor-pointer">
                <img src="https://www.svgrepo.com/show/348179/language.svg" class="w-[20px] h-[20px]"
                     alt="language icon">
                <p class="text-[15px]">English, USD$</p>
                <img src="https://meritocracy.is/blog/wp-content/uploads/2019/01/grey-down-arrow-icon-png-1.png"
                     class="w-[10px] h-[7px]" alt="dropdown icon">
            </div>
            <form
                method="POST" action="/logout"
                class="bg-blue-300 px-5 rounded-[12px] h-[40px] flex items-center text-white font-semibold border border-blue-300 hover:bg-white hover:text-blue-300 cursor-pointer transition">
                @csrf
                <button type="submit" class="text-[15px]">Log Out</button>
            </form>
            <div class="relative">
                <div id="profile-image" class="w-[40px] h-[40px] p-1.5 bg-slate-200 hover:bg-slate-300 transition cursor-pointer rounded-[50%]">
                    <img class="w-full h-full" src="https://cdn-icons-png.freepik.com/512/8459/8459373.png" alt="profile image">
                </div>
                <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg">
                    <a href="/my-applications" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">My Applications</a>
                </div>
            </div>
        </div>
    @else
        <div class="flex items-center gap-5">
            <a href="/login"
               class="px-5 h-[40px] bg-red-300 rounded-[12px] items-center flex justify-center gap-2 hover:bg-red-400 transition cursor-pointer">
                <img src="https://www.clker.com/cliparts/s/7/R/k/j/Z/icon-add.svg.hi.png" class="w-[20px] h-[20px]"
                     alt="add icon">
                <p class="text-[15px] text-white font-semibold">Add</p>
            </a>
            <a href="/login"
               class="bg-blue-300 px-5 rounded-[12px] h-[40px] flex items-center text-white font-semibold border border-blue-300 hover:bg-white hover:text-blue-300 cursor-pointer transition">
                <p class="text-[15px]">Log In</p>
            </a>
            <div
                class="bg-blue-300 px-5 rounded-[12px] h-[40px] flex items-center text-white font-semibold border border-blue-300 hover:bg-white hover:text-blue-300 cursor-pointer transition">
                <a href="/register" class="text-[15px]">Register</a>
            </div>
            <div
                class="flex items-center gap-3 border border-gray-300 rounded-[12px] px-5 h-[40px] hover:bg-gray-200 hover:border-gray-400 transition cursor-pointer">
                <img src="https://www.svgrepo.com/show/348179/language.svg" class="w-[20px] h-[20px]"
                     alt="language icon">
                <p class="text-[15px]">English, USD$</p>
                <img src="https://meritocracy.is/blog/wp-content/uploads/2019/01/grey-down-arrow-icon-png-1.png"
                     class="w-[10px] h-[7px]" alt="dropdown icon">
            </div>
            <div class="relative">
                <div id="profile-image" class="w-[40px] h-[40px] p-1.5 bg-slate-200 hover:bg-slate-300 transition cursor-pointer rounded-[50%]">
                    <img class="w-full h-full" src="https://cdn-icons-png.freepik.com/512/8459/8459373.png" alt="profile image">
                </div>
                <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg">
                    <a href="/login" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Log In</a>
                </div>
            </div>
        </div>
    @endauth


</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileImage = document.getElementById('profile-image');
        const profileDropdown = document.getElementById('profile-dropdown');

        profileImage.addEventListener('click', function() {
            profileDropdown.classList.toggle('show');
        });

        document.addEventListener('click', function(event) {
            if (!profileImage.contains(event.target) && !profileDropdown.contains(event.target)) {
                profileDropdown.classList.remove('show');
            }
        });
    });

</script>
