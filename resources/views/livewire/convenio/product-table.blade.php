<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-130px">ORDEN</th>
            <th class="min-w-130px">PROVEEDOR</th>
            <th class="min-w-130px">ENTIDAD</th>
            <th class="min-w-120px">PROCEDIMIENTO</th>
            <th class="min-w-120px">TIPO</th>
            <th class="min-w-120px">ESTADO</th>
            <th class="min-w-125px">PUBLICADO</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @foreach ($this->datas as $productData)
            <tr>
                <td>
                    <p class="text-xs text-gray-700 text-hover-primary mb-1">
                        {{ substr($productData->orden_electronica, 0, -1) . str_repeat('0', 1) }}
                    <p class="text-xs text-gray-700 text-hover-primary mb-1">
                        {{ $productData->orden_electronica }}</p>
                </td>
                <td>
                    <p class="text-sm text-gray-700 text-hover-primary mb-1">
                        {{ $productData->ruc_proveedor }}</a>
                    <p class="text-sm text-gray-700 text-hover-primary mb-1">
                        {{ $productData->razon_proveedor }}</a>
                </td>
                <td>
                    <p class="text-sm text-gray-700 text-hover-primary mb-1">
                        {{ $productData->ruc_entidad }}</p>
                    <p class="text-sm text-gray-700 text-hover-primary mb-1">
                        {{ $productData->razon_entidad }}</a>
                </td>
                <td>
                    <p class="text-sm text-gray-700 text-hover-primary mb-1">
                        {{ $productData->procedimiento }}</p>
                </td>
                <td>
                    <p class="text-xs text-gray-700 text-hover-primary mb-1">
                        {{ $productData->tipo }}</p>
                </td>
                <td>
                    <p class="text-sm text-gray-700 text-hover-primary mb-1">
                        {{ $productData->estado_orden_electronica }}</p>
                </td>
                <td>
                    <p class="text-sm text-gray-700 text-hover-primary mb-1">
                        {{ \Carbon\Carbon::parse($productData->fecha_aceptacion)->format('d/m/Y') }}</p>
                </td>
            </tr>
        @endforeach
    </tbody>
    <!--end::Table body-->
</table>
{{ $this->datas->links(data: ['scrollTo' => false]) }}
<!--end::Table-->
