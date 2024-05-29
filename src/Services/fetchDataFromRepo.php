<?php

namespace App\Services;

use App\Repository\ArtistRepository;
use App\Repository\GenreRepository;
use App\Repository\SlotRepository;
use App\Repository\StageRepository;

/***
 * 
 * Class that allows you to retrieve data from several repositories
 * 
 */
class fetchDataFromRepo
{
    private ArtistRepository $artistRepository;
    private SlotRepository $slotRepository;
    private StageRepository $stageRepository;
    private GenreRepository $genreRepository;

    public function __construct(ArtistRepository $artistRepository, SlotRepository $slotRepository, StageRepository $stageRepository, GenreRepository $genreRepository)
    {
        $this->artistRepository = $artistRepository;
        $this->slotRepository = $slotRepository;
        $this->stageRepository = $stageRepository;
        $this->genreRepository = $genreRepository;
    }

    /**
     * Method that allows you to retrieve data from ArtistRepository, SlotRepository, StageRepository, GenreRepository
     *
     * @param string|null $date Optional date parameter to filter by date
     * @param int|null $genre Optional genre ID to filter by genre
     * @param int|null $stage Optional stage ID to filter by stage
     * @return array of data
     */
    public function fetchDataFromRepo(?string $date = null, ?int $genre = null, ?int $stage = null): array
    {
        $data = [];

        // Get data slots from Database
        $data['slotList'] = $this->slotRepository->findAll();

        // Get data artist associated with slots from Database
        $artistsWithSlots = $this->artistRepository->findArtistsWithSlots();

        // Filter artists based on parameters
        $artistsData = array_filter($artistsWithSlots, function ($artist) use ($date, $genre, $stage) {
            return (!$date || $artist->getSlot()->getDate()->format('Y-m-d') === $date)
                && (!$genre || $artist->getGenres()->exists(function ($key, $element) use ($genre) {
                    return $element->getId() === $genre;
                }))
                && (!$stage || $artist->getSlot()->getStage()->getId() === $stage);
        });

        // Format artists data
        $data['artistList'] = array_map(function ($artist) {
            return [
                'id' => $artist->getId(),
                'picture' => $artist->getPicture(),
                'name' => $artist->getName(),
                'date' => $artist->getSlot()->getDate(),
                'genres' => $artist->getGenres(),
                'stage' => $artist->getSlot()->getStage()
            ];
        }, $artistsData);

        // Get data stages associated with slots from Database
        $data['stageList'] = $this->stageRepository->findStagesWithSlots();

        // Get data genres associated with artists from Database
        $data['genreList'] = $this->genreRepository->findGenresOfArtistsWithSlot();

        return $data;
    }


}
