<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (auth()->user()->subscribed('main')){
                return redirect('/')->with('message', ['warning', __("Actualmente ya estas suscrito a otro plan")]);
            }
           return $next($request);
        })->only(['plans', 'processSubscription']);
    }

    public function plans()
    {
        return view('subscriptions.plans');
    }

    public function processSubscription(Request $request)
    {
        $token = $request->get('stripeToken');
        try{
            if ($request->has('coupon')){
                $request->user()
                    ->newSubscription('main', $request->get('type'))
                    ->withCoupon($request->get('coupon'))
                    ->create($token)
                ;
            }else{
                $request->user()
                    ->newSubscription('main', $request->get('type'))
                    ->create($token)
                ;
            }
            return redirect(route('subscription.admin'))->with('message', ['success', __("La suscripcion se ha llevado acabo correctamente")]);
        }catch (\Exception $exception){
            $error = $exception->getMessage();
            return back()->with('message', ['danger', $error]);
        }
    }

    public function admin()
    {
        $subscriptions = auth()->user()->subscriptions;
        return view('subscriptions.admin', compact('subscriptions'));
    }

    public function resume()
    {
        $subscription = request()->user()->subscription(request('plan'));
        if($subscription->cencelled() && $subscription->onGracePeriod()){
            request()->user()->subscription(request('plan'))->resume();
            return back()->with('message', ['success', __('Haz reanudado tu subscripcion correctamente')]);
        }
        return back();
    }

    public function cancel()
    {
        auth()->user()->subscription(request('plan'))->cancel();
        return back()->with('message', ['success', __('Haz cancelado tu subscripcion correctamente')]);


    }
}
