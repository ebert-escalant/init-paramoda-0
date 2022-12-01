<?php
namespace App\Helpers;

class ViewHelper
{
    public static function renderPagination($urlPage, $quantityPage, $currentPage, $searchParameter)
	{
		$searchParameter=($searchParameter!='' && $searchParameter!=null) ? '&'.$searchParameter : '';


		$paginationSection=''
			.'<div class="flex items-center space-x-4">'
				.'<button onclick="_globalFunction.clickLink(\''.url($urlPage).'?page=1'.$searchParameter.'\');" class="text-lg px-3 py-0.5 rounded-full hover:bg-primary-dark font-bold '.(1==$currentPage ? 'bg-primary text-gray-100' : ' text-primary hover:text-white border-2 border-primary ').'">1</button>';
		if($currentPage-2>1)
		{
			$paginationSection.='...';
		}
		
		for($i=($currentPage-2<=1 ? 2 : $currentPage-2); $i<=($quantityPage<($currentPage+2) ? $quantityPage : $currentPage+2); $i++)
		{
			$paginationSection.='<button onclick="_globalFunction.clickLink(\''.url($urlPage).'?page='.$i.$searchParameter.'\');" class="text-lg px-3 py-0.5 rounded-full hover:bg-primary-dark font-bold '.($i==$currentPage ? 'bg-primary text-gray-100' : 'text-primary  hover:text-white border-2 border-primary').'">'.$i.'</button>';
		}
		if($quantityPage>($currentPage+2))
		{
			$paginationSection.='...'
				.'<button onclick="_globalFunction.clickLink(\''.url($urlPage).'?page='.$quantityPage.$searchParameter.'\');" class="text-lg px-3 py-0.5 rounded-full hover:bg-primary-dark font-bold '.($quantityPage==$currentPage ? ' bg-primary text-gray-100':'text-primary hover:text-white border-2 border-primary').'">'.$quantityPage.'</button>';
		}
		
		$paginationSection.='</div>';

		return $paginationSection;
	}
}