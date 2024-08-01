@extends('layouts.front')

@section('content')
    <main class="py-12">
        <!-- Candidate Header -->
        <header class="bg-white rounded-lg shadow-md p-8 mb-8 fade-in">
            <div class="flex flex-col md:flex-row items-center">
                <img src="{{ $candidate->image }}" alt="{{ $candidate->name }}"
                    class="w-48 h-48 rounded-full object-cover mb-4 md:mb-0 md:mr-8">
                <div class="text-center md:text-left">
                    <h1 class="text-4xl font-bold text-primary mb-2">{{ $candidate->name }}</h1>
                    <p class="text-2xl text-gray-600 mb-4">{{ $candidate->position }}</p>
                    <div class="flex justify-center md:justify-start space-x-4">
                        @if ($candidate->twitter)
                            <a href="{{ $candidate->twitter }}" class="text-blue-500 hover:text-blue-700"><i
                                    class="fab fa-twitter fa-lg"></i></a>
                        @endif
                        @if ($candidate->facebook)
                            <a href="{{ $candidate->facebook }}" class="text-blue-700 hover:text-blue-900"><i
                                    class="fab fa-facebook-f fa-lg"></i></a>
                        @endif
                        @if ($candidate->instagram)
                            <a href="{{ $candidate->instagram }}" class="text-pink-600 hover:text-pink-800"><i
                                    class="fab fa-instagram fa-lg"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- Navigation Tabs and Content Sections -->
        <div x-data="{ activeTab: 'background' }">
            <!-- Navigation Tabs -->
            <nav class="mb-8 fade-in">
                <ul class="flex border-b">
                    <li class="-mb-px mr-1">
                        <a class="bg-white inline-block py-2 px-4 font-semibold"
                            :class="{ 'text-primary border-l border-t border-r rounded-t': activeTab === 'background', 'text-gray-500 hover:text-primary': activeTab !== 'background' }"
                            @click.prevent="activeTab = 'background'" href="#">Background</a>
                    </li>
                    <li class="mr-1">
                        <a class="bg-white inline-block py-2 px-4 font-semibold"
                            :class="{ 'text-primary border-l border-t border-r rounded-t': activeTab === 'policies', 'text-gray-500 hover:text-primary': activeTab !== 'policies' }"
                            @click.prevent="activeTab = 'policies'" href="#">Key Policies</a>
                    </li>
                    <li class="mr-1">
                        <a class="bg-white inline-block py-2 px-4 font-semibold"
                            :class="{ 'text-primary border-l border-t border-r rounded-t': activeTab === 'experience', 'text-gray-500 hover:text-primary': activeTab !== 'experience' }"
                            @click.prevent="activeTab = 'experience'" href="#">Experience</a>
                    </li>
                    <li class="mr-1">
                        <a class="bg-white inline-block py-2 px-4 font-semibold"
                            :class="{ 'text-primary border-l border-t border-r rounded-t': activeTab === 'voting', 'text-gray-500 hover:text-primary': activeTab !== 'voting' }"
                            @click.prevent="activeTab = 'voting'" href="#">Voting Record</a>
                    </li>
                </ul>
            </nav>

            <!-- Content Sections -->
            <section class="bg-white rounded-lg shadow-md p-8 mb-8 fade-in">
                <!-- Background -->
                <div x-show="activeTab === 'background'">
                    <h2 class="text-3xl font-bold text-primary mb-4">Background</h2>
                    <p class="text-gray-700">
                        {!! nl2br(e($candidate->background)) !!}
                    </p>
                </div>

                <!-- Key Policies -->
                <div x-show="activeTab === 'policies'">
                    <h2 class="text-3xl font-bold text-primary mb-4">Key Policies</h2>
                    <ul class="space-y-4">
                        @foreach ($candidate->policies as $policy)
                            <li>
                                <h3 class="text-xl font-semibold mb-2">{{ $policy['title'] }}</h3>
                                <p class="text-gray-700">{{ $policy['description'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Experience -->
                <div x-show="activeTab === 'experience'">
                    <h2 class="text-3xl font-bold text-primary mb-4">Experience</h2>
                    <ul class="space-y-4">
                        @foreach ($candidate->experience as $exp)
                            <li>
                                <h3 class="text-xl font-semibold mb-2">{{ $exp['title'] }} ({{ $exp['period'] }})</h3>
                                <p class="text-gray-700">{{ $exp['description'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Voting Record -->
                <div x-show="activeTab === 'voting'">
                    <h2 class="text-3xl font-bold text-primary mb-4">Voting Record</h2>
                    <p class="text-gray-700 mb-4">{{ $candidate->voting_record['intro'] }}</p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        @foreach ($candidate->voting_record['items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>

        <!-- Comparison CTA -->
        <section class="bg-gradient-to-r from-primary to-secondary text-white rounded-lg shadow-md p-8 text-center fade-in">
            <h2 class="text-3xl font-bold mb-4">Compare {{ $candidate->name }} with Other Candidates</h2>
            <p class="text-xl mb-6">See how {{ $candidate->name }}'s positions stack up against other candidates running
                for {{ $candidate->position }}.</p>
            <button
                class="bg-white text-primary font-bold py-3 px-6 rounded-full hover:bg-gray-100 transition transform hover:scale-105">
                Compare Candidates
            </button>
        </section>
    </main>
@endsection
