@extends('admin.layouts.app')

@section('title', 'StarLab Admin | Grafiche')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-black text-white uppercase tracking-tight">Grafiche</h1>
        <p class="text-slate-400 text-sm mt-1">Gestisci le grafiche in vendita</p>
    </div>
    <a href="{{ route('admin.graphics.create') }}" class="px-6 py-3 bg-amber-500 hover:bg-amber-400 text-white font-bold uppercase tracking-wider rounded-xl transition-all shadow-lg shadow-amber-500/25">Nuova Grafica</a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($graphics as $graphic)
        <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
            <img src="{{ asset('storage/' . $graphic->image_watermarked) }}" alt="{{ $graphic->title }}" class="w-full aspect-video object-cover rounded-xl mb-4">
            <div class="flex items-center gap-2 mb-2">
                <h3 class="text-lg font-bold text-white">{{ $graphic->title }}</h3>
                @if ($graphic->is_published)
                    <span class="px-2 py-0.5 text-xs font-bold bg-emerald-900/50 text-emerald-400 rounded-full">Pubblicata</span>
                @else
                    <span class="px-2 py-0.5 text-xs font-bold bg-slate-800 text-slate-400 rounded-full">Bozza</span>
                @endif
            </div>
            <p class="text-slate-400 text-sm mb-3">{{ Str::limit($graphic->description, 80) }}</p>
            <div class="flex items-center gap-3 text-sm text-slate-500 mb-4">
                <span>Std: &euro;{{ number_format($graphic->price_standard, 2) }}</span>
                <span>Prem: &euro;{{ number_format($graphic->price_premium, 2) }}</span>
                <span>{{ $graphic->files->count() }} file</span>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.graphics.edit', $graphic) }}" class="flex-1 text-center py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-lg text-sm font-bold transition-all">Modifica</a>
                <form method="POST" action="{{ route('admin.graphics.destroy', $graphic) }}" onsubmit="return confirm('Eliminare questa grafica?')" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full py-2 bg-red-900/30 hover:bg-red-900/50 text-red-400 rounded-lg text-sm font-bold transition-all">Elimina</button>
                </form>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-20 text-slate-500">
            <p class="text-lg font-bold">Nessuna grafica ancora</p>
            <p class="text-sm mt-1">Carica la prima grafica per iniziare a vendere.</p>
        </div>
    @endforelse
</div>
@endsection
