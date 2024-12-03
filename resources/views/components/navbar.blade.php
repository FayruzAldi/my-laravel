    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                Home
                            </x-nav-link>
                            <x-nav-link :href="route('students')" :active="request()->routeIs('students')">
                                Students
                            </x-nav-link>
                            <x-nav-link :href="route('grades')" :active="request()->routeIs('grades')">
                                Grade
                            </x-nav-link>
                            <x-nav-link :href="route('departments')" :active="request()->routeIs('departments')">
                                Department
                            </x-nav-link>
                            <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                                Contact
                            </x-nav-link>
                            <x-nav-link :href="route('admin.login')" :active="request()->routeIs('admin.*')">
                                Admin
                            </x-nav-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

