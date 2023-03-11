<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex mr-auto px-4 py-1 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white p-1 sm:px-4 border border-blue-500 hover:border-transparent rounded']) }}>
    {{ $slot }}
</button>
