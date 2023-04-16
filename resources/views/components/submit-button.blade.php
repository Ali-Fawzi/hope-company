<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex mr-auto px-2 lg:px-4 py-1 lg:py-2 bg-emerald-500  border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-emerald-400 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2  ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
