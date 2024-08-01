@extends('layouts.front')

@section('content')
    <main class="container mx-auto py-12 px-4" x-data="{
        searchTerm: '',
        selectedOffice: 'all',
        selectedParty: 'all',
        candidates: @json($candidates)
    }">
        <!-- Header -->
        <header class="text-center mb-12">
            <h1 class="text-5xl font-bold text-primary mb-4">Search Candidates</h1>
            <p class="text-xl text-gray-600">Find and compare candidates for upcoming elections</p>
        </header>

        <!-- Search and Filter Section -->
        <section class="bg-white rounded-lg shadow-md p-8 mb-8">
            <form action="{{ route('candidate.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="col-span-2">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search Candidates</label>
                    <div class="relative">
                        <input type="text" id="search" name="search" x-model="searchTerm"
                            placeholder="Enter candidate name"
                            class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-primary focus:border-primary">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </span>
                    </div>
                </div>
                <div>
                    <label for="office" class="block text-sm font-medium text-gray-700 mb-1">Office</label>
                    <select id="office" name="office" x-model="selectedOffice"
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-primary focus:border-primary">
                        <option value="all">All Offices</option>
                        @foreach ($offices as $office)
                            <option value="{{ $office }}">{{ $office }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="party" class="block text-sm font-medium text-gray-700 mb-1">Party</label>
                    <select id="party" name="party" x-model="selectedParty"
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-primary focus:border-primary">
                        <option value="all">All Parties</option>
                        @foreach ($parties as $party)
                            <option value="{{ $party }}">{{ $party }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-full mt-4">
                    <button type="submit"
                        class="w-full bg-primary text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 transition">
                        Search Candidates
                    </button>
                </div>
            </form>
        </section>

        <!-- Results Section -->
        <section class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-primary mb-6">Search Results</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($candidates as $candidate)
                    <div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-md transition">
                        <div class="flex items-center mb-4">
                            <img src="{{ $candidate->image }}" alt="{{ $candidate->name }}"
                                class="w-16 h-16 rounded-full object-cover mr-4">
                            <div>
                                <h3 class="text-xl font-semibold">{{ $candidate->name }}</h3>
                                <p class="text-gray-600">{{ $candidate->office }} - {{ $candidate->party }}</p>
                            </div>
                        </div>
                        <a href="{{ route('candidates.show', $candidate->id) }}" class="text-primary hover:underline">View
                            Profile</a>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-600">No candidates found matching your search criteria.
                    </p>
                @endforelse
            </div>
        </section>

        <!-- Pagination -->
        {{-- <nav class="mt-8 flex justify-center">
            {{ $candidates->links() }}
        </nav> --}}
    </main>
@endsection
