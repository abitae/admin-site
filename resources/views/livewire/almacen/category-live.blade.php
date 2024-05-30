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
                        Categorys List</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">
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
                        <li class="breadcrumb-item text-muted">Categorys</li>
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
                                <input wire:model.live='search' type="text" data-kt-category-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Search category" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-category-table-toolbar="base">
                                <!--begin::Export-->
                                <button wire:click="$toggle('isOpenModalExport')" type="button"
                                    class="btn btn-light-primary me-3">
                                    <i class="ki-duotone ki-exit-up fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Export
                                </button>
                                <!--end::Export-->
                                <!--begin::Add category-->
                                <button wire:click="create" type="button" class="btn btn-primary">
                                    <i class="ki-duotone ki-plus fs-2"></i>Add Category
                                </button>
                                <!--end::Add category-->
                            </div>
                            <!--end::Toolbar-->
                            @if ($isOpenModalExport)
                                <!--begin::Modal - Adjust Balance-->
                                <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-350px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Export Categorys</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div wire:click="$toggle('isOpenModalExport')"
                                                    class="btn btn-icon btn-sm btn-active-icon-primary">
                                                    <i class="ki-duotone ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-5 my-1">
                                                <!--begin::Form-->
                                                <form class="form" wire:submit="exportCategory">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-2">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-semibold form-label mb-2">
                                                            Export Format:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select data-control="select2"
                                                            data-placeholder="Select a format" data-hide-search="true"
                                                            class="form-select form-select-solid fw-bold">
                                                            <option value="excel">Excel</option>
                                                            <option value="pdf">PDF</option>
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center">
                                                        <button wire:click="$toggle('isOpenModalExport')"
                                                            class="btn btn-light me-3">
                                                            Discard
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <div class="modal-backdrop fade show"></div>
                            @endif
                            <!--end::Modal - New Card-->
                            @if ($isOpenModal)
                                <!--begin::Modal - Add task-->
                                <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-350px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Add Category</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div wire:click="$toggle('isOpenModal')"
                                                    class="btn btn-icon btn-sm btn-active-icon-primary"
                                                    data-kt-categorys-modal-action="close">
                                                    <i class="ki-duotone ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body px-5 my-0">
                                                <!--begin::Form-->
                                                <form class="form"
                                                    wire:submit="{{ isset($categoryForm->category) ? 'updateCategory' : 'createCategory' }}">
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y-auto px-0 px-lg-5">
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <div class="col-12">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold">
                                                                    Code
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input wire:model.live='categoryForm.code' type="text"
                                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                                    placeholder="code" />
                                                                @error('categoryForm.code')
                                                                    <span class="error">{{ $message }}</span>
                                                                @enderror
                                                                <!--end::Input-->
                                                            </div>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <div class="col-12">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">
                                                                    Name
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" wire:model.live='categoryForm.name'
                                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                                    placeholder="name" />
                                                                @error('categoryForm.name')
                                                                    <span class="error">{{ $message }}</span>
                                                                @enderror
                                                                <!--end::Input-->
                                                            </div>
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-10">
                                                        <button wire:click="$toggle('isOpenModal')" type="reset"
                                                            class="btn btn-light me-3">Cancelar</button>
                                                        <button class="btn btn-primary">
                                                            <span class="indicator-label">Guardar</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <div class="modal-backdrop fade show"></div>
                                <!--end::Modal - Add task-->
                            @endif

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body border-0 pt-6">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_categorys">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">                             
                                    <th class="min-w-125px">Code</th>
                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-125px">Estado</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @forelse ($this->categories as $category)
                                    <tr wire:key='category{{ $category->id }}'>
                                        <td class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                    <div class="symbol-label fs-3 bg-light-info text-info">
                                                        A
                                                    </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Category details-->
                                            <div class="d-flex flex-column">
                                                <p class="text-gray-800 text-hover-primary mb-1">
                                                    {{ $category->code }}
                                                </p>
                                                
                                            </div>
                                            <!--begin::Category details-->
                                        </td>
                                        <td>
                                            <div class="badge badge-light fw-bold">
                                                <span>{{ $category->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <button wire:click='estado({{ $category->id }})'
                                                wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba 'SI' para confirmar!|SI">
                                                <div
                                                    class="badge badge-light-{{ $category->isActive ? 'success' : 'danger' }} fw-bold">
                                                    {{ $category->isActive ? 'Enabled' : 'Disabled' }}
                                                </div>
                                            </button>
                                        </td>

                                        <td class="text-end">
                                            <button wire:click='update({{ $category->id }})'
                                                class="btn btn-icon btn-active-light-primary w-30px h-30px me-3">
                                                <i class="ki-duotone ki-setting-3 fs-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </button>
                                            <button wire:click='delete({{ $category->id }})'
                                                wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $category->name }}' para confirmar!|{{ $category->name }}"
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
                        {{ $this->categories->links(data: ['scrollTo' => false]) }}
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
