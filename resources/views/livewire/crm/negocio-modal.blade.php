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
                    <h2 class="fw-bold">Export Negocios</h2>
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
                    <form class="form" wire:submit="exportNegocio">
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
                    <h2 class="fw-bold">Add Negocio</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div wire:click="$toggle('isOpenModal')" class="btn btn-icon btn-sm btn-active-icon-primary"
                        data-kt-negocios-modal-action="close">
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
                        wire:submit.prevent="{{ isset($negocioForm->negocio) ? 'updateNegocio' : 'createNegocio' }}">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column px-0 px-lg-5">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div>
                                        <select wire:model="selectedOption" id="prueba2" class="select2">
                                            <option value="">Seleccione una opción</option>
                                            @foreach ($options as $option)
                                                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Customer</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="Select an option" name="details_customer">
                                            <option></option>
                                            <option value="1" selected="selected">Keenthemes</option>
                                            <option value="2">CRM App</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <div
                                        class="form-floating {{ $errors->has('negocioForm.first_name') ? 'is-invalid' : '' }}">
                                        <input wire:model.live='negocioForm.first_name' type="text"
                                            class="form-control form-control-solid {{ $errors->has('negocioForm.first_name') ? 'is-invalid' : '' }}"
                                            id="first_name" required>
                                        <label for="first_name">Nombres</label>
                                    </div>
                                    @error('negocioForm.first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <div class="input-group has-validation">
                                        <div
                                            class="form-floating {{ $errors->has('negocioForm.last_name') ? 'is-invalid' : '' }}">
                                            <input wire:model.live='negocioForm.last_name' type="text"
                                                class="form-control form-control-solid {{ $errors->has('negocioForm.last_name') ? 'is-invalid' : '' }}"
                                                id="last_name" required>
                                            <label for="last_name">Apellidos</label>
                                        </div>
                                        @error('negocioForm.last_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group has-validation">

                                        <div
                                            class="form-floating {{ $errors->has('negocioForm.date_brinday') ? 'is-invalid' : '' }}"">
                                            <input wire:model.live='negocioForm.date_brinday'
                                                class="form-control form-control-solid {{ $errors->has('negocioForm.date_brinday') ? 'is-invalid' : '' }}""
                                                type="date" id="date_brinday" name="date_brinday" min="1920-01-01"
                                                max="{{ $this->dateNow }}" />
                                            <label for="lineFilter">Fecha fin</label>
                                        </div>
                                        @error('negocioForm.date_brinday')
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
                                            class="form-floating {{ $errors->has('negocioForm.phone') ? 'is-invalid' : '' }}">
                                            <input wire:model.live='negocioForm.phone' type="text"
                                                class="form-control form-control-solid {{ $errors->has('negocioForm.phone') ? 'is-invalid' : '' }}"
                                                id="phone">
                                            <label for="phone">Telefono</label>
                                        </div>
                                        @error('negocioForm.phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group has-validation">
                                        <div
                                            class="form-floating {{ $errors->has('negocioForm.email') ? 'is-invalid' : '' }}">
                                            <input wire:model.live='negocioForm.email' type="email"
                                                class="form-control form-control-solid {{ $errors->has('negocioForm.email') ? 'is-invalid' : '' }}"
                                                id="email" required>
                                            <label for="email">Email</label>
                                        </div>
                                        @error('negocioForm.email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group has-validation">
                                        <div
                                            class="form-floating {{ $errors->has('negocioForm.address') ? 'is-invalid' : '' }}">
                                            <input wire:model.live='negocioForm.address' type="text"
                                                class="form-control form-control-solid {{ $errors->has('negocioForm.address') ? 'is-invalid' : '' }}"
                                                id="address" required>
                                            <label for="address">Direccion</label>
                                        </div>
                                        @error('negocioForm.address')
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

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.select2').on('change', function() {
                @this.set('selectedOption', $(this).val());
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#prueba2').select2();
            $('prueba2').on('change', function() {
                @this.set('selectedOption', $(this).val());
            });
        });
    </script>
    <script type="text/javascript">
        console.log('loaded');
    </script>
@endpush
