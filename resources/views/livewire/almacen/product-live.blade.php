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
                        PRODUCTOS</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="/dashboard" class="text-muted text-hover-primary">
                                Dashboards</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Almacen</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Productos</li>
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
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" wire:model.live.debounce.1000ms="search"
                                    class="form-control form-control-solid w-150px ps-10" 
                                    placeholder="Buscar" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end">
                                <div class="w-150px me-1">
                                    <div class="form-floating">
                                        <select wire:model.live="lineFilter"
                                            class="form-control"
                                            id="line_id" aria-label="lineFilter">
                                            <option selected>Todos</option>
                                            @forelse ($this->lines as $line)
                                                <option value="{{ $line->id }}">
                                                    {{ $line->name }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label for="lineFilter">Seleccione linea</label>
                                    </div>
                                </div>
                                <div class="w-150px me-1">
                                    <div class="form-floating">
                                        <select wire:model.live="categoryFilter"
                                            class="form-control"
                                            id="line_id" aria-label="categoryFilter">
                                            <option selected>Todos</option>
                                            @forelse ($this->categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label for="lineFilter">Seleccione categoria</label>
                                    </div>
                                </div>
                                <div class="w-150px me-1">
                                    <div class="form-floating">
                                        <select wire:model.live="brandFilter"
                                            class="form-control"
                                            id="line_id" aria-label="brandFilter">
                                            <option selected>Todos</option>
                                            @forelse ($this->brands as $brand)
                                                <option value="{{ $brand->id }}">
                                                    {{ $brand->name }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label for="lineFilter">Seleccione marca</label>
                                    </div>
                                </div>
                                <div>
                                    <!--begin::Export-->
                                    <button wire:click="$toggle('isOpenModalExport')" type="button"
                                        class="btn btn-light-primary me-1">
                                        <i class="ki-duotone ki-exit-up fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Export
                                    </button>
                                    <!--end::Export-->
                                    <!--begin::Export-->
                                    <button wire:click="create" type="button" class="btn btn-primary me-1">
                                        <i class="ki-duotone ki-plus fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Add Product
                                    </button>
                                    <!--end::Action-->
                                    <!--end::Export-->
                                </div>
                                @include('livewire.almacen.product-modal')
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        @include('livewire.almacen.product-table')
                        <!--end::Table-->
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

@push('js')
    <script src="assets/js/create-app.js"></script>
@endpush
