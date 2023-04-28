<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex mr-auto px-4 py-1 bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white p-1 sm:px-4 rounded']) }}>
    {{ $slot }}
</button>
