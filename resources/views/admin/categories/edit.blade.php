<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ $category->name }}
    </h2>
  </x-slot>

  <div class="container mx-auto">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block w-full py-2 align-middle sm:px-6 lg:px-8">
          <div class="flex justify-start">
            <a href="{{ route('categories.index') }}"
              class="m-2 rounded-md bg-green-500 px-4 py-2 text-gray-50 hover:bg-green-300">Back</a>
          </div>
        </div>
      </div>
      <div class="m-2 overflow-hidden bg-gray-200 p-2 sm:rounded-lg">
        <div>
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Category</h3>
              </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
              <form action="{{ route('categories.update', $category->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                  <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                    {{-- NAME --}}
                    <div class="grid grid-cols-3 gap-6">
                      <div class="col-span-3 sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                          Name
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <input id="name" type="text" name="name"
                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            value="{{ $category->name }}">
                        </div>
                        @error('name')
                          <span class="text-red-500">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    {{-- IMAGE --}}
                    <div>
                      <label class="block text-sm font-medium text-gray-700">
                        Image
                      </label>
                      <div class="m-2 w-full p-2">
                        <img class="h-32 w-32" src="{{ Storage::url($category->image) }}">
                      </div>
                      <div class="mt-1 flex items-center">
                        <input id="image" type="file" name="image"
                          class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                      </div>
                      @error('image')
                        <span class="text-red-500">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6">
                      <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                      </button>
                    </div>
                  </div>
              </form>
            </div>
            {{-- <div class="mt-4">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block w-full py-2 align-middle sm:px-6 lg:px-8">
                  <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <div class="m-2 p-2">Sub Categories</div>
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
                        @forelse($category->sub_categories as $category)
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
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                              <a href="{{ route('admin.subcategories.edit', $category->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                              <form method="POST" action="{{ route('admin.subcategories.destroy', $category->id) }}">
                                @csrf
                                @method('DELETE')
                                <a class="text-red-500 hover:text-red-900"
                                  href="{{ route('admin.subcategories.destroy', $category->id) }}"
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
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
