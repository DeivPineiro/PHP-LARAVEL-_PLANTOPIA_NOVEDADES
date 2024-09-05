<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('noticias')->insert([
            [
                'titulo' => 'Revolución verde',
                'subtitulo' => 'Primeros pasos...',
                'parrafo' => 'Próximamente en Argentina, se avecina el lanzamiento de una innovadora herramienta destinada a los apasionados del campo: la aplicación móvil "PLANTOPIA". Este emocionante debut se presenta como una revolución en la manera en que nos ocupamos de nuestros campos.
                "PLANTOPIA" ofrece una extensa base de datos que incluye información detallada sobre diversas plantas autóctonas. Además de proporcionar datos valiosos, la aplicación brindará consejos expertos sobre el cuidado y mantenimiento de estas plantas.                
                Entre las características destacadas, "PLANTOPIA" incorpora una función única de identificación de plagas. Esta utilidad permitirá a los usuarios diagnosticar y abordar de manera efectiva los problemas comunes que puedan afectar a sus plantas, aportando así a la preservación y salud del entorno vegetal.                
                Es importante no dejar pasar la oportunidad de ser parte de este próximo lanzamiento que llevará la magia del conocimiento directamente a las manos del usuario. "PLANTOPIA" promete ser la herramienta indispensable para aquellos que buscan optimizar el cuidado de sus campos de manera informada y eficiente.',
                'img' => 'imgs/RYHJaJqZjYbcFqQ7VegN94sqKoDdUaQHcgXXmyqQ.png',
                'descripcion_img' => 'Imagen de una pantalla de la app Plantopia',
                'fecha_creacion' => '2023-09-23',
                'editor' => 'David Piñeiro',
                'publicado' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'topico_id' => 1,
            ],
            [
                'titulo' => 'Noticia de prueba',
                'subtitulo' => 'Espacio reservado para..',
                'parrafo' => '¡Próximamente en Argentina!',
                'img' => 'imgs/RYHJaJqZjYbcFqQ7VegN94sqKoDdUaQHcgXXmyqQ.png',
                'descripcion_img' => 'Imagen de una pantalla de la app Plantopia',
                'fecha_creacion' => '2023-09-23',
                'editor' => 'David Piñeiro',
                'publicado' => false,
                'created_at' => now(),
                'updated_at' => now(),
                'topico_id' => 2,
            ],
            [
                'titulo' => 'Agro y Tecnología',
                'subtitulo' => 'El futuro de la agricultura',
                'parrafo' => 'En Argentina, la sinergia entre tecnología y agricultura cobra vida con la introducción de "PLANTOPIA", una aplicación innovadora diseñada para redefinir la manera en que agricultores y entusiastas del agro gestionan sus cultivos. "PLANTOPIA" emerge como un recurso esencial, ofreciendo un enfoque holístico para el monitoreo y la gestión de cultivos, propiciando así un manejo más eficiente de las tierras agrícolas.
                Esta aplicación móvil de vanguardia se erige como un aliado indispensable para los agricultores argentinos, brindándoles la capacidad de maximizar el rendimiento de sus tierras, optimizar las cosechas y preservar la salud de sus campos. Su base de datos integral proporciona información detallada sobre las plantas cultivadas en la región, mientras que las recomendaciones y consejos expertos ofrecen orientación precisa sobre el cuidado y mantenimiento de los cultivos en diversos entornos y terrenos argentinos.                
                Ya sea en la Pampa Húmeda cultivando maíz o en Mendoza gestionando viñedos, "PLANTOPIA" se presenta como la solución integral que satisface todas las necesidades relacionadas con el cultivo.',
                'img' => 'imgs/C5waXfdDsLCRpudOjD0ov08InhwaZYF33DvI9MZu.jpg',
                'descripcion_img' => 'Imagen de una planta con estadisticas',
                'fecha_creacion' => '2023-09-23',
                'editor' => 'Lucas Martín Orlando',
                'publicado' => true,
                'topico_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'titulo' => 'PLANTOPIA en La Rural',
                'subtitulo' => 'Vení a conocer la revolución verde.',
                'parrafo' => 'Estaremos en la Rural, nos presentamos como PLANTOPIA, una revolucionaria aplicación diseñada para simplificar la vida en el campo. Con solo usar el GPS de tu dispositivo, PLANTOPIA te permite medir áreas de tu campo y calcular la cosecha estimada en dólares. Además, ofrece una completa wiki sobre plantas y plagas para facilitar la gestión agrícola. ¡Descubrí cómo PLANTOPIA está transformando la agricultura con tecnología innovadora!',
                'img' => 'imgs/enLaRural.png',
                'descripcion_img' => 'PLANTOPIA en la Rural, mapa',
                'fecha_creacion' => '2023-09-23',
                'editor' => 'Lucia Muñoz Larreta',
                'publicado' => true,
                'topico_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Llevanos con vos',
                'subtitulo' => 'Paquete de bienvenida',
                'parrafo' => 'Descubrí el emocionante paquete que ofrecemos con las primeras compras de la aplicación PLANTOPIA. Al realizar tu primera compra, vas a recibir una exclusiva remera, una taza y una funda de celular, todos con el distintivo logo de PLANTOPIA. ¡No te pierdas estos increíbles artículos y lleva con vos el espíritu de la innovación agrícola de PLANTOPIA.',
                'img' => 'imgs/mocks.png',
                'descripcion_img' => 'Paquete de bienvenida de PLANTOPIA',
                'fecha_creacion' => '2023-09-23',
                'editor' => 'Lucia Muñoz Larreta',
                'publicado' => true,
                'topico_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);

        DB::table('news_have_tags')->insert([
            [
                'noticia_id' => 1,
                'tag_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'noticia_id' => 1,
                'tag_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'noticia_id' => 1,
                'tag_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'noticia_id' => 2,
                'tag_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'noticia_id' => 3,
                'tag_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'noticia_id' => 4,
                'tag_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'noticia_id' => 4,
                'tag_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'noticia_id' => 5,
                'tag_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
