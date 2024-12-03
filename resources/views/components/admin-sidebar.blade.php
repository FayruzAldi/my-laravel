<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            <x-side-link route="admin.dashboard" icon="home">
                Dashboard
            </x-side-link>

            <x-side-link route="admin.students.index" icon="users">
                Students
            </x-side-link>

            <x-side-link route="admin.grades.index" icon="academic-cap">
                Grades
            </x-side-link>

            <x-side-link route="admin.departments.index" icon="office-building">
                Departments
            </x-side-link>
        </ul>
    </div>
</aside>
