<?php
namespace App\Http\Traits;


trait RowToColTrait
{
	public function rowToCol($array)
	{
	    $out = array();
	    foreach ($array as  $rowkey => $row) {
	        foreach($row as $colkey => $col){
	            $out[$colkey][$rowkey]=$col;
	        }
	    }
    return $out;
	}
}