<?php

use App\Http\Middleware\NoCacheHeaders;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\SetLanguage;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Application;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'stripe/*',
            'nowpayments/validate-address',
            'ipn-callback'
        ]);

        $middleware->alias([
            'no-cache' => \App\Http\Middleware\NoCacheHeaders::class,
            'history' => \App\Http\Middleware\PreventBackHistory::class,
        ]);

        $middleware->appendToGroup('web', SetLanguage::class);
        $middleware->appendToGroup('web', NoCacheHeaders::class);
        $middleware->appendToGroup('web', PreventBackHistory::class);
    })
    
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle 404 (route not found)
        $exceptions->render(function (NotFoundHttpException $e, $request) {
            if ($request->is('ipn-callback')) {
                // Let Laravel’s default handler run → no redirect
                return null;
            }
            return redirect('/');
        });

        // Handle 405 (method not allowed)
        $exceptions->render(function (MethodNotAllowedHttpException $e, $request) {
            if ($request->is('ipn-callback')) {
                // Return 200 so gateway doesn’t think it failed
                return response('OK', 200);
            }
            return redirect('/');
        });
    })
    ->create();
