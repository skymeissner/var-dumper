<?php


use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;

if (!function_exists('dump')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     */
    function dump($var)
    {
        foreach (func_get_args() as $var) {
            VarDumper::dump($var);
        }
    }
}

if (!function_exists('d')) {
	
    
	function d($data, $depth = 0)
    {
		$cloner = new VarCloner();
		$dumper = new CliDumper();
		
		$data = $cloner->cloneVar($data);
		if ($depth) {
            $data = $data->withMaxDepth($depth);

        }
		
        $dumper->dump($data);
        
    }
}

if (!function_exists('dd')) {
	

	function dd($var, $depth = 0)
    {
        d($var, $depth);
		die();
    }
}

