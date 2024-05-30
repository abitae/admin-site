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
                    <h2 class="fw-bold">Export Customers</h2>
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
                    <form class="form" wire:submit="exportCustomer">
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
    <div class="modal" tabindex="-1" role="dialog" style="display: block;">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-850px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Add Customer</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div wire:click="$toggle('isOpenModal')" class="btn btn-icon btn-sm btn-active-icon-primary"
                        data-kt-customers-modal-action="close">
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
                        wire:submit.prevent="{{ isset($customerForm->customer) ? 'updateCustomer' : 'createCustomer' }}">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column px-0 px-lg-5">
                            <div class="row mb-3">
                                <div class="col-4">
                                    <div class="form-floating">
                                        <select wire:model.live="customerForm.type_code"
                                            class="form-control {{ $errors->has('customerForm.type_code') ? 'is-invalid' : '' }}"
                                            id="type_code" aria-label="type_code">
                                            <option selected>--select--</option>
                                            <option value="DNI">DNI</option>
                                            <option value="RUC">RUC</option>
                                        </select>
                                        <label for="type_code">Seleccione linea customero</label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div
                                        class="form-floating {{ $errors->has('customerForm.code') ? 'is-invalid' : '' }}">
                                        <input wire:model.live='customerForm.code' type="text"
                                            class="form-control form-control-solid {{ $errors->has('customerForm.code') ? 'is-invalid' : '' }}"
                                            id="code" required>
                                        <label for="code">Codigo Unico</label>
                                    </div>
                                    @error('customerForm.code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <div
                                        class="form-floating {{ $errors->has('customerForm.first_name') ? 'is-invalid' : '' }}">
                                        <input wire:model.live='customerForm.first_name' type="text"
                                            class="form-control form-control-solid {{ $errors->has('customerForm.first_name') ? 'is-invalid' : '' }}"
                                            id="first_name" required>
                                        <label for="first_name">Nombres</label>
                                    </div>
                                    @error('customerForm.first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <div class="input-group has-validation">
                                        <div
                                            class="form-floating {{ $errors->has('customerForm.last_name') ? 'is-invalid' : '' }}">
                                            <input wire:model.live='customerForm.last_name' type="text"
                                                class="form-control form-control-solid {{ $errors->has('customerForm.last_name') ? 'is-invalid' : '' }}"
                                                id="last_name" required>
                                            <label for="last_name">Apellidos</label>
                                        </div>
                                        @error('customerForm.last_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group has-validation">
                                        
                                        <div class="form-floating {{ $errors->has('customerForm.date_brinday') ? 'is-invalid' : '' }}"">
                                            <input wire:model.live='customerForm.date_brinday'
                                                class="form-control form-control-solid {{ $errors->has('customerForm.date_brinday') ? 'is-invalid' : '' }}"" type="date"
                                                id="date_brinday" name="date_brinday" min="1920-01-01"
                                                max="{{ $this->dateNow }}" />
                                            <label for="lineFilter">Fecha fin</label>
                                        </div>
                                        @error('customerForm.date_brinday')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <div class="input-group has-validation">
                                        <div
                                            class="form-floating {{ $errors->has('customerForm.phone') ? 'is-invalid' : '' }}">
                                            <input wire:model.live='customerForm.phone' type="text"
                                                class="form-control form-control-solid {{ $errors->has('customerForm.phone') ? 'is-invalid' : '' }}"
                                                id="phone">
                                            <label for="phone">Telefono</label>
                                        </div>
                                        @error('customerForm.phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group has-validation">
                                        <div
                                            class="form-floating {{ $errors->has('customerForm.email') ? 'is-invalid' : '' }}">
                                            <input wire:model.live='customerForm.email' type="email"
                                                class="form-control form-control-solid {{ $errors->has('customerForm.email') ? 'is-invalid' : '' }}"
                                                id="email" required>
                                            <label for="email">Email</label>
                                        </div>
                                        @error('customerForm.email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group has-validation">
                                        <div
                                            class="form-floating {{ $errors->has('customerForm.address') ? 'is-invalid' : '' }}">
                                            <input wire:model.live='customerForm.address' type="text"
                                                class="form-control form-control-solid {{ $errors->has('customerForm.address') ? 'is-invalid' : '' }}"
                                                id="address" required>
                                            <label for="address">Direccion</label>
                                        </div>
                                        @error('customerForm.address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            
                        </div>
                        <!--begin::Actions-->
                        <div class="text-end pt-2">
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
