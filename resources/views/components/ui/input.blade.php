@props(['name', 'label' => null, 'type' => 'text', 'value' => null, 'placeholder' => null])
<label class="block">
    @if($label)
        <span class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200">{{ $label }}</span>
    @endif
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'h-12 w-full rounded-2xl border-slate-200 bg-white px-4 text-sm shadow-sm transition focus:border-slate-950 focus:ring-4 focus:ring-slate-300/30 dark:border-slate-800 dark:bg-slate-950 dark:focus:border-white']) }}
    >
    @error($name)
        <span class="mt-2 block animate-pulse text-sm font-medium text-red-600">{{ $message }}</span>
    @enderror
</label>
