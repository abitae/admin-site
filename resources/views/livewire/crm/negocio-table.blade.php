<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_negocios">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-120px">Code</th>
            <th class="min-w-120px">Name</th>
            <th class="min-w-120px">Cliente</th>
            <th class="min-w-120px">Asignado</th>
            <th class="min-w-120px">Fecha cierre</th>
            <th class="min-w-120px">Prioridad</th>
            <th class="min-w-120px">Estado</th>
            <th class="text-end min-w-100px">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
        @forelse ($this->negocios as $negocio)
            <tr wire:key='negocio-{{ $negocio->id }}'>
                <td class="d-flex align-items-center">
                    <!--begin::Negocio details-->
                    <div class="d-flex flex-column">
                        <p class="text-gray-800 text-hover-primary mb-1">
                            {{ $negocio->code }}
                        </p>
                    </div>
                    <!--begin::Negocio details-->
                </td>
                <td>
                    <div class="badge badge-light fw-bold">
                        <span>{{ $negocio->name }}</span>
                    </div>
                </td>
                <td>
                    <div class="badge badge-light fw-bold">
                        <span>{{ $negocio->customer->first_name }}</span>
                    </div>
                </td>
                <td>
                    <div class="badge badge-light fw-bold">
                        <span>{{ $negocio->employee->first_name }}</span>
                    </div>
                </td>
                <td>
                    <div class="badge badge-light fw-bold">
                        <span>{{ $negocio->date_closing }}</span>
                    </div>
                </td>
                <td>
                    <div class="badge badge-light fw-bold">
                        <span>{{ $negocio->priority }}</span>
                    </div>
                </td>
                <td>
                    <div class="badge badge-light fw-bold">
                        <span>{{ $negocio->stage }}</span>
                    </div>
                </td>
                <td class="text-end">
                    <button wire:click='update({{ $negocio->id }})'
                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3">
                        <i class="ki-duotone ki-setting-3 fs-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </button>
                    <button wire:click='delete({{ $negocio->id }})'
                        wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $negocio->code }}' para confirmar!|{{ $negocio->code }}"
                        class="btn btn-icon btn-active-light-primary w-30px h-30px">
                        <i class="ki-duotone ki-trash fs-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </button>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
<!--end::Table-->
{{ $this->negocios->links(data: ['scrollTo' => false]) }}
