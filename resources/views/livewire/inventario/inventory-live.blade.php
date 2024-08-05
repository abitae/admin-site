<div>
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/dashboard"
                                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">
                                    Inventario
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">
                                    alamcenes
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    Almacenes
                </h1>
            </div>
            <div class="sm:flex space-x-4">
                <div
                    class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <label for="warehauses-search" class="sr-only">Search</label>
                    <div class="relative mt-1 lg:w-64 xl:w-96">
                        <x-select-input wire:model.live='warehouse_id' label='' for='warehouse'>
                            <option value="">All</option>
                            @forelse($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @empty
                            @endforelse

                        </x-select-input>
                    </div>

                </div>
                <div
                    class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <label for="warehauses-search" class="sr-only">Search</label>
                    <div class="relative mt-1 lg:w-64 xl:w-96">
                        <input type="text" wire:model.live='search'
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search for producto">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div
        class="p-4 bg-white border border-gray-200 block dark:text-white sm:flex items-center justify-between  lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="relative w-full align-middle">
            <div class="bg-background text-foreground p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-bold">Inventory</h1>
                    <div class="flex gap-2">
                        <button
                            class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium dark:text-white ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            Add Producto
                        </button>
                        <button
                            class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium dark:text-white ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <path d="M5 12h14"></path>
                            </svg>
                            Add Salida
                        </button>

                    </div>
                </div>
                <div class="overflow-x-auto">
                    <div class="relative w-full overflow-auto">
                        <table class="w-full caption-bottom text-sm dark:text-white">
                            <thead class="border-b">
                                <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground pr-0">
                                        Producto
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground pr-0">
                                        Almacen
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground pr-0">
                                        Stock
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground pr-0">
                                        Code Salida
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                @forelse ($inventories as $item)
                                    <tr wire:key='inventory-{{ $item->id }}'
                                        class="border-b transition-colors hover:bg-muted/50">
                                        <td class="p-4 align-middle pr-0 font-medium">
                                            {{ $item->product->code_entrada }}
                                        </td>
                                        <td class="p-4 align-middle pr-0">
                                            {{ $item->warehouse->name }}
                                        </td>
                                        <td class="p-4 align-middle pr-0">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="p-4 align-middle pr-0">
                                            @forelse ($item->product->codexits as $item)
                                                <span wire:key='codexits-{{ $item->id }}'
                                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">
                                                    {{ $item->name }}
                                                </span>
                                            @empty
                                                <div
                                                    class="bg-red-300 badge badge-light-danger fw-bold dark:text-gray-700 rounded-md">
                                                    No codes
                                                </div>
                                            @endforelse
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{ $inventories->links(data: ['scrollTo' => false]) }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
