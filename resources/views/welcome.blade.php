<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk SaaS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-900 text-white">
<!-- Header fixo -->
<header class="fixed top-0 left-0 w-full bg-gray-800 shadow-lg z-50 py-4 px-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-blue-400">Helpdesk Bugados</h1>
    <a href="https://app-chamados-main-hepr4t.laravel.cloud/admin/login">
        <button class="bg-blue-500 px-5 py-2 rounded-lg shadow-md hover:bg-blue-600">Login</button>
    </a>
</header>

<!-- Hero Section -->
<section class="min-h-screen flex flex-col items-center justify-center text-center px-6 pt-20">
    <img class="mb-6" src="https://sentriweb.com.br/wp-content/uploads/2024/12/android-chrome-512x512-1.png" alt="Helpdesk Logo">
    <h2 class="text-4xl md:text-5xl font-extrabold">O suporte que você precisa, quando precisa.</h2>
    <p class="text-gray-400 mt-4 text-lg max-w-xl">Nosso Helpdesk facilita a resolução de problemas para sua equipe e clientes.</p>
    <div class="mt-8 flex flex-col sm:flex-row gap-4">
        <button class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600">Fale Conosco</button>
        <a href="https://app-chamados-main-hepr4t.laravel.cloud/admin/login">
            <button type="button" class="bg-gray-700 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-800">Login</button>
        </a>
    </div>
</section>

<!-- Seção Quem Somos -->
<section class="py-16 px-6 text-center bg-gray-800">
    <h2 class="text-3xl font-bold text-blue-400">Quem Somos</h2>
    <p class="text-gray-400 mt-4 max-w-3xl mx-auto">Somos uma plataforma de Helpdesk dedicada a oferecer suporte ágil e eficiente para empresas de todos os tamanhos. Nosso objetivo é simplificar a gestão de chamados e melhorar a experiência do cliente.</p>
</section>

<!-- Seção Funcionalidades -->
<section class="py-16 px-6 text-center">
    <h2 class="text-3xl font-bold text-blue-400">Funcionalidades</h2>
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-blue-300">Gerenciamento de Chamados</h3>
            <p class="text-gray-400 mt-2">Acompanhe e resolva problemas de forma organizada e eficiente.</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-blue-300">Integração com E-mail</h3>
            <p class="text-gray-400 mt-2">Receba e responda chamados diretamente pelo e-mail da sua equipe.</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-blue-300">Relatórios e Análises</h3>
            <p class="text-gray-400 mt-2">Gere relatórios detalhados para acompanhar a performance do seu suporte.</p>
        </div>
    </div>
</section>

<!-- Seção Benefícios -->
<section class="py-16 px-6 text-center bg-gray-800">
    <h2 class="text-3xl font-bold text-blue-400">Benefícios</h2>
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
        <div class="bg-gray-900 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-blue-300">Atendimento Ágil</h3>
            <p class="text-gray-400 mt-2">Reduza o tempo de resposta e aumente a satisfação do cliente.</p>
        </div>
        <div class="bg-gray-900 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-blue-300">Automação Inteligente</h3>
            <p class="text-gray-400 mt-2">Automatize tarefas repetitivas para otimizar o tempo da equipe.</p>
        </div>
        <div class="bg-gray-900 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-blue-300">Segurança e Confiabilidade</h3>
            <p class="text-gray-400 mt-2">Mantenha seus dados seguros com criptografia e backups automáticos.</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 w-full py-6 text-center mt-12">
    <div class="max-w-4xl mx-auto px-6">
        <p class="text-gray-400 text-sm">© 2025 Equipe Bugados. Todos os direitos reservados.</p>
        <div class="flex justify-center space-x-4 mt-2">
            <a href="#" class="text-blue-400 hover:text-blue-500">Termos de Serviço</a>
            <a href="#" class="text-blue-400 hover:text-blue-500">Política de Privacidade</a>
            <a href="#" class="text-blue-400 hover:text-blue-500">Contato</a>
        </div>
    </div>
</footer>
</body>
</html>
