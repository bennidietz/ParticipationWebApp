<div class="p-6 mb-12 border-l-4 border-green-300 shadow bg-gray-100" data-aos="slide-up">
        <div class=" w-full lg:max-w-full lg:flex">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{ $image ?? "" }}'); height: 200px; width: 200px; background-size: cover;" title="Mountain">
            </div>
            <div class="bg-gray-100 lg:max-w-full w-full rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <h2 class="uppercase font-bold tracking-wider">{{ $title }}</h2>
                <p class="mb-8">{{ $text }}</p>
                @if ($url)
                    <div class="flex justify-end items-center">
                        <a href="{{ $url  }}">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{ $btntext ?? "Mehr Informationen" }}</button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
</div>
