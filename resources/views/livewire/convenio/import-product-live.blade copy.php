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
                        File Manager - Files</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/dashboards" class="text-muted text-hover-primary">Dashboards</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Import File Manager</li>
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
                <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10"
                    style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('assets/media/illustrations/sketchy-1/4.png')">
                    <!--begin::Card header-->
                    <div class="card-header pt-10">
                        <div class="d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="symbol symbol-circle me-5">
                                <div
                                    class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                    <i class="ki-duotone ki-abstract-47 fs-2x text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="d-flex flex-column">
                                <h2 class="mb-1">Importar archivo excel data</h2>
                                <div class="text-muted fw-bold">
                                    <a href="https://www.catalogos.perucompras.gob.pe/ConsultaOrdenesPub">Ordenes
                                        Publicas</a>
                                    <span class="mx-3">|</span>
                                    <span class="mx-3">|</span>Max: 2.6 GB
                                    <span class="mx-3">|</span>758 items
                                </div>
                            </div>
                            <!--end::Title-->
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pb-0">
                        <!--begin::Navs-->
                        <div class="d-flex overflow-auto h-200px">
                            <form wire:submit='import' enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input wire:model='file' type="file" class="form-control mt-2">
                                    <button class="input-group-text" for="inputGroupFile02"><i
                                        class="fas fa-upload"></i></button>
                                </div>
                            </form>

                        </div>
                        <!--begin::Navs-->
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
