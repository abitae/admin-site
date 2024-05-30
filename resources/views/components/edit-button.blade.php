<button {{ 
$attributes->merge([
    'class' => 'inline-flex items-center px-2 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    <i class="fa-regular fa-pen-to-square"></i>
    {{ $slot }}
</button>
