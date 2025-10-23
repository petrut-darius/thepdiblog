<head>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', "resources/js/app.js"])


  <style>
    :root {
      --coffee-dark: #3C2A21;
      --coffee-mocha: #6F4E37;
      --coffee-latte: #A67B5B;
      --coffee-caramel: #C59D7E;
      --coffee-cream: #F3E5AB;
      --coffee-foam: #FAF3E0;
      --coffee-espresso: #4B3832;
    }

    /* Extend Tailwind with custom color utilities */
    .bg-coffee-dark    { background-color: var(--coffee-dark); }
    .bg-coffee-mocha   { background-color: var(--coffee-mocha); }
    .bg-coffee-latte   { background-color: var(--coffee-latte); }
    .bg-coffee-caramel { background-color: var(--coffee-caramel); }
    .bg-coffee-cream   { background-color: var(--coffee-cream); }
    .bg-coffee-foam    { background-color: var(--coffee-foam); }
    .bg-coffee-espresso{ background-color: var(--coffee-espresso); }

    .text-coffee-dark    { color: var(--coffee-dark); }
    .text-coffee-mocha   { color: var(--coffee-mocha); }
    .text-coffee-latte   { color: var(--coffee-latte); }
    .text-coffee-caramel { color: var(--coffee-caramel); }
    .text-coffee-cream   { color: var(--coffee-cream); }
    .text-coffee-foam    { color: var(--coffee-foam); }
    .text-coffee-espresso{ color: var(--coffee-espresso); }
  </style>
</head>
<body class="bg-coffee-foam">
  <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
  <nav class="relative bg-coffee-dark after:pointer-events-none after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-white/10">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
              <a href="/" class="{{ request()->is('/') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium">Home</a>
              <a href="/posts" class="{{ request()->is('posts') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium">Posts</a>
              @if(auth()->user() && auth()->user()->isAdmin())
                <a href="/posts/create" class="{{ request()->is('posts/create') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium">Create post</a>
              @endif
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 ">
            @auth
              <form action="/logout" method="POST" class="my-auto">
                @csrf
                @method("DELETE")
                <button class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Log out</button>
              </form>
            @endauth
            @guest
              <a href="/login" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Log in</a>
              <a href="/register" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Register</a>
            @endguest
        </div>
      </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block sm:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3">
        <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
        <a href="/" aria-current="page" class="{{ request()->is('/') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium">Home</a>
        <a href="/posts" class="{{ request()->is('posts') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium">Posts</a>
        @if(auth()->user() && auth()->user()->isAdmin())
          <a href="/posts/create" class="{{ request()->is('posts/create') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium">Create post</a>
        @endif
      </div>
    </el-disclosure>
  </nav>
  <div>
    <x-title>{{ $header }}</x-title>
    <div class="">
      @if (!empty($body))
        {{ $body }}
      @endif
    </div>
  </div>
</body>