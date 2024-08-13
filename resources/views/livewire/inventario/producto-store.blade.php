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
                                    Entry
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>

            </div>
            <div
                class="p-4 bg-white border border-gray-200 block dark:text-white sm:flex items-center justify-between  lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
                <div class="relative w-full align-middle">
                    <div class="p-6 rounded-lg shadow-lg bg-background text-foreground">
                        <div class="flex items-center justify-between mb-6">
                            <h1 class="text-2xl font-bold">Nuevo producto</h1>
                            <div class="flex gap-2">
                                <a href="{{ route('inventario.inventory') }}"
                                    class="inline-flex items-center justify-center px-3 text-sm font-medium text-white transition-colors bg-purple-600 border rounded-md whitespace-nowrap ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border-input bg-background hover:bg-accent hover:text-accent-foreground h-9">
                                    Atras
                                </a>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-2 ">
                                <!-- Main widget -->
                                <div
                                    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                        <thead class="bg-gray-300 dark:bg-gray-700">
                                            <tr>

                                                <th scope="col"
                                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Code
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Status
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                            @forelse ($products as $item)
                                                <tr wire:key='productStore-{{ $item->id }}'
                                                    class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <td
                                                        class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                                        {{ $item->code_entrada }}
                                                    </td>
                                                    <td
                                                        class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                                        <button wire:click='estado({{ $item->id }})'
                                                            wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba 'SI' para confirmar!|SI"
                                                            class="flex items-center">
                                                            <div
                                                                class="h-2.5 w-2.5 rounded-full {{ $item->isActive ? 'bg-green-400' : 'bg-red-600' }} mr-2">
                                                            </div>
                                                            {{ $item->isActive ? 'Active' : 'Disabled' }}
                                                        </button>
                                                    </td>
                                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                                        <x-button.button-edit wire:click='update({{ $item->id }})'>
                                                        </x-button.button-edit>
                                                        <x-button.button-delete wire:click='delete({{ $item->id }})'
                                                            wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $item->code_entrada }}' para confirmar!|{{ $item->code_entrada }}">
                                                        </x-button.button-delete>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $products->links(data: ['scrollTo' => false]) }}
                                </div>
                                <div
                                    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                                    hola 2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
