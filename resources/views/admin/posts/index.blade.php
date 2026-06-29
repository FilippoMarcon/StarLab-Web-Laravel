@extends('admin.layouts.app')

@section('title', 'StarLab Admin | Articoli')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-black text-white uppercase tracking-tight">Articoli</h1>
        <p class="text-slate-400 text-sm mt-1">Gestisci gli articoli del blog</p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="px-6 py-3 bg-amber-500 hover:bg-amber-400 text-white font-bold uppercase tracking-wider rounded-xl transition-all shadow-lg shadow-amber-500/25">Nuovo Articolo</a>
</div>

<div class="bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-slate-800">
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Titolo</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Pubblicato il</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Attivo</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr class="border-b border-slate-800/50 hover:bg-slate-800/30 transition-colors">
                    <td class="p-4 text-sm text-white font-bold">{{ $post->title }}</td>
                    <td class="p-4 text-sm text-slate-300">{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d/m/Y H:i') : '—' }}</td>
                    <td class="p-4">
                        @if ($post->active)
                            <span class="px-2 py-1 text-xs font-bold bg-emerald-900/30 text-emerald-400 rounded-full">Attivo</span>
                        @else
                            <span class="px-2 py-1 text-xs font-bold bg-slate-800 text-slate-500 rounded-full">Disattivo</span>
                        @endif
                    </td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">Modifica</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Eliminare questo articolo? L\'operazione è irreversibile.')">
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
                    <td colspan="4" class="p-12 text-center text-slate-500">
                        <p class="text-lg font-bold">Nessun articolo</p>
                        <p class="text-sm mt-1">Crea il primo articolo per il blog.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
