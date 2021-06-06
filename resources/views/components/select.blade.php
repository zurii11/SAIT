<select {{ $attributes->merge(['class' => 'block w-full text-sm border-gray-300 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:outline-none  dark:focus:shadow-outline-gray']) }}>
    {{ $slot }}
</select>
