<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @zayneStyles
</head>
<body class="zaynemainlayout">

    <x-zayne.layout.sidebar>
        <x-slot:header>
            <x-zayne.layout.sidebar.navitem>
                header
            </x-zayne.layout.sidebar.navitem>
        </x-slot:header>


        {{-- main --}}
            <x-zayne.layout.sidebar.navitem>
                <x-slot:lefticon>
                    0
                </x-slot:lefticon>
                Dashboard
            </x-zayne.layout.sidebar.navitem>
            
            <x-zayne.layout.sidebar.navtree label="Dropdown ">
                <x-slot:iconslot>
                    0
                </x-slot:iconslot>
                <x-zayne.layout.sidebar.navtreeitem>
                    option 1
                </x-zayne.layout.sidebar.navtreeitem>

            </x-zayne.layout.sidebar.navtree>
            <x-zayne.layout.sidebar.navitem>
                <x-slot:lefticon>
                    0
                </x-slot:lefticon>
                Dashboard
            </x-zayne.layout.sidebar.navitem>
            
            <x-zayne.layout.sidebar.navtree label="Dropdown ">
                <x-slot:iconslot>
                    0
                </x-slot:iconslot>
                <x-zayne.layout.sidebar.navtreeitem>
                    option 1
                </x-zayne.layout.sidebar.navtreeitem>

            </x-zayne.layout.sidebar.navtree>
            <x-zayne.layout.sidebar.navitem>
                <x-slot:lefticon>
                    0
                </x-slot:lefticon>
                Dashboard
            </x-zayne.layout.sidebar.navitem>
            
            <x-zayne.layout.sidebar.navtree label="Dropdown ">
                <x-slot:iconslot>
                    0
                </x-slot:iconslot>
                <x-zayne.layout.sidebar.navtreeitem>
                    option 1
                </x-zayne.layout.sidebar.navtreeitem>

            </x-zayne.layout.sidebar.navtree>
            <x-zayne.layout.sidebar.navitem>
                <x-slot:lefticon>
                    0
                </x-slot:lefticon>
                Dashboard
            </x-zayne.layout.sidebar.navitem>
            
            <x-zayne.layout.sidebar.navtree label="Dropdown ">
                <x-slot:iconslot>
                    0
                </x-slot:iconslot>
                <x-zayne.layout.sidebar.navtreeitem>
                    option 1
                </x-zayne.layout.sidebar.navtreeitem>

            </x-zayne.layout.sidebar.navtree>
            <x-zayne.layout.sidebar.navitem>
                <x-slot:lefticon>
                    0
                </x-slot:lefticon>
                Dashboard
            </x-zayne.layout.sidebar.navitem>
            
            <x-zayne.layout.sidebar.navtree label="Dropdown ">
                <x-slot:iconslot>
                    0
                </x-slot:iconslot>
                <x-zayne.layout.sidebar.navtreeitem>
                    option 1
                </x-zayne.layout.sidebar.navtreeitem>

            </x-zayne.layout.sidebar.navtree>
            <x-zayne.layout.sidebar.navitem>
                <x-slot:lefticon>
                    0
                </x-slot:lefticon>
                Dashboard
            </x-zayne.layout.sidebar.navitem>
            
            <x-zayne.layout.sidebar.navtree label="Dropdown ">
                <x-slot:iconslot>
                    0
                </x-slot:iconslot>
                <x-zayne.layout.sidebar.navtreeitem>
                    option 1
                </x-zayne.layout.sidebar.navtreeitem>

            </x-zayne.layout.sidebar.navtree>




        <x-slot:footer>
            <x-zayne.layout.sidebar.navitem>
                footer
            </x-zayne.layout.sidebar.navitem>
        </x-slot:footer>
    </x-zayne.layout.sidebar>

    <x-zayne.layout.header>
        
    </x-zayne.layout.header>




    <x-zayne.layout.main>
        <div
        class="flex flex-col ">
        <p class="p-6 text-sm text-gray-500">Main content here</p>
        <div class="flex items-center gap-2">
            <button onclick="Zayne.Theme.set('light')" class="px-3 py-1.5 text-xs rounded-lg bg-white text-black border">Light</button>
            <button onclick="Zayne.Theme.set('dark')"  class="px-3 py-1.5 text-xs rounded-lg bg-gray-800 text-white">Dark</button>
            <button onclick="Zayne.Theme.set('abyss')" class="px-3 py-1.5 text-xs rounded-lg bg-indigo-950 text-green-400">Abyss</button>
        </div>
        <button
                onclick="Zayne.Sidebar.toggle()"
                class="flex items-center w-full rounded-lg hover:bg-black/10 cursor-pointer transition-colors duration-150"
            >
                <div class="shrink-0 w-[38px] h-[38px   ] flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                    </svg>
                </div>
                <span class="sidebar-label text-sm">Collapse</span>
            </button>

        </div>

        <h1>Main Heading</h1>

<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</p>

<h2>Section Title</h2>

<p>
  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
  nisi ut aliquip ex ea commodo consequat.
</p>

<h3>Another Heading</h3>

<p>
  Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur.
</p>

<h4>Sub Heading</h4>

<p>
  Excepteur sint occaecat cupidatat non proident,
  sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>

<h5>Small Heading</h5>

<p>
  Curabitur pretium tincidunt lacus. Nulla gravida orci a odio.
</p>

<h6>Tiny Heading</h6>

<p>
  Integer in mauris eu nibh euismod gravida.
</p>
<h1>Main Heading</h1>

<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</p>

<h2>Section Title</h2>

<p>
  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
  nisi ut aliquip ex ea commodo consequat.
</p>

<h3>Another Heading</h3>

<p>
  Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur.
</p>

<h4>Sub Heading</h4>

<p>
  Excepteur sint occaecat cupidatat non proident,
  sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>

<h5>Small Heading</h5>

<p>
  Curabitur pretium tincidunt lacus. Nulla gravida orci a odio.
</p>

<h6>Tiny Heading</h6>

<p>
  Integer in mauris eu nibh euismod gravida.
</p>
<h1>Main Heading</h1>

<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</p>

<h2>Section Title</h2>

<p>
  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
  nisi ut aliquip ex ea commodo consequat.
</p>

<h3>Another Heading</h3>

<p>
  Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur.
</p>

<h4>Sub Heading</h4>

<p>
  Excepteur sint occaecat cupidatat non proident,
  sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>

<h5>Small Heading</h5>

<p>
  Curabitur pretium tincidunt lacus. Nulla gravida orci a odio.
</p>

<h6>Tiny Heading</h6>

<p>
  Integer in mauris eu nibh euismod gravida.
</p>
<h1>Main Heading</h1>

<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</p>

<h2>Section Title</h2>

<p>
  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
  nisi ut aliquip ex ea commodo consequat.
</p>

<h3>Another Heading</h3>

<p>
  Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur.
</p>

<h4>Sub Heading</h4>

<p>
  Excepteur sint occaecat cupidatat non proident,
  sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>

<h5>Small Heading</h5>

<p>
  Curabitur pretium tincidunt lacus. Nulla gravida orci a odio.
</p>

<h6>Tiny Heading</h6>

<p>
  Integer in mauris eu nibh euismod gravida.
</p><h1>Main Heading</h1>

<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</p>

<h2>Section Title</h2>

<p>
  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
  nisi ut aliquip ex ea commodo consequat.
</p>

<h3>Another Heading</h3>

<p>
  Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur.
</p>

<h4>Sub Heading</h4>

<p>
  Excepteur sint occaecat cupidatat non proident,
  sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>

<h5>Small Heading</h5>

<p>
  Curabitur pretium tincidunt lacus. Nulla gravida orci a odio.
</p>

<h6>Tiny Heading</h6>

<p>
  Integer in mauris eu nibh euismod gravida.
</p>
<h1>Main Heading</h1>

<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</p>

<h2>Section Title</h2>

<p>
  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
  nisi ut aliquip ex ea commodo consequat.
</p>

<h3>Another Heading</h3>

<p>
  Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur.
</p>

<h4>Sub Heading</h4>

<p>
  Excepteur sint occaecat cupidatat non proident,
  sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>

<h5>Small Heading</h5>

<p>
  Curabitur pretium tincidunt lacus. Nulla gravida orci a odio.
</p>

<h6>Tiny Heading</h6>

<p>
  Integer in mauris eu nibh euismod gravida.
</p>

        
        

    </x-zayne.layout.main>
        

    @zayneScripts
</body>
</html>