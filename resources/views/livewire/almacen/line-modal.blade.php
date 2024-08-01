@if ($isOpenModal)
    <x-modal title="{{ isset($lineForm->line) ? 'Update Line' : 'Create Line' }}" maxWidth='2xl'>
        <form class="form" wire:submit="{{ isset($lineForm->line) ? 'updateLine' : 'createLine' }}">
            <div x-data="{ openTab: 1 }">
                <div class="w-full bg-white dark:bg-gray-800">
                    <div class="flex p-2 bg-white dark:bg-gray-800 dark:text-white rounded-lg shadow-md">
                        <a x-on:click="openTab = 1" :class="{ 'bg-purple-600 text-white': openTab === 1 }"
                            class="flex-1 py-2 px-4 rounded-md focus:outline-none  focus:shadow-outline-blue transition-all duration-300">
                            Detalles <i class="fa-solid fa-list-check"></i></a>
                        <a x-on:click="openTab = 2" :class="{ 'bg-purple-600 text-white': openTab === 2 }"
                            class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                            Archivos <i class="fa-solid fa-folder-open"></i></a>
                    </div>
                    <div x-show="openTab === 1"
                        class="transition-all duration-300 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md border-4 dark:border-gray-700 space-y-2">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <x-text-input wire:model.live='lineForm.code' type='text' for='code'
                                    label='Codigo' placeholder='Ingrese codigo' />
                                @error('lineForm.code')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-text-input wire:model.live='lineForm.name' type='text' for='name'
                                    label='Nombre' placeholder='Ingrese nombre' />
                                @error('lineForm.name')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div x-show="openTab === 2"
                        class="transition-all duration-300 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md border-4 dark:border-gray-700 space-y-2">

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="logo"
                                    class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-semibold">
                                                Logo
                                            </span>
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG (MAX. 800x400px)</p>
                                    </div>
                                    <input wire:model.live='lineForm.logo' id="logo" type="file"
                                        class="hidden" />
                                </label>
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="fondo"
                                    class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-semibold">
                                                Fondo
                                            </span>
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG (MAX. 800x400px)</p>
                                    </div>
                                    <input wire:model.live='lineForm.fondo' id="fondo" type="file"
                                        class="hidden" />
                                </label>
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="archivo"
                                    class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-semibold">
                                                Archivo PDF
                                            </span>
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                                    </div>
                                    <input wire:model.live='lineForm.archivo' id="archivo" type="file"
                                        class="hidden" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 md:p-5 space-y-4">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">

                    </div>
                    <div class="col-span-6 sm:col-span-6">

                    </div>
                </div>
            </div>

            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <x-button.button-danger type="button" wire:click="$toggle('isOpenModal')">
                    Cancel
                </x-button.button-danger>
                <x-button.button-save type='submit'>
                    Guardar
                </x-button.button-save>
            </div>
        </form>
    </x-modal>
@endif
