<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex mr-auto px-1 lg:px-2 py-1 lg:py-1 bg-teal-400 rounded font-semibold text-white tracking-widest hover:bg-teal-500 active:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-700 focus:ring-offset-2 ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
