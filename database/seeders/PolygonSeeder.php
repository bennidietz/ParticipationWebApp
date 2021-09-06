<?php

namespace Database\Seeders;

use App\Models\Polygon;
use Illuminate\Database\Seeder;

class PolygonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Polygon::factory()
//            ->count(5)
//            ->create();
        Polygon::create([
            'name' => 'Straßenabschnitt Mensa am Ring',
            'geojson' => '{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[7.598698139190674,51.96502001505792],[7.598462104797363,51.965251381658874],[7.598311901092528,51.96542325321787],[7.598247528076172,51.965595124117776],[7.598161697387695,51.965872760333085],[7.59803295135498,51.966143784503416],[7.597904205322265,51.96633548353679],[7.597743272781371,51.96641480703488],[7.597668170928955,51.96638175559439],[7.5977861881256095,51.96629582173509],[7.597839832305908,51.96622971865427],[7.597925662994385,51.96611073286309],[7.597968578338623,51.96601818814045],[7.59803295135498,51.96593225358404],[7.5980544090271,51.965852929231886],[7.59807586669922,51.965740552826],[7.598108053207397,51.965628176138345],[7.598161697387695,51.965535630419325],[7.598172426223755,51.96545630536518],[7.598236799240111,51.965357148850096],[7.598333358764648,51.96525799211564],[7.598429918289185,51.965139003744724],[7.5984835624694815,51.96506628847367],[7.59853720664978,51.965033236038735],[7.598698139190674,51.96502001505792]]]}}',
            'state' => 'unknown',
            'visible' => 1,
            'description' => 'Der Straßenabschnitt Mensa am RingPolygon erstreckt sich von der Einsteinstraße bis hin zur Wilhelm-Klemm-Straße.',
        ]);
        Polygon::create([
            'name' => 'Straßenabschnitt Grünfläche',
            'geojson' => '{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[7.597668170928955,51.96646768928894],[7.597464323043823,51.966573453609904],[7.597185373306274,51.966685827927435],[7.597002983093261,51.966778371271495],[7.596799135208129,51.96688413485925],[7.596648931503296,51.96700311859719],[7.596509456634521,51.967174983438746],[7.596445083618164,51.96736006791568],[7.596412897109985,51.96758481232434],[7.596327066421509,51.967598032548565],[7.5963377952575675,51.96742616932932],[7.596380710601806,51.96723447496112],[7.596455812454224,51.9671088816546],[7.596552371978759,51.966963457386306],[7.5966596603393555,51.96688413485925],[7.596820592880249,51.9667915917336],[7.596981525421143,51.966685827927435],[7.597206830978393,51.96658006387168],[7.5974321365356445,51.96648752011814],[7.597582340240479,51.96641480703488],[7.597668170928955,51.96646768928894]]]}}',
            'state' => 'unknown',
            'visible' => 1,
            'description' => 'Der Straßenabschnitt Grünfläche erstreckt sich von der Wilhelm-Klemm-Straße bis hin zur Röntgenstraße.',
        ]);
        Polygon::create([
            'name' => 'Straßenabschnitt Fachhochschule',
            'geojson' => '{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[7.596316337585449,51.96878122682415],[7.5963377952575675,51.967644303302706],[7.596412897109985,51.967644303302706],[7.596402168273926,51.96876800694896],[7.596316337585449,51.96878122682415]]]}}',
            'state' => 'unknown',
            'visible' => 1,
            'description' =>  'Der Straßenabschnitt Fachhochschule erstreckt sich von der Röntgenstraße bis hin zur Heisenbergstraße.',
        ]);
        Polygon::create([
            'name' => 'Straßenabschnitt Geoinstitut',
            'geojson' => '{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[7.596144676208497,51.96984541398588],[7.596294879913329,51.969752876975015],[7.5963377952575675,51.96965372996562],[7.596305608749389,51.968840716214316],[7.596391439437867,51.96882088642638],[7.596530914306641,51.96980575529033],[7.596144676208497,51.96984541398588]]]}}',
            'state' => 'unknown',
            'visible' => 1,
            'description' =>  'Der Straßenabschnitt Geoinstitut erstreckt sich von der Heisenbergstraße bis hin zur Mendelstraße.',
        ]);
        Polygon::create([
            'name' => 'Straßenabschnitt Studentenwohnheim',
            'geojson' => '{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[7.596616744995117,51.97003048743434],[7.597121000289916,51.97132598017227],[7.597002983093261,51.97135902796649],[7.596552371978759,51.97030809617394],[7.596198320388794,51.97008336542212],[7.596616744995117,51.97003048743434]]]}}',
            'state' => 'unknown',
            'visible' => 1,
            'description' =>  'Der Straßenabschnitt Studentenwohnheim erstreckt sich von der Mendelstraße bis hin zum Horstmarer Landweg.',
        ]);
    }
}
