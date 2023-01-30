<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Companies extends Component
{
    public $companies;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->companies = array(
            [
                'name' => 'Capgemini',
                'image' => asset('images/company/capgemini.png'),
                'link' => 'https://www.capgemini.com/in-en/'
            ],
            [
                'name' => 'Amazon',
                'image' => asset('images/company/amazon.png'),
                'link' => 'https://www.amazon.in/'
            ],
            [
                'name' => 'Accenture',
                'image' => asset('images/company/accenture.png'),
                'link' => 'https://www.accenture.com/in-en'
            ],
            [
                'name' => 'Wipro',
                'image' => asset('images/company/wipro.png'),
                'link' => 'https://www.wipro.com/'
            ],
            [
                'name' => 'Avestan Technologies',
                'image' => asset('images/company/avestan.png'),
                'link' => 'http://avestantechnologies.com/'
            ],
            [
                'name' => 'Cyberathon',
                'image' => asset('images/company/cyberathon.png'),
                'link' => 'http://www.cyberathon.com/'
            ],
            [
                'name' => 'Inbase',
                'image' => asset('images/company/inbase.png'),
                'link' => 'https://inbase.in/'
            ],
            [
                'name' => 'RnR Datalex',
                'image' => asset('images/company/RnR.png'),
                'link' => 'https://rnrdatalex.com/'
            ],
            [
                'name' => 'Lighthouse',
                'image' => asset('images/company/lighthouse.png'),
                'link' => 'https://www.lighthouseindia.com/'
            ],
            //
            [
                'name' => 'DataPatterns',
                'image' => asset('images/company/datapatterns.png'),
                'link' => 'https://www.datapatternsindia.com'
            ],
            [
                'name' => 'Epam',
                'image' => asset('images/company/epam.png'),
                'link' => 'https://www.epam.com/'
            ],
            [
                'name' => 'Xybion',
                'image' => asset('images/company/xybion.png'),
                'link' => 'https://www.xybion.com/'
            ],
            // [
            //     'name' => 'RDA Labs',
            //     'image' => asset('images/company/rda'),
            //     'link' => 'https://rdalabs.com/'
            // ],
            [
                'name' => 'HackerEarth',
                'image' => asset('images/company/hackerearth.png'),
                'link' => 'https://www.hackerearth.com/'
            ],
            [
                'name' => 'Karomi',
                'image' => asset('images/company/karomi.png'),
                'link' => 'https://www.karomi.com/'
            ],
            [
                'name' => 'myAnatomy',
                'image' => asset('images/company/myanatomy.png'),
                'link' => 'https://myanatomy.in/'
            ],
            [
                'name' => 'Replicon',
                'image' => asset('images/company/replicon.png'),
                'link' => 'https://www.replicon.com/'
            ],
            [
                'name' => 'Finoit',
                'image' => asset('images/company/finoit.png'),
                'link' => 'https://www.finoit.com/'
            ],
            [
                'name' => 'Salesforce',
                'image' => asset('images/company/salesforce.png'),
                'link' => 'https://www.salesforce.com/in/'
            ],
            [
                'name' => 'Zoho',
                'image' => asset('images/company/zoho.png'),
                'link' => 'https://www.zoho.com/'
            ],
            [
                'name' => 'Zinfi',
                'image' => asset('images/company/zinfi.png'),
                'link' => 'https://www.zinfi.com/'
            ],
            [
                'name' => 'GlobalLogic',
                'image' => asset('images/company/globalLogic.png'),
                'link' => 'https://www.globallogic.com/in/'
            ],
            [
                'name' => 'Ericsson',
                'image' => asset('images/company/ericsson.png'),
                'link' => 'https://www.ericsson.com/en'
            ],
            [
                'name' => 'Tech Mahindra',
                'image' => asset('images/company/techMahindra.png'),
                'link' => 'https://www.techmahindra.com/en-in/'
            ],
            [
                'name' => 'Infosys',
                'image' => asset('images/company/infosys.png'),
                'link' => 'https://www.infosys.com/'
            ],
            [
                'name' => 'Honeywell',
                'image' => asset('images/company/honeywell.png'),
                'link' => 'https://www.honeywell.com/us/en'
            ],
            [
                'name' => 'HCL',
                'image' => asset('images/company/hcl.png'),
                'link' => 'https://www.hcltech.com/'
            ],
        );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.companies');
    }
}
