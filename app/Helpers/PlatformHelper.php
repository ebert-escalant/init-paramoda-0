<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class PlatformHelper
{
    public static function redirectCorrect($message, $routeRedirect)
	{
		Session::flash('globalMessage', $message);
		Session::flash('type', 'success');

		return redirect($routeRedirect);
	}

	public static function redirectAlert($message, $routeRedirect)
	{
		Session::flash('globalMessage', $message);
		Session::flash('type', 'notice');

		return redirect($routeRedirect);
	}

	public static function redirectError($message, $routeRedirect)
	{
		Session::flash('globalMessage', $message);
		Session::flash('type', 'error');

		return redirect($routeRedirect);
	}

	public static function preparePaginate($query, $rowPage, $currentPage)
	{
		$rocordNumberShow=$rowPage;
		$currentPage=$currentPage<=0 ? 1 : $currentPage;
		$quantityPage=ceil(($query->count())/$rocordNumberShow);
		$currentPage=$currentPage>$quantityPage ? ($quantityPage > 0 ? $quantityPage : 1) : $currentPage;
		$data=$query->skip(($currentPage*$rocordNumberShow)-$rocordNumberShow)->take($rocordNumberShow)->get();
		$quantityPage=($quantityPage==0 ? 1 : $quantityPage);

		return ['data' => $data, 'currentPage' => $currentPage, 'quantityPage' => $quantityPage];
	}
    
	public static function ajaxDataNoExists()
	{
		echo '<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Prohibido!</h4>No se puede procesar esta petición porque no se encontraron datos.</div>';exit;
	}

	public static function ajaxDataMessage($message)
	{
		echo '<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Prohibido!</h4>'.$message.'</div>';exit;
	}
}