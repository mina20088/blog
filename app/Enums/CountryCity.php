<?php

namespace App\Enums;


enum CountryCity: string
{
    // North America
    case USA='New York,Los Angeles,Chicago,Houston,Phoenix,Philadelphia,San Antonio,San Diego,Dallas,San Jose';
    case CANADA='Toronto,Montreal,Vancouver,Calgary,Edmonton,Ottawa,Winnipeg,Quebec City,Hamilton,Kitchener';
    case MEXICO='Mexico City,Guadalajara,Monterrey,Puebla,Tijuana,León,Juárez,Zapopan,Mérida,San Luis Potosí';

    // Europe
    case UNITED_KINGDOM='London,Birmingham,Manchester,Glasgow,Liverpool,Leeds,Sheffield,Edinburgh,Bristol,Cardiff';
    case GERMANY='Berlin,Hamburg,Munich,Cologne,Frankfurt,Stuttgart,Düsseldorf,Dortmund,Essen,Leipzig';
    case FRANCE='Paris,Marseille,Lyon,Toulouse,Nice,Nantes,Strasbourg,Montpellier,Bordeaux,Lille';
    case ITALY='Rome,Milan,Naples,Turin,Palermo,Genoa,Bologna,Florence,Bari,Catania';
    case SPAIN='Madrid,Barcelona,Valencia,Seville,Zaragoza,Málaga,Murcia,Palma,Las Palmas,Bilbao';
    case NETHERLANDS='Amsterdam,Rotterdam,The Hague,Utrecht,Eindhoven,Tilburg,Groningen,Almere,Breda,Nijmegen';
    case POLAND='Warsaw,Kraków,Łódź,Wrocław,Poznań,Gdańsk,Szczecin,Bydgoszcz,Lublin,Katowice';
    case RUSSIA='Moscow,Saint Petersburg,Novosibirsk,Yekaterinburg,Nizhny Novgorod,Kazan,Chelyabinsk,Samara,Omsk,Rostov-on-Don';

    // Asia
    case CHINA='Shanghai,Beijing,Chongqing,Tianjin,Guangzhou,Shenzhen,Wuhan,Dongguan,Chengdu,Nanjing';
    case INDIA='Mumbai,Delhi,Bangalore,Kolkata,Chennai,Hyderabad,Pune,Ahmedabad,Surat,Jaipur';
    case JAPAN='Tokyo,Yokohama,Osaka,Nagoya,Sapporo,Fukuoka,Kobe,Kawasaki,Kyoto,Saitama';
    case SOUTH_KOREA='Seoul,Busan,Incheon,Daegu,Daejeon,Gwangju,Ulsan,Suwon,Changwon,Goyang';
    case INDONESIA='Jakarta,Surabaya,Bandung,Bekasi,Medan,Tangerang,Depok,Semarang,Palembang,Makassar';
    case THAILAND='Bangkok,Nonthaburi,Pak Kret,Hat Yai,Chiang Mai,Phuket,Surat Thani,Udon Thani,Khon Kaen,Rayong';
    case PAKISTAN='Karachi,Lahore,Faisalabad,Rawalpindi,Gujranwala,Peshawar,Multan,Hyderabad,Islamabad,Quetta';
    case BANGLADESH='Dhaka,Chittagong,Khulna,Rajshahi,Sylhet,Rangpur,Barisal,Mymensingh,Comilla,Narayanganj';

    // Africa
    case NIGERIA='Lagos,Kano,Ibadan,Kaduna,Port Harcourt,Benin City,Maiduguri,Zaria,Aba,Jos';
    case EGYPT='Cairo,Alexandria,Giza,Shubra El-Kheima,Port Said,Suez,Luxor,al-Mansura,El-Mahalla El-Kubra,Tanta';
    case SOUTH_AFRICA='Cape Town,Johannesburg,Durban,Pretoria,Port Elizabeth,Bloemfontein,East London,Pietermaritzburg,Benoni,Tembisa';
    case KENYA='Nairobi,Mombasa,Nakuru,Eldoret,Kisumu,Thika,Malindi,Kitale,Garissa,Kakamega';
    case MOROCCO='Casablanca,Rabat,Fes,Marrakech,Agadir,Tangier,Meknes,Oujda,Kenitra,Tetouan';

    // South America
    case BRAZIL='São Paulo,Rio de Janeiro,Brasília,Salvador,Fortaleza,Belo Horizonte,Manaus,Curitiba,Recife,Goiânia';
    case ARGENTINA='Buenos Aires,Córdoba,Rosario,Mendoza,Tucumán,La Plata,Mar del Plata,Salta,Santa Fe,San Juan';
    case COLOMBIA='Bogotá,Medellín,Cali,Barranquilla,Cartagena,Cúcuta,Soledad,Ibagué,Bucaramanga,Soacha';
    case PERU='Lima,Arequipa,Trujillo,Chiclayo,Huancayo,Piura,Iquitos,Cusco,Chimbote,Tacna';
    case CHILE='Santiago,Valparaíso,Concepción,La Serena,Antofagasta,Temuco,Rancagua,Talca,Arica,Iquique';

    // Australia & Oceania
    case AUSTRALIA='Sydney,Melbourne,Brisbane,Perth,Adelaide,Gold Coast,Newcastle,Canberra,Sunshine Coast,Wollongong';
    case NEW_ZEALAND='Auckland,Wellington,Christchurch,Hamilton,Tauranga,Napier-Hastings,Dunedin,Palmerston North,Nelson,Rotorua';

    // Middle East
    case TURKEY='Istanbul,Ankara,Izmir,Bursa,Adana,Gaziantep,Konya,Antalya,Kayseri,Mersin';
    case IRAN='Tehran,Mashhad,Isfahan,Karaj,Shiraz,Tabriz,Qom,Ahvaz,Kermanshah,Urmia';
    case SAUDI_ARABIA='Riyadh,Jeddah,Mecca,Medina,Al-Ahsa,Taif,Dammam,Khobar,Buraidah,Tabuk';
    case UAE='Dubai,Abu Dhabi,Sharjah,Al Ain,Ajman,Ras Al Khaimah,Fujairah,Umm Al Quwain,Khor Fakkan,Kalba';

    public function getCities(): array
    {
        return explode(',', $this->value);
    }

    public function getCountryName(): string
    {
        return str_replace('_', ' ', $this->name);
    }

    public function getCityCount(): int
    {
        return count($this->getCities());
    }

    public function hasCity(string $city): bool
    {
        return in_array($city, $this->getCities(), true);
    }

    public static function findCountryByCity(string $city): ?self
    {
        foreach (self::cases() as $country) {
            if ($country->hasCity($city)) {
                return $country;
            }
        }
        return null;
    }

    public static function getAllCountries(): array
    {
        return array_map(static fn($case) => $case->getCountryName(), self::cases());
    }

    public static function getAllCities(): array
    {
        $cities = [];
        foreach (self::cases() as $country) {
            $cities = array_merge($cities, $country->getCities());
        }
        return $cities;
    }
}
