<?php

namespace App\Enums;

enum Countries: string
{
    case USA = "New York,Los Angeles,Chicago,Houston,Phoenix,Philadelphia,San Antonio,San Diego,Dallas,San Jose";
    case Canada = "Toronto,Montreal,Vancouver,Calgary,Edmonton,Ottawa,Winnipeg,Quebec City,Hamilton,Kitchener";
    case Mexico = "Mexico City,Guadalajara,Monterrey,Puebla,Tijuana,León,Juárez,Zapopan,Mérida,San Luis Potosí";
    case United_Kingdom = "London,Birmingham,Manchester,Glasgow,Liverpool,Leeds,Sheffield,Edinburgh,Bristol,Cardiff";
    case Germany = "Berlin,Hamburg,Munich,Cologne,Frankfurt,Stuttgart,Düsseldorf,Dortmund,Essen,Leipzig";
    case France = "Paris,Marseille,Lyon,Toulouse,Nice,Nantes,Strasbourg,Montpellier,Bordeaux,Lille";
    case Italy = "Rome,Milan,Naples,Turin,Palermo,Genoa,Bologna,Florence,Bari,Catania";
    case Spain = "Madrid,Barcelona,Valencia,Seville,Zaragoza,Málaga,Murcia,Palma,Las Palmas,Bilbao";
    case Netherlands = "Amsterdam,Rotterdam,The Hague,Utrecht,Eindhoven,Tilburg,Groningen,Almere,Breda,Nijmegen";
    case Poland = "Warsaw,Kraków,Łódź,Wrocław,Poznań,Gdańsk,Szczecin,Bydgoszcz,Lublin,Katowice";
    case Russia = "Moscow,Saint Petersburg,Novosibirsk,Yekaterinburg,Nizhny Novgorod,Kazan,Chelyabinsk,Samara,Omsk,Rostov-on-Don";
    case Ukraine = "Kyiv,Kharkiv,Odesa,Dnipro,Donetsk,Zaporizhzhia,Lviv,Kryvyi Rih,Mykolaiv,Mariupol";
    case Greece = "Athens,Thessaloniki,Patras,Piraeus,Larissa,Heraklion,Peristeri,Kallithea,Acharnes,Kalamaria";
    case Portugal = "Lisbon,Porto,Vila Nova de Gaia,Amadora,Braga,Funchal,Coimbra,Setúbal,Almada,Agualva-Cacém";
    case Sweden = "Stockholm,Gothenburg,Malmö,Uppsala,Västerås,Örebro,Linköping,Helsingborg,Jönköping,Norrköping";
    case Norway = "Oslo,Bergen,Stavanger,Trondheim,Drammen,Fredrikstad,Kristiansand,Sandnes,Tromsø,Sarpsborg";
    case China = "Shanghai,Beijing,Chongqing,Tianjin,Guangzhou,Shenzhen,Wuhan,Dongguan,Chengdu,Nanjing";
    case India = "Mumbai,Delhi,Bangalore,Kolkata,Chennai,Hyderabad,Pune,Ahmedabad,Surat,Jaipur";
    case Japan = "Tokyo,Yokohama,Osaka,Nagoya,Sapporo,Fukuoka,Kobe,Kawasaki,Kyoto,Saitama";
    case South_Korea = "Seoul,Busan,Incheon,Daegu,Daejeon,Gwangju,Ulsan,Suwon,Changwon,Goyang";
    case Indonesia = "Jakarta,Surabaya,Bandung,Bekasi,Medan,Tangerang,Depok,Semarang,Palembang,Makassar";
    case Thailand = "Bangkok,Nonthaburi,Pak Kret,Hat Yai,Chiang Mai,Phuket,Surat Thani,Udon Thani,Khon Kaen,Rayong";
    case Pakistan = "Karachi,Lahore,Faisalabad,Rawalpindi,Gujranwala,Peshawar,Multan,Hyderabad,Islamabad,Quetta";
    case Bangladesh = "Dhaka,Chittagong,Khulna,Rajshahi,Sylhet,Rangpur,Barisal,Mymensingh,Comilla,Narayanganj";
    case Philippines = "Manila,Quezon City,Davao,Caloocan,Cebu City,Zamboanga,Antipolo,Taguig,Cagayan de Oro,Pasig";
    case Vietnam = "Ho Chi Minh City,Hanoi,Haiphong,Can Tho,Da Nang,Bien Hoa,Hue,Nha Trang,Buon Ma Thuot,Thai Nguyen";
    case Malaysia = "Kuala Lumpur,George Town,Ipoh,Shah Alam,Petaling Jaya,Johor Bahru,Seremban,Kuching,Kota Kinabalu,Klang";
    case Singapore = "Singapore";
    case Nigeria = "Lagos,Kano,Ibadan,Kaduna,Port Harcourt,Benin City,Maiduguri,Zaria,Aba,Jos";
    case Egypt = "Cairo,Alexandria,Giza,Shubra El-Kheima,Port Said,Suez,Luxor,al-Mansura,El-Mahalla El-Kubra,Tanta";
    case South_Africa = "Cape Town,Johannesburg,Durban,Pretoria,Port Elizabeth,Bloemfontein,East London,Pietermaritzburg,Benoni,Tembisa";
    case Kenya = "Nairobi,Mombasa,Nakuru,Eldoret,Kisumu,Thika,Malindi,Kitale,Garissa,Kakamega";
    case Morocco = "Casablanca,Rabat,Fes,Marrakech,Agadir,Tangier,Meknes,Oujda,Kenitra,Tetouan";
    case Algeria = "Algiers,Oran,Constantine,Annaba,Blida,Batna,Djelfa,Setif,Sidi Bel Abbes,Biskra";
    case Ethiopia = "Addis Ababa,Dire Dawa,Mekelle,Gondar,Adama,Hawassa,Bahir Dar,Dessie,Jimma,Jijiga";
    case Ghana = "Accra,Kumasi,Tamale,Sekondi-Takoradi,Ashaiman,Sunyani,Cape Coast,Obuasi,Teshie,Madina";
    case Brazil = "São Paulo,Rio de Janeiro,Brasília,Salvador,Fortaleza,Belo Horizonte,Manaus,Curitiba,Recife,Goiânia";
    case Argentina = "Buenos Aires,Córdoba,Rosario,Mendoza,Tucumán,La Plata,Mar del Plata,Salta,Santa Fe,San Juan";
    case Colombia = "Bogotá,Medellín,Cali,Barranquilla,Cartagena,Cúcuta,Soledad,Ibagué,Bucaramanga,Soacha";
    case Peru = "Lima,Arequipa,Trujillo,Chiclayo,Huancayo,Piura,Iquitos,Cusco,Chimbote,Tacna";
    case Chile = "Santiago,Valparaíso,Concepción,La Serena,Antofagasta,Temuco,Rancagua,Talca,Arica,Iquique";
    case Venezuela = "Caracas,Maracaibo,Valencia,Barquisimeto,Maracay,Ciudad Guayana,San Cristóbal,Maturín,Ciudad Bolívar,Cumana";
    case Ecuador = "Quito,Guayaquil,Cuenca,Santo Domingo,Machala,Manta,Portoviejo,Ambato,Riobamba,Loja";
    case Bolivia = "Santa Cruz,La Paz,El Alto,Cochabamba,Sucre,Tarija,Potosí,Oruro,Trinidad,Cobija";
    case Australia = "Sydney,Melbourne,Brisbane,Perth,Adelaide,Gold Coast,Newcastle,Canberra,Sunshine Coast,Wollongong";
    case New_Zealand = "Auckland,Wellington,Christchurch,Hamilton,Tauranga,Napier-Hastings,Dunedin,Palmerston North,Nelson,Rotorua";
    case Turkey = "Istanbul,Ankara,Izmir,Bursa,Adana,Gaziantep,Konya,Antalya,Kayseri,Mersin";
    case Iran = "Tehran,Mashhad,Isfahan,Karaj,Shiraz,Tabriz,Qom,Ahvaz,Kermanshah,Urmia";
    case Saudi_Arabia = "Riyadh,Jeddah,Mecca,Medina,Al-Ahsa,Taif,Dammam,Khobar,Buraidah,Tabuk";
    case UAE = "Dubai,Abu Dhabi,Sharjah,Al Ain,Ajman,Ras Al Khaimah,Fujairah,Umm Al Quwain,Khor Fakkan,Kalba";
    case Iraq = "Baghdad,Basra,Mosul,Erbil,Sulaymaniyah,Najaf,Karbala,Nasiriyah,Amarah,Duhok";
    case Israel = "Jerusalem,Tel Aviv,Haifa,Rishon LeZion,Petah Tikva,Ashdod,Netanya,Beer Sheva,Bnei Brak,Holon";
    case Jordan = "Amman,Zarqa,Irbid,Russeifa,Wadi as-Sir,Aqaba,Madaba,As-Salt,Mafraq,Jerash";
    case Afghanistan = "Kabul,Kandahar,Herat,Mazar-i-Sharif,Jalalabad,Kunduz,Taloqan,Pul-e Khumri,Ghazni,Khost";
    case Myanmar = "Yangon,Mandalay,Naypyitaw,Mawlamyine,Bago,Pathein,Monywa,Meiktila,Myitkyina,Dawei";
    case SriLanka = "Colombo,Dehiwala-Mount Lavinia,Moratuwa,Negombo,Kandy,Kalmunai,Jaffna,Galle,Trincomalee,Batticaloa";
    case Nepal = "Kathmandu,Pokhara,Lalitpur,Bharatpur,Biratnagar,Birgunj,Dharan,Butwal,Hetauda,Janakpur";



    public static function getALlCountries():array{

        $countries = [];

        foreach (self::cases() as $country)
        {
            $countries [] = $country->name;
        }

        return $countries;
    }

    public static function getCities(string $country):array
    {
        ds(self::cases());



        return [];
    }

}



