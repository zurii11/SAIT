<select {{ $attributes->merge(['class' => 'block w-full mt-1 text-sm border-gray-300 focus:border-indigo-300 focus:ring dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray']) }}>
    {{ $slot }}
</select>
