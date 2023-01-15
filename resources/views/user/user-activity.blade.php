@extends('layout/main')

@section('title', 'Moja aktywność')

@section('content')
<div class="relative pt-8">
    <div class="bg-blue-50 absolute top-0 inset-x-0 h-60 w-full"></div>
    <div class="container flex-col relative overflow-y-auto">
        <div class="px-4 md:px-10 mt-5">
            <div class="flex justify-between px-3 items-center">
                <h6 class="text-3xl sm:text-4xl font-semibold">
                    Ostatnio rozwiązane quizy
                </h6>
            </div>
            <div class="bg-white my-10 shadow-2xl rounded-2xl ">
                <div class="flex justify-between px-4 py-3">
                    <div class="flex items-center">
                        <span class="ml-2 mr-3 normal-case font-normal text-sm text-slate-400">
                        Do tej pory rozwiązałeś <b>{{ $total_user_results }}</b>
                        @if (($total_user_results!= 12 AND $total_user_results != 13 AND $total_user_results != 14) AND (substr($total_user_results , -1) == 2 OR substr($total_user_results , -1) == 3 or substr($total_user_results , -1) == 4))
                            quizy
                        @else
                            quizów
                        @endif
                        ! Gratulacje :)
                        </span>
                    </div>
                </div>
                <table class="items-center w-full bg-white border-collapse ">
                    <thead>
                    <tr class="border border-x-0 border-blue-100 bg-blue-50 text-slate-500 text-base uppercase whitespace-nowrap text-left font-semibold">
                        <th class="px-6 py-3">Nazwa</th>
                        <th class="px-6 py-3 text-center">Typ</th>
                        <th class="px-6 py-3 text-center">Data</th>
                        <th class="px-6 py-3">Info</th>
                        <th class="px-6 py-3">Wynik</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($result_quizzes as $result)
                        <tr class="data-table hover:bg-slate-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="{{ isset($result->quiz->image->path) ? asset($result->quiz->image->path) : asset("uploads/images/no-image.jpg") }}" class="w-36 rounded-xl"/>
                                    <div class="ml-3">
                                        <p class="font-bold text-neutral-600 line-clamp-2">
                                            {{ $result->quiz->title }}
                                        </p>
                                        <span class="text-neutral-400 line-clamp-1">
                                            {{  \Illuminate\Support\Str::limit( $result->quiz->description, 30 ) }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-[10px] sm:text-xs  text-[{{ $result->quiz->type->color }}] bg-[{{ $result->quiz->type->color }}]/10 hover:bg-[{{ $result->quiz->type->color }}]">{{ $result->quiz->type->title }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-blue-500">
                                    {{ humanize_date($result->created_at) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex flex-col text-left text-slate-500">
                                    <span class="font-bold">{{ $result->quiz->questions->count() }}</span>
                                    <span> pytań </span>
                                </div>
                            </td>
                            <td class="px-6 py-4  text-center">
                                @if($result->quiz->quiz_type !== 4)
                                <span class="bg-orange-500 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                    {{ $result->result }}
                                </span>
                                @else
                                <span class="bg-blue-500 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                    {{ $result->message->title}}
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex justify-end">
                                    <a href="{{ route('result_show', ['result_quiz_id' => $result->id])}}" class="flex items-center text-blue-500 hover:text-blue-400 mr-3" @popper(Zobacz wynik)>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <!-- component -->
                                <div class="lg:px-24 md:px-44 px-4 py-5 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
                                    <div class="xl:pt-24 w-full xl:w-1/2 relative pb-12 lg:pb-0">
                                        <div class="relative">
                                            <div class="absolute">
                                                <div class="">
                                                    <h1 class="my-2 text-gray-800 font-bold text-2xl">
                                                        Nie znaleziono wyników :(
                                                    </h1>
                                                    <p class="my-2 text-gray-800">Spróbuj użyć innych filtrów lub dodaj rekordy do bazy danych</p>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="https://i.ibb.co/G9DC8S0/404-2.png" />
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{ asset('img/no-results-found.jpg') }}" class="h-96"/>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="p-3 border-t border-gray-100">
                    {{ $result_quizzes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
