<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearcherProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            ['name' => 'Pregrado'],
            ['name' => 'Posgrado'],
            ['name' => 'Con fines empresariales'],
        ]);

        DB::table('countries')->insert([
            [

                'name' => 'Peru',
                'code' => 'PER',
            ], [

                'name' => 'Alemania',
                'code' => 'GER',
            ], [

                'name' => 'Canada',
                'code' => 'CA',
            ], [

                'name' => 'Rusia',
                'code' => 'RU',
            ],
        ]);

        DB::table('regions')->insert([
            [

                'name' => 'Tacna',
                'code' => 'TAC',
                'country_id' => 1,
            ], [

                'name' => 'Moquegua',
                'code' => 'MOQ',
                'country_id' => 1,
            ], [

                'name' => 'Amazonas',
                'code' => 'AM',
                'country_id' => 1,
            ], [

                'name' => 'Ancash',
                'code' => 'AN',
                'country_id' => 1,
            ], [

                'name' => 'Apurímac',
                'code' => 'AP',
                'country_id' => 1,
            ], [

                'name' => 'Arequipa',
                'code' => 'AQP',
                'country_id' => 1,
            ], [

                'name' => 'Ayacucho',
                'code' => 'AY',
                'country_id' => 1,
            ], [

                'name' => 'Cajamarca',
                'code' => 'CAJ',
                'country_id' => 1,
            ], [

                'name' => 'Callao',
                'code' => 'CALL',
                'country_id' => 1,
            ], [

                'name' => 'Cusco',
                'code' => 'CUS',
                'country_id' => 1,
            ], [

                'name' => 'Huancavelica',
                'code' => 'HUA',
                'country_id' => 1,
            ], [

                'name' => 'Huánuco',
                'code' => 'NUC',
                'country_id' => 1,
            ], [

                'name' => 'Ica',
                'code' => 'ICA',
                'country_id' => 1,
            ], [

                'name' => 'Junín',
                'code' => 'JUN',
                'country_id' => 1,
            ], [

                'name' => 'La Libertad',
                'code' => 'LALI',
                'country_id' => 1,
            ], [

                'name' => 'Lambayeque',
                'code' => 'LAM',
                'country_id' => 1,
            ], [

                'name' => 'Lima',
                'code' => 'LIM',
                'country_id' => 1,
            ], [

                'name' => 'Loreto',
                'code' => 'LOR',
                'country_id' => 1,
            ], [

                'name' => 'Madre De Dios',
                'code' => 'MDD',
                'country_id' => 1,
            ], [

                'name' => 'Pasco',
                'code' => 'PAS',
                'country_id' => 1,
            ], [

                'name' => 'Piura',
                'code' => 'PIU',
                'country_id' => 1,
            ], [

                'name' => 'Puno',
                'code' => 'PUN',
                'country_id' => 1,
            ], [

                'name' => 'San Martín',
                'code' => 'SM',
                'country_id' => 1,
            ], [

                'name' => 'Tumbes',
                'code' => 'TUMB',
                'country_id' => 1,
            ], [

                'name' => 'Ucayali',
                'code' => 'UCA',
                'country_id' => 1,
            ], [

                'name' => 'Ottawa',
                'code' => 'OT',
                'country_id' => 3,
            ], [

                'name' => 'San Petersburgo',
                'code' => 'SP',
                'country_id' => 4,
            ],
            [
                'name' => 'Berlin',
                'code' => 'BER',
                'country_id' => 2,
            ],
        ]);

        DB::table('universities')->insert([
            [
                'name' => 'Escuela de Postgrado Neumann',
                'region_id' => 1,
                'level_id' => 2,
            ],
            [
                'name' => 'Universidad Nacional Jorge Basadre Grohmann',
                'region_id' => 1,
                'level_id' => 1,
            ], [
                'name' => 'Universidad Privada de Tacna',
                'region_id' => 1,
                'level_id' => 1,
            ], [

                'name' => 'Universidad Latinoamericana CIMA',
                'region_id' => 1,
                'level_id' => 1,
            ], [

                'name' => 'Universidad José Carlos Mariátegui Filial Tacna',
                'region_id' => 1,
                'level_id' => 1,
            ], [

                'name' => 'Universidad Alas Peruanas Filial Tacna',
                'region_id' => 1,
                'level_id' => 1,
            ], [

                'name' => 'Universidad José Carlos Mariátegui',
                'region_id' => 2,
                'level_id' => 1,
            ], [

                'name' => 'Universidad Nacional de Moquegua',
                'region_id' => 2,
                'level_id' => 1,
            ],
        ]);
        DB::table('graduate_schools')->insert([
            [
                'name' => 'Escuela de Postgrado Neumann',
                'region_id' => 1,
            ],
            [
                'name' => 'Escuela de Postgrado - Universidad Nacional Jorge Basadre Grohmann',
                'region_id' => 1,
            ],
        ]);

        DB::table('faculties')->insert([
            [

                'name' => 'Facultad de Ingeniería',
                'university_id' => 2,
            ], [

                'name' => 'Facultad de Ciencias Jurídicas y Empresariales',
                'universities_id' => 2,
            ], [

                'name' => 'Facultad de Ciencias Agropecuarias',
                'universities_id' => 2,
            ], [

                'name' => 'Facultad de Ciencias de la Salud',
                'universities_id' => 2,
            ], [

                'name' => '
                Facultad de Educación, Comunicación y Humanidades',
                'universities_id' => 2,
            ], [

                'name' => 'Facultad de Ciencias',
                'universities_id' => 2,
            ], [

                'name' => 'Facultad de Ingeniería Civil, Arquitectura y Geotecnia',
                'universities_id' => 2,
            ], [

                'name' => 'Facultad de Ciencias Jurídicas, Empresariales y Pedagógicas',
                'universities_id' => 6,
            ], [

                'name' => 'Facultad de Ciencias de la Salud',
                'universities_id' => 6,
            ], [
                'name' => 'Facultad de Ingeniería y Arquitectura',
                'universities_id' => 6,
            ], [
                'name' => 'Facultad de Ciencias de la Salud',
                'universities_id' => 3,
            ],
        ]);

        DB::table('schools')->insert([
            [

                'name' => 'Ingeniería de Minas',
                'faculty_id' => 1,
            ], [

                'name' => 'Ingeniería en Informática y Sistemas',
                'faculty_id' => 1,
            ], [

                'name' => 'Ingeniería Metalúrgica',
                'faculty_id' => 1,
            ], [

                'name' => 'Ingeniería Química',
                'faculty_id' => 1,
            ], [

                'name' => 'Ingeniería Mecánica',
                'faculty_id' => 1,
            ], [

                'name' => 'Ciencias Contables y Financieras',
                'faculty_id' => 2,
            ], [

                'name' => 'Ciencias Administrativas',
                'faculty_id' => 2,
            ], [

                'name' => 'Derecho y Ciencias Políticas',
                'faculty_id' => 2,
            ], [

                'name' => 'Ingeniería Comercial',
                'faculty_id' => 2,
            ], [

                'name' => 'Agronomía',
                'faculty_id' => 3,
            ], [

                'name' => 'Economía Agraria',
                'faculty_id' => 3,
            ], [

                'name' => 'Medicina Veterinaria y Zootecnia',
                'faculty_id' => 3,
            ], [

                'name' => 'Ingeniería Pesquera',
                'faculty_id' => 3,
            ], [

                'name' => 'Ingeniería en Industrias Alimentarias',
                'faculty_id' => 3,
            ], [

                'name' => 'Ingeniería Ambiental',
                'faculty_id' => 3,
            ], [

                'name' => 'Medicina Humana',
                'faculty_id' => 4,
            ], [

                'name' => 'Obstetricia',
                'faculty_id' => 4,
            ], [

                'name' => 'Enfermería',
                'faculty_id' => 4,
            ], [

                'name' => 'Odontología',
                'faculty_id' => 4,
            ], [

                'name' => 'Farmacia y Bioquímica',
                'faculty_id' => 4,
            ], [

                'name' => 'Educación',
                'faculty_id' => 5,
            ], [

                'name' => 'Ciencias de la Comunicación',
                'faculty_id' => 5,
            ], [

                'name' => 'Historia',
                'faculty_id' => 5,
            ], [

                'name' => 'Biología - Microbiología',
                'faculty_id' => 6,
            ], [

                'name' => 'Física Aplicada',
                'faculty_id' => 6,
            ], [

                'name' => 'Matemáticas',
                'faculty_id' => 6,
            ],
            [

                'name' => 'Arquitectura',
                'faculty_id' => 7,
            ], [

                'name' => 'Ingeniería Civil',
                'faculty_id' => 7,
            ], [

                'name' => 'Ingeniería Geológica - Geotecnia',
                'faculty_id' => 7,
            ], [

                'name' => 'Artes',
                'faculty_id' => 7,
            ], [

                'name' => 'Administración Turística y Hotelera',
                'faculty_id' => 8,
            ], [

                'name' => 'Ciencias Administrativas y Marketing Estratégico',
                'faculty_id' => 8,
            ], [

                'name' => 'Contabilidad',
                'faculty_id' => 8,
            ], [

                'name' => 'Derecho',
                'faculty_id' => 8,
            ], [

                'name' => 'Economía',
                'faculty_id' => 8,
            ], [

                'name' => 'Escuelas Profesionales del Área de Educación',
                'faculty_id' => 8,
            ], [

                'name' => 'Ingeniería Comercial',
                'faculty_id' => 8,
            ], [

                'name' => 'Enfermería',
                'faculty_id' => 9,
            ], [

                'name' => 'Obstetricia',
                'faculty_id' => 9,
            ], [

                'name' => 'Odontología',
                'faculty_id' => 9,
            ], [

                'name' => 'Psicología',
                'faculty_id' => 9,
            ], [

                'name' => 'Arquitectura',
                'faculty_id' => 10,
            ], [

                'name' => 'Ingeniería Agronómica',
                'faculty_id' => 10,
            ], [

                'name' => 'Ingeniería Ambiental',
                'faculty_id' => 10,
            ], [

                'name' => 'Ingeniería Civil',
                'faculty_id' => 10,
            ], [

                'name' => 'Ingeniería Mecánica Eléctrica',
                'faculty_id' => 10,
            ], [

                'name' => 'Ingeniería de Sistemas e Informática',
                'faculty_id' => 10,
            ], [

                'name' => 'Escuela Profesional de Medicina Humana',
                'faculty_id' => 11,
            ],
        ]);

        DB::table('researcher_profiles')->insert([
            'user_id' => 1,
            'country_id' => 1,
            'region_id' => 1,
            'university_id' => 1,
            'faculty_id' => 1,
            'school_id' => 1,
            'goal_degree' => "Bachiller",
            'current_degree' => "Est.",
            'advisor' => "Oscar Juan Jimenez Flores",
        ]);
    }
}
