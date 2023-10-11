import { NextRequest, NextResponse } from "next/server";

export async function GET(request) {
    return NextResponse.json([
        {
          id: 1,
          empresa: 'Universidad Nacional Autónoma de Honduras (UNAH)',
          seguidores: 96174,
          logo: 'https://media.licdn.com/dms/image/D4E0BAQGTRAHntOfgTg/company-logo_100_100/0/1667698674172?e=1704931200&v=beta&t=e6i4THvej2BCDFqHkx9VL4yeaZx3da023qnhyfMWS-M',
          tiempo: '10/4/2023',
          contenido: 'El Programa de Educación Continúa en Salud de la Facultad de Ciencias Médicas de la UNAH presenta su oferta de cursos y diplomados en salud a iniciar en octubre.',
          likes: 47,
          imagen: 'https://media.licdn.com/dms/image/D4E22AQEOJ48IHnPiNg/feedshare-shrink_800/0/1696370114963?e=1700092800&v=beta&t=M-nAnIphL-ATlnOO2TuWl5SCuCyazd-oPKR7VQ4S7Jw'
        },
        {
          id: 2,
          empresa: 'Grupo Financiero Ficohsa',
          seguidores: 143929,
          tiempo: '10/2/2023',
          logo: 'https://media.licdn.com/dms/image/D4E0BAQF9fBI8BQYFNw/company-logo_100_100/0/1696179683073/banco_ficohsa_logo?e=1704931200&v=beta&t=G3QdFoPA8Gj9GrU6jChkxBbqmXCjX6qe1OW3XnxV_AM',
          contenido: 'El liderazgo va más allá de las habilidades visibles. Descubre los elementos esenciales que conforman este iceberg y cómo pueden transformar tu liderazgo de una manera extraordinaria.💡',
          likes: 34,
          imagen: 'https://media.licdn.com/dms/image/D4E22AQEboEUGXAnpAA/feedshare-shrink_800/0/1696431894210?e=1700092800&v=beta&t=YIMp2agw_0xxUYoWGEGGnAvXdZxWM9Y8jM7UeO-d9oo'
        }
      ]
    , { status: 200 })
}
