<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\VisitorLog;
use Throwable;

class TrackVisitor
{
    /**
     * Handle an incoming request and track real visitors.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Hanya catat request GET sukses dari halaman publik (bukan admin, api, ataupun asset)
        if ($request->isMethod('GET') && $response->getStatusCode() < 400) {
            $path = $request->path();

            // Abaikan route internal, admin, auth, file statis, dan preview
            if (
                !$request->is('admin*') &&
                !$request->is('login*') &&
                !$request->is('logout*') &&
                !$request->is('storage*') &&
                !$request->is('up') &&
                !$request->is('_*') &&
                !$request->ajax() &&
                !$request->wantsJson()
            ) {
                try {
                    $ip = $request->ip() ?: '127.0.0.1';
                    $userAgent = substr((string) $request->userAgent(), 0, 255);
                    $url = $path === '' || $path === '/' ? '/' : '/' . ltrim($path, '/');
                    $referrer = $request->headers->get('referer');
                    $today = now()->toDateString();

                    $log = VisitorLog::whereDate('visit_date', $today)
                        ->where('ip_address', $ip)
                        ->where('url', $url)
                        ->first();

                    if ($log) {
                        $log->increment('visit_count');
                        if ($referrer && !$log->referrer) {
                            $log->update(['referrer' => substr($referrer, 0, 255)]);
                        }
                    } else {
                        VisitorLog::create([
                            'ip_address'  => $ip,
                            'user_agent'  => $userAgent,
                            'url'         => $url,
                            'referrer'    => $referrer ? substr($referrer, 0, 255) : null,
                            'visit_date'  => $today,
                            'visit_count' => 1,
                        ]);
                    }
                } catch (Throwable $e) {
                    // Fail silently agar tidak mengganggu rendering response publik
                }
            }
        }

        return $response;
    }
}
