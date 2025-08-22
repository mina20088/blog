export const CountryCityMap = new Map([
    // North America
    ['USA', ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Philadelphia', 'San Antonio', 'San Diego', 'Dallas', 'San Jose']],
    ['Canada', ['Toronto', 'Montreal', 'Vancouver', 'Calgary', 'Edmonton', 'Ottawa', 'Winnipeg', 'Quebec City', 'Hamilton', 'Kitchener']],
    ['Mexico', ['Mexico City', 'Guadalajara', 'Monterrey', 'Puebla', 'Tijuana', 'León', 'Juárez', 'Zapopan', 'Mérida', 'San Luis Potosí']],

    // Europe
    ['United Kingdom', ['London', 'Birmingham', 'Manchester', 'Glasgow', 'Liverpool', 'Leeds', 'Sheffield', 'Edinburgh', 'Bristol', 'Cardiff']],
    ['Germany', ['Berlin', 'Hamburg', 'Munich', 'Cologne', 'Frankfurt', 'Stuttgart', 'Düsseldorf', 'Dortmund', 'Essen', 'Leipzig']],
    ['France', ['Paris', 'Marseille', 'Lyon', 'Toulouse', 'Nice', 'Nantes', 'Strasbourg', 'Montpellier', 'Bordeaux', 'Lille']],
    ['Italy', ['Rome', 'Milan', 'Naples', 'Turin', 'Palermo', 'Genoa', 'Bologna', 'Florence', 'Bari', 'Catania']],
    ['Spain', ['Madrid', 'Barcelona', 'Valencia', 'Seville', 'Zaragoza', 'Málaga', 'Murcia', 'Palma', 'Las Palmas', 'Bilbao']],
    ['Netherlands', ['Amsterdam', 'Rotterdam', 'The Hague', 'Utrecht', 'Eindhoven', 'Tilburg', 'Groningen', 'Almere', 'Breda', 'Nijmegen']],
    ['Poland', ['Warsaw', 'Kraków', 'Łódź', 'Wrocław', 'Poznań', 'Gdańsk', 'Szczecin', 'Bydgoszcz', 'Lublin', 'Katowice']],
    ['Russia', ['Moscow', 'Saint Petersburg', 'Novosibirsk', 'Yekaterinburg', 'Nizhny Novgorod', 'Kazan', 'Chelyabinsk', 'Samara', 'Omsk', 'Rostov-on-Don']],
    ['Ukraine', ['Kyiv', 'Kharkiv', 'Odesa', 'Dnipro', 'Donetsk', 'Zaporizhzhia', 'Lviv', 'Kryvyi Rih', 'Mykolaiv', 'Mariupol']],
    ['Greece', ['Athens', 'Thessaloniki', 'Patras', 'Piraeus', 'Larissa', 'Heraklion', 'Peristeri', 'Kallithea', 'Acharnes', 'Kalamaria']],
    ['Portugal', ['Lisbon', 'Porto', 'Vila Nova de Gaia', 'Amadora', 'Braga', 'Funchal', 'Coimbra', 'Setúbal', 'Almada', 'Agualva-Cacém']],
    ['Sweden', ['Stockholm', 'Gothenburg', 'Malmö', 'Uppsala', 'Västerås', 'Örebro', 'Linköping', 'Helsingborg', 'Jönköping', 'Norrköping']],
    ['Norway', ['Oslo', 'Bergen', 'Stavanger', 'Trondheim', 'Drammen', 'Fredrikstad', 'Kristiansand', 'Sandnes', 'Tromsø', 'Sarpsborg']],

    // Asia
    ['China', ['Shanghai', 'Beijing', 'Chongqing', 'Tianjin', 'Guangzhou', 'Shenzhen', 'Wuhan', 'Dongguan', 'Chengdu', 'Nanjing']],
    ['India', ['Mumbai', 'Delhi', 'Bangalore', 'Kolkata', 'Chennai', 'Hyderabad', 'Pune', 'Ahmedabad', 'Surat', 'Jaipur']],
    ['Japan', ['Tokyo', 'Yokohama', 'Osaka', 'Nagoya', 'Sapporo', 'Fukuoka', 'Kobe', 'Kawasaki', 'Kyoto', 'Saitama']],
    ['South Korea', ['Seoul', 'Busan', 'Incheon', 'Daegu', 'Daejeon', 'Gwangju', 'Ulsan', 'Suwon', 'Changwon', 'Goyang']],
    ['Indonesia', ['Jakarta', 'Surabaya', 'Bandung', 'Bekasi', 'Medan', 'Tangerang', 'Depok', 'Semarang', 'Palembang', 'Makassar']],
    ['Thailand', ['Bangkok', 'Nonthaburi', 'Pak Kret', 'Hat Yai', 'Chiang Mai', 'Phuket', 'Surat Thani', 'Udon Thani', 'Khon Kaen', 'Rayong']],
    ['Pakistan', ['Karachi', 'Lahore', 'Faisalabad', 'Rawalpindi', 'Gujranwala', 'Peshawar', 'Multan', 'Hyderabad', 'Islamabad', 'Quetta']],
    ['Bangladesh', ['Dhaka', 'Chittagong', 'Khulna', 'Rajshahi', 'Sylhet', 'Rangpur', 'Barisal', 'Mymensingh', 'Comilla', 'Narayanganj']],
    ['Philippines', ['Manila', 'Quezon City', 'Davao', 'Caloocan', 'Cebu City', 'Zamboanga', 'Antipolo', 'Taguig', 'Cagayan de Oro', 'Pasig']],
    ['Vietnam', ['Ho Chi Minh City', 'Hanoi', 'Haiphong', 'Can Tho', 'Da Nang', 'Bien Hoa', 'Hue', 'Nha Trang', 'Buon Ma Thuot', 'Thai Nguyen']],
    ['Malaysia', ['Kuala Lumpur', 'George Town', 'Ipoh', 'Shah Alam', 'Petaling Jaya', 'Johor Bahru', 'Seremban', 'Kuching', 'Kota Kinabalu', 'Klang']],
    ['Singapore', ['Singapore']],

    // Africa
    ['Nigeria', ['Lagos', 'Kano', 'Ibadan', 'Kaduna', 'Port Harcourt', 'Benin City', 'Maiduguri', 'Zaria', 'Aba', 'Jos']],
    ['Egypt', ['Cairo', 'Alexandria', 'Giza', 'Shubra El-Kheima', 'Port Said', 'Suez', 'Luxor', 'al-Mansura', 'El-Mahalla El-Kubra', 'Tanta']],
    ['South Africa', ['Cape Town', 'Johannesburg', 'Durban', 'Pretoria', 'Port Elizabeth', 'Bloemfontein', 'East London', 'Pietermaritzburg', 'Benoni', 'Tembisa']],
    ['Kenya', ['Nairobi', 'Mombasa', 'Nakuru', 'Eldoret', 'Kisumu', 'Thika', 'Malindi', 'Kitale', 'Garissa', 'Kakamega']],
    ['Morocco', ['Casablanca', 'Rabat', 'Fes', 'Marrakech', 'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra', 'Tetouan']],
    ['Algeria', ['Algiers', 'Oran', 'Constantine', 'Annaba', 'Blida', 'Batna', 'Djelfa', 'Setif', 'Sidi Bel Abbes', 'Biskra']],
    ['Ethiopia', ['Addis Ababa', 'Dire Dawa', 'Mekelle', 'Gondar', 'Adama', 'Hawassa', 'Bahir Dar', 'Dessie', 'Jimma', 'Jijiga']],
    ['Ghana', ['Accra', 'Kumasi', 'Tamale', 'Sekondi-Takoradi', 'Ashaiman', 'Sunyani', 'Cape Coast', 'Obuasi', 'Teshie', 'Madina']],

    // South America
    ['Brazil', ['São Paulo', 'Rio de Janeiro', 'Brasília', 'Salvador', 'Fortaleza', 'Belo Horizonte', 'Manaus', 'Curitiba', 'Recife', 'Goiânia']],
    ['Argentina', ['Buenos Aires', 'Córdoba', 'Rosario', 'Mendoza', 'Tucumán', 'La Plata', 'Mar del Plata', 'Salta', 'Santa Fe', 'San Juan']],
    ['Colombia', ['Bogotá', 'Medellín', 'Cali', 'Barranquilla', 'Cartagena', 'Cúcuta', 'Soledad', 'Ibagué', 'Bucaramanga', 'Soacha']],
    ['Peru', ['Lima', 'Arequipa', 'Trujillo', 'Chiclayo', 'Huancayo', 'Piura', 'Iquitos', 'Cusco', 'Chimbote', 'Tacna']],
    ['Chile', ['Santiago', 'Valparaíso', 'Concepción', 'La Serena', 'Antofagasta', 'Temuco', 'Rancagua', 'Talca', 'Arica', 'Iquique']],
    ['Venezuela', ['Caracas', 'Maracaibo', 'Valencia', 'Barquisimeto', 'Maracay', 'Ciudad Guayana', 'San Cristóbal', 'Maturín', 'Ciudad Bolívar', 'Cumana']],
    ['Ecuador', ['Quito', 'Guayaquil', 'Cuenca', 'Santo Domingo', 'Machala', 'Manta', 'Portoviejo', 'Ambato', 'Riobamba', 'Loja']],
    ['Bolivia', ['Santa Cruz', 'La Paz', 'El Alto', 'Cochabamba', 'Sucre', 'Tarija', 'Potosí', 'Oruro', 'Trinidad', 'Cobija']],

    // Australia & Oceania
    ['Australia', ['Sydney', 'Melbourne', 'Brisbane', 'Perth', 'Adelaide', 'Gold Coast', 'Newcastle', 'Canberra', 'Sunshine Coast', 'Wollongong']],
    ['New Zealand', ['Auckland', 'Wellington', 'Christchurch', 'Hamilton', 'Tauranga', 'Napier-Hastings', 'Dunedin', 'Palmerston North', 'Nelson', 'Rotorua']],

    // Middle East
    ['Turkey', ['Istanbul', 'Ankara', 'Izmir', 'Bursa', 'Adana', 'Gaziantep', 'Konya', 'Antalya', 'Kayseri', 'Mersin']],
    ['Iran', ['Tehran', 'Mashhad', 'Isfahan', 'Karaj', 'Shiraz', 'Tabriz', 'Qom', 'Ahvaz', 'Kermanshah', 'Urmia']],
    ['Saudi Arabia', ['Riyadh', 'Jeddah', 'Mecca', 'Medina', 'Al-Ahsa', 'Taif', 'Dammam', 'Khobar', 'Buraidah', 'Tabuk']],
    ['UAE', ['Dubai', 'Abu Dhabi', 'Sharjah', 'Al Ain', 'Ajman', 'Ras Al Khaimah', 'Fujairah', 'Umm Al Quwain', 'Khor Fakkan', 'Kalba']],
    ['Iraq', ['Baghdad', 'Basra', 'Mosul', 'Erbil', 'Sulaymaniyah', 'Najaf', 'Karbala', 'Nasiriyah', 'Amarah', 'Duhok']],
    ['Israel', ['Jerusalem', 'Tel Aviv', 'Haifa', 'Rishon LeZion', 'Petah Tikva', 'Ashdod', 'Netanya', 'Beer Sheva', 'Bnei Brak', 'Holon']],
    ['Jordan', ['Amman', 'Zarqa', 'Irbid', 'Russeifa', 'Wadi as-Sir', 'Aqaba', 'Madaba', 'As-Salt', 'Mafraq', 'Jerash']],

    // Additional countries
    ['Afghanistan', ['Kabul', 'Kandahar', 'Herat', 'Mazar-i-Sharif', 'Jalalabad', 'Kunduz', 'Taloqan', 'Pul-e Khumri', 'Ghazni', 'Khost']],
    ['Myanmar', ['Yangon', 'Mandalay', 'Naypyitaw', 'Mawlamyine', 'Bago', 'Pathein', 'Monywa', 'Meiktila', 'Myitkyina', 'Dawei']],
    ['Sri Lanka', ['Colombo', 'Dehiwala-Mount Lavinia', 'Moratuwa', 'Negombo', 'Kandy', 'Kalmunai', 'Jaffna', 'Galle', 'Trincomalee', 'Batticaloa']],
    ['Nepal', ['Kathmandu', 'Pokhara', 'Lalitpur', 'Bharatpur', 'Biratnagar', 'Birgunj', 'Dharan', 'Butwal', 'Hetauda', 'Janakpur']]
]);

// Utility functions for the Map
export const CountryCityUtils = {
    // Get all cities for a country
    getCities(country) {
        return CountryCityMap.get(country) || [];
    },

    // Check if a city exists in a specific country
    hasCity(country, city) {
        const cities = CountryCityMap.get(country);
        return cities ? cities.includes(city) : false;
    },

    // Find which country a city belongs to
    findCountryByCity(city) {
        for (const [country, cities] of CountryCityMap) {
            if (cities.includes(city)) {
                return country;
            }
        }
        return null;
    },

    // Get all countries
    getAllCountries() {
        return Array.from(CountryCityMap.keys());
    },

    // Get all cities from all countries
    getAllCities() {
        const allCities = [];
        for (const cities of CountryCityMap.values()) {
            allCities.push(...cities);
        }
        return allCities;
    },

    // Get total number of countries
    getCountryCount() {
        return CountryCityMap.size;
    },

    // Get total number of cities
    getCityCount() {
        return this.getAllCities().length;
    },

    // Get countries by region (you can extend this)
    searchCountries(searchTerm) {
        const results = [];
        for (const [country, cities] of CountryCityMap) {
            if (country.toLowerCase().includes(searchTerm.toLowerCase())) {
                results.push(country);
            }
        }
        return results;
    },

    // Convert Map to regular object
    toObject() {
        const obj = {};
        for (const [country, cities] of CountryCityMap) {
            obj[country] = cities;
        }
        return obj;
    }
};

// Usage Examples:

console.log('=== Usage Examples ===');

// Get cities for a specific country
console.log('USA cities:', CountryCityMap.get('USA'));

// Check if a city exists in a country
console.log('Does USA have New York?', CountryCityUtils.hasCity('USA', 'New York')); // true

// Find which country a city belongs to
console.log('Paris is in:', CountryCityUtils.findCountryByCity('Paris')); // France

// Get all countries
console.log('Total countries:', CountryCityUtils.getCountryCount());

// Get total cities
console.log('Total cities:', CountryCityUtils.getCityCount());

// Iterate through all countries and their cities
console.log('\n=== All Countries and Cities ===');
for (const [country, cities] of CountryCityMap) {
    console.log(`${country}: ${cities.join(', ')}`);
}

// Search for countries
console.log('\nCountries containing "United":', CountryCityUtils.searchCountries('United'));

// Convert to regular object if needed
const countryObject = CountryCityUtils.toObject();
console.log('\nConverted to object:', Object.keys(countryObject).length, 'countries');
