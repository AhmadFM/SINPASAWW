<?php
// ── app/Http/Middleware/AdminMiddleware.php ─────────────────────────────────
// Daftarkan di app/Http/Kernel.php:
//   protected $routeMiddleware = [
//       ...
//       'admin' => \App\Http\Middleware\AdminMiddleware::class,
//   ];
// ──────────────────────────────────────────────────────────────────────────────
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        /* Cek autentikasi terlebih dahulu */
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        /* Cek role admin */
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk admin.');
        }

        return $next($request);
    }
}
