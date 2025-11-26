@props(['value'])

<<<<<<< HEAD
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
=======
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
>>>>>>> 1033cc00b0f653bc28941259b58825fd80cf1283
    {{ $value ?? $slot }}
</label>
