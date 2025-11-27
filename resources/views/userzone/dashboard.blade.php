<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="px-6 py-5 ">
            <h3 class="text-lg font-semibold text-slate-800">
                Welcome back, {{ auth()->user()->name }}
            </h3>
            <p class="mt-1 text-sm text-slate-500">
                You’re logged in to your account. Use the shortcuts below to manage your content.
            </p>
        </div>

        <div class="px-6 py-5 space-y-6">
            <!-- User info  -->
            <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500">
                <div>
                    <span class="font-medium text-slate-700">Email:</span>
                    <span>{{ auth()->user()->email }}</span>
                </div>

                @if(auth()->user()->is_admin ?? false )
                <!-- Admin badge -->
                <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">
                    Admin
                </span>
                @else
                <!-- User badge  -->
                <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">
                    User
                </span>
                @endif
            </div>

            <!-- Quick actions  -->
            <div>
                <h4 class="text-sm font-semibold text-slate-700 mb-3">
                    Quick actions
                </h4>

                <div class="flex flex-wrap gap-3">
                    <!-- Services button  -->
                    <a href="/admin/services"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium bg-blue-600 text-white hover:bg-blue-700 transition">
                        Manage services
                    </a>

                    <!-- Categories button but only ofr admins -->
                    @if(auth()->user()->is_admin ?? false)
                    <a href="/admin/categories"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium bg-slate-100 text-slate-700 hover:bg-slate-200 transition">
                        Manage categories
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>