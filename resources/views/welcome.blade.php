<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2 flex justify-center items-center">
                    <div class="p-4">
                        <img src="{{ asset('storage/Campo-18-1000x1000.jpg'); }}" alt="">
                    </div>
                    <div class="p-4">
                            <h2 class="font-bold">A remarkable history</h2>
                            <p class="p-2 pl-0">In 1897 Guillaume Campo started a small art shop at his home. The gallery had to reinvent itself several times, surviving two world wars and living on after the financial crisis of 1929.</p>
                            <p class="p-2 pl-0">The second generation ran its galleries at Meir where it encountered a new milestone in 1960. Run by Freddy and Frans Campo, the gallery’s turnover kept moving upwards, followed by an ever increasing number of clients. At a ten days presale exhibition about 20.000 visitors attended the viewing.</p>
                            <h2 class="font-bold">Nowadays</h2>
                            <p class="p-2 pl-0">In 1992 Guy Campo, an active member of the gallery since 1984, took over the family firm. The gallery moved to a superb art-deco building at Grote Steenweg, built in 1929. The former cinema theatre was completely restored and refurbished as to its present looks, an impressive 1700 m² gallery space.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
