<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Notifications\DatabaseNotification;

use Auth;

use Alert;

use sgve\Mensaje;

class NotificacionController extends Controller
{

	function __construct()
	{
		$this->middleware(['auth', 'roles:3']);
	}
    
    public function notificaciones()
    {
    	$noLeidas = Auth::user()->unreadNotifications;
    	$Leidas = Auth::user()->readNotifications;

    	return view('docente.notificaciones', compact('noLeidas', 'Leidas'));
    }

    public function notificacionMostrar($id)
    {
    	$mensaje = Mensaje::findOrFail($id);

    	return view('docente.mensaje', compact('mensaje'));
    }

    public function leidaNotificacion($id)
    {
        DatabaseNotification::find($id)->markAsRead();

        Alert::success('Notificación marcada como leída', 'Notificación leída');

        return redirect()->back();
    }

    public function borrarNotificacion($id)
    {
    	DatabaseNotification::find($id)->delete();

        Alert::success('Notificación eliminada de la lista', 'Notificación eliminada');

        return redirect()->back();
    }


}
