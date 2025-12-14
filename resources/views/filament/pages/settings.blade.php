<x-filament-panels::page>
    <div class="flex flex-col gap-4">
        <div class="text-sm text-gray-600 dark:text-gray-300">
            Current language: <span class="font-medium">{{ app()->getLocale() }}</span>
        </div>

        <div class="flex gap-2">
            <x-filament::button wire:click="setLocale('en')" color="gray">
                English
            </x-filament::button>
            <x-filament::button wire:click="setLocale('ar')" color="gray">
                العربية
            </x-filament::button>
        </div>
    </div>
</x-filament-panels::page>
