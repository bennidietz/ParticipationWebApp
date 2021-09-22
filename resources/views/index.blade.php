<x-guest-layout>

    <section class="min-h-screen w-full relative overflow-hidden shadow">
        <video class="absolute" style="position: absolute; top: 50%; left: 50%; -webkit-transform: translateX(-50%) translateY(-50%); transform: translateX(-50%) translateY(-50%); min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: 0; overflow: hidden; max-width: none;" autoplay muted loop>
            <source src="{{ asset('img/video.mp4') }}" type="video/mp4">
        </video>
        <div class="w-full h-full absolute top-0 left-0 bg-gray-800 bg-opacity-60 flex justify-center items-center">
            <div class="w-full p-8 flex justify-center items-left text-white" data-aos="zoom-in">
                <div class="w-full md:w-3/5 text-lg">
                    <h1 class="mb-4 text-5xl">Correns<strong style="color: #7ec098">Lab</strong></h1>

                    <p class="mb-2 text-lg">{{ __('Der öffentliche Raum ist ein wichtiger Grundpfeiler für eine lebenswerte und klimagerechte Stadt Münster. Bisher sind Straßen vor allem Zufarts-, Verbindungswege und Orte der Moilität. Sie können aber viel mehr sein.') }}</p>

                    <p class="mb-2 text-lg">{{ __('In der Woche vom 29. September bis 2. Oktober präsentieren Studierende Ansätze Straßenraum neu zu denken auf einem Teilstück der Corrensstraße. Laufen Sie schon jetzt virtuell über die Corrensstraße und entdecke Sie die unterschiedlichen Elemente eines nachhaltigen Straßenraums von morgen.') }}</p>
                    <div class="flex">
                        <a href="{{ route('corrensweek') }}">
                            <button class="py-2 px-3 text-lg mt-4 border rounded transition hover:bg-white hover:text-black">{{ __('Zum Programm') }}</button>
                        </a>
                        <a href="{{ route('map') }}">
                            <button class="ml-4 py-2 px-3 text-lg mt-4 border rounded transition hover:bg-white hover:text-black">{{ __('Zur Übersichtskarte') }}</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 max-w-7xl mx-auto">
        <img class="mb-6 mx-auto block" src="{{ asset('img/logo.png') }}" />
        <h2 class="mb-4 text-2xl font-bold uppercase tracking-wider text-green-600">{{ __('Über das CorrensLab') }}</h2>
        <p class="mb-2 text-sm">{{ __('Münsters Wissensquartiere sind in Bewegung und neue Orte für Wissen, Wohnen, Leben und Arbeiten entstehen. Diese Veränderung muss heutigen Anforderungen an eine klimafreundliche und gemeinwohlorientierte aber auch soziale Stadt Münster gerecht werden.') }}</p>
        <p class="mb-2 text-sm">{{ __('Das haben Studierende von FH und WWU in einem gemeinsamen Lehrprojekt auf Initative der Allianz für Wissenschaft Münster ein Semester lang erkundet und experimentiert.') }}</p>
        <p class="mb-2 text-sm">{{ __('Die Corrensstraße führt von der Von-Esmach-Straße zum Horstmarer Landweg. Sie ist ein Verbindungsglied der Urbanen Wissenschaftsstadt. Die Zukunft Münsters ist eng verknüpft mit der Entwicklung der Wissenschaft in der Stadt. Gleichzeitig sind die urbanen Qualitäten Münsters ein wesentlicher Standortfaktor für die Entwicklung der Wissenschafts- und Forschungsinstitutionen. Wie kann es gelingen ein Quartier zu entwickeln in dem Arbeiten, Forschen, Freizeit und Wohnen Hand in Hand gehen?') }}</p>
        <p class="mb-2 text-sm">{{ __('Um diese Fragen zu klären wurde in Zusammenarbeit zwischen der Stadt Münster, Fachhochschule Münster und Uni Münster das Projekt CorrensLab ins Leben gerufen. Verschiedenste Akteur*innen machen sich bei diesem Projekt Gedanken, wie sich die Corrensstraße verändern könnte. In welche Richtung ist offen. ') }}</p>
        <p class="mb-2 text-sm">{{ __('Diese Webseite wurde konzipiert um auch Sie nach Ihrer Meinung zu fragen und Ideen der Einzelnen Teilnehmenden zu visualisieren. ') }}</p>
        <p class="mb-2 text-sm">{{ __('Was sind Ihre Anforderungen an ein Quartier von morgen? ') }}</p>
        <p class="mb-2 text-sm">{{ __('Wie schaffen wir Aufenthaltsqualität an und auf der Corrensstraße? ') }}</p>
        <p class="mb-2 text-sm">{{ __('Wie wollen Sie, dass die Corrensstraße in Zukunft aussieht?') }}</p>
        <p class="mb-2 text-sm">{{ __('Ihre Meinung zählt. Schauen Sie rein und gestalten Sie die Corrensstraße von Morgen!') }}</p>
        <x-info-image-panel :image="asset('img/plakat_min.png')" title="" text="" />
        <a href="{{ route('corrensweek') }}">
            <button class="py-2 px-3 text-xl mt-2 mb-4 border border-gray-400 rounded transition hover:bg-green-200 hover:text-black">{{ __('Mehr zur Correnswoche') }}</button>

        </a>
        <h2 class="mt-8 mb-4 text-2xl font-bold uppercase tracking-wider text-green-600">{{ __('Rund um die Corrensstraße') }}</h2>

        <x-info-image-panel :image="asset('img/content/wem_gehoert_was.png')" title="Wem gehört Was?" text="Wem gehört eigentlich Was? Eine Frage, die bei der Stadtplanung nicht unwichtig ist. Denn wenn Veränderungen angestoßen werden muss sich mit dem*der Eigentümer*in abgesprochen und verhandelt werden. Genauere Angaben über die Besitzverhältnisse im Quartier finden Sie im Abschlussbericht 'Zukunft der Wissenschaftsstadt' auf der Seite 9." url="https://www.muensterzukunft.de/_Resources/Persistent/e/4/7/f/e47f80f2566ae414e15fc582f5e9fb513ed53612/IIW_2020_Abschlussbericht.pdf"/>
        <x-info-image-panel image="https://www.muensterzukunft.de/_Resources/Persistent/e/f/1/8/ef187d2d1ea64706ecd05d594c6921dd1be769aa/UC_IIW_ScienceBoulevard.jpg" title="Die Corrensstraße als teil des Science Boulevards"  text="Münsters Westen soll neu vernetzt werden. Das bedeutet, Zusammenhänge aufzuzeigen, wo sie bisher nicht sichtbar sind, und für den Alltag neue Orte und Wege zu schaffen, die zum Austausch einladen und eine entspannte, nachhaltige Mobilität ermöglichen.Die Wissenschaftsstadt Münster will also einen Bogen schlagen von Kunst und Kreativität zu High Tech und Naturwissenschaften zu Medizin und Gesundheit. Das projekt wird bereits verfolgt -für die nächsten 10 Jahre sind bereits bauliche Investitionsabsichten von wissenschaftlichen Einrichtungen in Höhe von rund 1,6 Mrd EUR in diesem Bereich bekannt – es werden perspektivisch eher mehr." url="https://www.muensterzukunft.de/aktuelles/science-boulevard.html"/>
        <x-info-image-panel image="https://www.muensterzukunft.de/_Resources/Persistent/8/4/1/4/84149af6b9c1ebc5aa5fe08b4592e5fc186dc530/Urbane-Qualitaeten-zukuenftiger-Stadtquartiere-.png" title="Wie können die Quartiere der Zukunft aussehen?" text="Jeder Ort hat unterschiedliche Schwerpunkte in seiner Funktion und Ausgestaltung: Ein ausgewogener Mix von Forschung & Produktion, vielfältigem Wohnen, Gastronomie & Handel, gemeinschaftlichen Räumen und öffentlichen Freiflächen wird auf die jeweiligen Rahmenbedingungen und Bedürfnisse vor Ort abgestimmt. Dennoch gibt es Qualitäten, die jedes Quartier der Zukunft auszeichnen sollen." url="https://www.muensterzukunft.de/aktuelles/zukunftsquartiere.html"/>
        <x-info-image-panel image="https://www.stadt-muenster.de/fileadmin/user_upload/stadt-muenster/13_zukuenfte/pics/muenster_magazin_200.jpg" title="Verknüpfung der Corrensstraße mit: Altstadt – Schlossareal – Naturwissenschaftliche Institute / FH-Zentrum/Universitätsklinikum/Wissenschafts- und Technologiepark"  text="Die räumliche und funktionale Aufwertung der Verbindungen zwischen der Altstadt, dem Schlossareal und darüber hinaus in den Nordwesten der inneren Stadt ist eines der zentralen Maßnahmenpakete für eine verbesserte Einbindung der urbanen Wissensquartiere in den Stadtraum. Ein Beispiel, wie diese verknüpfung aussehen könnte finden Sie in der PDF-Datei." url="https://www.stadt-muenster.de/sessionnet/sessionnetbi/getfile.php?id=482953&type=do" btntext="PDF herunterladen"/>
        <x-info-image-panel image="https://www.stadt-muenster.de/fileadmin/user_upload/stadt-muenster/13_zukuenfte/pics/muenster_magazin_200.jpg" title="Wie passt das Projekt in die Planung von Münsters Zukünfte 20 | 30 | 50?" text="Wo steht Münster 2020, 2030 oder 2050? war die Ausgangsfrage. Bürgerinnen und Bürger, Wissenschaftlerinnen und Wissenschaftler, Wirtschaft, Verwaltung und Politik waren und sind weiter aufgerufen, gemeinsam Antworten auf wichtige Zukunftsfragen zu finden. Eine Übersicht über vorläufige Ergebnisse finden Sie in der PDF-Datei auf Seite 17." url="https://www.stadt-muenster.de/sessionnet/sessionnetbi/getfile.php?id=482968&type=do" btntext="PDF herunterladen" />
        <x-info-image-panel image="https://www.stadt-muenster.de/fileadmin/user_upload/stadt-muenster/13_zukuenfte/pics/muenster_magazin_200.jpg" title="Nach wem ist die Straße eigentlich benannt?" text="Die Straße wurde nach Carl Erich Correns, (1864-1933), einem bedeutenden Botaniker, benannt." url="https://www.deutsche-biographie.de/sfz68246.html#ndbcontent"/>
    </section>

</x-guest-layout>
