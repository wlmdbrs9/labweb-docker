<?php
// Récupération des informations système et PHP
$php_version = phpversion();
$server_software = $_SERVER['SERVER_SOFTWARE'] ?? 'Nginx';
$os_info = php_uname();
$load_avg = function_exists('sys_getloadavg') ? sys_getloadavg() : [0, 0, 0];
$memory_usage = memory_get_usage(true);
$memory_peak = memory_get_peak_usage(true);
$extensions = get_loaded_extensions();
sort($extensions);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Web - Dashboard Alpine / Nginx / PHP</title>
    <!-- Tailwind CSS via CDN pour un style ultra moderne -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col justify-between font-sans selection:bg-cyan-500 selection:text-white">

    <!-- Header -->
    <header class="border-b border-slate-800 bg-slate-900/50 backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="bg-cyan-500/10 border border-cyan-500/30 p-2.5 rounded-xl text-cyan-400">
                    <i class="fa-solid fa-server text-xl"></i>
                </div>
                <div>
                    <h1 class="font-bold text-lg tracking-wide">LABWEB // <span class="text-cyan-400">CONTAINER</span></h1>
                    <p class="text-xs text-slate-400">Infrastructure Nginx + PHP-FPM sur Alpine Linux</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                    <span class="w-2 h-2 mr-2 bg-emerald-400 rounded-full animate-pulse"></span> Online
                </span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8 w-full flex-grow space-y-8">

        <!-- Hero Banner -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-cyan-900/40 via-slate-900 to-blue-950/40 border border-slate-800 p-8 shadow-2xl">
            <div class="relative z-10">
                <span class="text-xs font-semibold tracking-wider text-cyan-400 uppercase">Environnement de Test Docker</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold mt-1 mb-3 text-white tracking-tight">Serveur Web Opérationnel 🚀</h2>
                <p class="text-slate-400 max-w-2xl text-sm sm:text-base leading-relaxed">
                    Ce conteneur tourne avec succès. Le code source est synchronisé via Git, propulsé par une image Alpine ultra-légère, orchestré par Nginx et exécuté via PHP-FPM.
                </p>
            </div>
            <div class="absolute -right-10 -bottom-10 text-slate-800/25 pointer-events-none">
                <i class="fa-brands fa-docker text-9xl"></i>
            </div>
        </div>

        <!-- Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- PHP Version -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-5 flex items-center space-x-4 shadow-lg hover:border-cyan-500/40 transition-all">
                <div class="p-3 bg-blue-500/10 text-blue-400 rounded-lg">
                    <i class="fa-brands fa-php text-2xl"></i>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-400">Version PHP</p>
                    <p class="text-lg font-bold text-slate-100"><?= htmlspecialchars($php_version) ?></p>
                </div>
            </div>

            <!-- Serveur Web -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-5 flex items-center space-x-4 shadow-lg hover:border-cyan-500/40 transition-all">
                <div class="p-3 bg-emerald-500/10 text-emerald-400 rounded-lg">
                    <i class="fa-solid fa-globe text-2xl"></i>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-400">Serveur Web</p>
                    <p class="text-lg font-bold text-slate-100 truncate max-w-[180px]"><?= htmlspecialchars($server_software) ?></p>
                </div>
            </div>

            <!-- Mémoire PHP -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-5 flex items-center space-x-4 shadow-lg hover:border-cyan-500/40 transition-all">
                <div class="p-3 bg-amber-500/10 text-amber-400 rounded-lg">
                    <i class="fa-solid fa-memory text-2xl"></i>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-400">Mémoire Allouée</p>
                    <p class="text-lg font-bold text-slate-100"><?= round($memory_usage / 1024 / 1024, 2) ?> Mo</p>
                </div>
            </div>

            <!-- Charge Système -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-5 flex items-center space-x-4 shadow-lg hover:border-cyan-500/40 transition-all">
                <div class="p-3 bg-purple-500/10 text-purple-400 rounded-lg">
                    <i class="fa-solid fa-microchip text-2xl"></i>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-400">Charge CPU (1m)</p>
                    <p class="text-lg font-bold text-slate-100"><?= $load_avg[0] ?></p>
                </div>
            </div>
        </div>

        <!-- Detailed Info Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- System Details -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-lg lg:col-span-1 space-y-4">
                <h3 class="text-base font-semibold flex items-center space-x-2 text-slate-200">
                    <i class="fa-solid fa-circle-info text-cyan-400"></i>
                    <span>Informations Système</span>
                </h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between pb-2 border-b border-slate-800">
                        <span class="text-slate-400">OS / Kernel</span>
                        <span class="font-mono text-xs text-slate-200 truncate max-w-[180px]" title="<?= htmlspecialchars($os_info) ?>"><?= htmlspecialchars($os_info) ?></span>
                    </div>
                    <div class="flex justify-between pb-2 border-b border-slate-800">
                        <span class="text-slate-400">Protocole</span>
                        <span class="font-mono text-xs text-slate-200"><?= htmlspecialchars($_SERVER['SERVER_PROTOCOL'] ?? 'HTTP') ?></span>
                    </div>
                    <div class="flex justify-between pb-2 border-b border-slate-800">
                        <span class="text-slate-400">Port Serveur</span>
                        <span class="font-mono text-xs text-slate-200"><?= htmlspecialchars($_SERVER['SERVER_PORT'] ?? '80') ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Pic Mémoire Script</span>
                        <span class="font-mono text-xs text-slate-200"><?= round($memory_peak / 1024 / 1024, 2) ?> Mo</span>
                    </div>
                </div>
            </div>

            <!-- Loaded Extensions -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-lg lg:col-span-2 space-y-4">
                <h3 class="text-base font-semibold flex items-center space-x-2 text-slate-200">
                    <i class="fa-solid fa-puzzle-piece text-cyan-400"></i>
                    <span>Extensions PHP Chargées (<?= count($extensions) ?>)</span>
                </h3>
                <div class="flex flex-wrap gap-2 max-h-48 overflow-y-auto pr-2 custom-scrollbar">
                    <?php foreach ($extensions as $ext): ?>
                        <span class="px-2.5 py-1 bg-slate-800 border border-slate-700/60 rounded-md text-xs font-mono text-cyan-300">
                            <?= htmlspecialchars($ext) ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800 bg-slate-900/40 py-6 text-center text-xs text-slate-500">
        <p>Lab Docker Alpine Nginx PHP • Développé par William • Synchronisé avec Git & GitHub</p>
    </footer>

</body>
</html>
