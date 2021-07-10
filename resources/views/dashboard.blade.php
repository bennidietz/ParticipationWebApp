<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-10">
        <!-- USERS -->
        <a href="{{ route('users') }}">
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://d39l2hkdp2esp1.cloudfront.net/img/photo/126425/126425_00_2x.jpg" alt="Mountain">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Benutzer</div>
                    <p class="text-gray-700 text-base">
                        Erhalten Sie hier einen Überblick über die Nutzer der Web-Plattform
                    </p>
                </div>
            </div>
        </a>

        <!-- PROJECTS -->
        <a href="{{ route('projects.index') }}">
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://www.societybyte.swiss/wp-content/uploads/2018/06/Projektmanagement_ret.jpg" alt="River">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Projekte</div>
                    <p class="text-gray-700 text-base">
                        Hier können Sie die Projekte bezogen auf die Corrensstraße ansehen und verwalten.
                    </p>
                </div>
            </div>
        </a>

        <!-- POLYGONS -->
        <a href="{{ route('polygons.index') }}">
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://www.planradar.com/wp-content/uploads/2019/05/stadtplanung.jpg.webp" alt="Forest">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Polygone</div>
                    <p class="text-gray-700 text-base">
                        Verwalten Sie hier räumliche Polygone, die Nutzern zur Berarbeitung bereitgesellt werden können.
                        Bezogen auf die jeweilige Fläche könnnen Nutzer Fragen beantworten und die Stadt Münster so einen detialierteren
                        Einblick in die Interessen ihrer Bürger*innen gewinnen.
                    </p>
                </div>
            </div>
        </a>

        <!--ASSETS-->
        <a href="{{ route('assets.index') }}">
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://www.stadt-muenster.de/fileadmin/user_upload/stadt-muenster/61_stadtplanung/pics/innenstadt/servatiiplatz_modell_900.jpg" alt="Forest">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Assets</div>
                    <p class="text-gray-700 text-base">
                        Hier können sogenannte Assets verwalten werden. Hiermit sind Modelle und Bilder gemeint, die als Vorlage gelten können,
                        auf die Bürger*innen zugreifen können, um diese auf der Corrensstraße zu platzieren.
                    </p>
                </div>
            </div>
        </a>
    </div>

    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-10">

        <div></div>
        <!-- SUGGESTIONS-->
        <a href="{{ route('suggestions.index') }}">
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://www.handelsblatt.com/images/digitales-modell-eines-hauses/26207420/2-format2020.jpg" alt="River">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Vorschläge</div>
                    <p class="text-gray-700 text-base">
                        Dies sind Ideen der Bürger*innen zur Platzierung von Objekten an konkreten Koordinaten an der Corrensstraße.
                        Diese Vorschläge können entweder auf Assets basieren oder selbst von dem Bürger oder der Bürgerin erstellt worden sein.
                    </p>
                </div>
            </div>
        </a>

        <!-- SPAMS -->
        <a href="{{ route('reports.index') }}">
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://bankinghub.de/wp-content/uploads/2017/08/iStock-527479747-1200x800.jpg" alt="Forest">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Meldungen</div>
                    <p class="text-gray-700 text-base">
                        Offen zugängliche Online-Plattformen laufen immer Gefahr, Opfer von Valdalismus und anderer unangemessener Inhalte zu sein. Um diese zu entdecken und
                        sperren haben wir eine "Als Spam markieren"-Funktion integriert, wie sie auch in diversen sozialen Netzwerken eingesetzt wird.
                        Diese Meldungen anderer Nutzer können hier eingesehen werden, um entsprechende Maßnahmen für die Beiträge zu treffen.
                    </p>
                </div>
            </div>
        </a>

        <div/>

</x-app-layout>
