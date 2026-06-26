@extends('layouts.app')

@section('title', 'StarLab | Admin Login')

@section('content')
<section class="relative min-h-screen flex items-center justify-center overflow-hidden dark:bg-zinc-950 pt-24">
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-md mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-black text-slate-900 dark:text-white uppercase tracking-tight">Admin</h1>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Accesso riservato allo staff</p>
            </div>

            <div class="glass-card p-10 rounded-3xl border border-slate-200 dark:border-slate-800">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl">
                        @foreach ($errors->all() as $error)
                            <p class="text-red-600 dark:text-red-400 text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-4 py-3 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Password</label>
                        <input type="password" name="password" required
                            class="w-full px-4 py-3 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
                    </div>
                    <button type="submit"
                        class="w-full py-4 bg-amber-500 hover:bg-amber-400 text-white font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-amber-500/25">
                        Accedi
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
