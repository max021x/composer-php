<?php

namespace Core;

class Errorhandler
{
    public static function handleException(\Throwable $exception)
    {
        if (php_sapi_name() === 'cli') {
            static::renderCliError($exception);
        } else {
            static::renderErrorPage($exception);
        }
    }

    private function renderCliError(\Throwable $exception)
    {
        $isDebug = App::get('config')['app']['debug'] ?? false;

        if ($isDebug) {
            $errorMessage = static::formatErrorMessage(
                $exception,
                "\33[31m[%s] Error :\33[0m %s : %s in %s on line %d\n"
            );
            $trace = $exception->getTraceAsString();
        } else {
            $errorMessage = "\33[31m[ unexpected error occurred . Please check error log for details . \033[0m\n";
            $trace = "";
        }

        fwrite(STDERR, $errorMessage);

        if ($trace) {
            fwrite(STDERR, "\n Stack trace:\n$trace\n");
        }

        exit(1);
    }


    public static function handleError($level, $message, $file, $line)
    {
        $exception = new \ErrorException($message, 0, $level, $file, $line);
        self::handleException();
    }

    private static function formatErrorMessage(\Throwable $exception, string $format): string
    {
        return sprintf(
            $format,
            date('Y-m-d H:i:s'),
            get_class($exception),
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine(),
        );
    }
}
