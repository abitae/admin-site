@if ($isOpenModalExport)
    <!--begin::Modal - Adjust Balance-->
    <div class="modal" tabindex="-1" role="dialog" style="display: {{ $isOpenModalExport ? 'block' : 'none' }};">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-350px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Export AcuerdoMarcos</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div wire:click="$toggle('isOpenModalExport')" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                    <form class="form" wire:submit="exportAcuerdoMarco">
                        <!--begin::Input group-->
                        <div class="fv-row mb-2">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold form-label mb-2">
                                Export Format:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select data-control="select2" data-placeholder="Select a format" data-hide-search="true"
                                class="form-select form-select-solid fw-bold">
                                <option value="excel">Excel</option>
                                <option value="pdf">PDF</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button wire:click="$toggle('isOpenModalExport')" class="btn btn-light me-3">
                                Discard
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
    <div class="modal" tabindex="-1" role="dialog" style="display: {{ $isOpenModal ? 'block' : 'none' }};">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-350px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Add AcuerdoMarco</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div wire:click="$toggle('isOpenModal')" class="btn btn-icon btn-sm btn-active-icon-primary"
                        data-kt-acuerdoMarcos-modal-action="close">
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
                        wire:submit="{{ isset($acuerdoMarcoForm->acuerdoMarco) ? 'updateAcuerdoMarco' : 'createAcuerdoMarco' }}">
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
                                    <input wire:model.live='acuerdoMarcoForm.code' type="text"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="code" />
                                    @error('acuerdoMarcoForm.code')
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
                                    <input type="text" wire:model.live='acuerdoMarcoForm.name'
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="name" />
                                    @error('acuerdoMarcoForm.name')
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
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
