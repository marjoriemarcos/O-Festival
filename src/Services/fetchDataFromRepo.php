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
            JOIN artist.genres genre
            WHERE (:date IS NULL OR slot.date = :date)
            AND (:genre IS NULL OR genre.id = :genre)
            AND (:stage IS NULL OR stage.id = :stage)'
        )
        ->setParameter('date', $date)
        ->setParameter('genre', $genre)
        ->setParameter('stage', $stage);

        $results = $query->getResult();

        $data = [
            'artistList' => [],
            'slotList' => [],
            'stageList' => [],
            'genreList' => []
        ];

        foreach ($results as $result) {
            $data['artistList'][] = [
                'id' => $result->getId(),
                'picture' => $result->getPicture(),
                'name' => $result->getName(),
                'date' => $result->getSlot()->getDate(),
                'genres' => $result->getGenres(),
                'stage' => $result->getSlot()->getStage()
            ];

            if (!in_array($result->getSlot(), $data['slotList'])) {
                $data['slotList'][] = $result->getSlot();
            }

            if (!in_array($result->getSlot()->getStage(), $data['stageList'])) {
                $data['stageList'][] = $result->getSlot()->getStage();
            }

            foreach ($result->getGenres() as $genre) {
                if (!in_array($genre, $data['genreList'])) {
                    $data['genreList'][] = $genre;
                }
            }
        }

        return $data;
    }
}
