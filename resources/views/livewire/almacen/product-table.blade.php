<div
    class="p-4 bg-white border border-gray-200 block sm:flex items-center justify-between  lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="relative w-full align-middle">
        <div class="overflow-hidden shadow">
            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                <thead class="bg-gray-300 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Image
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Code
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Descripcion
                        </th>

                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Venta
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Stock
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Marca
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Categoria
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse ($this->products as $product)
                        <tr wire:key='producto-{{ $product->id }}' class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                <img width="120" height="120" src="{{ asset("storage/$product->image") }}">
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                <p class="text-xs text-gray-700 text-hover-primary mb-1">
                                    {{ $product->code }}</p>
                                <p class="text-xs text-gray-700 text-hover-primary mb-1">
                                    {{ $product->code_fabrica }}</p>
                                <p class="text-xs text-gray-700 text-hover-primary mb-1">
                                    {{ $product->code_peru }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                {{ $product->description }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                {{ $product->price_venta }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                <p class="text-sm text-gray-700 text-hover-primary mb-1">
                                    {{ $product->stock }}
                                </p>
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                <p class="text-sm text-gray-700 text-hover-primary mb-1">
                                    {{ $product->brand->name }}</p>
                                </p>
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                <p class="text-sm text-gray-700 text-hover-primary mb-1">
                                <p class="text-sm text-gray-700 text-hover-primary mb-1">
                                    {{ $product->category->name }}</p>
                                </p>
                            </td>
                            <td class="p-4 space-x-2 whitespace-nowrap">
                                <x-edit-button wire:click='update({{ $product->id }})'>
                                </x-edit-button>
                                <x-delete-button wire:click='delete({{ $product->id }})'
                                    wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $product->code }}' para confirmar!|{{ $product->code }}">
                                </x-delete-button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {{ $this->products->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>
