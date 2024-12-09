<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-blue-500 rounded-md font-semibold text-xs text-white dark:text-black uppercase tracking-widest hover:text-white hover:bg-blue-500 dark:hover:bg-blue-500 focus:bg-blue-500 dark:focus:bg-blue-500 active:bg-white  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-white transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
