<div>
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">

                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        ORDENES PERU COMPRAS</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/dashboard" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Ordenes Peru Compras </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1 m-5">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" wire:model.live.debounce.1000ms="search"
                                    class="form-control form-control-solid w-250px ps-13"
                                    placeholder="Proveedor/Entidad" />
                            </div>
                            <!--end::Search-->
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1 m-5">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" wire:model.live.debounce.1000ms="searchMarca"
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Marca" />
                            </div>

                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end">
                                <div class="d-flex align-items-end position-relative my-1 m-5">
                                    <div class="form-floating">
                                        <select wire:model.live="convenioMarco" class="form-control" id="line_id"
                                            aria-label="lineFilter">
                                            <option selected>Selecione acuerdo marco</option>
                                            @forelse ($this->acuerdosMarco as $acuerdoMarco)
                                                <option value="{{ $acuerdoMarco->code }}">
                                                    {{ $acuerdoMarco->name }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label for="lineFilter">Seleccione acuerdo marco</label>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center position-relative my-1 m-5">
                                    <div class="form-floating">
                                        <input wire:model.live='start_date' value="{{ $dateNow }}"
                                            class="form-control form-control-solid w-150px ps-13 pt-13" type="date"
                                            id="start_date" name="start_date" min="2021-01-01"
                                            max="{{ $dateNow }}" />
                                        <label for="lineFilter">Fecha fin</label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center position-relative my-1 m-5">
                                    <div class="form-floating">
                                        <input wire:model.live='end_date'
                                            class="form-control form-control-solid w-150px ps-13 pt-13" type="date"
                                            id="end_date" name="end_date" min="2021-01-01" max="{{ $dateNow }}" />
                                        <label for="lineFilter">Fecha fin</label>
                                    </div>
                                </div>

                                <!--begin::Export-->
                                <button type="button" class="btn btn-light-primary me-1">
                                    <i class="ki-duotone ki-exit-up fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i></button>
                                <!--end::Export-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        @include('livewire.convenio.product-table')
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
</div>
