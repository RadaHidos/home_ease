<x-site-layout title="Categories">

    <div class="mb-10">
        <p class="text-sm text-slate-500">
            Browse all categories and discover services that fit your needs.
        </p>
    </div>

    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($categories as $category)

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5
                    transition-all duration-200 hover:shadow-md hover:-translate-y-[1px]">

            <div class="flex items-center justify-between mb-2">


                </div>
            </div>

        </div>

        @endforeach
    </div>




</x-site-layout>