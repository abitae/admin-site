<div
    class="p-4 bg-white border border-gray-200 block sm:flex items-center justify-between  lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="relative w-full align-middle">
        <div class="overflow-hidden shadow">
            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                <thead class="bg-gray-300 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Code
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Name
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Cliente
                        </th>

                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Asignado
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Fecha cierre
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Prioridad
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Estado
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse ($this->negocios as $negocio)
                        <tr wire:key='negocioo-{{ $negocio->id }}' class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                {{ $negocio->code }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                <p class="text-xs text-gray-700 text-hover-primary mb-1">
                                    <span>{{ $negocio->name }}</span>
                                </p>
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                {{ $negocio->customer->first_name }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                {{ $negocio->employee->first_name }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                {{ $negocio->date_closing }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                {{ $negocio->priority }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                <button wire:click='estado({{ $negocio->id }})'
                                    wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba 'SI' para confirmar!|SI"
                                    class="flex items-center">
                                    <div
                                        class="h-2.5 w-2.5 rounded-full {{ $negocio->isActive ? 'bg-green-400' : 'bg-red-600' }} mr-2">
                                    </div>
                                    {{ $negocio->isActive ? 'Active' : 'Disabled' }}
                                </button>
                            </td>
                            <td class="p-4 space-x-2 whitespace-nowrap">
                                <x-edit2-button wire:click='detail({{ $negocio->id }})'>
                                </x-edit2-button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {{ $this->negocios->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>
