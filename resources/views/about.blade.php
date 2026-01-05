@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">About Us</h1>
        <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200 prose max-w-none text-gray-700">
            <p class="mb-4">
                Welcome to the Calculator application. This project is designed to demonstrate the capabilities of Laravel
                framework in building robust and scalable web applications.
            </p>
            <p class="mb-4">
                Our goal is to provide a clean and intuitive interface for performing basic calculations while
                maintaining a history of your operations.
            </p>
            <h3 class="text-xl font-semibold mt-6 mb-3">Our Mission</h3>
            <p class="mb-4">
                To simplify daily calculations and provide a reliable tool for everyone.
            </p>
            <h3 class="text-xl font-semibold mt-6 mb-3">Contact</h3>
            <p>
                For any inquiries, please contact us at <a href="mailto:info@calculadora.com"
                    class="text-blue-600 hover:underline">info@calculadora.com</a>.
            </p>
        </div>
    </div>
@endsection