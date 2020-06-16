<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use App\User;
use App\Tribu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rules()
    {
        return [
        'cant_f' => 'required|between:6,8',
        'cant_m' => 'required|between:6,8',
        'total_indios' => 'required|between:12,16',
    ];
    }

    public function obtenerDatos()
    {
        $indios = User::find(Auth::user()->id)->indios; //Este query hace: Select todo de la tabla Usuarios where el id sea igual al usuario logeado. Y luego devuelve a los hijos del usuario logeado, osea los indios que registró. Es igual a "todo de Usuarios where parent_id = user logeado".

        $isTribuConfirmed = Tribu::where("user_id", Auth::user()->id)->get();

        $total_indios = 1;
        $cant_f = Auth::user()->gender === 'F' ? 1 : 0;
        $cant_m = Auth::user()->gender === 'M' ? 1 : 0;
        $canConfirmTribu = false;

        foreach ($indios as $indio) {
            $cant_f = $cant_f + ($indio->gender === 'F' ? 1 : 0);
            $cant_m = $cant_m + ($indio->gender === 'M' ? 1 : 0);
            $total_indios++;
        }

        $min_total = 3;
        $min_f = 1;
        $min_m = 1;

        $max_total = 4;
        $max_f = 3;
        $max_m = 3;

        if ($total_indios >= $min_total && $total_indios <= $max_total && $cant_f >= $min_f && $cant_f <= $max_f && $cant_m >= $min_m && $cant_m <= $max_m) {
            $canConfirmTribu = true;
        }

        $dataTribu = (object)[
          'cant_f' => $cant_f,
          'cant_m' => $cant_m,
          'total_indios' => $total_indios,
          'canConfirmTribu' =>  $canConfirmTribu,
          'isTribuConfirmed'=> $isTribuConfirmed,
          'min_total'=> $min_total,
          'min_f'=> $min_f,
          'min_m'=> $min_m,
          'max_total'=> $max_total,
          'max_f'=> $max_f,
          'max_m'=> $max_m,
        ];

        //dd($dataTribu->canConfirmTribu);

        return view('perfil', compact('indios', 'dataTribu'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request) //Store guarda un indio en la DB. Funcion exclusiva para que el Cacique agregue indios.
    {
        //dd($request);
        $user = User::create([
            'parent_id' => Auth::user()->id,
            'name' => $request['name'],
            'surname' => $request['surname'],
            'dni' => $request['dni'],
            'gender' => $request['gender'],
            'birthdate' => $request['birthdate'],
            'address' => $request['address'],
            'city' => $request['city'],
            'between_streets' => $request['between_streets'],
            'phone' => $request['phone'],
            'cel' => $request['cel'],
            'school' => $request['school'],
            'grade' => $request['grade'],
            'email' => $request['email'],
            'password' => Hash::make($request['dni']),
        ]);

        $user->sendEmailVerificationNotificationToIndio(); //Cuando registramos un Usuario le mandamos un mail para que confirme su correo. Es importante ya que con el Middleware "verified" no van a poder acceder a la plataforma a no ser que hayan verificado su correo.
        
        return redirect('perfil');
    }

    public function detalleIndio($id)
    {
        $persona = User::find($id); //Buscamos en Usuarios el ID que pasamos en la ruta

        if ($persona != null && Auth::user()->id == $persona->parent_id) { //Averiguamos si quien consulta es, efectivamente, el cacique de ese ID (persona)
        return view('detalle', compact('persona')); //Si esa persona es su indio, le devolvemos los datos
        } else { //Sino, vaciamos la variable para que tire error.
        $persona = null;
            return view('detalle', compact('persona'));
        }
    }

    public function actualizarIndio(UserStoreRequest $request)
    {
        $persona = User::find($request->id); //Instanciamos el modelo User a buscar en la variable $indio
        if ($persona->parent_id == Auth::user()->id) {
      
          $persona->name = $request['name'];
          $persona->surname = $request['surname'];
          $persona->dni = $request['dni'];
          $persona->gender = $request['gender'];
          $persona->birthdate = $request['birthdate'];
          $persona->address = $request['address'];
          $persona->city = $request['city'];
          $persona->between_streets = $request['between_streets'];
          $persona->phone = $request['phone'];
          $persona->cel = $request['cel'];
          $persona->school = $request['school'];
          $persona->grade = $request['grade'];
          $persona->email = $request['email'];

          $persona->save(); //Guarda los nuevos atributos en el modelo.
          $flag = 1; //Flag para mostrar un aviso de que los datos fueron modificados con éxito desde la vista.
          return view('detalle', ['id' => $request->id], compact('persona', 'flag')); //Retornamos la vista con el mismo ID para seguir viendo a la misma persona, y compactamos los nuevos datos editados para poder visualizarlos.
        }
        else {
          abort(403, 'No estás autorizado.');
        }
    }

    public function eliminarIndio($id)
    {
        $indio = User::find($id)->delete();

        return redirect('perfil');
    }

    // AAA               DDDDDDDDDDDDD        MMMMMMMM               MMMMMMMM
    // A:::A              D::::::::::::DDD     M:::::::M             M:::::::M
    // A:::::A             D:::::::::::::::DD   M::::::::M           M::::::::M
    // A:::::::A            DDD:::::DDDDD:::::D  M:::::::::M         M:::::::::M
    // A:::::::::A             D:::::D    D:::::D M::::::::::M       M::::::::::M
    // A:::::A:::::A            D:::::D     D:::::DM:::::::::::M     M:::::::::::M
    // A:::::A A:::::A           D:::::D     D:::::DM:::::::M::::M   M::::M:::::::M
    // A:::::A   A:::::A          D:::::D     D:::::DM::::::M M::::M M::::M M::::::M
    // A:::::A     A:::::A         D:::::D     D:::::DM::::::M  M::::M::::M  M::::::M
    // A:::::AAAAAAAAA:::::A        D:::::D     D:::::DM::::::M   M:::::::M   M::::::M
    // A:::::::::::::::::::::A       D:::::D     D:::::DM::::::M    M:::::M    M::::::M
    // A:::::AAAAAAAAAAAAA:::::A      D:::::D    D:::::D M::::::M     MMMMM     M::::::M
    // A:::::A             A:::::A   DDD:::::DDDDD:::::D  M::::::M               M::::::M
    // A:::::A               A:::::A  D:::::::::::::::DD   M::::::M               M::::::M
    // A:::::A                 A:::::A D::::::::::::DDD     M::::::M               M::::::M
    // AAAAAAA                   AAAAAAADDDDDDDDDDDDD        MMMMMMMM               MMMMMMMM


    public function registrarCacique(UserStoreRequest $request){
      if (Auth::user()->is_admin == 1) {
        $cacique = User::create([
          'parent_id' => NULL,
          'name' => $request['name'],
          'surname' => $request['surname'],
          'gender' => $request['gender'],
          'birthdate' => $request['birthdate'],
          'address' => $request['address'],
          'city' => $request['city'],
          'between_streets' => $request['between_streets'],
          'phone' => $request['phone'],
          'cel' => $request['cel'],
          'school' => $request['school'],
          'grade' => $request['grade'],
          'email' => $request['email'],
          'dni' => $request['dni'],
          'password' => Hash::make($request['dni'])
        ]);

        $cacique->sendEmailVerificationNotification(); //Cuando registramos un Cacique le mandamos un mail para que confirme su correo. Es importante ya que con el Middleware "verified" no van a poder acceder a la plataforma a no ser que hayan verificado su correo.

        return redirect(route('adminPanel'));
      }
      else {
        abort(403, 'No estás autorizado.');
      }

    }

    public function buscarPersonaPorDni(Request $request)
    {
      $persona = User::where('dni', $request->dni)->first(); //First hace que no haya que usar una foreach para recorrer la coleccion.

      return view('adm/detallePersona', compact('persona'));
    }

    public function actualizarDni(userStoreRequest $request){
      if (Auth::user()->is_admin == 1) {
        $persona = User::find($request->id); //Instanciamos a la persona por el DNI, ya que nunca van a haber DNI repetidos en la DB.

        $persona->name = $request['name'];
        $persona->surname = $request['surname'];
        $persona->gender = $request['gender'];
        $persona->birthdate = $request['birthdate'];
        $persona->address = $request['address'];
        $persona->city = $request['city'];
        $persona->between_streets = $request['between_streets'];
        $persona->phone = $request['phone'];
        $persona->cel = $request['cel'];
        $persona->school = $request['school'];
        $persona->grade = $request['grade'];
        $persona->email = $request['email'];
        $persona->dni = $request['dni'];

        $persona->save();

        $persona = User::find($request->id); //Despues de crearla la devolvemos a la vista.
        $flag = 1; //Flag para mostrar la leyenda de actualizacion exitosa.
        return view('adm/detallePersona', compact('persona', 'flag'));
      }
      else {
        abort(403, 'No estás autorizado.');
      }
      
    }

    public function mostrarListadoCaciques()
    {
      /*Datos para Estadísticas*/
      $datos = [
        "total" => User::where('is_admin', 0)->count(),
        "totalCaciques" => User::where('parent_id', NULL)->where('is_admin', 0)->count(),
        "totalConfirmadas" => Tribu::all()->count()
      ];
      /*Fin Datos Estadísticas*/

      $data = User::where("parent_id", null)->where("is_admin", 0)->get(); //Traemos caciques y que no sean admin. (Para no mostrar al admin en el listado).
      $caciques = $data->reverse(); //Revertimos la coleción para que muestre el cacique mas recientemente agregado en la primera posición.

      return view('adm/panel', compact('caciques', 'datos'));
    }

    public function mostrarListadoTribus($id)
    {
      $indios = User::find($id)->indios;
      $cacique = User::find($id);
      return view('adm/listadoTribu', compact('indios', 'cacique'));
    }

}
