<?php

use Algolia\AlgoliaSearch\SearchClient;
use TimoKoerber\LaravelOneTimeOperations\OneTimeOperation;

return new class extends OneTimeOperation
{
    /**
     * Determine if the operation is being processed asynchronously.
     */
    protected bool $async = true;

    /**
     * The queue that the job will be dispatched to.
     */
    protected string $queue = 'default';

    /**
     * A tag name, that this operation can be filtered by.
     */
    protected ?string $tag = null;

    /**
     * Process the operation.
     */
    public function process(): void
    {
        $products = json_decode(file_get_contents(
            __DIR__ . '/../resources/expected algolia payload.json'
        ), true);
        
        $client = SearchClient::create(
            env('ALGOLIA_APP_ID'),
            env('ALGOLIA_SECRET')
        );
        
        $index = $client->initIndex('ecommerce_juan');
        
        $index->saveObjects($products, [
            'autoGenerateObjectIDIfNotExist' => true,
        ]);

        $index->setSettings([

            // Select the attributes you want to search in
            'searchableAttributes' => [
                'brand', 'name', 'categories', 'description',
            ],
        
            // Define business metrics for ranking and sorting
            'customRanking' => [
                'desc(popularity)',
            ],
            
            // Set up some attributes to filter results on
            'attributesForFaceting' => [
                'categories', 'searchable(brand)', 'price',
            ],
        ]);
    }
};
