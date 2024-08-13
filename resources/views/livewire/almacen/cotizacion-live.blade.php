<div>
    <div
        class="p-6 space-y-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard') }}"
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
                                    Convenio Marco
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('convenio.data') }}"
                                class="flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Ordenes
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
                                    Detalle orden
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="max-w-3xl p-8 mx-auto rounded-lg shadow-lg bg-background text-card-foreground dark:text-white">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-8 h-8 mr-2">
                        <path d="m8 3 4 8 5-5 5 15H2L8 3z"></path>
                    </svg>
                    <h1 class="text-2xl font-bold">COTIZACION</h1>
                </div>
                <div class="text-right">
                    <h2 class="text-xl font-bold">Cliente</h2>
                    <div wire:ignore>
                        <select id="customer_id">
                            @isset($customers)
                                @forelse ($customers as $customer)
                                    <option value="{{ $customer->id }}">
                                        {{ $customer->code }} -
                                        {{ $customer->first_name }}
                                        {{ $customer->last_name }}
                                    </option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                    </div>
                    @isset($customerSelect)
                        <p>RUC : {{ $customerSelect->code }}</p>
                        <p>Razon : {{ $customerSelect->first_name }}</p>
                        <p>Email: {{ $customerSelect->email }}</p>
                        <p>Email: {{ $customerSelect->phone }}</p>
                    @endisset
                </div>
            </div>
            <div class="pt-4 mb-6 border-t border-muted">
                <table class="w-full">
                    <thead>
                        <tr class="text-left">
                            <th class="pb-2"></th>
                            <th class="pb-2 w-62">CODIGO</th>
                            <th class="pb-2 text-right">CANTIDAD</th>
                            <th class="pb-2 text-right">PRECIO UNIT</th>
                            <th class="pb-2 text-right">SUB TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($items)
                            @forelse ($items as $item)
                                <tr wire:key='det-{{ $item->id }}'>
                                    <td class="py-2">
                                        <x-button.button-delete wire:click="delete('{{ $item->rowId }}')">

                                        </x-button.button-delete>
                                    </td>
                                    <td class="py-2">{{ $item->rowId }}</td>
                                    <td class="py-2 text-right">{{ $item->qty }}</td>
                                    <td class="py-2 text-right">{{ $item->price }}</td>
                                    <td class="py-2 text-right">{{ $item->priceTotal }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        No hay registros
                                    </td>
                                </tr>
                            @endforelse
                        @else
                            <tr>
                                <td>
                                    No hay registros hols
                                </td>
                            </tr>
                        @endisset
                        <tr>
                            <td class="py-2">
                                <x-button.button-pluss-purple class='p-0' wire:click="AddProductCotizacion">
                                </x-button.button-pluss-purple>
                            </td>
                            <td class="py-2">
                                <div wire:ignore>
                                    <select id="product_id">
                                        @isset($products)
                                            @forelse ($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->code }}
                                                </option>
                                            @empty
                                            @endforelse
                                        @endisset
                                    </select>
                                </div>
                            </td>
                            <td class="py-2">
                                <x-text-input wire:model.live='cantitad_detalle' class='p-0.5 text-right' type='number'
                                    for='' label='' placeholder="Cantidad">
                                </x-text-input>
                            </td>
                            <td class="py-2 text-right">
                                <x-text-input wire:model.live='price_cotizacion' class='p-0.5 text-right' type='number'
                                    for='' label='' placeholder="Precio">
                                </x-text-input>
                            </td>
                            <td class="py-2 text-right"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end pt-4 border-t border-muted">
                <div class="w-1/2 text-right">
                    <div class="flex justify-between mb-2">
                        <span>Subtotal:</span>
                        <span>S/ {{ round($igv, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>IGV:</span>
                        <span>S/ {{ round($sub_total, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Total:</span>
                        <span class="font-bold">S/ {{ $total }}</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-end pt-4 border-t border-muted">
                <div class="w-1/2 text-right">
                    <div class="flex justify-between mb-2">
                        <x-button.button-save wire:click="save">
                            GUARDAR
                        </x-button.button-save>
                        <x-button.button-upload wire:click="exportar">
                            EXPORTAR
                        </x-button.button-upload>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            $('#customer_id').select2({
                width: '100%'
            });
            $('#customer_id').on('change', function() {
                @this.set('customer', $(this).val());
            });
        });
        $(document).ready(function() {
            $('#product_id').select2({
                width: '100%'
            });
            $('#product_id').on('change', function() {
                @this.set('product', $(this).val());
            });
        });
    </script>
@endpush
