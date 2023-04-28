<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex mr-auto px-1 lg:px-2 py-1 lg:py-1 rounded text-base text-red-500 tracking-widest hover:bg-red-500 hover:text-white active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2  ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
