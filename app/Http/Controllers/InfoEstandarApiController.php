<?php

namespace App\Http\Controllers;

use App\Models\InfoEstandar;
use Illuminate\Http\Request;

class InfoEstandarApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $infoEstandares = InfoEstandar::all();
        return response()->json($infoEstandares);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $infoEstandar1 = InfoEstandar::create([
            'titulo'=>'Propósitos articulados',
            'factor'=>'Factor 1',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'Los propósitos del programa de estudios están definidos, alineados con la misión y  visión institucional y han sido construidos participativamente.',
            'indice'=>1
        ]);
        $infoEstandar2 = InfoEstandar::create([
            'titulo'=>'Participación de los grupos de interés',
            'factor'=>'Factor 1',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El programa de estudios mantiene y ejecuta mecanismos que consideran la participación de los grupos de interés para asegurar que la oferta académica sea pertinente con la demanda social.',
            'indice'=>2
        ]);
        $infoEstandar3 = InfoEstandar::create([
            'titulo'=>'Revisión periódica y participativa de las políticas y objetivos',
            'factor'=>'Factor 1',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El programa de estudios mantiene y ejecuta mecanismos de revisión periódica y participativa de las políticas y objetivos institucionales que permiten reorientar sus metas, planes de acción y recursos.',
            'indice'=>3
        ]);
        $infoEstandar4 = InfoEstandar::create([
            'titulo'=>'Sostenibilidad',
            'factor'=>'Factor 1',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El programa de estudios gestiona los recursos financieros necesarios para su funcionamiento, fortalecimiento y sostenibilidad en el tiempo con el apoyo de sus grupos de interés.',
            'indice'=>4
        ]);
        $infoEstandar5 = InfoEstandar::create([
            'titulo'=>'Pertinencia del perfil de egreso',
            'factor'=>'Factor 2',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El perfil de egreso orienta la gestión del programa de estudio, es coherente con sus propósitos, currículo y responde a las expectativas de los grupos de interés y al entorno socioeconómico.',
            'indice'=>5
        ]);
        $infoEstandar6 = InfoEstandar::create([
            'titulo'=>'Revisión del perfil de egreso',
            'factor'=>'Factor 2',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El perfil de egreso se revisa periódicamente y de forma participativa.',
            'indice'=>6
        ]);
        $infoEstandar7 = InfoEstandar::create([
            'titulo'=>'Sistema de gestión de la calidad (SGC)',
            'factor'=>'Factor 3',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El programa de estudios cuenta con un sistema de gestión de la calidad implementado',
            'indice'=>7
        ]);
        $infoEstandar8 = InfoEstandar::create([
            'titulo'=>'Planes de mejora',
            'factor'=>'Factor 3',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El programa de estudios define, implementa y monitorea planes de mejora para los aspectos que participativamente se han identificado y priorizado como oportunidades de mejora.',
            'indice'=>8
        ]);
        $infoEstandar9 = InfoEstandar::create([
            'titulo'=>'Plan de estudios',
            'factor'=>'Factor 4',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios utiliza mecanismos de gestión que aseguran la evaluación y actualización periódica del plan de estudios.',
            'indice'=>9
        ]);
        $infoEstandar10 = InfoEstandar::create([
            'titulo'=>'Características del plan de estudios',
            'factor'=>'Factor 4',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El plan de estudios es flexible e incluye cursos que brindan una sólida base científica y humanista; con sentido de ciudadanía y responsabilidad social; y consideran una práctica pre profesional',
            'indice'=>10
        ]);
        $infoEstandar11 = InfoEstandar::create([
            'titulo'=>'Enfoque por competencias',
            'factor'=>'Factor 4',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios garantiza que el proceso de enseñanza-aprendizaje incluya todos los elementos que aseguren el logro de las competencias a lo largo de la formación.',
            'indice'=>11
        ]);
        $infoEstandar12 = InfoEstandar::create([
            'titulo'=>'Articulación con I+D+i y responsabilidad social',
            'factor'=>'Factor 4',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios articula el proceso de enseñanza aprendizaje con la I+D+i y responsabilidad social, en la que participan estudiantes y docentes, apoyando a la formación integral y el logro de competencias.',
            'indice'=>12
        ]);
        $infoEstandar13 = InfoEstandar::create([
            'titulo'=>'Movilidad',
            'factor'=>'Factor 4',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios mantiene y hace uso de convenios con universidades nacionales e internacionales para la movilidad de estudiantes y docentes, así como para el intercambio de experiencias.',
            'indice'=>13
        ]);
        $infoEstandar14 = InfoEstandar::create([
            'titulo'=>'Selección, evaluación, capacitación y perfeccionamiento',
            'factor'=>'Factor 5',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios selecciona, evalúa, capacita y procura el perfeccionamiento del personal docente para asegurar su idoneidad con lo requerido en el documento curricular.',
            'indice'=>14
        ]);
        $infoEstandar15 = InfoEstandar::create([
            'titulo'=>'Plana docente adecuada',
            'factor'=>'Factor 5',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios asegura que la plana docente sea adecuada en cuanto al número e idoneidad y que guarde coherencia con el propósito y complejidad del programa.',
            'indice'=>15
        ]);
        $infoEstandar16 = InfoEstandar::create([
            'titulo'=>'Reconocimiento de las actividades de labor docente',
            'factor'=>'Factor 5',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios reconoce en la labor de los docentes tanto aquellas actividades estructuradas (docencia, investigación, vinculación con el medio, gestión académica-administrativa), como las no estructuradas (preparación del material didáctico, elaboración de exámenes, asesoría al estudiante, etc.).',
            'indice'=>16
        ]);
        $infoEstandar17 = InfoEstandar::create([
            'titulo'=>'Plan de desarrollo académico',
            'factor'=>'Factor 5',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios debe ejecutar un plan de desarrollo académico que estimule que los docentes desarrollen capacidades para optimizar su quehacer universitario.',
            'indice'=>17
        ]);
        $infoEstandar18 = InfoEstandar::create([
            'titulo'=>'Admisión al programa de estudios',
            'factor'=>'Factor 6',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El proceso de admisión al programa de estudios establece criterios en concordancia con el perfil de ingreso, claramente especificados en los prospectos, que son de conocimiento público',
            'indice'=>18
        ]);
        $infoEstandar19 = InfoEstandar::create([
            'titulo'=>'Nivelación de ingresantes',
            'factor'=>'Factor 6',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El programa de estudios diseña, ejecuta y mantiene mecanismos que ayuden a nivelar, en los estudiantes, las competencias necesarias para iniciar sus estudios universitarios',
            'indice'=>19
        ]);
        $infoEstandar20 = InfoEstandar::create([
            'titulo'=>'Seguimientos al desempeño de los estudiantes',
            'factor'=>'Factor 6',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El programa de estudios realiza seguimiento al desempeño de los estudiantes a lo largo de la formación y les ofrece el apoyo necesario para lograr el avance esperado.',
            'indice'=>20
        ]);
        $infoEstandar21 = InfoEstandar::create([
            'titulo'=>'Actividades extracurriculares',
            'factor'=>'Factor 6',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El programa de estudios promueve y evalúa la participación de estudiantes en actividades extracurriculares que contribuyan en su formación.',
            'indice'=>21
        ]);
        $infoEstandar22 = InfoEstandar::create([
            'titulo'=>'Gestión y calidad de la I+D+i realizada por docentes',
            'factor'=>'Factor 7',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El programa de estudios gestiona, regula y asegura la calidad de la i I+D+i realizada por docentes, relacionada al área disciplinaria a la que pertenece, en coherencia con la política de I+D+i de la universidad.',
            'indice'=>22
        ]);
        $infoEstandar23 = InfoEstandar::create([
            'titulo'=>' I+D+i para la obtención del grado y titulo',
            'factor'=>'Factor 7',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El perfil de egreso se revisa periódicamente y de forma participativa.',
            'indice'=>23
        ]);
        $infoEstandar24 = InfoEstandar::create([
            'titulo'=>'Publicaciones de los resultados de I+D+i',
            'factor'=>'Factor 7',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El programa de estudio fomenta que los resultados de los trabajos de I+D+i realizados por los docentes se publiquen, se incorporen a la docencia y sean de conocimiento de los académicos y estudiantes',
            'indice'=>24
        ]);
        $infoEstandar25 = InfoEstandar::create([
            'titulo'=>'Responsabilidad social',
            'factor'=>'Factor 8',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios identifica, define y desarrolla las acciones de responsabilidad social articuladas con la formación integral de los estudiantes.',
            'indice'=>25
        ]);
        $infoEstandar26 = InfoEstandar::create([
            'titulo'=>'Implementacion de políticas ambientales',
            'factor'=>'Factor 8',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios implementa políticas ambientales, y monitorea el cumplimiento de medidas de prevención en tal ámbito.',
            'indice'=>26
        ]);
        $infoEstandar27 = InfoEstandar::create([
            'titulo'=>'Bienestar',
            'factor'=>'Factor 9',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios asegura que los estudiantes, docentes y personal administrativo tengan acceso a servicios de bienestar para mejorar su desempeño y formación, asimismo, evalúa el impacto de dichos servicios.',
            'indice'=>27
        ]);
        $infoEstandar28 = InfoEstandar::create([
            'titulo'=>'Equipamiento y uso de la infraestructura',
            'factor'=>'Factor 10',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios tiene la infraestructura (salones de clase, oficinas, laboratorios, talleres, equipamiento, etc.) y el equipamiento pertinentes para su desarrollo.',
            'indice'=>28
        ]);
        $infoEstandar29 = InfoEstandar::create([
            'titulo'=>'Mantenimiento de la infraestructura',
            'factor'=>'Factor 10',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios mantiene y ejecuta un programa de desarrollo, ampliación, mantenimiento, renovación y seguridad de su infraestructura y equipamiento, garantizando su funcionamiento.',
            'indice'=>29
        ]);
        $infoEstandar30 = InfoEstandar::create([
            'titulo'=>'Sistema de información y comunicación',
            'factor'=>'Factor 10',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios tiene implementado un sistema de información y comunicación accesible, como apoyo a la gestión académica, I+D+i y a la gestión administrativa.',
            'indice'=>30
        ]);
        $infoEstandar31 = InfoEstandar::create([
            'titulo'=>'Centros de información y referencia',
            'factor'=>'Factor 10',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios hace uso de centros de información y referencia o similares, acorde a las necesidades de estudiantes y docentes, disponibles en la universidad, gestionados a través de un programa de actualización y mejora continua.',
            'indice'=>31
        ]);
        $infoEstandar32 = InfoEstandar::create([
            'titulo'=>'Recursos Humanos para la gestión del programa de estudios',
            'factor'=>'Factor 11',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El grupo directivo o alta dirección del programa de estudios, está formado por profesionales calificados que gestionan su desarrollo y fortalecimiento. Asimismo, el programa de estudios dispone del personal administrativo para dar soporte a sus actividades.',
            'indice'=>32
        ]);
        $infoEstandar33 = InfoEstandar::create([
            'titulo'=>'Logro de competencia',
            'factor'=>'Factor 12',
            'dimension'=>'Dimensión 5',
            'descripcion'=>'El programa de estudios utiliza mecanismos para evaluar que los egresados cuentan con las competencias definidas en el perfil de egreso.',
            'indice'=>33
        ]);
        $infoEstandar8 = InfoEstandar::create([
            'titulo'=>'Seguimientos a egresados y objetivos educacionales',
            'factor'=>'Factor 12',
            'dimension'=>'Dimensión 5',
            'descripcion'=>'El perfil de egreso se revisa periódicamente y de forma participativa.',
            'indice'=>34
        ]);
        return response()->json(["generacion"=>"completada"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InfoEstandar $infoEstandar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InfoEstandar $infoEstandar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InfoEstandar $infoEstandar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InfoEstandar $infoEstandar)
    {
        //
    }
}
