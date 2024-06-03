<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;

class fetchDataFromRepo
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Method that retrieves data from multiple repositories efficiently.
     *
     * @param string|null $date Optional parameter to filter by date.
     * @param int|null $genre Optional parameter to filter by genre ID.
     * @param int|null $stage Optional parameter to filter by stage ID.
     * @return array Fetched data including artists, slots, stages, and genres.
     */
    public function fetchDataFromRepo(?string $date = null, ?int $genre = null, ?int $stage = null): array
    {
        // Create a query to fetch required entities
        $query = $this->entityManager->createQuery(
            'SELECT artist, slot, stage, genre
            FROM App\Entity\Artist artist
            JOIN artist.slot slot
            JOIN slot.stage stage
            JOIN artist.genres genre'
        );

        // Execute the query and get the results
        $results = $query->getResult();

        // Initialize an array to store fetched data
        $data = [
            'artistList' => [],
            'slotList' => [],
            'stageList' => [],
            'genreList' => []
        ];

        // Loop through the results and populate the data array
        foreach ($results as $result) {
            $includeResult = true;

            // Format and compare dates if a date filter is provided
            if ($date !== null) {
                $slotDate = $result->getSlot()->getDate()->format('Y-m-d');
                if ($slotDate !== $date) {
                    $includeResult = false;
                }
            }

            // Check if the result should be included based on the genre filter
            if ($genre !== null) {
                $genreFound = false;
                foreach ($result->getGenres() as $g) {
                    if ($g->getId() === $genre) {
                        $genreFound = true;
                        break;
                    }
                }
                if (!$genreFound) {
                    $includeResult = false;
                }
            }

            // Check if the result should be included based on the stage filter
            if ($stage !== null && $result->getSlot()->getStage()->getId() !== $stage) {
                $includeResult = false;
            }

            // Add the result to the artist list if it should be included
            if ($includeResult) {
                $data['artistList'][] = [
                    'id' => $result->getId(),
                    'picture' => $result->getPicture(),
                    'name' => $result->getName(),
                    'date' => $result->getSlot()->getDate()->format('Y-m-d'),
                    'genres' => $result->getGenres(),
                    'stage' => $result->getSlot()->getStage()
                ];
            }

            // Add the slot to the slot list if it's not already included
            if (!in_array($result->getSlot(), $data['slotList'], true)) {
                $data['slotList'][] = $result->getSlot();
            }

            // Add the stage to the stage list if it's not already included
            if (!in_array($result->getSlot()->getStage(), $data['stageList'], true)) {
                $data['stageList'][] = $result->getSlot()->getStage();
            }

            // Add each genre to the genre list if it's not already included
            foreach ($result->getGenres() as $g) {
                if (!in_array($g, $data['genreList'], true)) {
                    $data['genreList'][] = $g;
                }
            }
        }

        return $data;
    }
}
