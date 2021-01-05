<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * asset ()
 * ------------------------------------------------------------------------
 *
 * Assumes that all resources are in a asset directory in the root
 * along with index.php.
 *
 * USAGE:
 *
 * asset('path/filename.ext')
 */
if ( ! function_exists('asset'))
{
    /**
     * method ()
     * ---------------------------------------------------------------------------
     *
     * @param   $uri
     * @return  mixed
     */
    function asset($uri)
    {
        return base_url('public/'.$uri);
    }
}