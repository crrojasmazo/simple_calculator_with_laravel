@extends('layouts.app')

@section('title', 'Calculator')

@section('content')
    <div class="flex flex-col items-center justify-center">

        <h1 class="text-3xl font-bold mb-6 text-gray-800">Calculator</h1>

        <form action="{{ route('calculator.store') }}" method="post"
            class="bg-gray-700 p-8 rounded-lg flex flex-col gap-4 text-white w-full max-w-md">
            @csrf

            <div class="flex items-center gap-4">
                <label for="numero1" class="w-1/3 text-right">Number 1:</label>
                <input type="number" step="any" name="numero1" id="numero1" required class="flex-1 p-2 rounded text-black"
                    value="{{ old('numero1') }}">
            </div>

            <div class="flex items-center gap-4">
                <label for="operation" class="w-1/3 text-right">Operation:</label>
                <select name="operation" id="operation" class="flex-1 p-2 rounded text-black">
                    <option value="+" {{ old('operation') == '+' ? 'selected' : '' }}>Add (+)</option>
                    <option value="-" {{ old('operation') == '-' ? 'selected' : '' }}>Subtract (-)</option>
                    <option value="*" {{ old('operation') == '*' ? 'selected' : '' }}>Multiply (*)</option>
                    <option value="/" {{ old('operation') == '/' ? 'selected' : '' }}>Divide (/)</option>
                </select>
            </div>

            <div class="flex items-center gap-4">
                <label for="numero2" class="w-1/3 text-right">Number 2:</label>
                <input type="number" step="any" name="numero2" id="numero2" required class="flex-1 p-2 rounded text-black"
                    value="{{ old('numero2') }}">
            </div>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 rounded text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded transition duration-200 mt-4">Calculate</button>
        </form>

        @if (isset($resultado))
            <div class="bg-green-700 text-white p-4 rounded-lg mt-6 text-xl border border-green-900">
                Result: {{ $resultado }}
            </div>
        @endif

        @if (isset($historial) && count($historial) > 0)
            <div class="mt-8 w-full max-w-3xl">
                <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Calculation History</h2>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="w-full bg-gray-700 text-white rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-600">
                                <th class="p-3 text-left">Date</th>
                                <th class="p-3 text-center">Num 1</th>
                                <th class="p-3 text-center">Op</th>
                                <th class="p-3 text-center">Num 2</th>
                                <th class="p-3 text-center">Result</th>
                                <th class="p-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historial as $calc)
                                <tr class="border-b border-gray-600 last:border-none hover:bg-gray-650">
                                    <td class="p-3">{{ \Carbon\Carbon::parse($calc->created_at)->diffForHumans() }}</td>
                                    <td class="p-3 text-center">{{ $calc->numero1 }}</td>
                                    <td class="p-3 text-center font-bold text-yellow-400">{{ $calc->operation }}</td>
                                    <td class="p-3 text-center">{{ $calc->numero2 }}</td>
                                    <td class="p-3 text-center font-bold">{{ $calc->resultado }}</td>
                                    <td class="p-3 text-center">
                                        <form action="{{ route('calculator.destroy', $calc->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 hover:bg-red-500 text-white py-1 px-3 rounded text-sm transition duration-200">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection