<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Demo</title>
</head>
<body>
    <h1>Recommended Books</h1>
    <?php
        $books = [
            [
                'name' => "The Hitchhiker's Guide to the Galaxy",
                'author' => 'Douglas Adams',
                'purchaseUrl' => 'https://www.amazon.com/dp/0345391802',
                'releaseYear' => 1979
            ],
            [
                'name' => 'Nineteen Eighty-Four',
                'author' => 'George Orwell',
                'purchaseUrl' => 'https://www.amazon.com/dp/0451524934',
                'releaseYear' => 1949
            ],
            [
                'name' => 'Brave New World',
                'author' => 'Aldous Huxley',
                'purchaseUrl' => 'https://www.amazon.com/dp/0060850523',
                'releaseYear' => 1932
            ],
            [
                'name' => 'Fahrenheit 451',
                'author' => 'Ray Bradbury',
                'purchaseUrl' => 'https://www.amazon.com/dp/1451673310',
                'releaseYear' => 1953
            ],
            [
                'name' => 'The War of the Worlds',
                'author' => 'H. G. Wells',
                'purchaseUrl' => 'https://www.amazon.com/dp/1503212977',
                'releaseYear' => 1898
            ],
            [
                'name' => 'The Time Machine',
                'author' => 'H. G. Wells',
                'purchaseUrl' => 'https://www.amazon.com/dp/1503213019',
                'releaseYear' => 1895
            ]
        ];

        function filter(array $items, callable $fn): array {
            $fileredItems = [];
            foreach ($items as $item) {
                if ($fn($item)) {
                    $fileredItems[] = $item;
                }
            }
            return $fileredItems;
        }

        $filteredBooks = array_filter($books, function ($book) {
            return $book['releaseYear'] > 1950;
        });
    ?>

    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>">
                    <?= $book['name'] ?> (<?= $book['releaseYear'] ?>)
                </a>
                by <?= $book['author'] ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
