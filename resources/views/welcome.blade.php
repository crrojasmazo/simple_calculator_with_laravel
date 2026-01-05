@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh] text-center">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Welcome to Calculadora App</h1>
    <p class="text-lg text-gray-600 mb-8 max-w-2xl">
        A simple and efficient calculator application built with Laravel. Manage your calculations and track your history easily.
    </p>

    @guest
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-4xl">
            <a href="{{ route('login') }}" class="block p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-200 border border-gray-200 group">
                <h2 class="text-xl font-semibold mb-2 group-hover:text-blue-600">Login</h2>
                <p class="text-gray-600">Access your account to save your calculation history.</p>
            </a>
            <a href="{{ route('register') }}" class="block p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-200 border border-gray-200 group">
                <h2 class="text-xl font-semibold mb-2 group-hover:text-blue-600">Register</h2>
                <p class="text-gray-600">Create a new account to get started.</p>
            </a>
        </div>
    @else
        <div class="w-full max-w-md">
            <a href="{{ route('calculator.index') }}" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200 shadow-md">
                Go to Calculator
            </a>
            <p class="mt-4 text-gray-600">You are already logged in as {{ Auth::user()->name }}.</p>
        </div>
    @endguest

    <div class="mt-12">
        <h3 class="text-2xl font-semibold mb-4 text-gray-800">Features</h3>
         <ul class="text-left list-disc list-inside text-gray-700 space-y-2 inline-block">
            <li>Simple arithmetic operations</li>
            <li>History tracking for authenticated users</li>
            <li>Secure authentication system</li>
            <li>Responsive design</li>
        </ul>
    </div>
</div>
@endsection
