@extends('admin.layouts.app')

@section('title', 'StarLab Admin | Testimonianze')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-black text-white uppercase tracking-tight">Testimonianze</h1>
        <p class="text-slate-400 text-sm mt-1">Gestisci le testimonianze dei clienti</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="px-6 py-3 bg-amber-500 hover:bg-amber-400 text-white font-bold uppercase tracking-wider rounded-xl transition-all shadow-lg shadow-amber-500/25">Nuova Testimonianza</a>
</div>

<div class="bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-slate-800">
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Nome</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Valutazione</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Progetto</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Attivo</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($testimonials as $testimonial)
                <tr class="border-b border-slate-800/50 hover:bg-slate-800/30 transition-colors">
                    <td class="p-4 text-sm text-white font-bold">{{ $testimonial->name }}</td>
                    <td class="p-4">
                        <div class="flex items-center gap-0.5">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $testimonial->rating)
                                    <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @else
                                    <svg class="w-4 h-4 text-slate-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endif
                            @endfor
                        </div>
                    </td>
                    <td class="p-4 text-sm text-slate-300">{{ $testimonial->project ? $testimonial->project->title : '—' }}</td>
                    <td class="p-4">
                        @if ($testimonial->active)
                            <span class="px-2 py-1 text-xs font-bold bg-emerald-900/30 text-emerald-400 rounded-full">Attivo</span>
                        @else
                            <span class="px-2 py-1 text-xs font-bold bg-slate-800 text-slate-500 rounded-full">Disattivo</span>
                        @endif
                    </td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">Modifica</a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Eliminare questa testimonianza? L\'operazione è irreversibile.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 transition-colors" title="Elimina">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-12 text-center text-slate-500">
                        <p class="text-lg font-bold">Nessuna testimonianza</p>
                        <p class="text-sm mt-1">Aggiungi la prima testimonianza.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
