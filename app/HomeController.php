<?php

namespace App;

use Tempest\Router\Get;
use Tempest\View\View;

use function Tempest\Database\query;
use function Tempest\view;

final readonly class HomeController
{
    #[Get('/')]
    public function __invoke(): View
    {
        return view(
            './home.view.php',
            metaTitle: 'Tempest',
            books: [
                new Book('Timeline Taxi'),
                new Book('LOTR 1'),
            ]
        );
    }

    public function autocompleteModels(): void
    {
        $book = Book::create(
            title: 'LOTR 2',
        );

        $book->update(
            title: 'LOTR 2a',
        );

        Book::new(
            title: 'LOTR 3',
        );

        Book::updateOrCreate(
            [
                'title' => 'LOTR 5',
            ],
            [
                'title' => 'LOTR 5a',
            ]
        );

        Book::findOrNew(
            [
                'title' => 'LOTR 5',
            ],
            [
                'title' => 'LOTR 5a',
            ]
        );

        query(Book::class)->create(
            title: 'LOTR 4',
        );

        query($book)->update(
            title: 'LOTR 4a',
        );

        query(Book::class)->updateOrCreate(
            [
                'title' => 'LOTR 5',
            ],
            [
                'title' => 'LOTR 5a',
            ]
        );

        query(Book::class)->findOrNew(
            [
                'title' => 'LOTR 5',
            ],
            [
                'title' => 'LOTR 5a',
            ]
        );

        query(Book::class)->select()->where('title', 'LOTR 5')->first();
        query(Book::class)->select()->orderBy('title')->first();
        query(Book::class)->select()->with('author')->first();
        query(Book::class)->select()->whereField('title', 'LOTR 5')->first();
        // And all other methods from \Tempest\Database\Builder\QueryBuilders\HasConvenientWhereMethods which have the `$field` parameter.
    }
}
