<x-guest-layout>

    <section class="min-h-screen w-full relative overflow-hidden shadow">
        <div class="h-full w-full absolute top-0 left-0">
            <video autoplay muted loop>
                <source src="{{ asset('img/video.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
            <div class="w-full p-8 flex justify-center items-left text-white" data-aos="zoom-in">
                <div class="w-full md:w-3/5 text-lg">
                    <h1 class="mb-4 text-2xl">{{ __('Lebensraum Corrensstraße') }}</h1>
                    <p class="mb-4">{{ __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quod hic excepturi adipisci aut eveniet aperiam, perspiciatis id consequatur unde delectus? Nesciunt eligendi id necessitatibus, voluptates sit cumque, fuga labore quis, voluptas neque assumenda libero magnam. Assumenda similique quaerat modi officia tenetur delectus tempore vitae dignissimos cupiditate nulla molestiae, quasi sint dolor, optio voluptate architecto ducimus id. Architecto, quam corporis! Eaque, corrupti. Sapiente, ea tenetur suscipit. Officiis consequatur enim incidunt voluptas in, blanditiis quaerat sint ea? Laboriosam beatae, incidunt saepe voluptates, quod mollitia, odit id reprehenderit ipsam blanditiis cum corrupti atque aut veritatis. Rerum vero quae commodi minima aliquid magnam?') }}</p>
                    <button class="py-3 px-2 text-sm uppercase border rounded transition hover:bg-white hover:text-black">{{ __('Lorem ipsum') }}</button>
               </div>
            </div>
        </div>
    </div>

    <section class="py-24 max-w-7xl mx-auto">
        <h2 class="mb-4 text-2xl font-bold uppercase tracking-wider text-green-600">{{ __('Roadmap') }}</h2>
        <x-info-panel title="Some titile" text="Lorem ipsum dolor sit amet, consectetur adipisicing elit. In consectetur libero voluptatum quisquam nam totam, at nemo accusamus nobis accusantium similique incidunt quos deserunt maxime quod ex reiciendis aperiam autem suscipit minus, ratione! Quo, qui cum molestias amet fuga repellat quis, distinctio minus nesciunt, officia expedita. Nesciunt quibusdam eveniet placeat?" />
        <x-info-panel title="Some titile" text="Lorem ipsum dolor sit amet, consectetur adipisicing elit. In consectetur libero voluptatum quisquam nam totam, at nemo accusamus nobis accusantium similique incidunt quos deserunt maxime quod ex reiciendis aperiam autem suscipit minus, ratione! Quo, qui cum molestias amet fuga repellat quis, distinctio minus nesciunt, officia expedita. Nesciunt quibusdam eveniet placeat?" />
        <x-info-panel title="Some titile" text="Lorem ipsum dolor sit amet, consectetur adipisicing elit. In consectetur libero voluptatum quisquam nam totam, at nemo accusamus nobis accusantium similique incidunt quos deserunt maxime quod ex reiciendis aperiam autem suscipit minus, ratione! Quo, qui cum molestias amet fuga repellat quis, distinctio minus nesciunt, officia expedita. Nesciunt quibusdam eveniet placeat?" />
        <x-info-panel title="Some titile" text="Lorem ipsum dolor sit amet, consectetur adipisicing elit. In consectetur libero voluptatum quisquam nam totam, at nemo accusamus nobis accusantium similique incidunt quos deserunt maxime quod ex reiciendis aperiam autem suscipit minus, ratione! Quo, qui cum molestias amet fuga repellat quis, distinctio minus nesciunt, officia expedita. Nesciunt quibusdam eveniet placeat?" />
        <x-info-panel title="Some titile" text="Lorem ipsum dolor sit amet, consectetur adipisicing elit. In consectetur libero voluptatum quisquam nam totam, at nemo accusamus nobis accusantium similique incidunt quos deserunt maxime quod ex reiciendis aperiam autem suscipit minus, ratione! Quo, qui cum molestias amet fuga repellat quis, distinctio minus nesciunt, officia expedita. Nesciunt quibusdam eveniet placeat?" />
    </section>

</x-guest-layout>
