<x-guest-layout>

    <section class="pt-24 max-w-7xl mx-auto">
        <h2 class="mb-4 text-2xl font-bold uppercase tracking-wider text-green-600">{{ __('Nachhaltige Mobilität') }}</h2>
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-3">
            <a href="{{ route('mobility.luftverschmutzung') }}">
                <x-text-card-view text="Luftverschmutzung" imageUrl="https://www.handelsblatt.com/images/smart-city/24668560/2-format2020.jpg"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.sharing') }}">
                <x-text-card-view text="Sharing" imageUrl="https://www.handelsblatt.com/images/smart-city/24668560/2-format2020.jpg"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.versiegelung') }}">
                <x-text-card-view text="Versiegelung" imageUrl="https://www.handelsblatt.com/images/smart-city/24668560/2-format2020.jpg"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.barrierefreiheit') }}">
                <x-text-card-view text="Barrierefreiheit" imageUrl="https://www.handelsblatt.com/images/smart-city/24668560/2-format2020.jpg"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.sicherheit') }}">
                <x-text-card-view text="Sicherheit" imageUrl="https://www.handelsblatt.com/images/smart-city/24668560/2-format2020.jpg"></x-text-card-view>
            </a>
            <a href="{{ route('mobility.laermbelaestigung') }}">
                <x-text-card-view text="Lärmbelästigung" imageUrl="https://www.handelsblatt.com/images/smart-city/24668560/2-format2020.jpg"></x-text-card-view>
            </a>
        </div>
    </section>

</x-guest-layout>
