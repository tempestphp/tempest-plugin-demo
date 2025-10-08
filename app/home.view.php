<x-base>
    <x-title title="Hello"></x-title>

    <div :foreach="$books as $book">
        {{ $book->title }}
    </div>
</x-base>
