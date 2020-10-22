<?php
namespace App\Http\Traits;


trait ImageWidthHeight
{
	public function getNewWidth($CurrentWidth, $CurrentHeight, $value)
	{
       return ( $CurrentWidth > $CurrentHeight ) ? $value : Null ;
    }

	public function getNewHeight($CurrentWidth, $CurrentHeight, $value)
	{
       return ( $CurrentWidth <= $CurrentHeight ) ? $value : Null ;
    }    
}