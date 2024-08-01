<div class="flex flex-col mt-6">
    <div class="overflow-x-auto rounded-lg">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                    <thead class="bg-gray-300 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-white">
                                Image
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-white">
                                Code
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-white">
                                Descripcion
                            </th>

                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-white">
                                Venta
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-white">
                                Stock
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-white">
                                Marca
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-white">
                                Categoria
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-white">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @forelse ($this->products as $product)
                        <tr wire:key='producto-{{ $product->id }}' class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-white">
                                <img width="120" height="120" src="{{ asset("storage/$product->image") }}">
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-white">
                                <p class="text-xs text-hover-primary mb-1">
                                    {{ $product->code }}</p>
                                <p class="text-xs text-hover-primary mb-1">
                                    {{ $product->code_fabrica }}</p>
                                <p class="text-xs text-hover-primary mb-1">
                                    {{ $product->code_peru }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-white">
                                {{ $product->description }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-white">
                                {{ $product->price_venta }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-white">                     
                                    {{ $product->stock }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-white">
                               
                                    {{ $product->brand->name }}</p>
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-white">
                                    {{ $product->category->name }}
                                
                            </td>
                            <td class="p-4 space-x-2 whitespace-nowrap">
                                <x-button.button-edit wire:click='update({{ $product->id }})'>
                                </x-button.button-edit>
                                <x-button.button-delete wire:click='delete({{ $product->id }})'
                                    wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $product->code }}' para confirmar!|{{ $product->code }}">
                                </x-button.button-delete>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $this->products->links(data: ['scrollTo' => true]) }}
            </div>
        </div>
    </div>
</div>