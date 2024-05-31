<div>
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/dashboard"
                                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">
                                    Config
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">
                                    Users
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    All products
                </h1>
            </div>
            <div class="sm:flex">
                <div
                    class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative mt-1 lg:w-64 xl:w-96">
                        <input type="text" wire:model.live='search'
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search for products">
                    </div>
                    <div class="flex pl-0 mt-3 space-x-1 sm:pl-2 sm:mt-0">
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <x-purple-button wire:click="create">
                        Create
                    </x-purple-button>
                    <x-upload-button>
                        Import
                    </x-upload-button>
                    <x-download-button>
                        Export
                    </x-download-button>
                    @if ($isOpenModal)
                        <x-modal title="{{ isset($productForm->product) ? 'Update product' : 'Create product' }}"
                            maxWidth='4xl'>
                            <form class="form"
                                wire:submit="{{ isset($productForm->product) ? 'updateProduct' : 'createProduct' }}">
                                <div class="p-4 md:p-5 space-y-4">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-select-input wire:model.live="productForm.line_id" for='rol'
                                                label='Seleccione una linea'>
                                                <option>*Select option</option>
                                                @forelse ($this->lines as $line)
                                                    <option value="{{ $line->id }}">{{ $line->name }}</option>
                                                @empty
                                                @endforelse
                                            </x-select-input>
                                            @error('userForm.line_id')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-select-input wire:model.live="productForm.category_id" for='rol'
                                                label='Seleccione una categoria'>
                                                <option>*Select option</option>
                                                @forelse ($this->categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @empty
                                                @endforelse
                                            </x-select-input>
                                            @error('userForm.category_id')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-select-input wire:model.live="productForm.brand_id" for='rol'
                                                label='Seleccione un marca'>
                                                <option>*Select option</option>
                                                @forelse ($this->brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @empty
                                                @endforelse
                                            </x-select-input>
                                            @error('userForm.brand_id')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-text-input wire:model.live='productForm.code' type='text'
                                                for='code' label='Codigo Unico' placeholder='Ingrese codigo'
                                                required />
                                            @error('productForm.code')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-text-input wire:model.live='productForm.code_fabrica' type='text'
                                                for='code_fabrica' label='Codigo fabrica'
                                                placeholder='Ingrese codigo fabrica' required />
                                            @error('productForm.code_fabrica')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-text-input wire:model.live='productForm.code_peru' type='text'
                                                for='code_peru' label='Codigo fabrica'
                                                placeholder='Ingrese codigo CM' required />
                                            @error('productForm.code_peru')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-text-input wire:model.live='productForm.price_compra' type='number'
                                                min="0" step=".01" for='price_compra'
                                                label='Precio de Compra' placeholder='Ingrese precio Compra'
                                                required />
                                            @error('productForm.price_compra')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-text-input wire:model.live='productForm.porcentaje' type='number'
                                                min="0" step="0.1" for='porcentaje' label='Porcentaje'
                                                placeholder='Ingrese porcentaje' required />
                                            @error('productForm.porcentaje')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-text-input wire:model.live='productForm.price_venta' type='number'
                                                min="0" step=".01" for='price_venta'
                                                label='Precio de Venta' placeholder='Ingrese precio Venta' required />
                                            @error('productForm.price_venta')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-text-input wire:model.live='productForm.stock' type='number'
                                                min="0" step="1" for='stock' label='Stock'
                                                placeholder='Ingrese Stock' required />
                                            @error('productForm.stock')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-text-input wire:model.live='productForm.dias_entrega' type='number'
                                                min="0" step="1" for='dias_entrega' label='Porcentaje'
                                                placeholder='Ingrese dias entrega' required />
                                            @error('productForm.dias_entrega')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-text-input wire:model.live='productForm.garantia' type='number'
                                                min="0" step="1" for='garantia'
                                                label='Meses de garantia' placeholder='Ingrese garantia' required />
                                            @error('productForm.garantia')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <x-area-input wire:model.live='productForm.description' type='text'
                                                min="0" step="1" for='description' label='Description'
                                                placeholder='Ingrese description' required />
                                            @error('productForm.description')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <x-area-input wire:model.live='productForm.observaciones' type='text'
                                                min="0" step="1" for='observaciones'
                                                label='Observaciones' placeholder='Ingrese observaciones' />
                                            @error('productForm.observaciones')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="dropzone-file"
                                                class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">
                                                            Seleccione una Imagen
                                                        </span>
                                                    </p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG
                                                        or GIF (MAX. 800x400px)</p>
                                                </div>
                                                <input wire:model.live='productForm.image' id="dropzone-file"
                                                    type="file" class="hidden" />
                                            </label>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="dropzone-file"
                                                class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">
                                                            Seleccione un archivo PDF
                                                        </span>
                                                    </p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">PDF (MAX.
                                                        800x400px)</p>
                                                </div>
                                                <input wire:model.live='productForm.archivo' id="dropzone-file"
                                                    type="file" class="hidden" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <x-danger-button type="button" wire:click="$toggle('isOpenModal')">
                                        Cancel
                                    </x-danger-button>
                                    <x-primary-button type='submit'>
                                        Guardar
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-2 dark:bg-gray-800">
        <div class="items-center sm:flex">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <x-select-input wire:model.live.debounce.200ms="lineFilter" for='rol'
                        label=''>
                        <option>*Lineas</option>
                        @forelse ($this->lines as $line)
                            <option value="{{ $line->id }}">{{ $line->name }}</option>
                        @empty
                        @endforelse
                    </x-select-input>
                </div>
                <div class="relative">
                    <x-select-input wire:model.live.debounce.200ms="categoryFilter" for='rol'
                        label=''>
                        <option>*Categorias</option>
                        @forelse ($this->categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        @endforelse
                    </x-select-input>
                </div>
                <div class="relative">
                    <x-select-input wire:model.live.debounce.200ms="brandFilter" for='rol'
                        label=' '>
                        <option>*Marcas</option>
                        @forelse ($this->brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @empty
                        @endforelse
                    </x-select-input>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.almacen.product-table')
</div>
