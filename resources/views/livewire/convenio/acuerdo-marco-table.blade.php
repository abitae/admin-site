<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_acuerdoMarcos">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-125px">Code</th>
            <th class="min-w-125px">Name</th>
            <th class="min-w-125px">Estado</th>
            <th class="text-end min-w-100px">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
        @forelse ($this->acuerdoMarcos as $acuerdoMarco)
            <tr wire:key='acuerdoMarco{{ $acuerdoMarco->id }}'>
                <td class="d-flex align-items-center">
                    <!--begin:: Avatar -->
                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                        <div class="symbol-label fs-3 bg-light-info text-info">
                            A
                        </div>
                    </div>
                    <!--end::Avatar-->
                    <!--begin::AcuerdoMarco details-->
                    <div class="d-flex flex-column">
                        <p class="text-gray-800 text-hover-primary mb-1">
                            {{ $acuerdoMarco->code }}
                        </p>

                    </div>
                    <!--begin::AcuerdoMarco details-->
                </td>
                <td>
                    <div class="badge badge-light fw-bold">
                        <span>{{ $acuerdoMarco->name }}</span>
                    </div>
                </td>
                <td>
                    <button wire:click='estado({{ $acuerdoMarco->id }})'
                        wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba 'SI' para confirmar!|SI">
                        <div class="badge badge-light-{{ $acuerdoMarco->isActive ? 'success' : 'danger' }} fw-bold">
                            {{ $acuerdoMarco->isActive ? 'Enabled' : 'Disabled' }}
                        </div>
                    </button>
                </td>

                <td class="text-end">
                    <button wire:click='update({{ $acuerdoMarco->id }})'
                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3">
                        <i class="ki-duotone ki-setting-3 fs-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </button>
                    <button wire:click='delete({{ $acuerdoMarco->id }})'
                        wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $acuerdoMarco->name }}' para confirmar!|{{ $acuerdoMarco->name }}"
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
{{ $this->acuerdoMarcos->links(data: ['scrollTo' => false]) }}
