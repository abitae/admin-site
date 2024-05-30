<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-130px">IMAGE</th>
            <th class="min-w-130px">CODES</th>
            <th class="min-w-130px">DESCRIPTION</th>
            <th class="min-w-120px">VENTA</th>
            <th class="min-w-120px">STOCK</th>
            <th class="min-w-120px">CATEGORY</th>
            <th class="min-w-125px">MODELO</th>
            <th class="text-end min-w-70px">ACCION</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @foreach ($this->products as $product)
            <tr wire:key='product-{{ $product->id }}'>
                <td>
                    <img width="120" height="120" src="{{ asset("storage/$product->image") }}">
                </td>
                <td>
                    <p class="text-xs text-gray-700 text-hover-primary mb-1">
                        {{ $product->code }}</p>
                    <p class="text-xs text-gray-700 text-hover-primary mb-1">
                        {{ $product->code_fabrica }}</p>
                    <p class="text-xs text-gray-700 text-hover-primary mb-1">
                        {{ $product->code_peru }}
                </td>
                <td>
                    <small>
                        {{ $product->description }}
                    </small>
                </td>
                <td>
                    {{ $product->price_venta }}
                </td>
                <td>
                    <p class="text-sm text-gray-700 text-hover-primary mb-1">
                        {{ $product->stock }}</p>
                </td>
                <td>
                    <p class="text-sm text-gray-700 text-hover-primary mb-1">
                        {{ $product->brand->name }}</p>
                </td>
                <td>
                    <p class="text-sm text-gray-700 text-hover-primary mb-1">
                        {{ $product->category->name }}</p>
                </td>
                <td class="text-end">
                    <nobr>
                        <button wire:click='update({{ $product->id }})'
                            class="btn btn-icon btn-active-light-primary w-30px h-30px me-3">
                            <i class="ki-duotone ki-setting-3 fs-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </button>
                        <button wire:click='delete({{ $product->id }})'
                            wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $product->code }}' para confirmar!|{{ $product->code }}"
                            class="btn btn-icon btn-active-light-primary w-30px h-30px">
                            <i class="ki-duotone ki-trash fs-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </button>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </tbody>
    <!--end::Table body-->
</table>
{{ $this->products->links(data: ['scrollTo' => false]) }}
