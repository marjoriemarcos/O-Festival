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
     * Method that allows you to retrieve data from multiple repositories with fewer queries
     *
     * @param string|null $date Optional date parameter to filter by date
     * @param int|null $genre Optional genre ID to filter by genre
     * @param int|null $stage Optional stage ID to filter by stage
     * @return array of data
     */
    public function fetchDataFromRepo(?string $date = null, ?int $genre = null, ?int $stage = null): array
    {
        $query = $this->entityManager->createQuery(
            'SELECT artist, slot, stage, genre
            FROM App\Entity\Artist artist
            JOIN artist.slot slot
            JOIN slot.stage stage
            JOIN artist.genres genre'
        );

        $results = $query->getResult();

        $data = [
            'artistList' => [],
            'slotList' => [],
            'stageList' => [],
            'genreList' => []
        ];

        foreach ($results as $result) {
            $includeResult = true;

            // Format and compare dates
            if ($date !== null) {
                $slotDate = $result->getSlot()->getDate()->format('Y-m-d');
                if ($slotDate !== $date) {
                    $includeResult = false;
                }
            }

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

            if ($stage !== null && $result->getSlot()->getStage()->getId() !== $stage) {
                $includeResult = false;
            }

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

            if (!in_array($result->getSlot(), $data['slotList'], true)) {
                $data['slotList'][] = $result->getSlot();
            }

            if (!in_array($result->getSlot()->getStage(), $data['stageList'], true)) {
                $data['stageList'][] = $result->getSlot()->getStage();
            }

            foreach ($result->getGenres() as $g) {
                if (!in_array($g, $data['genreList'], true)) {
                    $data['genreList'][] = $g;
                }
            }
        }

        return $data;
    }
}
