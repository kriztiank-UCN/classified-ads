<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Sub Categories') }}
    </h2>
  </x-slot>

  <div class="container mx-auto">
    @if (session('message'))
      <div class="bg-green-500 p-2 text-center text-lg text-gray-100">{{ session('message') }}</div>
    @endif
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block w-full py-2 align-middle sm:px-6 lg:px-8">
          <div class="flex justify-end">
            <a href="{{ route('subcategories.create') }}"
              class="m-2 rounded-md bg-green-500 px-4 py-2 text-gray-50 hover:bg-green-400">New
             Sub Category</a>
          </div>
        </div>
      </div>
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block w-full py-2 align-middle sm:px-6 lg:px-8">
          <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                    Name
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                    Slug
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                    Image
                  </th>
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($sub_categories as $category)
                  <tr>
                    <td class="whitespace-nowrap px-6 py-4">
                      <div class="flex items-center">
                        {{ $category->name }}
                      </div>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                      <div class="flex items-center">
                        {{ $category->slug }}
                      </div>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                      <div class="flex items-center">
                        <img class="h-12 w-12 rounded-md" src="{{ Storage::url($category->image) }}">
                      </div>
                    </td>
                    <td class="flex whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                      {{-- <a href="{{ route('admin.add_sub', $category->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 px-2">Add Sub</a> --}}

                      <a href="{{ route('categories.edit', $category->id) }}"
                        class="px-2 text-indigo-600 hover:text-indigo-900">Edit</a>

                      <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                        @csrf
                        @method('DELETE')
                        <a class="px-2 text-red-500 hover:text-red-900"
                          href="{{ route('categories.destroy', $category->id) }}"
                          onclick="event.preventDefault();
                                                this.closest('form').submit();">
                          Delete
                        </a>
                      </form>
                    </td>
                    @empty
                    <td>
                      <div class="m-2 p-2">No Sub Categories</div>
                  </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            {{-- <div class="m-2 p-2">
              {{ $categories->links() }}
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
