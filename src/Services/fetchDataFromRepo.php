<?php

namespace App\Services;

use App\Repository\ArtistRepository;
use App\Repository\GenreRepository;
use App\Repository\SlotRepository;
use App\Repository\StageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;


/***
 * 
 * Class that allows you to retrieve data from sevrals repo
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
     * 
     * Method that allows you to retrieve data from ArtistRepository, SlotRepository, StageRepository, GenreRepository
     *
     * @return array of data
     */
    public function fetchDataFromRepo ($date = null, $genre = null, $stage = null): array
    {
        $paramDate = $date;
        $paramGenre = $genre;
        $paramStage = $stage;
        $data = [];
        // Récupération de tous les artistes avec des slots associés
        $data['artistList'] = $this->artistRepository->findAllArtistByParams($paramDate, $paramGenre, $paramStage);
        // Récupération de tous les slots
        $data['slotList'] = $this->slotRepository->findAll();
        // Récupération de tous les stages
        $data['stageList'] = $this->stageRepository->findAll();
        // Récupération de 4 des genre
        $data['genreList'] = $this->genreRepository->findGenresOfArtistsWithSlot();

        return $data;
    }


}