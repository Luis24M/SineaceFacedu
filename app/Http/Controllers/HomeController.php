<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\BSON\ObjectId; 
use App\Models\Subcomite;
use App\Models\Estandar;
use App\Models\Programa;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redirect()
    {
        if(Auth::user()->rol == 'adminPrograma'){
            return $this->adminPrograma();
        }
        else {
            if (Auth::user()->rol == 'admin') {
                return $this->admin();
            } else {
                return $this->index();
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subcomite = Subcomite::where('nombre', Auth::user()->subcomite)->first();
        $estandares = Estandar::whereIn('id', $subcomite->estandares)->get();
        return view('usuario.home', compact('subcomite', 'estandares'));
    }

    public function adminPrograma()
    {
        $subcomites = Subcomite::all();
        $estandares = Estandar::all();
        return view('adminPrograma.home', compact('subcomites', 'estandares'));
    }

    public function admin()
    {   
        $programas = Programa::all();
        return view('administrador.home',compact('programas'));
    }

    /*CREAR USUARIO Y PROGRAMA Y SUBCOMITES y ESTANDARES*/

    /*ESTANDARES DE PROGRAMAS */
    public function CrearPrograma(Request $request){

         $estandar1=Estandar::Create([
            'titulo'=>'Propósitos articulados',
            'factor'=>'Factor 1',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'Los propósitos del programa de estudios están definidos, alineados con la misión y  visión institucional y han sido construidos participativamente.',
            'contextualizacion',
            'criterios',
            ]);
        $estandar2=Estandar::Create([
            'titulo'=>'Participación de los grupos de interés',
            'factor'=>'Factor 1',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El programa de estudios mantiene y ejecuta mecanismos que consideran la participación de los grupos de interés
            para asegurar que la oferta académica sea pertinente con la demanda social.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar3=Estandar::Create([
            'titulo'=>'Revisión periódica y participativa de las políticas y objetivos',
            'factor'=>'Factor 1',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El programa de estudios mantiene y ejecuta mecanismos de revisión periódica y participativa de las políticas y objetivos
            institucionales que permiten reorientar
            sus metas, planes de acción y recursos.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar4=Estandar::Create([
            'titulo'=>'Sostenibilidad',
            'factor'=>'Factor 1',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El programa de estudios gestiona los recursos financieros necesarios para su funcionamiento, fortalecimiento y sostenibilidad en el tiempo con el apoyo de sus grupos de interés.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar5=Estandar::Create([
            'titulo'=>'Pertinencia del perfil de egreso',
            'factor'=>'Factor 2',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El perfil de egreso orienta la gestión del programa de estudio, es coherente con
            sus propósitos, currículo y responde a las expectativas de los grupos de interés y al entorno socioeconómico.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar6=Estandar::Create([
            'titulo'=>'Revisión del perfil de egreso',
            'factor'=>'Factor 2',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El perfil de egreso se revisa periódicamente y de forma participativa.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar7=Estandar::Create([
            'titulo'=>'Sistema de gestión de la calidad (SGC)',
            'factor'=>'Factor 3',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El perfil de egreso se revisa periódicamente y de forma participativa.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar8=Estandar::Create([
            'titulo'=>'Planes de mejora',
            'factor'=>'Factor 3',
            'dimension'=>'Dimensión 1',
            'descripcion'=>'El programa de estudios define, implementa y monitorea planes de mejora para los aspectos que participativamente se han identificado y priorizado como oportunidades de mejora.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar9=Estandar::Create([
            'titulo'=>'Plan de estudios',
            'factor'=>'Factor 4',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios utiliza mecanismos de gestión que aseguran la evaluación y actualización periódica del plan de estudios.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar10=Estandar::Create([
            'titulo'=>'Características del plan de estudios',
            'factor'=>'Factor 4',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El plan de estudios es flexible e incluye cursos que brindan una sólida base científica y humanista; con sentido de ciudadanía y responsabilidad social; y consideran una práctica pre profesional',
            'contextualizacion',
            'criterios',
        ]);
        $estandar11=Estandar::Create([
            'titulo'=>'Enfoque por competencias',
            'factor'=>'Factor 4',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios garantiza que el proceso de enseñanza-aprendizaje incluya todos los elementos que aseguren el logro de las competencias a lo largo de la formación.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar12=Estandar::Create([
            'titulo'=>'Articulación con I+D+i y responsabilidad social',
            'factor'=>'Factor 4',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios articula el proceso de enseñanza aprendizaje con la I+D+i y responsabilidad social, en la que participan estudiantes y docentes, apoyando a la formación integral y el logro de competencias.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar13=Estandar::Create([
            'titulo'=>'Movilidad',
            'factor'=>'Factor 4',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios mantiene y hace uso de convenios con universidades nacionales e internacionales para la movilidad de estudiantes y docentes, así como para el intercambio de experiencias.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar14=Estandar::Create([
            'titulo'=>'Selección, evaluación, capacitación y perfeccionamiento',
            'factor'=>'Factor 5',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios selecciona, evalúa, capacita y procura el perfeccionamiento del personal docente para asegurar su idoneidad con lo requerido en el documento curricular.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar15=Estandar::Create([
            'titulo'=>'Plana docente adecuada',
            'factor'=>'Factor 5',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios asegura que la plana docente sea adecuada en cuanto al número e idoneidad y que guarde coherencia con el propósito y complejidad del programa.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar16=Estandar::Create([
            'titulo'=>'Reconocimiento de las actividades de labor docente',
            'factor'=>'Factor 5',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios reconoce en la labor de los docentes tanto aquellas actividades estructuradas (docencia, investigación, vinculación con el medio, gestión académica-administrativa), como las no estructuradas (preparación del material didáctico, elaboración de exámenes, asesoría al estudiante, etc.).',
            'contextualizacion',
            'criterios',
        ]);
        $estandar17=Estandar::Create([
            'titulo'=>'Plan de desarrollo académico',
            'factor'=>'Factor 5',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El programa de estudios debe ejecutar un plan de desarrollo académico que estimule que los docentes desarrollen capacidades para optimizar su quehacer universitario.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar18=Estandar::Create([
            'titulo'=>'Admisión al programa de estudios',
            'factor'=>'Factor 6',
            'dimension'=>'Dimensión 2',
            'descripcion'=>'El proceso de admisión al programa de estudios establece criterios en concordancia con el perfil de ingreso, claramente especificados en los prospectos, que son de conocimiento público',
            'contextualizacion',
            'criterios',
        ]);
        $estandar19=Estandar::Create([
            'titulo'=>'Nivelación de ingresantes',
            'factor'=>'Factor 6',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El programa de estudios diseña, ejecuta y mantiene mecanismos que ayuden a nivelar, en los estudiantes, las competencias necesarias para iniciar sus estudios universitarios',
            'contextualizacion',
            'criterios',
        ]);
        $estandar20=Estandar::Create([
            'titulo'=>'Seguimientos al desempeño de los estudiantes',
            'factor'=>'Factor 6',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El programa de estudios realiza seguimiento al desempeño de los estudiantes a lo largo de la formación y les ofrece el apoyo necesario para lograr el avance esperado.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar21=Estandar::Create([
            'titulo'=>'Actividades extracurriculares',
            'factor'=>'Factor 6',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El programa de estudios promueve y evalúa la participación de estudiantes en actividades extracurriculares que contribuyan en su formación.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar22=Estandar::Create([
            'titulo'=>'Gestión y calidad de la I+D+i realizada por docentes',
            'factor'=>'Factor 7',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El programa de estudios gestiona, regula y asegura la calidad de la i I+D+i realizada por docentes, relacionada al área disciplinaria a la que pertenece, en coherencia con la política de I+D+i de la universidad.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar23=Estandar::Create([
            'titulo'=>' I+D+i para la obtención del grado y titulo',
            'factor'=>'Factor 7',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El perfil de egreso se revisa periódicamente y de forma participativa.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar24=Estandar::Create([
            'titulo'=>'Publicaciones de los resultados de I+D+i',
            'factor'=>'Factor 7',
            'dimension'=>'Dimensión 3',
            'descripcion'=>'El programa de estudio fomenta que los resultados de los trabajos de I+D+i realizados por los docentes se publiquen, se incorporen a la docencia y sean de conocimiento de los académicos y estudiantes',
            'contextualizacion',
            'criterios',
        ]);
        $estandar25=Estandar::Create([
            'titulo'=>'Responsabilidad social',
            'factor'=>'Factor 8',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios identifica, define y desarrolla las acciones de responsabilidad social articuladas con la formación integral de los estudiantes.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar26=Estandar::Create([
            'titulo'=>'Implementacion de políticas ambientales',
            'factor'=>'Factor 8',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios implementa políticas ambientales, y monitorea el cumplimiento de medidas de prevención en tal ámbito.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar27=Estandar::Create([
            'titulo'=>'Bienestar',
            'factor'=>'Factor 9',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios asegura que los estudiantes, docentes y personal administrativo tengan acceso a servicios de bienestar para mejorar su desempeño y formación, asimismo, evalúa el impacto de dichos servicios.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar28=Estandar::Create([
            'titulo'=>'Equipamiento y uso de la infraestructura',
            'factor'=>'Factor 10',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios tiene la infraestructura (salones de clase, oficinas, laboratorios, talleres, equipamiento, etc.) y el equipamiento pertinentes para su desarrollo.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar29=Estandar::Create([
            'titulo'=>'Mantenimiento de la infraestructura',
            'factor'=>'Factor 10',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios mantiene y ejecuta un programa de desarrollo, ampliación, mantenimiento, renovación y seguridad de su infraestructura y equipamiento, garantizando su funcionamiento.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar30=Estandar::Create([
            'titulo'=>'Sistema de información y comunicación',
            'factor'=>'Factor 10',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios tiene implementado un sistema de información y comunicación accesible, como apoyo a la gestión académica, I+D+i y a la gestión administrativa.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar31=Estandar::Create([
            'titulo'=>'Centros de información y referencia',
            'factor'=>'Factor 10',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El programa de estudios hace uso de centros de información y referencia o similares, acorde a las necesidades de estudiantes y docentes, disponibles en la universidad, gestionados a través de un programa de actualización y mejora continua.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar32=Estandar::Create([
            'titulo'=>'Recursos Humanos para la gestión del programa de estudios',
            'factor'=>'Factor 11',
            'dimension'=>'Dimensión 4',
            'descripcion'=>'El grupo directivo o alta dirección del programa de estudios, está formado por profesionales calificados que gestionan su desarrollo y fortalecimiento. Asimismo, el programa de estudios dispone del personal administrativo para dar soporte a sus actividades.',
            'contextualizacion',
            'criterios',
        ]);
        $estandar33=Estandar::Create([
            'titulo'=>'Logro de competencia',
            'factor'=>'Factor 12',
            'dimension'=>'Dimensión 5',
            'descripcion'=>'El programa de estudios utiliza mecanismos para evaluar que los egresados cuentan con las competencias definidas en el perfil de egreso.',
            'contextualziacion',
            'criterios'
        ]);
        $estandar34=Estandar::Create([
            'titulo'=>'Seguimientos a egresados y objetivos educacionales',
            'factor'=>'Factor 12',
            'dimension'=>'Dimensión 5',
            'descripcion'=>'El perfil de egreso se revisa periódicamente y de forma participativa.',
            'contextualziacion',
            'criterios'
        ]);

        /*COORDINADOR DE PROGRAMA */

        $coordinador = User::Create([
            'name'=>$request->nombre,
            'lastname'=>$request->apellido,
            'email'=>$request->email,
            'password'=>$request->nombre,
            'rol'=>'adminPrograma',
            'subcomite'
        ]);

        /*SUBCOMITES DE PROGRAMA */
        $subcomite1=Subcomite::Create([
            'nombre'=>'Gestion Misional Del Programa',
            'usuarios'=>[],
            'estandares'=>[new ObjectId($estandar1->_id),
            new ObjectId($estandar3->_id),
            new ObjectId($estandar5->_id),
            new ObjectId($estandar6->_id),
            new ObjectId($estandar7->_id),
            new ObjectId($estandar8->_id),
            new ObjectId($estandar9->_id),
            new ObjectId($estandar10->_id),
            new ObjectId($estandar11->_id),
            new ObjectId($estandar18->_id),
            new ObjectId($estandar33->_id),
            ]
        ]);
        $subcomite2=Subcomite::Create([
            'nombre'=>'Investigacion y Responsabilidad Social Universitaria',
            'usuarios'=>[],
            'estandares'=>[
                new ObjectId($estandar12->_id),
                new ObjectId($estandar22->_id),
                new ObjectId($estandar23->_id),
                new ObjectId($estandar24->_id),
                new ObjectId($estandar25->_id),
                new ObjectId($estandar26->_id),
            ]
        ]);
        $subcomite3=Subcomite::Create([
            'nombre'=>'Seguimiento al Egresado',
            'usuarios'=>[],
            'estandares'=>[
                new ObjectId($estandar2->_id),
                new ObjectId($estandar33->_id),
                new ObjectId($estandar33->_id)
                ]
        ]);
        $subcomite4=Subcomite::Create([
            'nombre'=>'Seguimiento al Estudiante y Movilidad',
            'usuarios'=>[],
            'estandares'=>[
                new ObjectId($estandar13->_id),
                new ObjectId($estandar19->_id),
                new ObjectId($estandar20->_id)
            ]
        ]);
        $subcomite5=Subcomite::Create([
            'nombre'=>'Desarrollo Docente, Administrativo y Actividades Extracurriculares',
            'usuarios'=>[],
            'estandares'=>[
                new ObjectId($estandar14->_id),
                new ObjectId($estandar15->_id),
                new ObjectId($estandar16->_id),
                new ObjectId($estandar17->_id),
                new ObjectId($estandar21->_id),
                new ObjectId($estandar27->_id)
            ]
        ]);
        $subcomite6=Subcomite::Create([
            'nombre'=>'Practicas Pre Profesionales, Recursos, Equipamiento e Infraestructura',
            'usuarios'=>[],
            'estandares'=>[
                new ObjectId($estandar4->_id),
                new ObjectId($estandar28->_id),
                new ObjectId($estandar29->_id),
                new ObjectId($estandar30->_id),
                new ObjectId($estandar31->_id),
                new ObjectId($estandar32->_id)
            ]
        ]);

        $programa=Programa::Create([
            'nombre'=>$request->programa,
            'subcomites'=>[
                new ObjectId($subcomite1->_id),
                new ObjectId($subcomite2->_id),
                new ObjectId($subcomite3->_id),
                new ObjectId($subcomite4->_id),
                new ObjectId($subcomite5->_id),
                new ObjectId($subcomite6->_id)
            ],
            'adminPrograma'=>new ObjectId($coordinador->_id)
        ]);

        return $this->admin();
    }

}