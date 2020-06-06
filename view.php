<?php
class View
{

    public static function render($path, array $data = [])
    {
        return View::evalPath($path, $data);
    }

    protected static function evalPath($__path, $__data)
    {
        $__obLevel = ob_get_level();

        ob_start();

        extract($__data, EXTR_SKIP);

        try {
            include $__path;
        } catch (Throwable $e) {
            View::handleException($e, $__obLevel);
        }

        $data = ob_get_clean();

        return $data;
    }

    protected static function handleException(Throwable $e, int $_obLastLevel)
    {
        if (ob_get_level() > $_obLastLevel) {
            ob_end_clean();
        }

        throw $e;
    }

}