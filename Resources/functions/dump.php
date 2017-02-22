<?php


use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
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
	
    
	function d($data, $depth = null, $maxItems = null)
    {	
		
		$cloner = new VarCloner();
		$dumper = 'cli' === PHP_SAPI ? new CliDumper() : new HtmlDumper();

		if ($maxItems) {
			$cloner->setMaxItems($maxItems);
		}

		$data = $cloner->cloneVar($data);
		if ($depth) {
            $data = $data->withMaxDepth($depth);

        }

        $dumper->dump($data);
        
    }
}

if (!function_exists('dd')) {
	

	function dd($data, $depth = null, $maxItems = null)
    {
        d($data, $depth, $maxItems);
		die();
    }
}

