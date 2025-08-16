<?php

namespace App\Helpers;

use App\Enums\LogTypes;
use Illuminate\Support\Facades\Log;

/**
 * Class Logger
 *
 * Provides static helper methods for structured and contextual logging within the application.
 * Supports logging with custom types and automatically includes request and route context information.
 */
class Logger
{
    /**
     * Logs a message with the specified type, message, and optional data/context.
     *
     * Builds a structured context array that includes request method, path, controller, action,
     * and any custom context provided. Only logs if the given type is a valid LogType.
     *
     * @param string $type    The log level/type (e.g., 'info', 'error', etc.).
     * @param string $message The log message to record.
     * @param mixed|null $data     Optional data to include in the log context.
     * @param array $context  Additional context information to include in the log (default: []).
     * @return void
     */
    public static function logger(string $type, string $message, mixed $data = null, array $context = []): void
    {

        $loggerContextBuild = self::buildContext($data, $context);

        if(LogTypes::tryFrom($type) !== null){
            Log::$type($message, $loggerContextBuild);
        }
    }


    /**
     * Builds a structured context array for logging, including request and route information.
     *
     * Adds details such as request method, path, controller class, action name, the provided data,
     * and any additional context. Used internally by the logger method.
     *
     * @param mixed $data     Data to include in the context.
     * @param array $context  Additional context information (default: []).
     * @return array          The assembled context array for logging.
     */

    private static function buildContext(mixed $data, array $context = []): array
    {
        return [
            'data' => $data ,
            'method' => request() !== null ?  request()->method() : null ,
            'path' =>  request() !== null ?  request()->path() : null,
            'controller' => request()->route() !== null ?  request()->route()->getControllerClass(): null,
            'action' => request()->route() !== null? request()->route()->getActionName() : null,
            'context' => $context ?? []
        ];
    }
}
