@if ($isOpenModalExport)
    <!--begin::Modal - Adjust Balance-->
    <div class="modal" tabindex="-1" role="dialog" style="display: {{ $isOpenModalExport ? 'block' : 'none' }}">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-350px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Export Products</h2>
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
                    <form class="form" wire:submit="exportProduct">
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
    <div class="modal-backdrop show"></div>
@endif
<!--end::Modal - New Card-->
@if ($isOpenModal)
    <!--begin::Modal - Add task-->
    <div>
        <div>
            <div class="modal" tabindex="-1" role="dialog" style="display: {{ $isOpenModal ? 'block' : 'none' }}">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-950px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Add Product</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div wire:click="$toggle('isOpenModal')" class="btn btn-icon btn-sm btn-active-icon-primary"
                                data-kt-products-modal-action="close">
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
                                wire:submit.prevent="{{ isset($productForm->product) ? 'updateProduct' : 'createProduct' }}">
                                <!--begin::Scroll-->
                                <div class="d-flex flex-column px-0 px-lg-5">
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <select wire:model.live="productForm.line_id"
                                                    class="form-control {{ $errors->has('productForm.line_id') ? 'is-invalid' : '' }}"
                                                    id="line_id" aria-label="line_id">
                                                    <option selected>--select--</option>
                                                    @forelse ($this->lines as $line)
                                                        <option value="{{ $line->id }}">
                                                            {{ $line->name }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                <label for="line_id">Seleccione linea producto</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <!--begin::Input-->
                                            <div class="form-floating">
                                                <select wire:model.live="productForm.category_id"
                                                    class="form-control {{ $errors->has('productForm.category_id') ? 'is-invalid' : '' }}"
                                                    id="category_id" aria-label="category_id">
                                                    <option selected>--select--</option>
                                                    @forelse ($this->categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                <label for="category_id">Seleccione category producto</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <select wire:model.live="productForm.brand_id"
                                                    class="form-control {{ $errors->has('productForm.brand_id') ? 'is-invalid' : '' }}"
                                                    id="brand_id" aria-label="brand_id">
                                                    <option selected>--select--</option>
                                                    @forelse ($this->brands as $brand)
                                                        <option value="{{ $brand->id }}">
                                                            {{ $brand->name }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                <label for="category_id">Seleccione marca producto</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <div
                                                class="form-floating {{ $errors->has('productForm.code') ? 'is-invalid' : '' }}">
                                                <input wire:model.live='productForm.code' type="text"
                                                    class="form-control {{ $errors->has('productForm.code') ? 'is-invalid' : '' }}"
                                                    id="code" required>
                                                <label for="code">Codigo Unico</label>
                                            </div>
                                            @error('productForm.code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.code_fabrica') ? 'is-invalid' : '' }}">
                                                    <input wire:model.live='productForm.code_fabrica' type="text"
                                                        class="form-control {{ $errors->has('productForm.code_fabrica') ? 'is-invalid' : '' }}"
                                                        id="code_fabrica" required>
                                                    <label for="code_fabrica">Codigo de Fabrica</label>
                                                </div>
                                                @error('productForm.code_fabrica')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.code_peru') ? 'is-invalid' : '' }}">
                                                    <input wire:model.live='productForm.code_peru' type="text"
                                                        class="form-control {{ $errors->has('productForm.code_peru') ? 'is-invalid' : '' }}"
                                                        id="code_peru" required>
                                                    <label for="code_peru">Codigo de Fabrica</label>
                                                </div>
                                                @error('productForm.code_peru')
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
                                                    class="form-floating {{ $errors->has('productForm.price_compra') ? 'is-invalid' : '' }}">
                                                    <input wire:model.live='productForm.price_compra' type="number"
                                                        min="0" step=".01"
                                                        class="form-control {{ $errors->has('productForm.price_compra') ? 'is-invalid' : '' }}"
                                                        id="price_compra" required>
                                                    <label for="price_compra">Precio de compra</label>
                                                </div>
                                                @error('productForm.price_compra')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.porcentaje') ? 'is-invalid' : '' }}">
                                                    <input wire:model.live='productForm.porcentaje' type="number"
                                                        min="0" step="1"
                                                        class="form-control {{ $errors->has('productForm.porcentaje') ? 'is-invalid' : '' }}"
                                                        id="porcentaje" required>
                                                    <label for="porcentaje">Precio de compra</label>
                                                </div>
                                                @error('productForm.porcentaje')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.price_venta') ? 'is-invalid' : '' }}">
                                                    <input wire:model.live='productForm.price_venta' type="number"
                                                        min="0" step=".01"
                                                        class="form-control {{ $errors->has('productForm.price_venta') ? 'is-invalid' : '' }}"
                                                        id="price_venta" required>
                                                    <label for="price_venta">Precio de Venta</label>
                                                </div>
                                                @error('productForm.price_venta')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.stock') ? 'is-invalid' : '' }}">
                                                    <input wire:model.live='productForm.stock' type="number"
                                                        min="0" step="1"
                                                        class="form-control {{ $errors->has('productForm.stock') ? 'is-invalid' : '' }}"
                                                        id="stock" required>
                                                    <label for="stock">Stock actual</label>
                                                </div>
                                                @error('productForm.stock')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.dias_entrega') ? 'is-invalid' : '' }}">
                                                    <input wire:model.live='productForm.dias_entrega' type="number"
                                                        min="0" step="1"
                                                        class="form-control {{ $errors->has('productForm.dias_entrega') ? 'is-invalid' : '' }}"
                                                        id="dias_entrega" required>
                                                    <label for="dias_entrega">Dias de entrega</label>
                                                </div>
                                                @error('productForm.dias_entrega')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.garantia') ? 'is-invalid' : '' }}">
                                                    <input wire:model.live='productForm.garantia' type="number"
                                                        min="0" step="1"
                                                        class="form-control {{ $errors->has('productForm.garantia') ? 'is-invalid' : '' }}"
                                                        id="garantia" required>
                                                    <label for="garantia">Garantia meses</label>
                                                </div>
                                                @error('productForm.garantia')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.description') ? 'is-invalid' : '' }}">
                                                    <textarea wire:model.live='productForm.description'
                                                        class="form-control {{ $errors->has('productForm.description') ? 'is-invalid' : '' }}" id="description" required></textarea>
                                                    <label for="description">Descripcion</label>
                                                </div>
                                                @error('productForm.description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.observaciones') ? 'is-invalid' : '' }}">
                                                    <textarea wire:model.live='productForm.observaciones'
                                                        class="form-control {{ $errors->has('productForm.observaciones') ? 'is-invalid' : '' }}" id="observaciones"></textarea>
                                                    <label for="observaciones">Observaciones</label>
                                                </div>
                                                @error('productForm.observaciones')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.image') ? 'is-invalid' : '' }}">
                                                    <input wire:model.live='productForm.image' type="file"
                                                        class="form-control {{ $errors->has('productForm.image') ? 'is-invalid' : '' }}"
                                                        id="image"></input>
                                                    <label for="image">Imagen</label>
                                                </div>
                                                @error('productForm.image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group has-validation">
                                                <div
                                                    class="form-floating {{ $errors->has('productForm.archivo') ? 'is-invalid' : '' }}">
                                                    <input wire:model.live='productForm.archivo' type="file"
                                                        class="form-control {{ $errors->has('productForm.archivo') ? 'is-invalid' : '' }}"
                                                        id="archivo"></input>
                                                    <label for="archivo">Especificaciones</label>
                                                </div>
                                                @error('productForm.archivo')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Actions-->
                                <div class="text-end pt-2">
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
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal-backdrop show"></div>
    <!--end::Modal - Add task-->
@endif
