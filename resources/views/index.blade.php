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
                    <p class="mb-4">{{ __('Die Corrensstraße führt von der Von-Esmach-Straße zum Horstmarer Landweg. Sie ist ein Verbindungsglied der Urbanen Wissenschaftsstadt. Die Zukunft Münsters ist eng verknüpft mit der Entwicklung der Wissenschaft in der Stadt. Gleichzeitig sind die urbanen Qualitäten Münsters ein wesentlicher Standortfaktor für die Entwicklung der Wissenschafts- und Forschungsinstitutionen. Wie kann es gelingen ein Quartier zu entwickeln in dem Arbeiten, Forschen, Freizeit und Wohnen Hand in Hand gehen?') }}</p>
                    <p class="mb-4">{{ __('Um diese Fragen zu klären wurde in Zusammenarbeit zwischen der Stadt Münster, Fachhochschule Münster und Uni Münster das Projekt CorrensLab ins Leben gerufen. Verschiedenste Akteur*innen machen sich bei diesem Projekt Gedanken, wie sich die Corrensstraße verändern könnte. In welche Richtung ist offen. ') }}</p>
                    <p class="mb-4">{{ __('Diese Webseite wurde konzipiert um auch Sie nach Ihrer Meinung zu fragen und Ideen der Einzelnen Teilnehmenden zu visualisieren. ') }}</p>
                    <p class="mb-4">{{ __('Was sind Ihre Anforderungen an ein Quartier von morgen? ') }}</p>
                    <p class="mb-4">{{ __('Wie schaffen wir Aufenthaltsqualität an und auf der Corrensstraße? ') }}</p>
                    <p class="mb-4">{{ __('Wie wollen Sie, dass die Corrensstraße in Zukunft aussieht?') }}</p>
                    <p class="mb-4">{{ __('Ihre Meinung zählt. Schauen Sie rein und gestalten Sie die Corrensstraße von Morgen!') }}</p>
                    <button class="py-3 px-2 text-sm uppercase border rounded transition hover:bg-white hover:text-black">{{ __('Los gehts!') }}</button>
               </div>
            </div>
        </div>
    </div>

    <section class="py-24 max-w-7xl mx-auto">
        <h2 class="mb-4 text-2xl font-bold uppercase tracking-wider text-green-600">{{ __('Rund um die Corrensstraße') }}</h2>
        <x-info-image-panel :image="asset('img/content/wem_gehoert_was.png')" title="Wem gehört Was?" text="Wem gehört eigentlich Was? Eine Frage, die bei der Stadtplanung nicht unwichtig ist. Denn wenn Veränderungen angestoßen werden muss sich mit dem*der Eigentümer*in abgesprochen und verhandelt werden. Genaure Angaben über die Besitzverhältnisse im Quartier finden Sie im Abschlussbericht 'Zukunft der Wissenschaftsstadt' auf der Seite 9" />
        <x-info-image-panel image="https://www.muensterzukunft.de/_Resources/Persistent/e/f/1/8/ef187d2d1ea64706ecd05d594c6921dd1be769aa/UC_IIW_ScienceBoulevard.jpg" title="Die Corrensstraße als teil des Science Boulevards"  text="Münsters Westen soll neu vernetzt werden. Das bedeutet, Zusammenhänge aufzuzeigen, wo sie bisher nicht sichtbar sind, und für den Alltag neue Orte und Wege zu schaffen, die zum Austausch einladen und eine entspannte, nachhaltige Mobili­tät ermög­lichen.Die Wissen­schafts­stadt Münster will also einen Bogen schlagen von Kunst und Kreativität zu High Tech und Natur­wissen­schaften zu Medizin und Gesundheit. Das projekt wird bereits verfolgt -für die nächsten 10 Jahre sind bereits bau­liche Investitions­absichten von wissens­chaftlichen Einrich­tungen in Höhe von rund 1,6 Mrd EUR in diesem Bereich bekannt – es werden perspek­tivisch eher mehr." />
        <x-info-image-panel image="https://www.muensterzukunft.de/_Resources/Persistent/8/4/1/4/84149af6b9c1ebc5aa5fe08b4592e5fc186dc530/Urbane-Qualitaeten-zukuenftiger-Stadtquartiere-.png" title="Wie können die Quartiere der Zukunft aussehen?" text="Jeder Ort hat unterschiedliche Schwerpunkte in seiner Funktion und Ausgestaltung: Ein ausgewogener Mix von Forschung & Produktion, vielfältigem Wohnen, Gastronomie & Handel, gemeinschaftlichen Räumen und öffentlichen Freiflächen wird auf die jeweiligen Rahmenbedingungen und Bedürfnisse vor Ort abgestimmt. Dennoch gibt es Qualitäten, die jedes Quartier der Zukunft auszeichnen sollen. Welche das sind finden Sie hier: Link" />
        <x-info-image-panel image="https://www.stadt-muenster.de/fileadmin/user_upload/stadt-muenster/13_zukuenfte/pics/muenster_magazin_200.jpg" title="Verknüpfung der Corrensstraße mit: Altstadt – Schlossareal – Naturwissenschaftliche Institute / FH-Zentrum/Universitätsklinikum/Wissenschafts- und Technologiepark"  text="Die räumliche und funktionale Aufwertung der Verbindungen zwischen der Altstadt, dem Schlossareal und darüber hinaus in den Nordwesten der inneren Stadt ist eines der zentralen Maßnahmenpakete für eine verbesserte Einbindung der urbanen Wissensquartiere in den Stadtraum. Ein Beispiel, wie diese verknüpfung aussehen könnte finden Sie hier: Link " />
        <x-info-image-panel image="https://www.stadt-muenster.de/fileadmin/user_upload/stadt-muenster/13_zukuenfte/pics/muenster_magazin_200.jpg" title="Wie passt das Projekt in die Planung von Münsters Zukünfte 20 | 30 | 50?" text="Wo steht Münster 2020, 2030 oder 2050? war die Ausgangsfrage. Bürgerinnen und Bürger, Wissenschaftlerinnen und Wissenschaftler, Wirtschaft, Verwaltung und Politik waren und sind weiter aufgerufen, gemeinsam Antworten auf wichtige Zukunftsfragen zu finden. Eine Übersicht über vorläufige Ergebnisse finden Sie hier: Link  auf der Seite 17." />
        <x-info-image-panel image="https://www.stadt-muenster.de/fileadmin/user_upload/stadt-muenster/13_zukuenfte/pics/muenster_magazin_200.jpg" title="Nach wem ist die Straße eigentlich benannt?" text="Die Straße wurde nach Carl Erich Correns, (1864-1933), einem bedeutenden Botaniker, benannt. Mehr zu seiner Person finden Sie hier: Link :" />
    </section>

</x-guest-layout>
