@php
    use function Filament\Support\prepare_inherited_attributes;

    $fieldWrapperView = $getFieldWrapperView();
    $datalistOptions = $getDatalistOptions();
    $extraAlpineAttributes = $getExtraAlpineAttributes();
    $extraAttributeBag = $getExtraAttributeBag();
    $hasInlineLabel = $hasInlineLabel();
    $id = $getId();
    $isConcealed = $isConcealed();
    $isDisabled = $isDisabled();
    $statePath = $getStatePath();
    $placeholder = $getPlaceholder();

    $inputAttributes = $getExtraInputAttributeBag()
            ->merge($extraAlpineAttributes, escape: false)
            ->merge([
                'autofocus' => $isAutofocused(),
                'disabled' => $isDisabled,
                'id' => $id,
                'inputmode' => $getInputMode(),
                'list' => $datalistOptions ? $id . '-list' : null,
                'max' => (! $isConcealed) ? $getMaxValue() : null,
                'maxlength' => (! $isConcealed) ? $getMaxLength() : null,
                'min' => (! $isConcealed) ? $getMinValue() : null,
                'minlength' => (! $isConcealed) ? $getMinLength() : null,
                'placeholder' => filled($placeholder) ? e($placeholder) : null,
                'readonly' => $isReadOnly(),
                'required' => $isRequired() && (! $isConcealed),
                'type' => "text",
                $applyStateBindingModifiers('wire:model') => $statePath,
            ], escape: false)
            ->class([
                'qrcode-field-input',
            ]);
@endphp
<x-dynamic-component
    :component="$fieldWrapperView"
    :field="$field"
    :has-inline-label="$hasInlineLabel"
    class="fi-fo-text-input-wrp"
>
    <div xmlns:x-filament="http://www.w3.org/1999/html"
         x-load-js="['{{ config('filament-qrcode-field.asset_js') }}']"
         x-on:close-modal.window="stopScanning()"
         x-data="{
        html5QrcodeScanner: null,
        stopScanning() {
           if(!this.html5QrcodeScanner) {
               return;
           }
           this.html5QrcodeScanner.pause();
           this.html5QrcodeScanner.clear();
           this.html5QrcodeScanner = null;
        },
        openScannerModal() {
            $dispatch('open-modal', { id: 'qrcode-scanner-modal-{{ $getName() }}' });
            this.startCamera();
        },
        closeScannerModal() {
            $dispatch('close-modal', { id: 'qrcode-scanner-modal-{{ $getName() }}' });
        },
        onScanSuccess(decodedText, decodedResult) {
            $wire.set('{{ $getStatePath() }}', decodedText);
            this.closeScannerModal();
        },
        startCamera() {
            this.html5QrcodeScanner = new Html5QrcodeScanner('reader-{{ $getName() }}', { fps: {{ config('filament-qrcode-field.scanner.fps') }}, qrbox: {width: {{ config('filament-qrcode-field.scanner.width') }}, height: {{ config('filament-qrcode-field.scanner.height') }}} }, false);
            this.html5QrcodeScanner.render(this.onScanSuccess.bind(this));
        }
     }"
    >
        <div class="qrcode-container">
            <x-filament::input.wrapper :disabled="$isDisabled" :valid="! $errors->has($statePath)"
                                       :attributes="prepare_inherited_attributes($extraAttributeBag)->class(['fi-fo-text-input'])">
                <input {{ $inputAttributes->class(['fi-input']) }} />
                <x-slot name="suffix">
                    <!-- Trigger Button for Filament Modal -->
                    <button type="button" @click="openScannerModal()" class="btn-scan-qrcode" aria-label="{{ __('filament-qrcode-field::qrcode-field.aria_label') }}">
                        @if($getExtraAttributes()['icon'] ?? null)
                            <span class="icon-wrapper">
                                <x-dynamic-component :component="$getExtraAttributes()['icon']" class="icon-dynamic"/>
                            </span>
                        @else
                            <svg class="icon-dynamic icon-wrapper" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 viewBox="0 0 16 16" fill="currentColor">
                                <path fill="currentColor" d="M6 0h-6v6h6v-6zM5 5h-4v-4h4v4z"></path>
                                <path fill="currentColor" d="M2 2h2v2h-2v-2z"></path>
                                <path fill="currentColor" d="M0 16h6v-6h-6v6zM1 11h4v4h-4v-4z"></path>
                                <path fill="currentColor" d="M2 12h2v2h-2v-2z"></path>
                                <path fill="currentColor" d="M10 0v6h6v-6h-6zM15 5h-4v-4h4v4z"></path>
                                <path fill="currentColor" d="M12 2h2v2h-2v-2z"></path>
                                <path fill="currentColor" d="M2 7h-2v2h3v-1h-1z"></path>
                                <path fill="currentColor" d="M7 9h2v2h-2v-2z"></path>
                                <path fill="currentColor" d="M3 7h2v1h-2v-1z"></path>
                                <path fill="currentColor" d="M9 12h-2v1h1v1h1v-1z"></path>
                                <path fill="currentColor" d="M6 7v1h-1v1h2v-2z"></path>
                                <path fill="currentColor" d="M8 4h1v2h-1v-2z"></path>
                                <path fill="currentColor" d="M9 8v1h2v-2h-3v1z"></path>
                                <path fill="currentColor" d="M7 6h1v1h-1v-1z"></path>
                                <path fill="currentColor" d="M9 14h2v2h-2v-2z"></path>
                                <path fill="currentColor" d="M7 14h1v2h-1v-2z"></path>
                                <path fill="currentColor" d="M9 11h1v1h-1v-1z"></path>
                                <path fill="currentColor" d="M9 3v-2h-1v-1h-1v4h1v-1z"></path>
                                <path fill="currentColor" d="M12 14h1v2h-1v-2z"></path>
                                <path fill="currentColor" d="M12 12h2v1h-2v-1z"></path>
                                <path fill="currentColor" d="M11 13h1v1h-1v-1z"></path>
                                <path fill="currentColor" d="M10 12h1v1h-1v-1z"></path>
                                <path fill="currentColor" d="M14 10v1h1v1h1v-2h-1z"></path>
                                <path fill="currentColor" d="M15 13h-1v3h2v-2h-1z"></path>
                                <path fill="currentColor" d="M10 10v1h3v-2h-2v1z"></path>
                                <path fill="currentColor" d="M12 7v1h2v1h2v-2h-2z"></path>
                            </svg>
                        @endif
                    </button>
                </x-slot>
            </x-filament::input.wrapper>
        </div>
        <!-- Filament Modal for QrCode Scanner -->
        <x-filament::modal id="qrcode-scanner-modal-{{ $getName() }}"
                           width="{{ config('filament-qrcode-field.modal.width') }}" :close-by-clicking-away="false">
            <x-slot name="header">
                <h2 class="qrcode-scanner-modal-title">
                    {{ __('filament-qrcode-field::qrcode-field.title', ['label' => $getLabel() ?? 'QrCode']) }}
                </h2>
            </x-slot>
            <div class="qrcode-scanner-modal-container">
                <div id="scanner-container">
                    <div id="reader-{{ $getName() }}" width="{{ config('filament-qrcode-field.reader.width') }}"
                         height="{{ config('filament-qrcode-field.reader.height') }}"></div>
                </div>
            </div>
            <x-slot name="footer">
                <x-filament::button @click="closeScannerModal()" color="danger">
                    {{ __('filament-qrcode-field::qrcode-field.close') }}
                </x-filament::button>
            </x-slot>
        </x-filament::modal>
    </div>
</x-dynamic-component>
