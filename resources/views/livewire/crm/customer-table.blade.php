<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_customers">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-125px">Code</th>
            <th class="min-w-125px">Name</th>
            <th class="min-w-125px">Telefono</th>
            <th class="min-w-125px">Email</th>
            <th class="min-w-125px">Estado</th>
            <th class="text-end min-w-100px">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
        @forelse ($this->customers as $customer)
            <tr wire:key='customer-{{ $customer->id }}'>
                <td class="d-flex align-items-center">
                    <!--begin::Customer details-->
                    <div class="d-flex flex-column">
                        <p class="text-gray-800 text-hover-primary mb-1">
                            {{ $customer->code }}
                        </p>
                    </div>
                    <!--begin::Customer details-->
                </td>
                <td>
                    <div class="badge badge-light fw-bold">
                        <span>{{ $customer->first_name }} {{ $customer->last_name }}</span>
                    </div>
                </td>
                <td>
                    <div class="badge badge-light fw-bold">
                        <span>{{ $customer->phone }}</span>
                    </div>
                </td>
                <td>
                    <div class="badge badge-light fw-bold">
                        <span>{{ $customer->email }}</span>
                    </div>
                </td>
                <td>
                    <button wire:click='estado({{ $customer->id }})'
                        wire:confirm.prompt="Estas seguro de actualizar registro?\n\nEscriba 'SI' para confirmar!|SI">
                        <div class="badge badge-light-{{ $customer->isActive ? 'success' : 'danger' }} fw-bold">
                            {{ $customer->isActive ? 'Enabled' : 'Disabled' }}
                        </div>
                    </button>
                </td>

                <td class="text-end">
                    <button wire:click='update({{ $customer->id }})'
                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3">
                        <i class="ki-duotone ki-setting-3 fs-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </button>
                    <button wire:click='delete({{ $customer->id }})'
                        wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $customer->code }}' para confirmar!|{{ $customer->code }}"
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
{{ $this->customers->links(data: ['scrollTo' => false]) }}
