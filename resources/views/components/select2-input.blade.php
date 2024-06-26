@props(['label', 'for', 'data'])
<label for="{{ $for }}" class="block text-sm font-medium text-gray-900 dark:text-white">
    {{ $label }}
</label>
<select  id="select2" {!! $attributes->merge([
    'class' =>
        'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
]) !!}>
    {{ $slot }}
</select>

@push('js')
    <script>
        $(document).ready(function() {
            $('#select2').select2();
            $('#select2').on('change', function() {
                @this.set('{{ $data }}', $(this).val());
            });
        });
    </script>
@endpush
