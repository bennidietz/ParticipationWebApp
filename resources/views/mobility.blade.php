<x-guest-layout>

    <section class="pl-5 pt-24 max-w-7xl mx-auto">
        <h2 class="mb-8 text-2xl font-bold uppercase tracking-wider text-green-600">{{ __('Nachhaltige Mobilität') }}</h2>
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-3">
            <a href="{{ route('mobility.luftverschmutzung') }}">
                <x-text-card-view text="Luftverschmutzung" imageUrl="<?php echo e(asset('img/content/mobility/luftverschmutzung_1.png')); ?>"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.scienceboulevard') }}">
                <x-text-card-view text="Science Boulevard" imageUrl="<?php echo e(asset('img/content/mobility/science_boulevard_2.png')); ?>"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.versiegelung') }}">
                <x-text-card-view text="Versiegelung" imageUrl="<?php echo e(asset('img/content/mobility/versiegelung_1.png')); ?>"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.fahrrad') }}">
                <x-text-card-view text="Fahrrad" imageUrl="<?php echo e(asset('img/content/mobility/fahrrad_1.jpg')); ?>"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.abstellanlagen') }}">
                <x-text-card-view text="Abstellanlagen und Ladestationen" imageUrl="<?php echo e(asset('img/content/mobility/abstellmoeglichkeiten_1.png')); ?>"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.sharing') }}">
                <x-text-card-view text="Sharing" imageUrl="<?php echo e(asset('img/content/mobility/sharing_1.jpg')); ?>"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.barrierefreiheit') }}">
                <x-text-card-view text="Barrierefreiheit" imageUrl="<?php echo e(asset('img/content/mobility/barrierefreiheit_1.jpg')); ?>"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.sicherheit') }}">
                <x-text-card-view text="Sicherheit" imageUrl="<?php echo e(asset('img/content/mobility/sicherheit_1.jpg')); ?>"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.laermbelaestigung') }}">
                <x-text-card-view text="Lärmbelästigung" imageUrl="<?php echo e(asset('img/content/mobility/laermbelaestigung_1.png')); ?>"></x-text-card-view>
            </a>
        </div>
    </section>

</x-guest-layout>
