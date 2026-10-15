 <div>
        <h1 class="text-3xl font-extrabold tracking-tight text-white">Lab Web Docker</h1>
        <p class="text-slate-400 mt-1">Serveur web haute performance Nginx & PHP-FPM sous Alpine Linux.</p>
    </div>

    <div class="grid grid-cols-2 gap-4 bg-slate-900/50 p-4 rounded-xl border border-slate-700/50">
        <div>
            <span class="block text-xs text-slate-500 font-medium">Version PHP</span>
            <span class="text-lg font-bold text-cyan-400"><?php echo phpversion(); ?></span>
        </div>
        <div>
            <span class="block text-xs text-slate-500 font-medium">Serveur Web</span>
            <span class="text-lg font-bold text-indigo-400">Nginx</span>
        </div>
        <div>
            <span class="block text-xs text-slate-500 font-medium">OS Conteneur</span>
            <span class="text-lg font-bold text-amber-400">Alpine Linux</span>
        </div>
        <div>
            <span class="block text-xs text-slate-500 font-medium">Statut</span>
            <span class="text-lg font-bold text-emerald-400">Opérationnel</span>
        </div>
    </div>

    <div class="text-xs text-slate-500 text-center pt-2">
        Généré dynamiquement par <code class="text-slate-300 bg-slate-900 px-1.5 py-0.5 rounded">index.php</code>
    </div>
</div>
