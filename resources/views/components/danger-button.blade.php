<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex mr-auto px-4 py-2 bg-rose-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2  ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
